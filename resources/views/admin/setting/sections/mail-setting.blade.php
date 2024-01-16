<div class="tab-pane fade show active" id="mail-settings" role="tabpanel" aria-labelledby="mail-settings-tab4">
        <div class="card">
            <div class="card-body bordered">
                    <form action="{{ route('admin.mail-setting.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Mail Driver</label>
                                <input name="mail_driver" type="text" class="form-control" value="{{ config('setting.mail_driver') }}">
                            </div>
                            <!-- end form-group -->
                        </div>
                        <!-- end col-md-4 -->
                        <div class="col-md-4">                            
                            <div class="form-group">
                                <label for="">Mail Host</label>
                                <input name="mail_host" type="text" class="form-control" value="{{ config('setting.mail_host') }}">
                            </div>
                            <!-- end form-group -->
                        </div>
                        <!-- end col-md-4 -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Mail Port</label>
                                <input name="mail_port" type="text" class="form-control" value="{{ config('setting.mail_port') }}">
                            </div>
                            <!-- end form-group -->
                        </div>
                        <!-- end col-md-4 -->                        
                    </div>
                    <!-- end row -->
                    
                    <div class="row">
                        <div class="col-md-6">
                             <div class="form-group">
                                <label for="">Mail User Name</label>
                                <input name="mail_username" type="text" class="form-control" value="{{ config('setting.mail_username') }}">
                            </div>
                            <!-- end form-group -->
                        </div>
                        <!-- end col-md-6 -->                        
                        <div class="col-md-6"> 
                            <div class="form-group">
                                <label for="">Mail Password</label>
                                <input name="mail_password" type="text" class="form-control" value="{{ config('setting.mail_password') }}">
                            </div>
                            <!-- end form-group -->
                        </div>
                        <!-- end col-md-6 -->
                    </div>
                    <!-- end row -->
                  
                    <div class="form-group">
                        <label for="">Mail Encryption</label>
                        <input name="mail_encryption" type="text" class="form-control" value="{{ config('setting.mail_driver') }}">
                    </div>
                    <!-- end form-group -->
                    <div class="form-group">
                        <label for="">Mail Form Address</label>
                        <input name="mail_from_address" type="text" class="form-control" value="{{ config('setting.mail_driver') }}">
                    </div>
                    <!-- end form-group -->
                    <div class="form-group">
                        <label for="">Mail Receive Address</label>
                        <input name="mail_receive_address" type="text" class="form-control" value="{{ config('setting.mail_driver') }}">
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