<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Cartcontroller;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

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

Route::get('/',[AppController::class,'index'])->name('app.index');
Route::get('/shop',[ShopController::class,'index'])->name('shop.index');
Route::get("product/{slug}",[ShopController::class,"productDetails"])->name('shop.product.details');
Route::get("cart-Wishlist-count",[ShopController::class,"getcartandwishlistcount"])->name('shop.cart.wishlist.count');

Route::get('/cart',[Cartcontroller::class ,'index'])->name('cart.index');
Route::post('/cart/sotre',[Cartcontroller::class ,'addToCart'])->name('cart.store');
Route::put('/cart/update',[Cartcontroller::class ,'updatecart'])->name('cart.update');
Route::delete('/cart/remove',[Cartcontroller::class ,'removeItem'])->name('cart.remove');
Route::delete('/cart/clear',[Cartcontroller::class ,'clearItem'])->name('cart.clear');

Route::get('/Wishlist',[WishlistController::class,'getwishlistedproduct'])->name('Wishlist.list');
route::post('/Wishlist/add',[WishlistController::class,'AddproductroWishlist'])->name('Wishlist.store');
Route::delete('/Wishlist/clear',[WishlistController::class,"clearwishlist"])->name('Wishlist.clear');
route::delete('/Wishlist/remove',[WishlistController::class,'removeproductfromwishlist'])->name('Wishlist.remove');



Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function(){
    Route::get('/my_acconte',[UserController::class,"index"])->name('user.index');
});

Route::middleware(['auth','auth.admin'])->group(function(){
    Route::get('/admin',[AdminController::class,"index"])->name('admin.index');
});


