@extends('admin.layouts.master')

@section('content')

<section class="section">
          <div class="section-header">
            <h1>CHefs</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Create Chef</h4>
                    
                </div>
                <div class="card-body">
                        <form action="{{ route('admin.chef.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf                       
                            
                            <div class="form-group">
                                <label>Image</label>

                                <div id="image-preview" class="image-preview">
                                  <label for="image-upload" id="image-label">Choose File</label>
                                  <input type="file" name="image" id="image-upload" />
                                </div>
                            </div><!-- end form-group -->
                           
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title">
                            </div><!-- end form-group -->

                            <br>
                            <h5>Social Links</h5>
                            <div class="form-group">
                                <label for="">Facebook <code>(Leave empty for hide)</code> </label>
                                <input type="text" class="form-control" name="fb">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label for="">LinkedIn<code>(Leave empty for hide)</code></label>
                                <input type="text" class="form-control" name="in">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label for="">X<code>(Leave empty for hide)</code></label>
                                <input type="text" class="form-control" name="x">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label for="">Web<code>(Leave empty for hide)</code></label>
                                <input type="text" class="form-control" name="web">
                            </div><!-- end form-group -->
                          
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Show At Home</label>
                                <select name="show_at_home" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
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
