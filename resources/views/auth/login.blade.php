@extends('frontend.layout.master')

@section('content')

 <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url(frontend/images/counter_bg.jpg);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>sign in</h1>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><a href="#">sign in</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--=========================
        SIGNIN START
    ==========================-->
    <section class="fp__signin" style="background: url(frontend/images/login_bg.jpg);">
        <div class="fp__signin_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                        <div class="fp__login_area">
                            <h2>Welcome back!</h2>
                            <p>sign in to continue</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">

                                      <!-- Email Address -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label>email</label>
                                            <input name="email" id="email" type="email" placeholder="Email" required value="{{ old('email') }}">
                                        </div>
                                    </div>

                                     <!-- Password -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="password">password</label>
                                            <input id="password" type="password" placeholder="Password" name="password" >
                                        </div>
                                    </div>

    

                                    <!-- Remember Me -->
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput fp__login_check_area">
                                            <div class="form-check">
                                                <input  id="remember" class="form-check-input" type="checkbox" value=""
                                                  name="remember" >
                                                <label for="remember_me" class="form-check-label">
                                                {{ __('Remember me') }}
                                                </label>
                                            </div>

                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}">Forgot Password ?</a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <button type="submit" class="common_btn">login</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="or"><span>or</span></p>
                            <ul class="d-flex">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                            <p class="create_account">Dont’t have an aceount ? <a href="{{ route('register') }}">Create Account</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        SIGNIN END
    ==========================-->

    @endsection