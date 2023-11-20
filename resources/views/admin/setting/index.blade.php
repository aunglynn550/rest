@extends('admin.layouts.master')

@section('content')
<section class="section">
          <div class="section-header">
            <h1>Setting</h1>
          </div>

          <div class="card card-primary">
                  <div class="card-header">
                    <h4>All Setting</h4>
                    
                  </div>
                  <div class="card-body">

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-4">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="general-setting-tab4" data-toggle="tab" href="#general-setting" role="tab" aria-controls="home" aria-selected="true">General Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#pusher-setting" role="tab" aria-controls="profile" aria-selected="false">Pusher Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                                    </li>
                                    </ul>
                                </div>
                                <!-- end col-12 -->
                                <div class="col-12 col-sm-12 col-md-8">
                                    <div class="tab-content no-padding" id="myTab2Content">
                                           @include('admin.setting.sections.general-setting')
                                           @include('admin.setting.sections.pusher-setting')
                                           
                                            <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                                                Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula massa, gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem interdum molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor. Nam malesuada orci non ornare vulputate. Ut ut sollicitudin magna. Vestibulum eget ligula ut ipsum venenatis ultrices. Proin bibendum bibendum augue ut luctus.
                                            </div>
                                        </div>
                                        <!-- end tab-content -->
                                    </div>
                                    <!-- end col-12 -->
                                </div>
                                <!-- end row -->
                  </div>
            </div>
            <!-- end card-primary -->
        </section>

@endsection

