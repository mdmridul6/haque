<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUploader;
use App\Http\Controllers\Controller;
use App\Http\Requests\HomeContent\HomeContentRequest;
use App\Models\Clients;
use App\Models\HomeContent;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin.home-content')->only('index');
        $this->middleware('permission:admin.home-content.create')->only(['create', 'store']);
        $this->middleware('permission:admin.home-content.edit')->only(['edit', 'update']);
        $this->middleware('permission:admin.home-content.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = HomeContent::first();
        return view('admin.home-content.index', compact('content'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomeContentRequest $request)
    {



        try {
            DB::beginTransaction();
            if (!$homeContent = HomeContent::first()) {
                $homeContent = new HomeContent();
            }else {
                $homeContent = HomeContent::first();
            }
            $homeContent->site_color = $request->site_color;
            $homeContent->title_or_logo = $request->title_or_logo;
            $homeContent->site_title = $request->site_title;
            $homeContent->primary_phone = $request->primary_phone;
            $homeContent->secondary_phone = $request->secondary_phone;
            $homeContent->email = $request->email;
            $homeContent->address = $request->address;
            $homeContent->support_email = $request->support_email;
            $homeContent->support_phone = $request->support_phone;
            $homeContent->google_map_embed = $request->google_map_embed;
            $homeContent->facebook_link = $request->facebook_link;
            $homeContent->twitter_link = $request->twitter_link;
            $homeContent->instagram_link = $request->instagram_link;
            $homeContent->linkedin_link = $request->linkedin_link;
            $homeContent->faq_video_link = $request->faq_video_link;
            $homeContent->satisfied_customers = $request->satisfied_customers;
            $homeContent->years_of_experience = $request->years_of_experience;
            $homeContent->projects_completed = $request->projects_completed;
            $homeContent->awards_won = $request->awards_won;
            $homeContent->terms_and_conditions = $request->terms_and_conditions;
            $homeContent->privacy_policy = $request->privacy_policy;


            if ($request->hasFile('site_logo')) {
                $path = ImageUploader::upload(file: $request->site_logo, folder: 'site_logo');
                $homeContent->site_logo = $path;
            }
            $homeContent->save();
            DB::commit();
            Toastr::success('Site Update Successfully', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return redirect()->back();
    }
}
