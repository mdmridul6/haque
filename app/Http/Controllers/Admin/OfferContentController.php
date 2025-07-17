<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeContent\OfferContent\OfferContentUpdateRequest;
use App\Http\Requests\HomeContent\OfferContent\OfferRequest;
use App\Models\HomeContent;
use App\Models\OfferContent;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin.offer-content')->only('index');
        $this->middleware('permission:admin.offer-content.create')->only(['create', 'store','storeContent','storeOffer']);
        $this->middleware('permission:admin.offer-content.edit')->only(['edit', 'update','storeOfferUpdate']);
        $this->middleware('permission:admin.offer-content.delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = OfferContent::all();
        $content = HomeContent::first();
        return view('admin.home-content.offer.index', compact('offers', 'content'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeContent(OfferContentUpdateRequest $request)
    {


        try {
            DB::beginTransaction();
            $homeContent = HomeContent::first();
            $homeContent->offer_title = $request->offer_title;
            $homeContent->offer_subtitle = $request->offer_subtitle;
            $homeContent->save();
            DB::commit();
            Toastr::success('Offer Content Update Successfully', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return redirect()->back();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOffer(OfferRequest $request)
    {
        try {
            DB::beginTransaction();
            $offerContent = new OfferContent();
            $this->saveAndUpdateOfferContent($offerContent, $request);
            DB::commit();
            Toastr::success('Offer Add Successfully', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return redirect()->back();
    }

    public function edit(OfferContent $offerContent)
    {
        $offers = OfferContent::all();
        $content = HomeContent::first();
        return view('admin.home-content.offer.index', compact('offerContent', 'offers', 'content'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOfferUpdate(OfferRequest $request, OfferContent $offerContent)
    {
        try {
            DB::beginTransaction();
            $this->saveAndUpdateOfferContent($offerContent, $request);
            DB::commit();
            Toastr::success('Offer Update Successfully', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return redirect()->route('admin.offer.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfferContent  $offerContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfferContent $offerContent)
    {
        try {
            DB::beginTransaction();
            $offerContent->delete();
            DB::commit();
            Toastr::success('Offer Delete Successfully', 'Success');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
        return redirect()->back();
    }

    protected function saveAndUpdateOfferContent($offerContent, Request $request)
    {
        $offerContent->order_number = $request->order_number;
        $offerContent->title = $request->title;
        $offerContent->sub_title = $request->sub_title;
        $offerContent->icon = $request->icon;
        $offerContent->save();
    }

}
