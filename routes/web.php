<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('home', [HomeController::class, 'index'])->name('home');

// SEARCH

Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::post('/search', [ProductController::class, 'search'])->name('search');
 
// Auth::routes();

Route::resource('products', ProductController::class, ['parameters' => ['products' => 'product:slug']]);
Route::resource('categories', CategoryController::class, ['parameters' => ['categories' => 'category:name']]);

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('cart', [CartController::class, 'store'])->name('cart');
Route::post('cart/update', [CartController::class, 'update'])->name('cart-item-update');
Route::post('cart/delete', [CartController::class, 'delete'])->name('cart-item-delete');

// USER
Route::get('/user/signup', function () {
    return view('/user/registerpage');
});

Route::get('/user/login', function () {
    return view('/user/loginpage');
});

// SUPPORT

Route::get('/support', function () {
    return view('/support/supportpage');
});

