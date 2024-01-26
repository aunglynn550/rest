<div class="tab-pane fade" id="v-pills-password" role="tabpanel"
                                    aria-labelledby="v-pills-password-tab">
                                    <div class="fp_dashboard_body fp__change_password">
                                        <div class="fp__review_input">
                                            <h3>change password</h3>
                                            <div class="comment_input pt-0">
                                                <form method="POST" action="{{ route('profile.password.update') }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="fp__comment_imput_single">
                                                                <label>Current Password</label>
                                                                <input id="current_password" type="password" placeholder="Current Password" name="current_password">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="fp__comment_imput_single">
                                                                <label>New Password</label>
                                                                <input id="password" type="password" placeholder="New Password" name="password">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <div class="fp__comment_imput_single">
                                                                <label>confirm Password</label>
                                                                <input id="password_confirmation" type="password" placeholder="Confirm Password" name="password_confirmation">
                                                            </div>
                                                            <button type="submit"
                                                                class="common_btn mt_20">submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- end comment_input -->
                                        </div>
                                        <!-- end fp__review_input -->
                                    </div>
                                    <!-- end fp__review_input -->
                                </div>
                                <!-- end tab-pane -->