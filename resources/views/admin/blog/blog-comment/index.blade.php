@extends('admin.layouts.master')

@section('content')
<section class="section">
          <div class="section-header">
            <h1>Blogs Comment</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>All Blogs Comments</h4>
                    
                  </div>
                  <div class="card-body">
                   {{ $dataTable->table() }}
                  </div>
            </div>
            <!-- end card-primary -->
        </section>

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes:['type'=>'module']) }}
@endpush