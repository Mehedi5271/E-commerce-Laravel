<?php

namespace App\Http\Controllers;

use App\Models\CartProduct;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function store(Request $request){

       try { DB::beginTransaction();

        $order = auth()->user()->orders()->create([  
             'contact_number' => $request->contact_number,
             'shipping_address' => $request->shipping_address,
          ]);
 
         foreach($request-> products as $iteam){
          $cartProduct =   auth()->user()->cartProducts()
                                         ->where('id',$iteam['cart_product_id'])->first();
                                         $product = $cartProduct->product;
                                         $color = $cartProduct->color;
                                         dd($cartProduct);
             OrderProduct::create([
                 'order_id' =>$order->id,
                 'product_id' => $product->id,
                 'product_title' => $product->title,
                 'color_id' => $color->id,
                 'color_name' => $color?->name,
                 'unit_price'=>$product->price,
                 'quantity' =>$iteam['qty'],
 
             ]);
 
         }
         $cartProduct =   auth()->user()->cartProducts()->delete();
         DB::commit();
 
         return redirect()->route('orders.confirmed');} 
         
         catch(\Exception $e){
            DB:DB::rollBack();
            dd($e->getMessage());
         }
    }

    public function confirmed(){
        view('order-confirmed');
    }
}
