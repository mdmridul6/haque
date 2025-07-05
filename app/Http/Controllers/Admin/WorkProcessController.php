<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUploader;
use App\Http\Controllers\Controller;
use App\Http\Requests\HomeContent\WorkProcess\StoreWorkProcessRequest;
use App\Http\Requests\HomeContent\WorkProcess\UpdateWorkProcessRequest;
use App\Models\WorkProcess;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class WorkProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workProcesses = WorkProcess::get();

        return view('admin.home-content.work-process.index', compact('workProcesses'));
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

         try {
            DB::beginTransaction();
            $workProcess=new WorkProcess();
            self::storeAndUpdate($workProcess, $request);
            DB::commit();
            Toastr::success('Workprocess add successfully', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return redirect()->route('admin.work-process.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function show(WorkProcess $workProcess)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function edit(WorkProcess $workProcess)
    {
        return view('admin.home-content.work-process.edit', compact('workProcess'));
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
          try {
            DB::beginTransaction();
            self::storeAndUpdate($workProcess, $request);
            DB::commit();
            Toastr::success('Workprocess update successfully', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return redirect()->route('admin.work-process.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WorkProcess  $workProcess
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkProcess $workProcess)
    {
          try {
            DB::beginTransaction();
            $workProcess->delete();
            DB::commit();
            Toastr::success('Workprocess delete successfully', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return redirect()->back();
    }


    protected function storeAndUpdate(WorkProcess $workProcess, $request): WorkProcess
    {

        $workProcess->button_title = $request->button_title;
        $workProcess->process_title = $request->process_title;
        $workProcess->process_description = $request->process_description;
        $workProcess->type_1_title = $request->type_1_title;
        $workProcess->type_1_sub_title = $request->type_1_sub_title;
        $workProcess->type_2_title = $request->type_2_title;
        $workProcess->type_2_sub_title = $request->type_2_sub_title;
        $workProcess->type_3_title = $request->type_3_title;
        $workProcess->type_3_sub_title = $request->type_3_sub_title;


        if ($request->hasFile('image')) {
            $path = ImageUploader::resizeUpload($request->image, 'workprocess', 800, 800);
            $workProcess->image = $path;
        }
        $workProcess->save();
        return $workProcess;
    }
}
