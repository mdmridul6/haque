<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCategory\ProductCategoryRequest;
use App\Models\ProductCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = ProductCategory::all();
        return view('admin.product.category.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCategoryRequest $request)
    {
         try {
            DB::beginTransaction();
            $slug = self::slugify($request->name);
            $productCategory = new ProductCategory();
            $productCategory->name = $request->name;
            $productCategory->slug = $slug;
            $productCategory->save();
            Toastr::success('Category created successfully');
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
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $productCategory)
    {
        return view('admin.product.category.edit',compact('productCategory'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCategoryRequest $request, ProductCategory $productCategory)
    {
         try {
            DB::beginTransaction();
            $productCategory->name = $request->name;
            $productCategory->save();
            Toastr::success('Category update successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }

        return redirect()->route('admin.product-category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategory $productCategory)
    {
         try {
            DB::beginTransaction();
            $productCategory->delete();
            Toastr::success('Category deleted successfully');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }

        return redirect()->route('admin.product-category.index');
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
        while (ProductCategory::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . $count;
            $count++;
        }
        return $slug;
    }
}
