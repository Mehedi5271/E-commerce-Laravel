<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function product(){
        $products = Product::all();
        // dd($products);
        return view('Admin.pages.products.index',compact('products'));
    }
    public function creat(){
        return view('Admin.pages.products.creat_product');
    }
    public function store(){
        dd('kisu akta');
    }

    
}
