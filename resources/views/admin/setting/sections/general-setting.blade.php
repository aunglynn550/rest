<div class="tab-pane fade show active" id="general-setting" role="tabpanel" aria-labelledby="home-tab4">
                                                <div class="card">
                                                    <div class="card-body bordered">
                                                           <form action="{{ route('admin.general-setting.update') }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                           <div class="form-group">
                                                                <label for="">Site Name</label>
                                                                <input name="site_name" type="text" class="form-control" value="{{ config('settings.site_name') }}">
                                                            </div>
                                                            <!-- end form-group -->
                                                            <div class="form-group">
                                                                <label for="">Default Currency</label>
                                                                <select name="site_default_currency" id="" class="select2 form-control">
                                                                    <option value="">Select</option>

                                                                    @foreach(config('currency.currency_list') as $currency)
                                                                        <option @selected(config('settings.site_default_currency') === $currency) value="{{ $currency }}">{{ $currency }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <!-- end form-group -->
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Currency Icon</label>
                                                                            <input name="site_currency_icon" type="text" class="form-control" value="{{ config('settings.site_currency_icon') }}">
                                                                        </div>                                                                      
                                                                    </div>
                                                                    <!-- end col-md-6 -->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Currency Icon Position</label>
                                                                            <select name="site_currency_icon_position" id="" class="select2 form-control">
                                                                                <option @selected(config('settings.site_currency_icon_possition') === 'right') value="right">Right</option>
                                                                                <option @selected(config('settings.site_currency_icon_possition') === 'left') value="left">left</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <!-- end col-md-6 -->
                                                                </div>
                                                                <!-- end row -->
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                            <!-- end form-group -->
                                                           </form>
                                                        </div>
                                                        <!-- end card-body -->
                                                    </div>
                                                    <!-- end card -->
                                                </div>
                                                <!-- end tab-pane -->