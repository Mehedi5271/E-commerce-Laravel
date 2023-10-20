<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store(Request $request){
        // dd($request->all());
        CartProduct::create([
            'user_id'=> auth()->user()->id,
            'product_id'=> $request->product_id,
            'quantity'=> $request->quantity,
            'color_id'=> $request->color_id,
        ]);
        dd('created');
    }
}
