<?php

namespace App\Http\Controllers\Frontend;

use App\Events\OrderPaymentUpdateEvent;
use App\Events\OrderPlacedNotificationEvent;
use App\Events\RTOrderPlacedNotificationEvent;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Cart;

use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function index():View{

        if(!session()->has('delivery_charge') || !session()->has('address') ){
            throw ValidationException::withMessages(['Something Went Wrong']);
        }

        foreach(Cart::content()as $item){
            $contents[] = $item;
            //dd($item);
        }
         

        $subtotal = cartTotal();
        $delivery = session()->get('delivery_charge')?? 0;
        $discount = session()->get('coupon')['discount'] ?? 0;
        $grandTotal = grandCartTotal($delivery);


        return view('frontend.pages.payment',compact([
            'contents',
            'subtotal',
            'delivery',
            'discount',
            'grandTotal'
        ]));
    }//end method

    public function paymentSuccess(){
        return view('frontend.pages.payment-success');
    }//end method
    public function paymentCancel(){
        return view('frontend.pages.payment-cancel');
    }//end method

    public function makePayment(Request $request, OrderService $orderService){
        $request->validate([
            'payment_gateway' => ['required','string','in:paypal'] 
        ]);
        $orderService->createOrder();
        // create order //
        if($orderService->createOrder()){
            // redirect user to the payment host /
            switch($request->payment_gateway){
                case 'paypal':
                    return response(['redirect_url'=> route('paypal.payment')]);
                    break;
                default:
                    break;
            }
            
        }
        
      
    }//end method

    // PayPal Payment

    public function setPaypalConfig(){
        $config = [
            'mode'    => config('gatewaySettings.paypal_account_mode'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
            'sandbox' => [
                'client_id'         => config('gatewaySettings.paypal_api_key'),
                'client_secret'     => config('gatewaySettings.paypal_secret_key'),
                'app_id'            => 'APP-80W284485P519543T',
            ],
            'live' => [
                'client_id'         => config('gatewaySettings.paypal_api_key'),
                'client_secret'     => config('gatewaySettings.paypal_secret_key'),
                'app_id'            => config('gatewaySetting.paypal_app_id'),
            ],
        
            'payment_action' => 'Sale', // Can only be 'Sale', 'Authorization' or 'Order'
            'currency'       => config('gatewaySettings.paypal_currency'),
            'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
            'locale'         => 'en_US', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
            'validate_ssl'   => true, // Validate SSL when creating api client.
        ];
        return $config;
    }//end method
    public function payWithPaypal(){
        
        $config =$this->setPaypalConfig();

        $provider = new PayPalClient($config);

        $provider->getAccessToken();

        // calculate payable amount
        $grandTotal = session()->get('grand_total');
        $payableAmount = round($grandTotal * config('gatewaySettings.paypal_rate'));

        $response = $provider->createOrder([
            'intent' => "CAPTURE",
            'application_context' =>[
                'return_url' => route('paypal.success'),
                'cancel_url' => route('paypal.cancel')
            ],
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => config('gatewaySettings.paypal_currency'),
                        'value'=> $payableAmount
                    ]
                ]
            ]
                    ]);
       if(isset($response['id']) && $response['id'] != NULL){
        foreach($response['links'] as $link){
            if($link['rel'] === 'approve'){
                return redirect()->away($link['href']);
            }
        }

       }else{
            return redirect()->route('payment.cancel')->withErrors(['error'=> $response['error']['message']]);
        }
  
       
    }//end method

    public function PaypalSuccess(Request $request , OrderService $orderService){

        $config =$this->setPaypalConfig();

        $provider = new PayPalClient($config);
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request->token);

        if(isset($response['status']) && $response['status'] === 'COMPLETED'){
            $orderId = session()->get('order_id');
            $capture = $response['purchase_units'][0]['payments']['captures'][0];

            $paymentInfo =[
                'transaction_id' => $capture['id'],
                'currency' => $capture['amount']['currency_code'],
                'status' => $capture['status'],
            ];

            OrderPaymentUpdateEvent::dispatch($orderId,$paymentInfo,'PayPal');
            OrderPlacedNotificationEvent::dispatch($orderId);
            RTOrderPlacedNotificationEvent::dispatch(Order::find($orderId));

            // Clear Session Data
            $orderService->clearSession();

           return redirect()->route('payment.success');
        }
        else{
            return redirect()->route('payment.cancel')->withErrors(['error' => $response['error']['message']]);
        }
       

    }//end method

    public function PaypalCancel(){
        return redirect()->route('payment.cancel');
    }//end method
}
