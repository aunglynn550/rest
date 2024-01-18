@extends('admin.layouts.master')

@section('content')

<section class="section">
          <div class="section-header">
            <h1>Sicial links</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Create Social Link</h4>
                    
                </div>
                <div class="card-body">
                        <form action="{{ route('admin.social-link.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf                      
                            
                            <h6>Counter One</h6>
                            <hr>
                            <div class="form-group">
                                <label for="">Counter Icon One</label>
                                <br>
                                <button class="btn btn-secondary" role="iconpicker" name="icon" data-icon=""></button>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" name="link" class="form-control">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div><!-- end form-group -->
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                  </div>
                  <!-- end card-body -->
            </div>
            <!-- end card-primary -->
        </section>

@endsection