<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;


class Cartcontroller extends Controller
{
    public function index(){
     $CartItems = Cart::instance('Cart')->content();
     return view('Cart',['CartItems'=>$CartItems]);
    }
    public function addToCart( request $request){
        $Product = Product::find($request->id);
        $price=$Product->Sale_price ? $Product->Sale_price : $Product->regular_price;
        Cart::instance('Cart')->add($Product->id,$Product->name,$request->quantity,$price)->associate('App\Models\Product');
        return redirect()->back()->with('massege',"seucsse! item add to your cart ");
    }

    public function updateCart(request $request)
    {
    Cart::instance('Cart')->update($request->rowId,$request->quantity);
    return redirect()->route('cart.index');
    }

    public function removeItem(request $request)
    {
       $rowId=$request->rowId; 
        Cart::instance('Cart')->remove($rowId);
        return redirect()->route('cart.index');

    }
    public function clearItem()
    {

      Cart::instance('Cart')->destroy();
      return redirect()->route('cart.index');
    }


}