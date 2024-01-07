@extends('admin.layouts.master')

@section('content')

<section class="section">
          <div class="section-header">
            <h1>Blog</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Update Blog</h4>
                    
                </div>
                <div class="card-body">
                        <form action="{{ route('admin.blogs.update',$blog->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label>Image</label>

                                <div id="image-preview" class="image-preview">
                                  <label for="image-upload" id="image-label">Choose File</label>
                                  <input type="file" name="image" id="image-upload" />
                                  <input type="hidden" name="old_image" value="{{ $blog->image }}" />
                                </div>
                          </div><!-- end form-group -->
                            
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $blog->title }}">
                            </div><!-- end form-group -->  
                            
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach($categories as $category)
                                    <option @selected($category->id === $blog->category_id) value="{{$category->id}}">{{$category->name}}</option>
                                   @endforeach
                                </select>
                            </div><!-- end form-group -->

                        
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" id="">{{ $blog->description }}</textarea>
                            </div><!-- end form-group --> 
                      
                            <div class="form-group">
                                <label>Seo Title</label>
                                <input type="text" name="seo_title" class="form-control"  value="{{ $blog->seo_title }}">
                            </div><!-- end form-group --> 

                            <div class="form-group">
                                <label>Seo Description</label>
                                <textarea name="seo_description" class="form-control" id="">{{ $blog->seo_description }}</textarea>
                            </div><!-- end form-group -->                         

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option @selected($blog->status === 1) value="1">Active</option>
                                    <option @selected($blog->status === 0) value="0">Inactive</option>
                                </select>
                            </div><!-- end form-group -->                           

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                  </div>
                  <!-- end card-body -->
            </div>
            <!-- end card-primary -->
        </section>

@endsection
@push('scripts')
  <script>
    $(document).ready(function(){
      $('.image-preview').css({
        'background-image': 'url({{ asset($blog->image) }})',
        'background-size':'cover',
        'background-position':'center',
        'object-fit':'cover'
      })
    })
  </script>
@endpush