<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{
    public function index(){
        $cart = Cart::content();
        return view('front-end.cart', ['data' => $cart]);
        // return Cart::content();
    }
    
    public function addCart($id){
        $cart = Cart::content();
        $product = DB::table('product')->find($id);
        Cart::add(['id'=>$product->id,'name'=>$product->product_name,'price'=>$product->sale_price,'weight'=>0,'qty'=>1, 'options' => [ 'img'=>$product->product_image ]]);
        return back()->with('alert', 'Add to cart successfully !');
    }
    public function remove($rowId){
        Cart::remove($rowId);
        return back();
    }
    public function update(Request $request){
        $qty = $request->newQty;
        $rowId = $request->rowID;
        Cart::update($rowId,$qty);
        // echo "Cart updated successfully";
    }
}
