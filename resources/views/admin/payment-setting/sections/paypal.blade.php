<div class="tab-pane fade show active" id="paypal-setting" role="tabpanel" aria-labelledby="home-tab4">
                                                <div class="card">
                                                    <div class="card-body bordered">
                                                           <form action="{{ route('admin.paypal-setting.update') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="form-group">
                                                                <label for="">PayPal Status</label>
                                                                <select name="paypal_status" id="" class="select2 form-control">
                                                                    <option @selected($paymentGateway['paypal_status'] === 1) value="1">Active</option>
                                                                    <option @selected($paymentGateway['paypal_status'] === 0) value="0">Inactive</option>
                                                                </select>
                                                            </div>
                                                            <!-- end form-group -->

                                                            <div class="form-group">
                                                                <label for="">PayPal Account Mode</label>
                                                                <select name="paypal_account_mode" id="" class="select2 form-control">
                                                                    <option @selected($paymentGateway['paypal_account_mode'] === 'sandbox') value="sandbox">Sandbox</option>
                                                                    <option @selected($paymentGateway['paypal_account_mode'] === 'live') value="live">Live</option>
                                                                </select>
                                                            </div>
                                                            <!-- end form-group -->

                                                            <div class="form-group">
                                                                <label for="">PayPal Country Name</label>
                                                                <select name="paypal_country" id="" class="select2 form-control">
                                                                    <option value="">Select</option>
                                                                    @foreach(config('country_list') as $key => $country)
                                                                    <option @selected($paymentGateway['paypal_country'] === $key) value="{{ $key }}">{{ $country }}</option>
                                                                    @endforeach                                                                   
                                                                </select>
                                                            </div>
                                                            <!-- end form-group -->

                                                            <div class="form-group">
                                                                <label for="">PayPal Currency</label>
                                                                <select name="paypal_currency" id="" class="select2 form-control">
                                                                    <option value="">Select</option>

                                                                    @foreach(config('currency.currency_list') as $currency)
                                                                        <option @selected($paymentGateway['paypal_currency'] === $currency) value="{{ $currency }}">{{ $currency }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <!-- end form-group -->

                                                           <div class="form-group">
                                                                <label for="">Currency Rate ( per {{ config('settings.site_default_currency') }} )</label>
                                                                <input name="paypal_rate" type="text" class="form-control" value="{{ $paymentGateway['paypal_rate'] }}">
                                                            </div>
                                                            <!-- end form-group -->

                                                            <div class="form-group">
                                                                <label for="">PayPal Client Id</label>
                                                                <input name="paypal_api_key" type="text" class="form-control" value="{{ $paymentGateway['paypal_api_key'] }}">
                                                            </div>
                                                            <!-- end form-group -->

                                                            <div class="form-group">
                                                                <label for="">PayPal Secret Key</label>
                                                                <input name="paypal_secret_key" type="text" class="form-control" value="{{ $paymentGateway['paypal_secret_key'] }}">
                                                            </div>
                                                            <!-- end form-group -->

                                                            <div class="form-group">
                                                                <label for="">PayPal Logo</label>
                                                                <div id="image-preview" class="image-preview">
                                                                    <label for="image-upload" id="image-label">Choose File</label>
                                                                    <input type="file" name="paypal_logo" id="image-upload" />
                                                                </div>
                                                            </div>
                                                             <!-- end form-group -->
                                                           
                                                          
                                                              
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                         
                                                           </form>
                                                        </div>
                                                        <!-- end card-body -->
                                                    </div>
                                                    <!-- end card -->
                                                </div>
                                                <!-- end card -->

                                                
@push('scripts')
  <script>
    $(document).ready(function(){
      $('.image-preview').css({
        'background-image': 'url({{ asset($paymentGateway["paypal_logo"]) }})',
        'background-size':'cover',
        'background-position':'center',
        'object-fit':'cover'
      })
    })
  </script>
@endpush