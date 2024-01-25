<div class="tab-pane fade" id="appearance-setting" role="tabpanel" aria-labelledby="appearance-setting-tab4">
    <div class="card">
        <div class="card-body bordered">
                <form action="{{ route('admin.appearance-setting.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Site Color</label>
                            <input type="text" class="form-control colorpickerinput" name="site_color" value="{{ config('settings.site_color') }}">
                        </div><!-- end form-group -->
                    </div><!-- end col-md-12 -->
                                                                    
                    </div>
                    <!-- .row -->
                
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

$(".colorpickerinput").colorpicker({
        format: 'hex',
        component: '.input-group-append',
    });

</script>
@endpush