<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $permissions = $user->getAllPermissions()->pluck('name')->toArray();
        // dd($permissions);
        return view('admin.index');
    }
}






