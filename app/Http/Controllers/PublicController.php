<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function welcome(){
        $products = Product::latest()->paginate(12);
        $categories = Category::pluck('title','slug')->toArray();
        return view('welcome', compact('products','categories'));
    }
    public function categoryWiseProducts($slug){
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = $category->products; 
        // dd($products);
        $categories = Category::pluck('title','slug')->toArray();
        return view('category_wise_product', compact('products','categories'));
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

