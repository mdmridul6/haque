<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUploader;
use App\Http\Controllers\Controller;
use App\Models\Clients;
use App\Models\HomeContent;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AboutUsContentController extends Controller
{


     function index(): View
    {

        $content = HomeContent::first();
        $clients = Clients::all();

        return view('admin.home-content.about-us-content.index', compact('content','clients'));
    }



    public function store(Request $request)
    {

        try {
            DB::beginTransaction();
            $homeContent = HomeContent::first();
            $homeContent->about_us_title = $request->about_us_title;
            $homeContent->about_us_subtitle = $request->about_us_subtitle;
            $homeContent->save();


            if ($request->hasFile('clients_image')) {
                foreach ($request->clients_image as $clients_image) {

                    $path = ImageUploader::resizeUpload(file: $clients_image, folder: 'clients_image', height: 80, width: 150);
                    $clients = new Clients();
                    $clients->images = $path;
                    $clients->save();
                }
            }

            if ($request->has('preloaded_removed')) {
                Clients::destroy($request->preloaded_removed);
            }
            DB::commit();
            Toastr::success('About Us section Update Successfully', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return redirect()->back();
    }
}
