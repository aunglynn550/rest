@extends('admin.layouts.master')

@section('content')

<section class="section">
          <div class="section-header">
            <h1>Daily Offer</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Update Banner Slider</h4>
                    
                </div>
                <div class="card-body">
                        <form action="{{ route('admin.banner-slider.update',$bannerSlider->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf                       
                            @method('PUT')
                            <div class="form-group">
                                <label>Image</label>

                                <div id="image-preview" class="image-preview">
                                  <label for="image-upload" id="image-label">Choose File</label>
                                  <input type="file" name="image" id="image-upload" />
                                  <input type="hidden" name="old_image" value="{{ $bannerSlider->banner }}" />
                                </div>
                          </div><!-- end form-group -->
                           
                          <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $bannerSlider->title }}">
                          </div><!-- end form-group -->

                          <div class="form-group">
                            <label for="">Sub Title</label>
                            <input type="text" class="form-control" name="sub_title" value="{{ $bannerSlider->sub_title }}">
                          </div><!-- end form-group -->

                          <div class="form-group">
                            <label for="">Url</label>
                            <input type="text" class="form-control" name="url" value="{{ $bannerSlider->url }}">
                          </div><!-- end form-group -->
                          
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option @selected($bannerSlider->status == 1) value="1">Active</option>
                                    <option @selected($bannerSlider->status == 0) value="0">Inactive</option>
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
        'background-image': 'url({{ asset($bannerSlider->banner) }})',
        'background-size':'cover',
        'background-position':'center',
        'object-fit':'cover'
      })
    })
  </script>
@endpush