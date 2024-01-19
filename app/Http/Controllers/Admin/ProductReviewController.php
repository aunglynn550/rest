<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductRatingDataTable;
use App\Http\Controllers\Controller;
use App\Models\ProductRating;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ProductRatingDataTable $dataTable) : View | JsonResponse
    {
        return $dataTable->render('admin.product.product-review.index');
    }

   
    public function statusUpdate(Request $request)
    {
        $review = ProductRating::findOrFail($request->id);
        $review->status = $request->status;
        $review->save();
 
        return response(['status' => 'success', 'message' => 'Updated Successfully']);
 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $review = ProductRating::findOrFail($id);        
            $review->delete();            
            return response(['status'=> 'success', 'message'=> 'Deleted Successfully !']);
        }catch( \Exception $e){
            return response(['status'=> 'error', 'message'=> 'Something Went Wrong!']);
        }
    }
}
