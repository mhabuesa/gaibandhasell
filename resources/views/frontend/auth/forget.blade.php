@extends('layouts.frontend')
@push('title')
<title>Signin - Gaibandhasell.com </title>
@endpush
@section('content')
      <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Forgot Password</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Forgot Password</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section section-b-space forgot-section">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{asset('frontend')}}/images/inner-page/forgot.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="d-flex align-items-center justify-content-center h-100">
                        <div class="log-in-box">
                            <div class="log-in-title text-center">
                                <h3>Welcome To Gaibandha Sell</h3>
                                <h4>Forgot your password</h4>
                            </div>

                            <div class="input-box">
                                @if (session('success'))
                                <div class="input-box text-center mt-5 text-light btn bg_success w-100 cursor_default">
                                    <h4>{{session('success')}}</h4>
                                </div>
                                @else
                                <form class="row g-4" action="{{route('forgetPass.mail')}}" method="POST">
                                    @csrf
                                    <div class="col-12">
                                        <div class="form-floating theme-form-floating log-in-form">
                                            <input type="email" name="email" class="form-control" id="email"
                                                placeholder="Email Address" required>
                                            <label for="email">Email Address</label>
                                        </div>
                                        @if(session('email'))
                                            <small class="text-danger">{{session('email')}}</small>
                                        @endif
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-animation w-100" type="submit">Forgot
                                            Password</button>
                                    </div>
                                </form>
                                @endif
                            </div>
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
