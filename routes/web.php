<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'user'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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
    });
});


