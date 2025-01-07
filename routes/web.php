<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Admin\UserController;


Route::get('/detail_product', function () {
    return view('detail_product');
});

Route::get('/project', function () {
    return view('project');
});

Route::get('/about', function () {
    return view('about');
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

// Route::get('/', function () {
//     return view('index');
// })->name('home');

Route::get('/', [ProjectController::class, 'getRecentProjects'])->name('home');


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

    Route::post('/cart/{type}/{itemId}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'showCart'])->name('cart.index');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout.show');
    Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
    Route::get('/checkout/success/{id}', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/checkout/failed/{id}', [CheckoutController::class, 'failed'])->name('checkout.failed');

    Route::get('/order',[OrderController::class, 'showOrder'] )->name('showOrder');
    Route::resource('admin/order', OrderController::class);

    Route::get('/faktur', function () {
        return view('faktur');
    });

    // User Routes
    Route::resource('admin/user', UserController::class);

    Route::get('/profile', [UserController::class, 'showProfile'])->name('profile.show');
    Route::put('/user/{user}', [UserController::class, 'updateProfile'])->name('user.update');
});
