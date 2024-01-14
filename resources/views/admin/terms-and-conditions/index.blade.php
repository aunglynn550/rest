@extends('admin.layouts.master')

@section('content')
<section class="section">
          <div class="section-header">
            <h1>Terms And Conditions</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Update Terms And Conditions</h4>
                   
                  </div>
                  <div class="card-body">
                    <form action="{{ route('admin.terms-and-conditions.update') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea name="content" class="summernote">{!!@$termsAndConditions->content  !!}</textarea>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                  </div>
            </div>
            <!-- end card-primary -->
        </section>

@endsection
