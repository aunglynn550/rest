@extends('admin.layouts.master')

@section('content')

<section class="section">
          <div class="section-header">
            <h1>Why Choose Us Section</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Create Item</h4>
                    
                </div>
                <div class="card-body">
                        <form action="{{ route('admin.why-choose-us.store') }}" method="POST">
                            @csrf                        
                            <div class="form-group">
                                <label>Icon</label><br>
                                <button name="icon" class="btn btn-primary" role="iconpicker"></button>
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control">
                            </div><!-- end form-group -->

                            <div class="form-group">
                                <label>Short Description</label>
                                <textarea type="text" name="short_description" class="form-control"></textarea>
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