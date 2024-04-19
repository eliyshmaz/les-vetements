<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart; 
class WishlistController extends Controller
{


    public function getwishlistedproduct()
    {
        $item = Cart::instance("Wishlist")->content();
        return view("Wishlist" ,['item'=>$item]);
    }

    public function AddproductroWishlist (request $request)
    {
        Cart::instance("Wishlist")->add($request->id,$request->name,1,$request->price)->associate('app\Models\Product');
        return response()->json(['status'=>200,'message'=> 'your item add to your website +1']);
    }

    public function removeproductfromwishlist(request $request)
    {
        $rowId = $request->rowId;
        Cart::instance('Wishlist')->remove($rowId);
        return redirect()->route('Wishlist.list');
    }

    public function clearwishlist(){
        Cart::instance("Wishlist")->destroy();
        return redirect()->route('Wishlist.list');
    }

}