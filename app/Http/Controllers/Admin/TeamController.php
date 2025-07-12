<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUploader;
use App\Http\Controllers\Controller;
use App\Http\Requests\HomeContent\Team\TeamStoreRequest;
use App\Http\Requests\HomeContent\Team\TeamUpdateRequest;
use App\Models\Team;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('admin.home-content.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home-content.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $team = new Team();
            $team = $this->storeAndUpdate($team, $request);
            DB::commit();
            Toastr::success('Team member created successfully.');
            return redirect()->route('admin.team.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Failed to create team member.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('admin.home-content.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(TeamUpdateRequest $request, Team $team)
    {
        try {
            DB::beginTransaction();
            $team = $this->storeAndUpdate($team, $request);
            DB::commit();
            Toastr::success('Team member updated successfully.');
            return redirect()->route('admin.team.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Failed to update team member.');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        try {
            DB::beginTransaction();
            $team->delete();
            DB::commit();
            Toastr::success('Team member deleted successfully.');
            return redirect()->route('admin.team.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Failed to delete team member.');
            return redirect()->back();
        }
    }

    /**
     * Validate the request for storing or updating a team member.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function storeAndUpdate(Team $team, $request)
    {
        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->facebook_link = $request->facebook_link;
        $team->linkedin_link = $request->linkedin_link;
        $team->twitter_link = $request->twitter_link;
        $team->instagram_link = $request->instagram_link;
        if ($request->hasFile('image')) {
            $team->image = ImageUploader::resizeUpload(
                $request->file('image'),
                'team',
                800,
                800
            );
        }
        $team->save();

        return $team;
    }
}
