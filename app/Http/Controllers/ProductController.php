<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdate;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Image;
use Barryvdh\DomPDF\Facade\Pdf;


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

        $image = Image::make( $request->file('image'))->resize(300, 200);
        $image->brightness(30);
        $image->save(storage_path('app/public/images/'). $imageName);

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
        if($request->hasFile('image')){
            $imageName = time() . '.' . $request->image->extension();

            $image = Image::make( $request->file('image'))->resize(300, 200);
            $image->brightness(30);
            $image->save(storage_path('app/public/images/'). $imageName);

        }
       

        $product = Product::findOrFail($id);
        $product->update([
            'title' => $request->title,
                'price' => $request->price,
                'description' => $request->description,
                'is_active' => $request->is_active??0,
                'image' => $imageName ?? $product->image

        ]);
            
            return redirect()->route('product.index')->withStatus('Data Updated successfully');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return redirect()->route('product.index')->withStatus('Data Deleted successfully');

    }

 

    
    public function trash(){

        $products = Product::latest()->onlyTrashed()->get();    // $products = Product::all();
       
        //  dd($products);
        return view('Admin.pages.products.trash',compact('products'));
       
        
    }

    public function restore($id)
    {
       $product = Product::onlyTrashed()->find($id);
    //    dd($product);

       $product->restore();
        return redirect()->route('product.trash')->withStatus('Data Restore successfully');

    }

    public function destroy($id)
    {
       $product = Product::onlyTrashed()->find($id);
    //    dd($product);

       $product->forceDelete();
        return redirect()->route('product.trash')->withStatus('Data Deleted successfully');

    }

    public function downloadPdf()
    {
        $products = product::latest()->take(10)->get();
        $pdf = Pdf::loadView('Admin.pages.products.pdf', compact('products'));
        return $pdf->download('product-list.pdf');
    }
    

  
    
    

    
}
