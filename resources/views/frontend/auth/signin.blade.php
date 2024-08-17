@extends('layouts.frontend')
@push('title')
<title>Signin - Gaibandhasell.com </title>
@endpush

@push('header')
<style>
    .password_input {
    padding-right: 32px;
}

    .toggle_password {
        position: absolute;
        top: 20px;
        right: 15px;
        cursor: pointer;
        z-index: 9999;
    }
</style>
@endpush
@section('content')
       <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2 class="mb-2">Signin</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('index')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Signin</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section background-image-2 section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{asset('frontend')}}/images/inner-page/log-in.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title text-center">
                            <h3>Welcome To Gaibandha Sell</h3>
                            <h4>Signin Your Account</h4>
                        </div>

                        <div class="input-box">
                            <form class="row g-4" action="{{route('customer.signin')}}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required
                                        @if (isset($_COOKIE['email'])) value="{{ $_COOKIE['email'] }}" @endif>
                                        <label for="email">Email Address</label>
                                    </div>
                                    @if(session('email'))
                                        <small class="text-danger">{{session('email')}}</small>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form position-relative">
                                        <input type="password" name="password" class="form-control password_input" id="password"
                                            placeholder="Password" required @if (isset($_COOKIE['password'])) value="{{ $_COOKIE['password'] }}" @endif>
                                            <i class="toggle_password fa fa-eye"></i>
                                        <label for="password">Password</label>
                                    </div>
                                    @if(session('password'))
                                        <small class="text-danger">{{session('password')}}</small>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" name="remember" type="checkbox"
                                                id="flexCheckDefault" @if (isset($_COOKIE['email'])) checked @endif>
                                            <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                                        </div>
                                        <a href="{{route('forgetPass')}}" class="forgot-password">Forgot Password?</a>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" type="submit">Log
                                        In</button>
                                </div>
                            </form>
                        </div>

                        <div class="other-log-in">
                            <h6>or</h6>
                        </div>

                        <div class="log-in-button">
                            <ul>
                                <li>
                                    <a href="https://www.google.com/" class="btn google-button w-100">
                                        <img src="{{asset('frontend')}}/images/inner-page/google.png" class="blur-up lazyload"
                                            alt=""> Log In with Google
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/" class="btn google-button w-100">
                                        <img src="{{asset('frontend')}}/images/inner-page/facebook.png" class="blur-up lazyload"
                                            alt=""> Log In with Facebook
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="other-log-in">
                            <h6></h6>
                        </div>

                        <div class="sign-up-box">
                            <h4>Don't have an account?</h4>
                            <a href="{{route('signup')}}">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- log in section end -->
@endsection

@push('script')
    <script>
        $(document).ready(function () {
        $(".toggle_password").click(function () {
            var passwordInput = $($(this).siblings(".password_input"));
            var icon = $(this);
            if (passwordInput.attr("type") == "password") {
                passwordInput.attr("type", "text");
                icon.removeClass("fa-eye").addClass("fa-eye-slash");
            } else {
                passwordInput.attr("type", "password");
                icon.removeClass("fa-eye-slash").addClass("fa-eye");
            }
        });
})
    </script>
@endpush
