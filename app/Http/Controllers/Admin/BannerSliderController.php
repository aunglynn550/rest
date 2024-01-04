<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BannerSliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerSliderCreateRequest;
use App\Http\Requests\Admin\UpdateBannerSliderRequest;
use App\Models\BannerSlider;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class BannerSliderController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(BannerSliderDataTable $datatable)
    {
        return $datatable->render('admin.banner-slider.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner-slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerSliderCreateRequest $request)
    {
        $imagePath = $this->UpdateImage($request,'image');

        $bannerSlider = new BannerSlider();
        $bannerSlider->banner = $imagePath;
        $bannerSlider->title = $request->title;
        $bannerSlider->sub_title = $request->sub_title;
        $bannerSlider->url = $request->url;
        $bannerSlider->status = $request->status;

        $bannerSlider->save();

        toastr('success','Created SUccessfully');
        return to_route('admin.banner-slider.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bannerSlider = BannerSlider::findOrFail($id);
        return view('admin.banner-slider.edit',compact('bannerSlider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerSliderRequest $request, string $id)
    {
        $imagePath = $this->UpdateImage($request,'image',$request->old_image);

        $bannerSlider = BannerSlider::findOrFail($id);
        $bannerSlider->banner = !empty($imagePath) ? $imagePath : $request->old_image;
        $bannerSlider->title = $request->title;
        $bannerSlider->sub_title = $request->sub_title;
        $bannerSlider->url = $request->url;
        $bannerSlider->status = $request->status;

        $bannerSlider->save();

        toastr('success','Updated SUccessfully');
        return to_route('admin.banner-slider.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $slider = BannerSlider::findOrFail($id);
            $this->removeImage($slider->banner);
            $slider->delete();            
            return response(['status'=> 'success', 'message'=> 'Deleted Successfully !']);
        }catch( \Exception $e){
            return response(['status'=> 'error', 'message'=> 'Something Went Wrong!']);
        }
    }
}
