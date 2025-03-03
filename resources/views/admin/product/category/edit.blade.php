@extends('admin.layouts.master')

@section('content')

<section class="section">
          <div class="section-header">
            <h1>Category</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Create Category</h4>
                    
                </div>
                <div class="card-body">
                        <form action="{{ route('admin.category.update',$category->id) }}" method="POST" >
                            @csrf
                            @method('PUT')
                            
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                            </div><!-- end form-group -->                         

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option @selected($category->status === 1) value="1">Active</option>
                                    <option @selected($category->status === 0) value="0">Inactive</option>
                                </select>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Show At Home</label>
                                <select name="show_at_home" class="form-control">
                                    <option @selected($category->show_at_home === 1) value="1">Yes</option>
                                    <option @selected($category->show_at_home === 0) value="0">No</option>
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