<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\AboutController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\ShopController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
require __DIR__.'/auth.php';

// GUEST ROUTES
Route::prefix('/')->name('front.')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/shop', [ShopController::class, 'index'])->name('shop');
});

// USERS, ADMIN, SUPERADMIN ROUTES
Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('/')->name('front.')->group(function () {
        Route::view('/profile','profile.edit')->name('profile');
        Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
        Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
        Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
        Route::post('validate-cart', [CartController::class, 'ValidateCart'])->name('cart.validate');
        Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
        Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
    });
});

// ADMIN DASHBOARD
Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('/admin')->name('admin.')->group(function () {
        Route::view('/','admin.admin_dashboard')->name('dashboard');

        // Routes gestion des catégories des produits
        Route::resource('categories', CategoryController::class);

        // Routes gestion des produits
        Route::resource('products', ProductController::class);

        // Routes gestion des utilisateurs
        Route::resource('users', UserController::class);
        Route::post('/users/search-users', [UserController::class, 'searchUsers'])->name('users.search');

        // Routes commandes
        Route::resource('orders', OrderController::class);

        // Routes gestion profile
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});


