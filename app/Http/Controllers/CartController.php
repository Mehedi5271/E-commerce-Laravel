<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use Illuminate\Http\Request;

class CartController extends Controller
{


    public function index(){

       
        return view("cart-products");
    }

    public function store(Request $request){
        $qyt = $request->quantity;
        $productId = $request->product_id;
        $colorId =  $request->color_id;
        $cartProduct = auth()->user()->cartProducts()
                                        ->where('product_id',$productId)
                                        ->where('color_id',$colorId)
                                        ->first();
        if($cartProduct){
            $qyt += $cartProduct->quantity;
            $cartProduct->update(['quantity' => $qyt]);
        } else{
        auth()->user()->cartProducts()->create([  
            'product_id'=> $productId,
        'quantity'=> $qyt,
        'color_id'=>$colorId,
         ]);
           }
     return back()->with('success','');
      
          
    }
}
