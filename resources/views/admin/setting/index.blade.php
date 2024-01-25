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
                                <div class="col-12 col-sm-12 col-md-2">
                                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="general-setting-tab4" data-toggle="tab" href="#general-setting" role="tab" aria-controls="home" aria-selected="true">General Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="logo-setting-tab4" data-toggle="tab" href="#logo-setting" role="tab" aria-controls="logo" aria-selected="false">Logo Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="appearance-setting-tab4" data-toggle="tab" href="#appearance-setting" role="tab" aria-controls="logo" aria-selected="false">Appearance Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-setting-tab4" data-toggle="tab" href="#pusher-setting" role="tab" aria-controls="profile" aria-selected="false">Pusher Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="mail-settings-tab4" data-toggle="tab" href="#mail-settings" role="tab" aria-controls="mail" aria-selected="false">Mail Settings</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="seo-settings-tab4" data-toggle="tab" href="#seo-settings" role="tab" aria-controls="seo" aria-selected="false">SEO Settings</a>
                                    </li>
                                    </ul>
                                </div>
                                <!-- end col-12 -->
                                <div class="col-12 col-sm-12 col-md-10">
                                    <div class="tab-content no-padding" id="myTab2Content">
                                           @include('admin.setting.sections.general-setting')
                                           @include('admin.setting.sections.logo-setting')
                                           @include('admin.setting.sections.appearance-setting')
                                           @include('admin.setting.sections.pusher-setting')
                                           @include('admin.setting.sections.mail-setting')
                                           @include('admin.setting.sections.seo-setting')
                                           
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

