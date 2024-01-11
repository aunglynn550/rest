<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogCommentDataTable;
use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BlogCreateRequest;
use App\Http\Requests\Admin\BlogUpdateRequest;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Traits\FileUploadTrait;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Str;

class BlogController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable) : View|JsonResponse
    {
        return $dataTable->render('admin.blog.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogCreateRequest $request) : RedirectResponse
    {
        $imagePath = $this->UpdateImage($request, 'image');
        $blog = new Blog();

        $blog->image = $imagePath;
        $blog->user_id = Auth::id();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->category_id = $request->category;
        $blog->description = $request->description;
        $blog->seo_title = $request->seo_title;
        $blog->seo_description = $request->seo_description;
        $blog->status = $request->status;

        $blog->save();

        toastr('Created Successfully!','success');
        return to_route('admin.blogs.index');
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
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::all();
        return view('admin.blog.edit',compact('blog','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogUpdateRequest $request, string $id): RedirectResponse
    {
        $imagePath = $this->UpdateImage($request, 'image',$request->old_image);

        $blog = Blog::findOrFail($id);

        $blog->image = !empty($imagePath) ? $imagePath : $request->old_image;
        $blog->user_id = Auth::id();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->category_id = $request->category;
        $blog->description = $request->description;
        $blog->seo_title = $request->seo_title;
        $blog->seo_description = $request->seo_description;
        $blog->status = $request->status;

        $blog->save();

        toastr('Updated Successfully!','success');
        return to_route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : Response
    {
        try{
            $blog = Blog::findOrFail($id);
            $this->removeImage($blog->image);
            $blog->delete();            
            return response(['status'=> 'success', 'message'=> 'Deleted Successfully !']);
        }catch( \Exception $e){
            return response(['status'=> 'error', 'message'=> 'Something Went Wrong!']);
        }
    }//end method

    function blogComment(BlogCommentDataTable $dataTable){
        return $dataTable->render('admin.blog.blog-comment.index');
    }//end method

    function commentStatusUpdate(string $id){
        $comment = BlogComment::find($id);

        $comment->status = !$comment->status;
        $comment->save();

        toastr('Status Updated Successfully!');
        return redirect()->back();
    }//end method

    function commentDestroy(string $id) : Response{
        try{
            $comment = BlogComment::findOrFail($id);        
            $comment->delete();            
            return response(['status'=> 'success', 'message'=> 'Deleted Successfully !']);
        }catch( \Exception $e){
            return response(['status'=> 'error', 'message'=> 'Something Went Wrong!']);
        }
    }


}
