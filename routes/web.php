<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

Route::get('/products', function () {
    return view('product');
});

Route::get('/detail_product', function () {
    return view('detail_product');
});

Route::get('/project', function () {
    return view('project');
});

// Auth Route
Route::get('/register', function () {
    return view('auth.register');
})->name('viewRegister');

Route::get('/login', function () {
    return view('auth.login');
})->name('viewLogin');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/products', [ProductController::class, 'list'])->name('product');
Route::get('/products/{product}', [ProductController::class, 'detail'])->name('detail_product');

Route::get('/projects', [ProjectController::class, 'list'])->name('project');
Route::get('/projects/{project}', [ProjectController::class, 'detail'])->name('detail_project');


// sudah login doang
Route::middleware(['auth'])-> group(function () {
    Route::resource('product', ProductController::class);

    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
    
    Route::resource('admin/project', ProjectController::class);

    Route::resource('admin/product', ProductController::class);

    Route::post('/cart/{productId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.index');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart', [CheckoutController::class, 'showCart'])->name('cart.show');

    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.show');
    Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
    Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

});