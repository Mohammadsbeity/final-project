<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProductCommentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductRateController;
use App\Http\Controllers\ProductSoldController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('about_us', AboutUsController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('favorites', FavoriteController::class);
    Route::resource('product_comments', ProductCommentController::class);
    Route::resource('products', ProductController::class);
    Route::resource('product_images', ProductImageController::class);
    Route::resource('product_rates', ProductRateController::class);
    Route::resource('product_solds', ProductSoldController::class);
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/create', [UserController::class, 'store'])->name('users.store');
        Route::get('/{user}/show', [UserController::class, 'show'])->name('users.show');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::patch('/{user}/update', [UserController::class, 'update'])->name('users.update');
        Route::delete('/{user}/delete', [UserController::class, 'destroy'])->name('users.destroy');
    });
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('shop', [ProductController::class, 'view'])->name('shop');
Route::get('favorites', [ProductController::class, 'favorites'])->name('favorites');


Route::get('detail/{id}', [ProductController::class, 'detail'])->name('detail');
Route::get('shop-category/{id}', [ProductController::class, 'category'])->name('shop-category');

Route::get('contact', function () {
    return view('contact');
})->name('contact');

Route::get('about_us', function () {
    return view('shop');
})->name('about_us');

Route::get('faq', function () {
    return view('shop');
})->name('faq');