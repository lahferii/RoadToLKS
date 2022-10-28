<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\TransactionController;

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
Auth::routes([
    'register' => false
]);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [dashboardController::class, 'index'])->name('dashboard');
Route::get('/products/{id}/gallery/', [ProductController::class, 'gallery'])->name('products.gallery');
// Routing Transaction
Route::get('/transaction/{id}/status', [TransactionController::class, 'status'])->name('transactions.status');
Route::resource('transactions', TransactionController::class);
// Routing Product
Route::resource('products', ProductController::class);
// Routing Gallery
Route::resource('galleries', GalleryController::class);
