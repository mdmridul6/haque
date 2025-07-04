<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Clients;
use App\Models\HomeContent;
use App\Models\OfferContent;
use App\Models\WorkProcess;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $content = HomeContent::first();
        $offerContents = OfferContent::all();
        $clients = Clients::all();
        $workProcesses=WorkProcess::get();
        return view('home.index', compact('content', 'offerContents', 'clients','workProcesses'));
    }
}
