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
                        <form action="{{ route('admin.chef.update', $chef->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf                       
                            @method('PUT')
                            <div class="form-group">
                                <label>Image</label>

                                <div id="image-preview" class="image-preview">
                                  <label for="image-upload" id="image-label">Choose File</label>
                                  <input type="file" name="image" id="image-upload" />
                                  <input type="hidden" name="old_image" value="{{ $chef->image }}" />
                                </div>
                            </div><!-- end form-group -->
                           
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $chef->name }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ $chef->title }}">
                            </div><!-- end form-group -->

                            <br>
                            <h5>Social Links</h5>
                            <div class="form-group">
                                <label for="">Facebook <code>(Leave empty for hide)</code> </label>
                                <input type="text" class="form-control" name="fb" value="{{ $chef->fb }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label for="">LinkedIn<code>(Leave empty for hide)</code></label>
                                <input type="text" class="form-control" name="in"  value="{{ $chef->in }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label for="">X<code>(Leave empty for hide)</code></label>
                                <input type="text" class="form-control" name="x"  value="{{ $chef->x }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label for="">Web<code>(Leave empty for hide)</code></label>
                                <input type="text" class="form-control" name="web"  value="{{ $chef->name }}">
                            </div><!-- end form-group -->
                          
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option @selected($chef->status == 1) value="1">Active</option>
                                    <option @selected($chef->status == 0) value="0">Inactive</option>
                                </select>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Show At Home</label>
                                <select name="show_at_home" class="form-control">
                                    <option @selected($chef->show_at_home == 1) value="1">Yes</option>
                                    <option @selected($chef->show_at_home == 0) value="0">No</option>
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
@push('scripts')
  <script>
    $(document).ready(function(){
      $('.image-preview').css({
        'background-image': 'url({{ asset($chef->image) }})',
        'background-size':'cover',
        'background-position':'center',
        'object-fit':'cover'
      })
    })
  </script>
@endpush