<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ImageUploader;
use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\BlogStoreRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:admin.blog')->only('index');
        $this->middleware('permission:admin.blog.create')->only(['create', 'store']);
        $this->middleware('permission:admin.blog.edit')->only(['edit', 'update']);
        $this->middleware('permission:admin.blog.delete')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();


        return view('admin.blog.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogStoreRequest $request)
    {


        try {
            DB::beginTransaction();
            $blog = new Blog();
            $blog = $this->storeAndUpdate($blog, $request);
            DB::commit();
            Toastr::success('Blog created successfully.', 'Success');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage(), 'Error');
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }

        return redirect()->route('admin.blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $tags = Tag::all();
        $categories = Category::all();

        return view('admin.blog.edit', compact('blog', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {

        try {
            DB::beginTransaction();
            $blog = $this->storeAndUpdate($blog, $request);
            DB::commit();
            Toastr::success('Blog updated successfully.', 'Success');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage(), 'Error');
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }

        return redirect()->route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        try {
            DB::beginTransaction();
            $blog->delete();
            DB::commit();
            Toastr::success('Blog deleted successfully.', 'Success');
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error($e->getMessage(), 'Error');
        }

        return redirect()->route('admin.blog.index');
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
        while (Blog::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . $count;
            $count++;
        }
        return $slug;
    }


    /**
     * Store or update the blog post.
     *
     * @param Blog $blog
     * @param Request $request
     * @return Blog
     */
    public function storeAndUpdate(Blog $blog, $request)
    {
        $blog->title = $request->title;
        $blog->slug = self::slugify($request->title);
        $blog->category_id = $request->category_id;
        $blog->content = $request->content;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;
        if ($request->hasFile('image')) {
            $imagePath = ImageUploader::resizeUpload($request->file('image'), 'blog', 800, 800);
            $blog->image = $imagePath;
        }
        $blog->save();

        if ($request->has('tags')) {
            $blog->tags()->sync($request->input('tags'));
        }
        return $blog;
    }
}
