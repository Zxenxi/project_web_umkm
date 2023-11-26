<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\dashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {

    Route::get('/home/dashboard', [dashboardController::class, 'index']);

    Route::get('/home/tambahproducts', [ProductController::class, 'create']);
    Route::post('/product', [ProductController::class, 'store']);
    Route::get('/editproduct/{id}', [ProductController::class, 'edit']);
    Route::put('/updateproduct/{id}', [ProductController::class, 'update']);
    Route::get('/deleteproduct/{id}', [ProductController::class, 'destroy']);

    Route::get('/home/tambahcategory', [CategoryController::class, 'category']);
    Route::post('/categories', [CategoryController::class, 'store'])->name('category');
    Route::get('/editcategory/{id}', [CategoryController::class, 'edit']);
    Route::put('/updatecategory/{id}', [CategoryController::class, 'update']);
    Route::get('/deleted/{id}', [CategoryController::class, 'destroy']);

    Route::get('/home/add-customer', [CustomerController::class, 'customer']);
    Route::post('/customer', [CustomerController::class, 'store']);
    Route::get('/editcustomer/{id}', [CustomerController::class, 'edit']);
    Route::put('/updatecustomer/{id}', [CustomerController::class, 'update']);
    Route::get('/delete/{id}', [CustomerController::class, 'destroy']);
});

//------------------------------------------------------------------------------------------------------

    Route::get('main', [UserController::class, 'index'])->name('dashboard')->middleware('guest');
    Route::get('allcategory', [UserController::class, 'mainCategory'])->name('mainCategory');
    Route::get('/categories/{id}', [UserController::class, 'showByCategory'])->name('categoryshow');
    // -------------------------------------------------------------------------
    Route::get('/search', [UserController::class, 'search'])->name('search');
    Route::get('/details/{id}', [UserController::class, 'details'])->name('details');
    