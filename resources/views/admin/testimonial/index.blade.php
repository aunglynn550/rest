@extends('admin.layouts.master')

@section('content')

        <section class="section">
                <div class="section-header">
                    <h1>Testimonials</h1>
                </div>        

                  <div class="col-12 col-md-6 col-lg-12">
                <div class="card">                 
                  <div class="card-body">
                    <div id="accordion">
                      <div class="accordion">
                        <div class="accordion-header collapse show bg-primary text-light" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                          <h4>Testimonial Section Title</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion">
                           <form action="{{ route('admin.testimonial-title.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                    <label for="">Top Title</label>
                                    <input type="text" class="form-control" name="testimonial_top_title" value="{{@$titles['testimonial_top_title']}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Main Title</label>
                                    <input type="text" class="form-control" name="testimonial_main_title" value="{{@$titles['testimonial_main_title']}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Sub Title</label>
                                    <input type="text" class="form-control" name="testimonial_sub_title" value="{{@$titles['testimonial_sub_title']}}">
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                           </form>
                      </div>
                     
                    </div>
                  </div>
                </div>
              </div>
            
        </section>


        <section class="section">    

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>Testimonial</h4>
                    <div class="card-header-action">
                      <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary">
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
@endpush