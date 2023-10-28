@extends('frontend.layout.master')

@section('content')
<!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url(frontend/images/counter_bg.jpg);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>reset password</h1>
                    <ul>
                        <li><a href="javascript">home</a></li>
                        <li><a href="#">forgot password</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--=========================
        RESET PASSWORD START 
    ==========================-->
    <section class="fp__signin" style="background: url(frontend/images/login_bg.jpg);">
        <div class="fp__signin_overlay pt_125 xs_pt_95 pb_100 xs_pb_70">
            <div class="container">
                <div class="row wow fadeInUp" data-wow-duration="1s">
                    <div class="col-xxl-5 col-xl-6 col-md-9 col-lg-7 m-auto">
                        <div class="fp__login_area">
                            <h2>Welcome back!</h2>
                            <p>reset password</p>
                            <form method="POST" action="{{ route('password.store') }}">
                                    @csrf
                                <div class="row">

                                  <!-- Password Reset Token -->
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                   <!-- Email Address -->       
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="email">email</label>
                                            <input id="email" type="email"  name="email" placeholder="Email" value="{{ old('email') }}" required>
                                        </div>
                                    </div>

                                     <!-- Password -->       
                                     <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="password">Password</label>
                                            <input id="password" type="password"  name="password" placeholder="password"  required>
                                        </div>
                                    </div>

                                     <!-- Confirm Password -->       
                                     <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input id="password_confirmation" type="password"  name="password_confirmation"  required>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="fp__login_imput">
                                            <button type="submit" class="common_btn">Reset Password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="create_account d-flex justify-content-between">
                                <a href="{{ route('login') }}">Login</a>
                                <a href="{{ route('register') }}">Create Account</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        RESET PASSWORD END
    ==========================-->
@endsection

