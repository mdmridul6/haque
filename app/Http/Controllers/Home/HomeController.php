<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\ContactUsRequest;
use App\Models\Blog;
use App\Models\Clients;
use App\Models\ContactUs;
use App\Models\Faq;
use App\Models\HomeContent;
use App\Models\OfferContent;
use App\Models\Plan;
use App\Models\Review;
use App\Models\Tag;
use App\Models\Team;
use App\Models\WorkProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $data['content'] = HomeContent::first();
        $data['offerContents'] = OfferContent::get();
        $data['clients'] = Clients::get();
        $data['workProcesses'] = WorkProcess::get();
        $data['plans'] = Plan::where('is_actived', true)->get();
        $data['teams'] = Team::get();
        $data['reviews'] = Review::get();
        $data['faqs'] = Faq::where('status', true)->orderBy('order', 'desc')->get();
        $data['blogs'] = Blog::with(['tags', 'category'])->get();
        return view('home.index', $data);
    }

    public function blog(Tag $tag): View
    {
        $data['content'] = HomeContent::first();
        $data['blogs'] = Blog::with(['tags', 'category'])
            ->when($tag->exists, fn($query) => $query->whereHas('tags', fn($q) => $q->where('slug', $tag->slug)))->paginate(9);
        return view('home.blog', $data);
    }

    public function blogDetails(Blog $blog): View
    {
        $data['content'] = HomeContent::first();
        $data['blog'] = $blog->load(['tags', 'category']);
        return view('home.blog-details', $data);
    }

    public function contactUsStore(ContactUsRequest $request)
    {


        try {
            DB::beginTransaction();
            $contactUs = new ContactUs();
            $contactUs->name = $request->name;
            $contactUs->email = $request->email;
            $contactUs->message = $request->message;
            $contactUs->phone = $request->phone;
            $contactUs->save();
            DB::commit();
            return response()->json([
            'status' => true,
            'message' => 'Your message has been sent successfully. We will contact you soon.'
        ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }


    }

    public function termsAndConditions(): View
    {
        $data['content'] = HomeContent::first();
        return view('home.terms-and-conditions', $data);
    }

    public function privacyPolicy(): View
    {
        $data['content'] = HomeContent::first();
        return view('home.privacy-policy', $data);
    }
}
