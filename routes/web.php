<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
   return view('welcome');
    
});

Route::get('/Admin_dashboard',[DashboardController::class,'admin'])->name('dashboard');

Route::get('/product_page',[ProductController::class,'product'])->name('product.index');
Route::get('/product_page/creat',[ProductController::class,'creat'])->name('product.creat');

Route::get('/About_us',[PublicController::class,'about'] )->name('about');
Route::get('/mehedi_profile',[PublicController::class,'hello'] )->name('mehedi');
Route::get('/user_information',[PublicController::class,'info'] )->name('user');


