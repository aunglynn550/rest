<div class="tab-pane fade" id="seo-settings" role="tabpanel" aria-labelledby="seo-tab4">
    <div class="card">
        <div class="card-body bordered">
                <form action="{{ route('admin.seo-setting.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">SEO Title</label>
                            <input name="seo_title" type="text" class="form-control" value="{{ config('settings.seo_title') }}">
                        </div>
                        <!-- end form-group -->
                        <div class="form-group">
                            <label for="">SEO Description</label>
                            <input name="seo_description" type="text" class="form-control" value="{{ config('settings.seo_description') }}">
                        </div>
                        <!-- end form-group -->
                        <div class="form-group">
                            <label for="">SEO Keywords</label>
                            <input name="seo_keywords" type="text" class="form-control inputtags" value="{{ config('settings.seo_keywords') }}">
                        </div>
                        <!-- end form-group -->
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    <!-- .col-md-6 -->
                </div>
                <!-- .row -->
            </form>
               
            </div>
            <!-- end card-body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end tab-pane -->

@push('scripts')
<script>
    $(".inputtags").tagsinput('items');
</script>
@endpush