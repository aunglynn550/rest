@extends('admin.layouts.master')

@section('content')
<section class="section">
                <div class="section-header">
                    <h1>Subscribers</h1>
                </div>        

                  <div class="col-12 col-md-6 col-lg-12">
                <div class="card">                 
                  <div class="card-body">
                    <div id="accordion">
                      <div class="accordion">
                        <div class="accordion-header collapse show bg-primary text-light" role="button" data-toggle="collapse" data-target="#panel-body-1" aria-expanded="true">
                          <h4>Send News Letter...</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion">
                           <form action="{{ route('admin.news-letter.send') }}" method="POST">
                            @csrf                     
                            <div class="form-group">
                                    <label for="">Subject</label>
                                    <input type="text" class="form-control" name="subject" value="">
                                </div>                             
                                <div class="form-group">
                                    <label for="">Message</label>
                                    <textarea type="text" class="summernote" name="message" ></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Send</button>
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
                    <h4>All Subscribers</h4>                  
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