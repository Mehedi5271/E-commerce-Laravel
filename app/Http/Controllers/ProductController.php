<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
   public function product(){
        $products = Product::latest()->get();
        // dd($products);
        return view('Admin.pages.products.index',compact('products'));
    }
    public function creat(){
        return view('Admin.pages.products.creat_product');
    }
    public function store(ProductRequest $request)
    { 

            Product::create([
                'title' => $request->title,
                'price' => $request->price,
                'description' => $request->description,
                'is_active' => $request->is_active??0
            ]);
            
            // Session::flash('status', 'Data submit successfully');
            // return redirect()->route('product.index')->with('status','Data submit successfully');
            
            return redirect()->route('product.index')->withStatus('Data submit successfully');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('Admin.pages.products.edit', compact('product'));
    }

    public function update(ProductRequest $request,$id)
    { 
        $product = Product::findOrFail($id);
        $product->update([
            'title' => $request->title,
                'price' => $request->price,
                'description' => $request->description,
                'is_active' => $request->is_active??0
        ]);
            
            return redirect()->route('product.index')->withStatus('Data Updated successfully');
    }
    
    

    
}