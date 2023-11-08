<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Validation\ValidationException;

class CartController extends Controller
{

    function index(){
        return view('frontend/pages/cart-view');
    }//end method

    // Add product to cart
  public function addToCart(Request $request){
    
      $product = Product::with(['productSizes','productOptions'])->findOrFail($request->product_id);
      // Validation Exception For Add To Cart Button
      // if requested quantity is less than product quantity this Validation Exception Will be thrown
      if($product->quantity < $request->quantity){
         throw ValidationException::withMessages(['Sorry ! :) Quantity is not available!']);
      }
    try{  
       $productSize = $product->productSizes->where('id',$request->product_size)->first();    
       $productOptions = $product->productOptions->whereIn('id',$request->product_option);  
       // use whereIn to fetch multiple rows(in this case "id") from the database
    
        $options = [
            'product_size' => [],
            'product_options' => [],
            'product_info' =>[
                'image' => $product->thumb_image,
                'slug' => $product->slug
            ] 
            ];
        
        if($productSize !== null){
            $options['product_size']=[
                'id' => $productSize?->id,
                'name' => $productSize?->name,
                'price' => $productSize?->price,
            ];
        }

        foreach($productOptions as $option){
            $options['product_options'][] = [
                'id' => $option->id,
                'name' => $option->name,
                'price' => $option->price
            ];
            }
           Cart::add(
            [
                'id'=> $product->id,
                'name'=> $product->name,
                'qty' => $request->quantity,
                'price' => $product->offer_price > 0 ? $product->offer_price : $product->price,
                'weight' => 0,
                'options' => $options
            ]);

            return response(['status' => 'success','message'=> 'Product added into cart !'],200);
        }catch(\Exception $e){   
            logger($e);    //   storage/logs/laravel.log     
            return response(['status' => 'error','message'=> 'Something WenT Wrong !'],500);
        }
        }//end method

        function getCartProduct(){           
            return view('frontend.layout.ajax-files.sidebar-cart-item')->render();
        }//end method

        function cartProductRemove($rowId){
            try{
                Cart::remove($rowId);

                return response(['status' => 'success',
                                'message'=> 'Item has been removed',
                                'cart_total'=> cartTotal(),
                                'grand_cart_total' => grandCartTotal()
                                ],200);
            }catch(\Exception $e){               
                return response(['status' => 'error','message'=> 'Something WenT Wrong!'],500); 

            }
        }//end method

        function cartQtyUpdate(Request $request){

            $cartItem = Cart::get($request->rowId);
            $product = Product::findOrFail($cartItem->id);

            if($product->quantity < $request->qty){
               return response(['status' => 'error','message'=> 'Sorry :) Quantity is Not Available !','qty'=>$cartItem->qty]);
            }
            // Cart is only updated if requested quantity is less than product quantity
            // Unless the above error message & current quantity of the Cart  
            try{
                $cart = Cart::update($request->rowId, $request->qty);
               
                return response([
                        'status'=>'success',
                        'product_total'=> productTotal($request->rowId),
                        'qty'=> $cart->qty,
                        'cart_total' => cartTotal(),
                        'grand_cart_total' => grandCartTotal(),
                        'discount' => session()->get('coupon')['discount']
                    ],200);
            }catch(\Exception $e){
                logger($e);
                return response(['status'=> 'error', 'message'=> 'Something Went Wrong. Please reload the page !'],500);
            }
       
        }//end method

        function cartDestroy(){
            Cart::destroy();
            session()->forget('coupon');
            return redirect()->back();
        }//end method
       
    }
