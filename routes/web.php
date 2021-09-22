<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

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

// Auth::routes();

Route::resource('products', ProductController::class, ['parameters' => ['products' => 'product:slug']]);
Route::resource('categories', CategoryController::class, ['parameters' => ['categories' => 'category:name']]);
Route::resource('cart', CartController::class);

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
