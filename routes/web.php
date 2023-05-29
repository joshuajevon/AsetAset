<?php

use App\Http\Controllers\AssetController;
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
    });

});

Route::get('/dashboard', function () {
    $user = Auth::user();

    if($user->isAdmin == 1){
        return redirect(route('admin-dashboard'));
    }else{
        return view('dashboard');
    }

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
