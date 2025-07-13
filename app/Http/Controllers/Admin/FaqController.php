<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\HomeContent\Faq\FaqStoreRequest;
use App\Http\Requests\HomeContent\Faq\FaqUpdateRequest;
use App\Models\Faq;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::orderBy('order', 'asc')->get();
        return view('admin.home-content.faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.home-content.faq.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $faq = new Faq();
            $this->storeAndUpdate($faq, $request);
            DB::commit();
            Toastr::success('FAQ created successfully', 'Success');
            return redirect()->route('admin.faq.index');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Failed to create FAQ: ' . $e->getMessage(), 'Error');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        return view('admin.home-content.faq.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(FaqUpdateRequest $request, Faq $faq)
    {
        try {
            DB::beginTransaction();
            $this->storeAndUpdate($faq, $request);
            DB::commit();
            Toastr::success('FAQ updated successfully', 'Success');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Failed to update FAQ: ' . $e->getMessage(), 'Error');
            return redirect()->back()->withInput();
        }
        return redirect()->route('admin.faq.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        try {
            DB::beginTransaction();
            $faq->delete();
            Toastr::success('FAQ deleted successfully', 'Success');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Failed to delete FAQ: ' . $e->getMessage(), 'Error');
            return redirect()->back();
        }
        DB::commit();
        return redirect()->route('admin.faq.index');
    }


    /**
     * Handle the file upload and store the review.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function storeAndUpdate(Faq $faq, $request)
    {
        $faq->status = $request->status ? 1 : 0;
        $faq->order = $request->order;
        $faq->question = $request->question;
        $faq->answer = $request->answer;

        $faq->save();


        return $faq;
    }
}
