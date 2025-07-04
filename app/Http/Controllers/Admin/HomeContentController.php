<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUploader;
use App\Http\Controllers\Controller;
use App\Models\Clients;
use App\Models\HomeContent;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeContentController extends Controller
{
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
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $homeContent = HomeContent::first();
            $homeContent->site_color = $request->site_color;
            $homeContent->title_or_logo = $request->title_or_logo;
            $homeContent->site_title = $request->site_title;

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
