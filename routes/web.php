<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('/remove-to-cart/{item}', [ProductController::class, 'removeToCart'])->name('remove.to.cart');
Route::get('/clear-shopping', [ProductController::class, 'clearCart'])->name('clear.cart');
Route::get('/update-cart/{item}', [ProductController::class, 'updateCart'])->name('update.cart');
Route::post('/products/{product}', [ProductController::class, 'addToCart'])->name('products.store');
Route::get('/cart-items', [ProductController::class, 'cartItems'])->name('carts');

Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::get('/add-to-wishlist/{product}', [WishlistController::class, 'addItem'])->name('wishlist.store');
Route::post('/add-review/{product}', [ProductController::class, 'addReview'])->name('add.review');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
