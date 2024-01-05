@extends('admin.layouts.master')

@section('content')

<section class="section">
          <div class="section-header">
            <h1>App Download Section</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Update Section</h4>
                    
                </div>
                <div class="card-body">
                        <form action="{{ route('admin.app-download.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf                       
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Image</label>

                                        <div id="image-preview" class="image-preview">
                                        <label for="image-upload" id="image-label">Choose File</label>
                                        <input type="file" name="image" id="image-upload" />
                                        <input type="hidden" name="old_image" value="{{ @$appDownload->image }}" />
                                        </div>
                                    </div><!-- end form-group -->
                                </div>
                                <!-- .col-md-6 -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Background</label>

                                        <div id="image-preview-2" class="image-preview">
                                        <label for="image-upload" id="image-label-2">Choose File</label>
                                        <input type="file" name="background" id="image-upload-2" />
                                        <input type="hidden" name="old_background" value="{{ @$appDownload->background }}" />
                                        </div>
                                    </div><!-- end form-group -->
                                </div>
                                <!-- .col-md-6 -->
                            </div>
                                                                    
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title" value="{{ @$appDownload->title }}">
                            </div><!-- end form-group -->    

                            <div class="form-group">
                                <label for="">Short Description</label>
                                <input type="text" class="form-control" name="short_description" value="{{ @$appDownload->short_description }}">
                            </div><!-- end form-group -->      
                            <div class="form-group">
                                <label for="">Play Store Link<code>(Leave empty for hide)</code></label>
                                <input type="text" class="form-control" name="play_store_link" value="{{ @$appDownload->play_store_link }}">
                            </div><!-- end form-group -->      
                            <div class="form-group">
                                <label for="">Apple Store Link<code>(Leave empty for hide)</code></label>
                                <input type="text" class="form-control" name="apple_store_link" value="{{ @$appDownload->apple_store_link }}">
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
       $.uploadPreview({
        input_field: "#image-upload",   // Default: .image-upload
        preview_box: "#image-preview",  // Default: .image-preview
        label_field: "#image-label",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null          // Default: null
      });

      $.uploadPreview({
        input_field: "#image-upload-2",   // Default: .image-upload-2
        preview_box: "#image-preview-2",  // Default: .image-preview-2
        label_field: "#image-label-2",    // Default: .image-label-2
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null          // Default: null
      });


    $(document).ready(function(){
      $('#image-preview').css({
        'background-image': 'url({{ asset(@$appDownload->image) }})',
        'background-size':'cover',
        'background-position':'center',
        'object-fit':'cover'
      })
      $('#image-preview-2').css({
        'background-image': 'url({{ asset(@$appDownload->background) }})',
        'background-size':'cover',
        'background-position':'center',
        'object-fit':'cover'
      })

    })
</script>


 
@endpush

