<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/addToCart/{id}', [App\Http\Controllers\IndexController::class, 'addtocart'])->name('addtocart');
Route::get('/removeFromCart/{id}', [App\Http\Controllers\IndexController::class, 'removefromcart'])->name('removefromcart');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cart', [App\Http\Controllers\IndexController::class, 'showcart'])->name('showcart');
Route::get('/orders', [App\Http\Controllers\IndexController::class, 'showorders'])->name('showorders');
Route::get('/placeorder/{tot_price}', [App\Http\Controllers\IndexController::class, 'placeorder'])->name('placeorder');
Route::get('/showorderdetails/{order_id}', [App\Http\Controllers\IndexController::class, 'showorderdetails'])->name('showorderdetails');
Route::get('/cancelitem/{prod_id}', [App\Http\Controllers\IndexController::class, 'cancelitem'])->name('cancelitem');
