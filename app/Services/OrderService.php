<?php 

namespace App\Services;
use App\Models\Order;
use App\Models\OrderItem;

class OrderService{
    // Store Order in Database//
    function createOrder(){
        try{
            $order = new Order();
            $order->invoice_id = generateInvoiceId();
            $order->user_id = auth()->user()->getAuthIdentifier();
            $order->address = session()->get('address');
            $order->discount = session()->get('coupon')['discount']?? 0;
            $order->delivery_charge = session()->get('delivery_charge');
            $order->subtotal = cartTotal();
            $order->grand_total = grandCartTotal(session()->get('delivery_charge'));
            $order->product_qty = \Cart::content()->count();
            $order->payment_method = NULL ;
            $order->payment_status = 'pending' ;
            $order->payment_approve_date = NULL ;
            $order->transaction_id = NULL ;
            $order->coupon_info = json_encode(session()->get('coupon'));
            $order->currency_name = NULL;
            $order->order_status = 'pending';
            $order->address_id = session()->get('address_id');
    
            $order->save();
    
            foreach(\Cart::content() as $product){
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_name = $product->name;
                $orderItem->product_id = $product->id;
                $orderItem->unit_price = $product->price;
                $orderItem->qty = $product->qty;
                $orderItem->product_size = json_encode($product->options->product_size);
                $orderItem->product_option = json_encode($product->options->product_options);
                $orderItem->save();
            }

            // Putting the Order id in session 
            session()->put('order_id',$order->id);

            // Putting the Grand Total amount in session
            session()->put('grand_total',$order->grand_total);

            return true;

        }catch(\Exception $e){
            logger($e);

            return false;
        }
       


    }//end method

    function clearSession(){
        \Cart::destroy();
        session()->forget('coupon');
        session()->forget('address');
        session()->forget('address_id');
        session()->forget('delivery_charge');
    }//end method
}