@extends('admin.layouts.master')

@section('content')
<section class="section">
          <div class="section-header">
            <h1>Privacy Policy</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Update Privacy Policy</h4>                 
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.privacy-policy.update') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea name="content" class="summernote">{!!@$privacyPolicy->content  !!}</textarea>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                  </div>
            </div>
            <!-- end card-primary -->
        </section>

@endsection
