<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\UserController;



Route::get('/',[PublicController::class, 'welcome'])->name('welcome');
// Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');
    
    Route::get('/About_us',[PublicController::class,'about'] )->name('about');
    Route::get('/mehedi_profile',[PublicController::class,'hello'] )->name('mehedi');
    Route::get('/user_information',[PublicController::class,'info'] )->name('user');

    require __DIR__.'/auth.php';

    Route::get('/dashboard',[DashboardController::class,'admin'])->name('dashboard')->middleware('auth');
    
    Route::get('/{slug}',[PublicController::class, 'categoryWiseProducts'])->name('category.products');
    Route::get('/product/{slug}',[PublicController::class, 'productDetails'])->name('product.details');


Route::middleware('auth')->prefix('admin')->group(function(){
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users',[UserController::class, 'index'])->name('users.index');

    Route::get('/products',[ProductController::class, 'product'])->name('product.index');
    Route::get('/products/create',[ProductController::class, 'create'])->name('product.create');
    Route::post('/products/store',[ProductController::class, 'store'])->name('product.store');
    Route::delete('/products/{id}',[ProductController::class, 'delete'])->name('product.delete');
    Route::get('/products/{id}',[ProductController::class, 'show'])->name('product.show');
    Route::get('/products/{id}/edit',[ProductController::class, 'edit'])->name('product.edit');
    Route::patch('/products/{id}',[ProductController::class, 'update'])->name('product.update');

    Route::get('/product/trash', [ProductController::class, 'trash'])->name('product.trash');
    Route::patch('/product/{id}/restore', [ProductController::class, 'restore'])->name('product.restore');
    Route::delete('/product/{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/product/downloadPdf', [ProductController::class, 'downloadPdf'])->name('product.pdf');
    Route::post('/add-to-cart', [CartController::class, 'store'])->name('cart.store');
    Route::get('/cart-products', [CartController::class, 'index'])->name('cart.products');
    
    
    
    
    
    
    
});


Route::delete('cart-products/{id}', [CartController::class, 'deleteIteam'])->middleware('auth');
Route::post('orders', [OrderController::class, 'store'])->name('order-store')->middleware('auth');
Route::post('orders-success', [OrderController::class, 'confirmed'])->name('orders.confirmed')->middleware('auth');


