<?php

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

Route::get('/asset',[HomeController::class, 'asset'])->name('asset');

Route::get('/tentang-kami',[HomeController::class, 'tentangKami'])->name('tentangKami');

Route::get('/panduan',[HomeController::class, 'panduan'])->name('panduan');

Route::get('/hubungi-kami',[HomeController::class, 'hubungiKami'])->name('hubungiKami');

Route::get('/asset/{id}',[HomeController::class, 'assetById'])->name('asset-by-id');

Route::post('/contact', [HomeController::class, 'contact'])->name('contact');

Route::middleware('isAdmin')->group(function(){
    Route::prefix('/admin')->group(function(){
        Route::get('/', [HomeController::class, 'dashboard'])->name('admin-dashboard');
        // CRUD assets
        Route::prefix('/asset')->group(function(){
            Route::get('/', [AssetController::class, 'view'])->name('view-asset');
            Route::get('/create', [AssetController::class, 'create'])->name('create-asset');
            Route::post('/store', [AssetController::class, 'store'])->name('store-asset');
            Route::get('/edit/{id}', [AssetController::class, 'edit'])->name('edit-asset');
            Route::patch('/update/{id}', [AssetController::class, 'update'])->name('update-asset');
            Route::delete('/delete/{id}', [AssetController::class, 'delete'])->name('delete-asset');
        });

        //CRUD seller
        Route::prefix('/seller')->group(function(){
            Route::get('/', [SellerController::class, 'view'])->name('view-seller');
            Route::get('/create', [SellerController::class, 'create'])->name('create-seller');
            Route::post('/store', [SellerController::class, 'store'])->name('store-seller');
            Route::get('/edit/{id}', [SellerController::class, 'edit'])->name('edit-seller');
            Route::patch('/update/{id}', [SellerController::class, 'update'])->name('update-seller');
            Route::delete('/delete/{id}', [SellerController::class, 'delete'])->name('delete-seller');
        });

        //CRUD owner
        Route::prefix('/owner')->group(function(){
            Route::get('/', [OwnerController::class, 'view'])->name('view-owner');
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
            Route::get('/', [CarouselController::class, 'view'])->name('view-carousel');
            Route::get('/create', [CarouselController::class, 'create'])->name('create-carousel');
            Route::post('/store', [CarouselController::class, 'store'])->name('store-carousel');
            Route::get('/edit/{id}', [CarouselController::class, 'edit'])->name('edit-carousel');
            Route::patch('/update/{id}', [CarouselController::class, 'update'])->name('update-carousel');
            Route::delete('/delete/{id}', [CarouselController::class, 'delete'])->name('delete-carousel');
        });
    });

});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
    Route::patch('/profile', [DashboardController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [DashboardController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
