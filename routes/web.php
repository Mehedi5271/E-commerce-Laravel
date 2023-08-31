<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
   return view('welcome');
    
});

Route::get('/About_us',[PublicController::class,'about'] )->name('about');
Route::get('/mehedi',[PublicController::class,'hello'] );


