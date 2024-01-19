@extends('admin.layouts.master')

@section('content')

<section class="section">
          <div class="section-header">
            <h1>Custom Page Builder</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Create Page</h4>
                    
                </div>
                <div class="card-body">
                        <form action="{{ route('admin.custom-page-builder.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf                        
                            
                            <div class="form-group">
                                <label>Page Name</label>
                                <input type="text" name="name" class="form-control">
                            </div><!-- end form-group -->

                       

                            <div class="form-group">
                                <label>Page Content</label>
                                <textarea type="text" name="content" class="form-control summernote"></textarea>
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