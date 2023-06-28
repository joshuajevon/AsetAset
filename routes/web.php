<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[HomeController::class, 'home'])->name('welcome');

Route::get('/asset',[HomeController::class, 'asset'])->name('assets');

Route::get('/tentang-kami',[HomeController::class, 'tentangKami'])->name('tentangKami');

Route::get('/panduan',[HomeController::class, 'panduan'])->name('panduan');

Route::get('/hubungi-kami',[HomeController::class, 'hubungiKami'])->name('hubungiKami');

Route::get('/pengumuman',[HomeController::class, 'pengumuman'])->name('pengumuman');

Route::get('/pengumuman/{type}', [HomeController::class, 'filterPengumuman'])->name('filterPengumuman');

Route::get('/beranda/{id}',[HomeController::class, 'assetById'])->name('asset-by-id');

Route::get('/aset/{id}',[HomeController::class, 'asetById'])->name('asetId');

Route::post('/contact', [HomeController::class, 'contact'])->name('contact');

Route::get('/asset-error', [HomeController::class, 'error'])->name('error');

Route::middleware('isAdmin')->group(function(){
    Route::prefix('/admin')->group(function(){
        Route::get('/', [HomeController::class, 'dashboard'])->name('admin-dashboard');

        Route::get('/guidebook', [HomeController::class, 'guidebook'])->name('admin-guidebook');

        // CRUD assets
        Route::prefix('/assets')->group(function(){
            Route::get('/', [AssetController::class, 'asset'])->name('asset');
            Route::get('/view/{id}', [AssetController::class, 'view'])->name('view-asset');
            Route::get('/create', [AssetController::class, 'create'])->name('create-asset');
            Route::post('/store', [AssetController::class, 'store'])->name('store-asset');
            Route::get('/edit/{id}', [AssetController::class, 'edit'])->name('edit-asset');
            Route::patch('/update/{id}', [AssetController::class, 'update'])->name('update-asset');
            Route::delete('/delete/{id}', [AssetController::class, 'delete'])->name('delete-asset');
        });

        //CRUD seller
        Route::prefix('/seller')->group(function(){
            Route::get('/', [SellerController::class, 'seller'])->name('seller');
            Route::get('/view/{id}', [SellerController::class, 'view'])->name('view-seller');
            Route::get('/create', [SellerController::class, 'create'])->name('create-seller');
            Route::post('/store', [SellerController::class, 'store'])->name('store-seller');
            Route::get('/edit/{id}', [SellerController::class, 'edit'])->name('edit-seller');
            Route::patch('/update/{id}', [SellerController::class, 'update'])->name('update-seller');
            Route::delete('/delete/{id}', [SellerController::class, 'delete'])->name('delete-seller');
        });

        //CRUD owner
        Route::prefix('/owner')->group(function(){
            Route::get('/', [OwnerController::class, 'owner'])->name('owner');
            Route::get('/view/{id}', [OwnerController::class, 'view'])->name('view-owner');
            Route::get('/create', [OwnerController::class, 'create'])->name('create-owner');
            Route::post('/store', [OwnerController::class, 'store'])->name('store-owner');
            Route::get('/edit/{id}', [OwnerController::class, 'edit'])->name('edit-owner');
            Route::patch('/update/{id}', [OwnerController::class, 'update'])->name('update-owner');
            Route::delete('/delete/{id}', [OwnerController::class, 'delete'])->name('delete-owner');
        });

        // view upate delete user
        Route::prefix('/user')->group(function(){
            Route::get('/', [HomeController::class, 'user'])->name('user');
            Route::get('/view/{id}', [HomeController::class, 'view'])->name('view-user');
            Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit-user');
            Route::patch('/update/{id}', [HomeController::class, 'update'])->name('update-user');
            Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('delete-user');
        });

        // CRUD image carousel
        Route::prefix('/carousel')->group(function(){
            Route::get('/', [CarouselController::class, 'carousel'])->name('carousel');
            Route::get('/view/{id}', [CarouselController::class, 'view'])->name('view-carousel');
            Route::get('/create', [CarouselController::class, 'create'])->name('create-carousel');
            Route::post('/store', [CarouselController::class, 'store'])->name('store-carousel');
            Route::get('/edit/{id}', [CarouselController::class, 'edit'])->name('edit-carousel');
            Route::patch('/update/{id}', [CarouselController::class, 'update'])->name('update-carousel');
            Route::delete('/delete/{id}', [CarouselController::class, 'delete'])->name('delete-carousel');
        });

        // CRUD announcement
        Route::prefix('/announcement')->group(function(){
            Route::get('/', [AnnouncementController::class, 'announcement'])->name('announcement');
            Route::get('/view/{id}', [AnnouncementController::class, 'view'])->name('view-announcement');
            Route::get('/create', [AnnouncementController::class, 'create'])->name('create-announcement');
            Route::post('/store', [AnnouncementController::class, 'store'])->name('store-announcement');
            Route::get('/edit/{id}', [AnnouncementController::class, 'edit'])->name('edit-announcement');
            Route::patch('/update/{id}', [AnnouncementController::class, 'update'])->name('update-announcement');
            Route::delete('/delete/{id}', [AnnouncementController::class, 'delete'])->name('delete-announcement');
        });
    });

});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::patch('/profile', [DashboardController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [DashboardController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
