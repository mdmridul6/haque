<?php

use App\Http\Controllers\Admin\AboutUsContentController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\HomeContentController;
use App\Http\Controllers\Admin\OfferContentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\ProfileConreoller;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WorkProcessController;
use App\Http\Controllers\Authenticate\AuthenticateController;


use App\Http\Controllers\Home\HomeController;


use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Index;
use App\Models\WorkProcess;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('/login', [AuthenticateController::class, 'authenticate'])->name('login');
Route::get('/login', [AuthenticateController::class, 'login'])->name('login');


Route::middleware(['auth'])->prefix('/admin')->name('admin.')->group(function () {

    Route::get('/profile', [ProfileConreoller::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileConreoller::class, 'update'])->name('profile.update');

    Route::post('/logout', [AuthenticateController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('/permission', PermissionController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/user', UserController::class);
    Route::put('/user/{user}/password', [UserController::class, 'changePassword'])->name('user.password');



    //Home Content
    Route::get('/home-content', [HomeContentController::class, 'index'])->name('home-content.index');
    Route::post('/home-content', [HomeContentController::class, 'store'])->name('home-content.store');


    Route::get('/about-us-content', [AboutUsContentController::class, 'index'])->name('about-us-content.index');
    Route::post('/about-us-content', [AboutUsContentController::class, 'store'])->name('about-us-content.store');

    Route::get('/banner', [BannerController::class, 'index'])->name('banner.index');
    Route::post('/banner', [BannerController::class, 'store'])->name('banner.store');

    Route::get('/offer', [OfferContentController::class, 'index'])->name('offer.index');
    Route::post('/offer-content', [OfferContentController::class, 'storeContent'])->name('offer.store.content');
    Route::post('/offer', [OfferContentController::class, 'storeOffer'])->name('offer.store');
    Route::get('/offer/{offerContent}/edit', [OfferContentController::class, 'edit'])->name('offer.edit');
    Route::put('/offer/{offerContent}', [OfferContentController::class, 'storeOfferUpdate'])->name('offer.update');
    Route::delete('/offer/{offerContent}', [OfferContentController::class, 'destroy'])->name('offer.destroy');



    Route::resource('work-process', WorkProcessController::class);
    Route::resource('plan', PlanController::class);
    Route::resource('team', TeamController::class);
    Route::resource('review', ReviewController::class);
    Route::resource('faq', FaqController::class);



    Route::resource('category', CategoryController::class);
    Route::resource('tag', TagController::class);
    Route::resource('blog', BlogController::class);

});




// Frontend Section

Route::get('/blog/{id}', [HomeController::class, 'blogDetails'])->name('home');
Route::get('/blog', [HomeController::class, 'blog'])->name('home');
Route::get('/', [HomeController::class, 'index'])->name('home');
