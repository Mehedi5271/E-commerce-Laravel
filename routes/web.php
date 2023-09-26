<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
   return view('welcome');
    
});

Route::get('/Admin_dashboard',[DashboardController::class,'admin'])->name('dashboard');


Route::get('/products',[ProductController::class, 'product'])->name('product.index');
Route::get('/products/create',[ProductController::class, 'create'])->name('product.create');
Route::post('/products/store',[ProductController::class, 'store'])->name('product.store');
Route::get('/products/trash', [ProductController::class, 'trash'])->name('product.trash');
Route::delete('/products/{id}',[ProductController::class, 'delete'])->name('product.delete');
Route::get('/products/{id}',[ProductController::class, 'show'])->name('product.show');
Route::get('/products/{id}/edit',[ProductController::class, 'edit'])->name('product.edit');
Route::patch('/products/{id}',[ProductController::class, 'update'])->name('product.update');
Route::patch('/product/{id}/restore', [ProductController::class, 'restore'])->name('product.restore');
Route::delete('/product/{id}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');

Route::get('/About_us',[PublicController::class,'about'] )->name('about');
Route::get('/mehedi_profile',[PublicController::class,'hello'] )->name('mehedi');
Route::get('/user_information',[PublicController::class,'info'] )->name('user');





