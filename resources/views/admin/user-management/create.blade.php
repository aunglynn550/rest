@extends('admin.layouts.master')

@section('content')

<section class="section">   
  <div class="section-header">
    <h1>Admin Management</h1>
  </div>     
          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Create Admin</h4>
                    
                </div>
                <div class="card-body">
                        <form action="{{ route('admin.admin-management.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf                       
                                                      
                          <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name">
                          </div><!-- end form-group -->

                          <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email">
                          </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control">
                                    <option value="admin">Admin</option>                                   
                                </select>
                            </div><!-- end form-group -->
                            
                          <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password">
                          </div><!-- end form-group -->
                             
                          <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation">
                          </div><!-- end form-group -->
                          
                                                                                                                                                                                    

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                  </div>
                  <!-- end card-body -->
            </div>
            <!-- end card-primary -->
        </section>

@endsection
