<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function welcome(){
        $products = Product::latest()->paginate(12);
        return view('welcome', compact('products'));
    }
    function about(){
        return view('about');
    }

    function hello(){
        return view('mehedi');
    }

    function info(){
       $alluser =  User::all();

        return view('user',['users'=> $alluser]);
    }

    
}
