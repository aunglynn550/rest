@extends('frontend.layout.master')

@section('content')
 <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url({{asset('frontend/images/counter_bg.jpg')}});">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Order</h1>
                    <ul>
                        <li><a href="{{ url('/home') }}">home</a></li>
                        <li><a href="javascript:;">payment</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        PAYMENT PAGE START
    ==============================-->
    <section class="fp__payment_page mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
           
            <div class="row">
              <div class="text-center">
                <div class="mt-4">
                    <i class="fas fa-times-circle" style="font-size: 100px;                                     
                    border-radius:50%;
                    color:red;"></i>
                </div>
                <h4>Transaction Failed!</h4>
               <p><b class="mx-5"> {{ session()->has('error')? session('errors')->first('error'): '' }}</b></p>
                <a href="{{ route('dashboard') }}" class="common_btn mt-4">Go To Payment Page</a>
              </div>                
            </div>
        </div>
    </section>

    <!--============================
        PAYMENT PAGE END
    ==============================-->

@endsection 