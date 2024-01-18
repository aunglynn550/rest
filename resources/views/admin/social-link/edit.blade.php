@extends('admin.layouts.master')

@section('content')

<section class="section">
          <div class="section-header">
            <h1>Sicial links</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Update Sicial links</h4>
                    
                </div>
                <div class="card-body">
                        <form action="{{ route('admin.social-link.update',$link->id) }}" method="POST" >
                            @csrf                      
                            @method('PUT')
                            <h6>Counter One</h6>
                            <hr>
                            <div class="form-group">
                                <label for="">Counter Icon One</label>
                                <br>
                                <button class="btn btn-secondary" role="iconpicker" name="icon" data-icon="{{ $link->icon }}"></button>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $link->name }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" name="link" class="form-control" value="{{ $link->link }}">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option @selected($link->statusv === 1) value="1">Yes</option>
                                    <option @selected($link->statusv === 0) value="0">No</option>
                                </select>
                            </div><!-- end form-group -->
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                  </div>
                  <!-- end card-body -->
            </div>
            <!-- end card-primary -->
        </section>

@endsection