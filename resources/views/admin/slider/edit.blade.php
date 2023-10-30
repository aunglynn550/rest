@extends('admin.layouts.master')

@section('content')

<section class="section">
          <div class="section-header">
            <h1>Slider</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Update Slider</h4>
                    
                </div>
                <div class="card-body">
                        <form action="{{ route('admin.slider.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        <div class="form-group">
                                <label>Image</label>

                                <div id="image-preview" class="image-preview">
                                  <label for="image-upload" id="image-label">Choose File</label>
                                  <input type="file" name="avatar" id="image-upload" />
                                </div>
                          </div><!-- end form-group -->
                            
                            <div class="form-group">
                                <label>Offer</label>
                                <input type="text" name="offer" class="form-control" value="{{ $slider->offer }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $slider->title }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Sub Title</label>
                                <input type="text" name="sub_title" class="form-control" value="{{ $slider->sub_title }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea type="text" name="short_description" class="form-control"></textarea>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Button Link</label>
                                <input type="text" name="button_link" class="form-control" value="{{ $slider->button_link }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option @selected($slider->status === 1) value="1">Yes</option>
                                    <option @selected($slider->status === 0) value="0">No</option>
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
        'background-image': 'url({{ asset($slider->image) }})',
        'background-size':'cover',
        'background-position':'center',
        'object-fit':'cover'
      })
    })
  </script>
@endpush