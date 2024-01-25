<div class="tab-pane fade" id="logo-setting" role="tabpanel" aria-labelledby="logo-setting-tab4">
            <div class="card">
                <div class="card-body bordered">
                        <form action="{{ route('admin.logo-setting.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Logo</label>

                                    <div id="image-preview" class="image-preview logo">
                                    <label for="image-upload" id="image-label">Choose File</label>
                                    <input type="file" name="logo" id="image-upload" />
                                    </div>
                                </div><!-- end form-group -->
                            </div><!-- end col-md-3 -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Footer Logo</label>

                                    <div id="image-preview-2" class="image-preview footer_logo">
                                    <label for="image-upload-2" id="image-label-2">Choose File</label>
                                    <input type="file" name="footer_logo" id="image-upload-2" />
                                    </div>
                                </div><!-- end form-group -->
                            </div><!-- end col-md-3 -->

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Favicon</label>

                                    <div id="image-preview-3" class="image-preview favicon">
                                    <label for="image-upload-3" id="image-label-3">Choose File</label>
                                    <input type="file" name="favicon" id="image-upload-3" />
                                    </div>
                                </div><!-- end form-group -->
                            </div><!-- end col-md-3 -->      
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Breadcrumb</label>

                                    <div id="image-preview-4" class="image-preview breadcrumb">
                                    <label for="image-upload-4" id="image-label-4">Choose File</label>
                                    <input type="file" name="breadcrumb" id="image-upload-4" />
                                    </div>
                                </div><!-- end form-group -->
                            </div><!-- end col-md-3 -->                                                      
                            </div><!-- end row -->  
                        
                            <button type="submit" class="btn btn-primary">Save</button>
                   
                        </form>
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end tab-pane -->
                                       

@push('scripts')
<script>

     $(document).ready(function(){
        $('.logo').css({
            'background-image': 'url({{ asset(config("settings.logo")) }})',
            'background-size':'cover',
            'background-position':'center',
            'object-fit':'cover'
            })
        $('.footer_logo').css({
            'background-image': 'url({{ asset(config("settings.footer_logo")) }})',
            'background-size':'cover',
            'background-position':'center',
            'object-fit':'cover'
        })
        $('.favicon').css({
            'background-image': 'url({{ asset(config("settings.favicon")) }})',
            'background-size':'cover',
            'background-position':'center',
            'object-fit':'cover'
            })
        $('.breadcrumb').css({
            'background-image': 'url({{ asset(config("settings.breadcrumb")) }})',
            'background-size':'cover',
            'background-position':'center',
            'object-fit':'cover'
        })
        })
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
        input_field: "#image-upload-2",   // Default: .image-upload
        preview_box: "#image-preview-2",  // Default: .image-preview
        label_field: "#image-label-2",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null          // Default: null
      });
      $.uploadPreview({
        input_field: "#image-upload-3",   // Default: .image-upload
        preview_box: "#image-preview-3",  // Default: .image-preview
        label_field: "#image-label-3",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null          // Default: null
      });
      $.uploadPreview({
        input_field: "#image-upload-4",   // Default: .image-upload
        preview_box: "#image-preview-4",  // Default: .image-preview
        label_field: "#image-label-4",    // Default: .image-label
        label_default: "Choose File",   // Default: Choose File
        label_selected: "Change File",  // Default: Change File
        no_label: false,                // Default: false
        success_callback: null          // Default: null
      });
</script>
@endpush