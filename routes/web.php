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

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('cart', [CartController::class, 'store'])->name('cart');
Route::post('cart/update', [CartController::class, 'update'])->name('cart-item-update');
Route::post('cart/delete', [CartController::class, 'delete'])->name('cart-item-delete');