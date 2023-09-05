<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
   return view('welcome');
    
});

Route::get('/About_us',[PublicController::class,'about'] )->name('about');
Route::get('/mehedi_profile',[PublicController::class,'hello'] )->name('mehedi');
Route::get('/user_information',[PublicController::class,'info'] )->name('user');


