<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AddressCreateRequest;
use App\Http\Requests\Frontend\AddressUpdateRequest;
use App\Models\Address;
use App\Models\DeliveryArea;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $deliveryAreas = DeliveryArea::where('status',1)->get();
        $userAddress = Address::where('user_id',auth()->user()->id)->get();
        $orders = Order::where('user_id',auth()->user()->id)->get();
        return view('frontend.dashboard.index',compact('deliveryAreas','userAddress','orders'));
    }//end method

    public function createAddress(AddressCreateRequest $request){
       $address = new Address();

       $address->user_id = auth()->user()->id;
       $address->delivery_area_id = $request->area;
       $address->first_name = $request->first_name;
       $address->last_name = $request->last_name;
       $address->email = $request->email;
       $address->phone = $request->phone;
       $address->address = $request->address;
       $address->type = $request->type;

       $address->save();

       toastr('Address Created Successfully !', 'success');

       return redirect()->back();
    }//end method

    public function updateAddress($id,AddressUpdateRequest $request){
        $address = Address::findOrFail($id);

        $address->user_id = auth()->user()->id;
        $address->delivery_area_id = $request->area;
        $address->first_name = $request->first_name;
        $address->last_name = $request->last_name;
        $address->email = $request->email;
        $address->phone = $request->phone;
        $address->address = $request->address;
        $address->type = $request->type;
 
        $address->save();
 
        toastr('Address Updated Successfully !', 'success');
 
        return to_route('admin.dashboard');
    }//end method

    public function destroyAddress($id){
     
        $address = Address::findOrFail($id);

       if($address && $address->user_id === auth()->user()->id){
            $address->delete();
            toastr('Address Deleted Successfully !', 'success');
        
            return response(['status' => 'success','message' => 'Address Deleted Successfully!']);
       } 
       return response(['status' => 'error','message' => 'Something Went Wrong!']);
    }
}
