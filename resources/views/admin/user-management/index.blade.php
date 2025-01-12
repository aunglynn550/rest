@extends('admin.layouts.master')

@section('content')
<section class="section">
          <div class="section-header">
            <h1>User Management</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>All Users</h4>
                    <div class="card-header-action">
                      <a href="{{ route('admin.user-management.create') }}" class="btn btn-primary">
                        Create New
                      </a>
                    </div>
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
    <script>
         $(document).ready(function(){
            $('body').on('change', '.approve_status',function(){
              alert('hi')
                let status = $(this).val();
                let id = $(this).data('id');
               $.ajax({
                method : 'POST',
                url : '{{ route("admin.approve-status.update") }}',
                data : {
                    _token: "{{ csrf_token() }}",
                    status :  status,
                    id : id
                },
                success : function(response){
                    toastr.success(response.message);
                },
                error : function(xhr, status, error){

                }
               })
            })
        })
    </script>
@endpush