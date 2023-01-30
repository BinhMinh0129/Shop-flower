<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\CheckoutController;

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

Route::get('/admin/login', [LoginController::class, 'loginAdmin'])->name('login');
Route::post('/admin/login', [LoginController::class, 'postLogin'])->name('post-login');
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin');

    Route::prefix('category')->name('category.')->group(function() {
        Route::get('/', [CategoryController::class, 'index'])->name('category');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/create', [CategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [CategoryController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('product')->name('product.')->group(function() {
        Route::get('/', [ProductController::class, 'index'])->name('product');
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        Route::post('/create', [ProductController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('/edit/{id}', [ProductController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [ProductController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('invoice')->name('invoice.')->group(function() {
        Route::get('/', [InvoiceController::class, 'index'])->name('invoice');
        Route::get('/show/{id}', [InvoiceController::class, 'show'])->name('show');
        Route::post('/show/{id}', [InvoiceController::class, 'update'])->name('update');
        Route::get('/destroy/{id}', [InvoiceController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('/')->name('home.')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/category', [HomeController::class, 'category'])->name('category');
    Route::get('/category/{slug}', [HomeController::class, 'categorySlug'])->name('category-slug');
    Route::get('/category/{slugCT}/{slugPD}', [HomeController::class, 'product'])->name('product');
    Route::prefix('/cart')->name('cart.')->group(function() {
        Route::get('/', [CartController::class, 'cart'])->name('cart');
        Route::get('/create/{id}', [CartController::class, 'create'])->name('create');
        Route::get('/destroy/{id}', [CartController::class, 'destroy'])->name('destroy');
        Route::get('/reduced/{id}', [CartController::class, 'reduced'])->name('reduced');
    });
    Route::prefix('/checkout')->name('checkout.')->group(function() {
        Route::get('/', [CheckoutController::class, 'index'])->name('checkout');
        Route::post('/', [CheckoutController::class, 'placeOder'])->name('checkout-post');
    });
});
