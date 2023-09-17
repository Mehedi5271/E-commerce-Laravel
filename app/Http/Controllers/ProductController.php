<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdate;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
   public function product(){
        $products = Product::latest()->get();    // $products = Product::all();
       
        // dd($products);
        return view('Admin.pages.products.index',compact('products'));
    }
    public function create(){
       
        return view('Admin.pages.products.create_product');
    }
    public function store(ProductRequest $request)
    { 
       

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(storage_path('app/public/images'), $imageName);

        dd('done');

            Product::create([
                'title' => $request->title,
                'price' => $request->price,
                'description' => $request->description,
                'is_active' => $request->is_active??0,
                'image' => $imageName,
            ]);
            
            // Session::flash('status', 'Data submit successfully');
            // return redirect()->route('product.index')->with('status','Data submit successfully');
            
            return redirect()->route('product.index')->withStatus('Data submit successfully');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('Admin.pages.products.show', compact('product'));
    }
    

    public function edit($id)
    {
        
        $product = Product::findOrFail($id);
        return view('Admin.pages.products.edit', compact('product'));

        
    }

    public function update(ProductUpdate $request, $id)
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

    public function delete($id)
    {
        Product::destroy($id);
        return redirect()->route('product.index')->withStatus('Data Deleted successfully');

    }
    
    

    
}
