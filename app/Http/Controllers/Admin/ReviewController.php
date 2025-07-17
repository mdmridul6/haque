<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUploader;
use App\Http\Controllers\Controller;
use App\Http\Requests\HomeContent\Review\ReviewStoreRequest;
use App\Http\Requests\HomeContent\Review\ReviewUpdateRequest;
use App\Models\Review;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin.review')->only('index');
        $this->middleware('permission:admin.review.create')->only(['create', 'store']);
        $this->middleware('permission:admin.review.edit')->only(['edit', 'update']);
        $this->middleware('permission:admin.review.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return view('admin.home-content.review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home-content.review.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewStoreRequest $request)
    {
         try {
            DB::beginTransaction();
            $review = new Review();
            $review = $this->storeAndUpdate($review, $request);
            DB::commit();
            Toastr::success('Review created successfully.');
            return redirect()->route('admin.review.index');
        } catch (\Exception $e) {
            DB::rollBack();
            // Toastr::error('Failed to create review.');
            dd($e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('admin.home-content.review.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewUpdateRequest $request, Review $review)
    {
        try {
            DB::beginTransaction();
            $review = $this->storeAndUpdate($review, $request);
            DB::commit();
            Toastr::success('Review updated successfully.');
            return redirect()->route('admin.review.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Failed to update review.');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        try {
            DB::beginTransaction();
            $review->delete();
            DB::commit();
            Toastr::success('Review deleted successfully.');
            return redirect()->route('admin.review.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Failed to delete review.');
            return redirect()->back();
        }
    }

    /**
     * Handle the file upload and store the review.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function storeAndUpdate(Review $review, $request)
    {

        if ($request->hasFile('image')) {
            $review->image = ImageUploader::resizeUpload($request->file('image'), 'reviews', 800, 800);
        }

        $review->name = $request->name;
        $review->designation = $request->designation;
        $review->review = $request->review;

        $review->save();


        return $review;
    }
}
