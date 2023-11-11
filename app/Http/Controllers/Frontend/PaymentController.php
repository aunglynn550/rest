<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function index():View{

        if(!session()->has('delivery_charge') || !session()->has('address') ){
            throw ValidationException::withMessages(['Something Went Wrong']);
        }

        $subtotal = cartTotal();
        $delivery = session()->get('delivery_charge')?? 0;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $grandTotal = grandCartTotal($delivery);
        return view('frontend.pages.payment',compact([
            'subtotal',
            'delivery',
            'discount',
            'grandTotal'
        ]));
    }//end method

    public function makePayment(Request $request){
        $request->validate([
            'payment_gateway' => ['required','string','in:paypal'] 
        ]);
    }
}
