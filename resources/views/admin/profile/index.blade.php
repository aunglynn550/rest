@extends('admin.layouts.master')

@section('content')

        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
          </div>

          <div class="section-body">

                <div class="card card-primary">
                  <div class="card-header">
                        <h4>Update User Setting</h4>
                  </div><!-- end card-header -->

                  <div class="card-body">
                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                                <div id="image-preview" class="image-preview">
                                  <label for="image-upload" id="image-label">Choose File</label>
                                  <input type="file" name="avatar" id="image-upload" />
                                </div>
                          </div><!-- end form-group -->

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                        </div><!-- end form-group -->

                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}">
                        </div><!-- end form-group -->

                        <button class="btn btn-primary" type="submit">Save</button>

                    </form>

                  </div><!-- end card-body -->
                </div><!-- end card-primary -->

                <div class="card card-primary">
                    
                  <div class="card-header">
                        <h4>Update Password</h4>                    
                  </div><!-- end card-header -->

                  <div class="card-body">
                    <form action="{{ route('admin.profile.password.update') }}" method="POST" >
                      @csrf
                        @method('PUT')

                         

                            <div class="form-group">
                                <label>Current Password</label>
                                <input id="password" type="password" class="form-control" name="current_password">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>New Password</label>
                                <input id="password" type="password" class="form-control" name="password">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                            </div><!-- end form-group -->

                       <button class="btn btn-primary" type="submit">Save</button>

                    </form>
                  </div><!-- end card-body -->
                </div><!-- end card-primary -->

          </div><!-- end section-body -->
        </section>

@endsection

@push('scripts')
  <script>
    $(document).ready(function(){
      $('.image-preview').css({
        'background-image': 'url({{ asset(auth()->user()->avatar) }})',
        'background-size':'cover',
        'background-position':'center',
        'object-fit':'cover'
      })
    })
  </script>
@endpush