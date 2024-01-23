<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class WishlistContoller extends Controller
{
    function store(string $productId){

        $productAlreadyExist = Wishlist::where(['user_id' => auth()->user()->id, 'product_id' => $productId])->exists();
        if($productAlreadyExist){
            throw ValidationException::withMessages(['Product is already add to Wishlist']);
        }
        if(!Auth::check()){
            throw ValidationException::withMessages(['Please Login for add to Wishlist']);

        }
        $wishlist = new Wishlist();
        $wishlist->user_id = auth()->user()->id;
        $wishlist->product_id = $productId;
        $wishlist->save();

        return response(['status' => 'success','message'=>'Product added to wishlist']);
    }
}
