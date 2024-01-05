@extends('admin.layouts.master')

@section('content')

<section class="section">
          <div class="section-header">
            <h1>Testimonial</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Create Testimonial</h4>
                    
                </div>
                <div class="card-body">
                        <form action="{{ route('admin.testimonial.store') }}" method="POST" enctype="multipart/form-data">
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

                            <div class="form-group">
                                <label>Rating</label>
                                <select name="rating" class="form-control">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="2">3</option>
                                    <option value="2">4</option>
                                    <option value="2">5</option>
                                </select>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label for="">Review</label>
                                <textarea name="review" class="form-control"></textarea>
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
