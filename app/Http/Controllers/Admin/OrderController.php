<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\DeclinedOrderDataTable;
use App\DataTables\DeliveredOrderDataTable;
use App\DataTables\OrderDataTable;
use App\DataTables\PendingOrderDataTable;
use App\DataTables\InProcessOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(OrderDataTable $dataTable):View|JsonResponse
    {
        return $dataTable->render('admin.order.index');
    }//end method

    public function pendingOrderIndex(PendingOrderDataTable $dataTable):View|JsonResponse
    {
        return $dataTable->render('admin.order.pending-order-index');
    }//end method
    public function inprocessOrderIndex(InProcessOrderDataTable $dataTable):View|JsonResponse
    {
        return $dataTable->render('admin.order.inprocess-order-index');
    }//end method

    public function deliveredOrderIndex(DeliveredOrderDataTable $dataTable):View|JsonResponse
    {
        return $dataTable->render('admin.order.delivered-order-index');
    }//end method

    public function declinedOrderIndex(DeclinedOrderDataTable $dataTable):View|JsonResponse
    {
        return $dataTable->render('admin.order.declined-order-index');
    }//end method
    public function show($id):View
    {
        $order = Order::findOrFail($id);
        return view('admin.order.show', compact('order'));
    }//end method

    public function getOrderStatus(string $id):Response{
        $order = Order::select(['order_status','payment_status'])->findOrFail($id);
        return response($order);
    }

    public function orderStatusUpdate(Request $request , string $id)
    {
        
       $request->validate([
            'payment_status' => ['required','in:pending,completed'],
            'order_status' => ['required','in:pending,in_process,delivered,declined'],
       ]);


       $order = Order::findOrFail($id);
       $order->payment_status = $request->payment_status;
       $order->order_status = $request->order_status;
       $order->save();

       if($request->ajax()){
        return response(['message' => 'Order Status Updated SUccessfully!']);
       }
       else{
            toastr('Status Updated Succesfullly!','success');
            return redirect()->back();
       }

    }//end method

    public function destroy($id){        
       $order = Order::findOrFail($id);
       $order->delete();
       try{
         return response(['status'=> 'success', 'message'=> 'Deleted Successfully !']);       
        }catch( \Exception $e){
            return response(['status'=> 'error', 'message'=> 'Something Went Wrong!']);
        }
    }//end method
}
