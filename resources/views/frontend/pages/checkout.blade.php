@extends('frontend.layout.master')

@section('content')

    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url({{asset(config('settings.breadcrumb'))}});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>checkout</h1>
                    <ul>
                        <li><a href="{{ url('/home') }}">home</a></li>
                        <li><a href="#">checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        CHECK OUT PAGE START
    ==============================-->
    <section class="fp__cart_view mt_125 xs_mt_95 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__checkout_form">
                        <div class="fp__check_form">
                            <h5>select address <a href="#" class="dash_add_new_address " data-bs-toggle="modal" data-bs-target="#address_modal"><i
                                        class="far fa-plus"></i> add address</a></h5>
                        <div class="address_body">
                        <div class="fp__address_modal">
                                <div class="modal fade" id="address_modal" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="address_modalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="address_modalLabel">add new address
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="fp_dashboard_new_address ">
                                                <form action="{{ route('address.store') }}" method="POST">
                                                        @csrf
                                                        <div class="row">                                                           

                                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="fp__check_single_form">
                                                                    <select class="nice-select" name="area">
                                                                        <option value="">select Area</option>
                                                                        @foreach($deliveryAreas as $area)
                                                                            <option value="{{ $area->id }}">{{ $area->area_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="text" placeholder="First Name" name="first_name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="text" placeholder="Last Name" name="last_name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="text" placeholder="Phone" name="phone">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-lg-12 col-xl-6">
                                                                <div class="fp__check_single_form">
                                                                    <input type="text" placeholder="Email" name="email">
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            <div class="col-md-12 col-lg-12 col-xl-12">
                                                                <div class="fp__check_single_form">
                                                                    <textarea cols="3" rows="4"
                                                                        placeholder="Address" name="address"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="fp__check_single_form check_area">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="type" id="flexRadioDefault1" value="home">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault1">
                                                                            home
                                                                        </label>
                                                                    </div><!-- end form-check -->
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="type" id="flexRadioDefault2" value="office">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault2">
                                                                            office
                                                                        </label>
                                                                    </div><!-- end form-check -->
                                                                </div><!-- end check-area -->
                                                            </div>
                                                            <div class="col-12">
                                                                <button type="button"
                                                                    class="common_btn cancel_new_address">cancel</button>
                                                                <button type="submit" class="common_btn mt-3">save
                                                                    address</button>
                                                            </div><!-- end col-12 -->
                                                            
                                                        </div>
                                                    </form>
                                                </div><!-- end fp_dashboard_new_address -->
                                            
                                            </div> <!-- end modal-body -->
                                        </div><!-- end modal-content -->
                                    </div><!-- end modal-dialog -->
                                </div><!-- end modal -->
                            </div><!-- end fp__address_modal -->
                        </div>
                        <!-- end address_body -->
                           

                            <div class="row">
                                @foreach($addresses as $address)
                                <div class="col-md-6">
                                    <div class="fp__checkout_single_address">
                                        <div class="form-check">
                                            <input class="form-check-input v_address" value="{{ $address->id }}" type="radio" name="flexRadioDefault"
                                                id="home">
                                            <label class="form-check-label" for="home">
                                                @if($address->type === 'home')
                                                <span class="icon"><i class="fas fa-home"></i> home</span>
                                                @else
                                                <span class="icon"><i class="far fa-car-building"></i> office</span>
                                                @endif
                                                <span class="address">{{ $address->address }}, {{ $address->deliveryArea->area_name }}</span>
                                            </label>
                                        </div><!-- end form-check -->                                        
                                    </div><!-- end fp__checkout_single_address -->
                                </div><!-- end col-md-6 -->
                               @endforeach
                              
                            </div><!-- end row -->

                            

                        </div><!-- end fp__check_form -->
                    </div><!-- end fp__checkout_form -->
                </div><!-- end col-lg-8 -->

                <div class="col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div id="sticky_sidebar" class="fp__cart_list_footer_button">
                            <h6>total cart</h6>
                            <p>subtotal: <span>{{ currencyPosition(cartTotal()) }}</span></p>
                            <p>delivery: <span id="delivery_fee">$00.00</span></p>
                            @if(session()->has('coupon'))
                                <p>discount: <span>{{ currencyPosition(session()->get('coupon')['discount']) }}</span></p>
                            @else
                                <p>discount: <span>{{ currencyPosition(0) }}</span></p>
                            @endif
                            <p class="total"><span>total:</span> <span id="grand_total">{{ currencyPosition(grandCartTotal()) }}</span></p>
                           <div class="mt-4">
                               <a class="common_btn" id="proceed_pmt_button" href=" #">Proceed To Payment</a>
                           </div>
                    </div><!-- end fp__cart_list_footer_button -->
                </div><!-- end col-lg-4 -->

            </div><!-- end row -->
        </div><!-- end container -->
    </section>
    <!--============================
        CHECK OUT PAGE END
    ==============================-->
@endsection

@push('scripts')
<script>
    /// csrf token SetUp////
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    $(document).ready(function(){
        $('.v_address').prop('checked',false);
        $('.v_address').on('click',function(){
            let addressId = $(this).val();
            let deliveryFee = $('#delivery_fee');
            let grandTotal = $('#grand_total');

            $.ajax({
                    method: 'get',
                    url: '{{ route("checkout.delivery-cal",":id") }}'.replace(":id", addressId),                   
                    beforeSend: function(){
                      showLoader()
                    },
                    success: function(response){
                        deliveryFee.text("{{ currencyPosition(':amount') }}"
                                    .replace(":amount", response.delivery_fee));
                        grandTotal.text("{{ currencyPosition(':amount') }}"
                                    .replace(":amount", response.grand_total));
                    },
                    error:function(xhr,status,error){
                        let errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage);
                    },
                    complete:function(){
                     hideLoader()
                    }
                })
        })

        $('#proceed_pmt_button').on('click',function(e){
            e.preventDefault();
            let address = $('.v_address:checked');
            let id = address.val();

            if(address.length === 0){
                toastr.error('Please Select an Address!');
                return;
            }

            $.ajax({
                    method: 'POST',
                    url: '{{ route("checkout.redirect") }}',
                    data:{id:id},                   
                    beforeSend: function(){
                      showLoader()
                    },
                    success: function(response){
                      window.location.href = response.redirect_url;
                    },
                    error:function(xhr,status,error){
                        let errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage);
                    },
                    complete:function(){
                     hideLoader()
                    }
                })
        })
    })
</script>
@endpush 