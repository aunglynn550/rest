@extends('admin.layouts.master')

@section('content')

<section class="section">
          <div class="section-header">
            <h1>Blog</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Create Blog</h4>
                    
                </div>
                <div class="card-body">
                        <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                       
                            <div class="form-group">
                                <label>Image</label>

                                <div id="image-preview" class="image-preview">
                                  <label for="image-upload" id="image-label">Choose File</label>
                                  <input type="file" name="image" id="image-upload" />
                                </div>
                          </div><!-- end form-group -->
                            
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                            </div><!-- end form-group -->  
                            
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach($categories as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                   @endforeach
                                </select>
                            </div><!-- end form-group -->

                        
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" id="">{{ old('description') }}</textarea>
                            </div><!-- end form-group --> 
                      
                            <div class="form-group">
                                <label>Seo Title</label>
                                <input type="text" name="seo_title" class="form-control"  value="{{ old('seo_title') }}">
                            </div><!-- end form-group --> 

                            <div class="form-group">
                                <label>Seo Description</label>
                                <textarea name="seo_description" class="form-control" id=""></textarea>
                            </div><!-- end form-group -->                         

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div><!-- end form-group -->                           

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                  </div>
                  <!-- end card-body -->
            </div>
            <!-- end card-primary -->
        </section>

@endsection