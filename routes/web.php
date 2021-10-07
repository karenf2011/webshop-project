<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

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

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('root');
Route::get('home', [HomeController::class, 'index'])->name('home');

Route::get('search', [ProductController::class, 'search'])->name('search');
 
Route::resource('products', ProductController::class, ['parameters' => ['products' => 'product:slug']]);
Route::resource('categories', CategoryController::class, ['parameters' => ['categories' => 'category:name']]);

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('cart', [CartController::class, 'store'])->name('cart.store');
Route::post('cart/update', [CartController::class, 'update'])->name('cart.update');
Route::post('cart/delete', [CartController::class, 'delete'])->name('cart.delete');

Route::resource('orders', OrderController::class)->middleware('verified');

Route::post('wishlist', [ProfileController::class, 'store'])->name('wishlist.store');
Route::post('delete', [ProfileController::class, 'delete'])->name('wishlist.delete');

Route::get('profile', [ProfileController::class, 'index'])->name('profile')->middleware('verified');
Route::post('profile/info', [ProfileController::class, 'info'])->name('profile.info');
Route::post('profile/orders', [ProfileController::class, 'orders'])->name('profile.orders');
Route::post('profile/wishlist', [ProfileController::class. 'wishlist'])->name('profile.wishlist');

// Route::resource('user', UserController::class);

// Route::get('/support', function () {
//     return view('/support/supportpage');
// });