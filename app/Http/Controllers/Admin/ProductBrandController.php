<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductBrand\ProductBrandStoreRequest;
use App\Http\Requests\ProductBrand\ProductBrandUpdateRequest;
use App\Models\ProductBrand;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productBrand = ProductBrand::all();
        return view('admin.product.brand.index', compact('productBrand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductBrandStoreRequest $request)
    {
         try {
            DB::beginTransaction();
            $slug = self::slugify($request->name);
            $productBrand = new ProductBrand();
            $productBrand->name = $request->name;
            $productBrand->slug = $slug;
            $productBrand->save();
            Toastr::success('Brand created successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }

        return redirect()->route('admin.product-category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function show(ProductBrand $productBrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductBrand $productBrand)
    {
        return view('admin.product.brand.edit',compact('productBrand'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function update(ProductBrandUpdateRequest $request, ProductBrand $productBrand)
    {
         try {
            DB::beginTransaction();
            $productBrand->name = $request->name;
            $productBrand->save();
            Toastr::success('Brand update successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }

        return redirect()->route('admin.product-brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductBrand $productBrand)
    {
        try {
            DB::beginTransaction();
            $productBrand->delete();
            Toastr::success('Brand deleted successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }

        return redirect()->route('admin.product-brand.index');
    }

    /**
     * Convert a string to slug format.
     *
     * @param string $string
     * @return string
     */
    public static function slugify(String $slug)
    {

        $count = 1;
        while (ProductBrand::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . $count;
            $count++;
        }
        return $slug;
    }
}
