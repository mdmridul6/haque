<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUploader;
use App\Http\Controllers\Controller;
use App\Models\HomeContent;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin.banner')->only('index');
        $this->middleware('permission:admin.banner.create')->only(['create', 'store']);
        $this->middleware('permission:admin.banner.edit')->only(['edit', 'update']);
        $this->middleware('permission:admin.banner.delete')->only('destroy');
    }

    function index(): View
    {

        $content = HomeContent::first();
        return view('admin.home-content.banner.index', compact('content'));
    }



    public function store(Request $request)
    {

        try {
            DB::beginTransaction();
            $homeContent = HomeContent::first();
            $homeContent->banner_title = $request->banner_title;
            $homeContent->banner_subtitle = $request->banner_subtitle;
            $homeContent->youtube_video_url = $request->youtube_video_url;

            if ($request->hasFile('banner_image')) {
                $path = ImageUploader::upload(file: $request->banner_image, folder: 'banner_image');
                $homeContent->banner_image = $path;
            }
            $homeContent->save();
            DB::commit();
            Toastr::success('Site Banner Update Successfully', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return redirect()->back();
    }
}
