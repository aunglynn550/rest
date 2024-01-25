<div class="tab-pane fade" id="pusher-setting" role="tabpanel" aria-labelledby="pusher-setting-tab4">
                                                <div class="card">
                                                    <div class="card-body bordered">
                                                           <form action="{{ route('admin.pusher-setting.update') }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                           <div class="form-group">
                                                                <label for="">Pusher App ID</label>
                                                                <input name="pusher_app_id" type="text" class="form-control" value="{{ config('settings.pusher_app_id') }}">
                                                            </div>
                                                            <!-- end form-group -->
                                                            <div class="form-group">
                                                                <label for="">Pusher Key</label>
                                                                <input name="pusher_key" type="text" class="form-control" value="{{ config('settings.pusher_key') }}">
                                                            </div>
                                                            <!-- end form-group -->
                                                            <div class="form-group">
                                                                <label for="">Pusher Secret</label>
                                                                <input name="pusher_secret" type="text" class="form-control" value="{{ config('settings.pusher_secret') }}">
                                                            </div>
                                                            <!-- end form-group -->
                                                            <div class="form-group">
                                                                <label for="">Pusher Cluster</label>
                                                                <input name="pusher_cluster" type="text" class="form-control" value="{{ config('settings.pusher_cluster') }}">
                                                            </div>
                                                            <!-- end form-group -->
                                                              
                                                            <button type="submit" class="btn btn-primary">Save</button>                                                          
                                                           </form>
                                                        </div>
                                                        <!-- end card-body -->
                                                    </div>
                                                    <!-- end card -->
                                                </div>
                                                <!-- end tab-pane -->