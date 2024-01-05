<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AppDownloadCreateRequest;
use App\Models\AppDownload;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AppDownloadController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appDownload = AppDownload::first();
        return view('admin.app-download.index',compact('appDownload'));
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
    public function store(AppDownloadCreateRequest $request): RedirectResponse
    {
        $imagePath = $this->UpdateImage($request,'image',$request->old_image);
        $backgroundPath = $this->UpdateImage($request,'background',$request->background);

        AppDownload::updateOrCreate(
            ['id' => 1],
            [
                'image' => !empty($imagePath) ? $imagePath : $request->old_image,
                'background' => !empty($backgroundPath) ? $backgroundPath : $request->old_background,
                'title' => $request->title,
                'short_description' => $request->short_description,
                'play_store_link' => $request->play_store_link,
                'apple_store_link' => $request->apple_store_link,
            ]
        );

        toastr('Updated Successfully!','success');
        return to_route('admin.app-download.index');
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
    public function destroy(string $id)
    {
        //
    }
}
