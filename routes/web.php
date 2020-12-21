<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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
Route::get('/store', [HomeController::class, 'store']);
Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/products', [ProductController::class, 'index'])->name('cart.index');
    Route::get('/addToCart/{product}', [ProductController::class, 'addToCart'])->name('cart.add');
    Route::get('/shopping-cart', [ProductController::class, 'showCart'])->name('cart.show');
    Route::get('/checkout/{amount}', [ProductController::class, 'checkout'])->name('cart.checkout');
    Route::post('/charge', [ProductController::class, 'charge'])->name('cart.charge');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('product.remove');
    Route::get('/editProduct/{product}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/updateProduct/{product}', [ProductController::class, 'update'])->name('product.update');
});
