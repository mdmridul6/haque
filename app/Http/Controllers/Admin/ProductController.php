<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUploader;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\ProductImages;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['category','brand','images'])->get();
        return view('admin.product.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $productBrand = ProductBrand::all();
        $productCategories = ProductCategory::all();

        return view('admin.product.product.create', compact('productBrand', 'productCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $slug = self::slugify($request->name);
            $product = new Product();
            $product->name = $request->name;
            $product->brand_id = $request->brand_id;
            $product->category_id = $request->category_id;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->description = $request->description;
            $product->meta_title = $request->meta_title;
            $product->meta_description = $request->meta_description;
            $product->meta_keywords = $request->meta_keywords;
            $product->slug = $slug;



            $product->save();
            DB::commit();
               if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = ImageUploader::resizeUpload($image, 'product', 300, 300);
                    $productimage = new ProductImages();
                    $productimage->product_id = $product->id;
                    $productimage->image = $path;
                    $productimage->save();
                }
            }

            Toastr::success('Product created successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }

        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $productBrand = ProductBrand::all();
        $productCategories = ProductCategory::all();
        $product->load(['images']);

        return view('admin.product.product.edit', compact('product', 'productBrand', 'productCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        try {
            
            DB::beginTransaction();
            $product->name = $request->name;
            $product->brand_id = $request->brand_id;
            $product->category_id = $request->category_id;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->description = $request->description;
            $product->save();
            DB::commit();
            // Handle image upload
              if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = ImageUploader::resizeUpload($image, 'product', 300, 300);
                    $productimage = new ProductImages();
                    $productimage->product_id = $product->id;
                    $productimage->image = $path;
                    $productimage->save();
                }
            }

            if ($request->has('preloaded_removed')) {
                foreach ($request->preloaded_removed as $imageId) {
                    $image = ProductImages::find($imageId);
                    if ($image) {
                        $image->delete();
                    }
                }
            }
            Toastr::success('Product updated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }

        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            // Delete associated images
            ProductImages::where('product_id', $product->id)->delete();
            Toastr::success('Product deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }

        return redirect()->route('admin.product.index');
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
