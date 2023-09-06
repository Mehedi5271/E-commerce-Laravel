<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    function product(){
        return view('Admin.pages.products.index');
    }
    function creat(){
        return view('Admin.pages.products.creat_product');
    }
}
