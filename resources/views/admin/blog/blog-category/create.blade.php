@extends('admin.layouts.master')

@section('content')

<section class="section">
          <div class="section-header">
            <h1>Blog Categories</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Create Blog Category</h4>
                    
                </div>
                <div class="card-body">
                        <form action="{{ route('admin.blog-category.store') }}" method="POST">
                            @csrf                       
                                                    
                           
                          <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name">
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
