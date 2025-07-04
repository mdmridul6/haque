<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkProcess;
use App\Http\Requests\StoreWorkProcessRequest;
use App\Http\Requests\UpdateWorkProcessRequest;

class WorkProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workProcesses=WorkProcess::get();

        return view('admin.home-content.work-process.index',compact('workProcesses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home-content.work-process.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWorkProcessRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWorkProcessRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function show(WorkProcess $workProcess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkProcess $workProcess)
    {
        return view('admin.home-content.work-process.edit',compact('workProcess'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWorkProcessRequest  $request
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWorkProcessRequest $request, WorkProcess $workProcess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkProcess $workProcess)
    {
        //
    }
}
