<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProductGalleryController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(string $product_id):View
    {
        $images = ProductGallery::where('product_id',$product_id)->get();
        $product = Product::findOrFail($product_id);
        return view('admin.product.gallery.index',compact('product','images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
       $request->validate([
        'image' => ['required','image','max:3000'],
        'product_id' => ['required']
       ]);
       $imagePath = $this->updateImage($request,'image');

       $gallery = new ProductGallery();
       $gallery->product_id = $request->product_id;
       $gallery->image = $imagePath;

       $gallery->save();
     
       toastr('Created Successfully !','success');

       return redirect()->back();
 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id):Response
    {
        try{
            $image = ProductGallery::findOrFail($id);
            $this->removeImage($image->image);
            $image->delete();            
            return response(['status'=> 'success', 'message'=> 'Deleted Successfully !']);
        }catch( \Exception $e){
            return response(['status'=> 'error', 'message'=> 'Something Went Wrong!']);
        }
    }
}
