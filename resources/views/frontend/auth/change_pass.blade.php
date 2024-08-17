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
                        <h2>Change Password</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active">Change Password</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- log in section start -->
    <section class="log-in-section otp-section section-b-space">
        <div class="container-fluid-lg m-auto">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="{{asset('frontend')}}/images/inner-page/otp.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-5 col-lg-6 col-sm-8">
                    <div class="d-flex align-items-center">
                        <div class="log-in-box">
                            <div class="log-in-title">
                                <h3 class="text-title text-center">Please enter your New password</h3>
                            </div>

                            <form action="{{route('pass.update', $data->forget_pass_id)}}" method="POST">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating position-relative">
                                        <input type="password" name="password" class="form-control password_input" id="password"
                                            placeholder="Password" required>
                                            <i class="toggle_password fa fa-eye"></i>
                                        <label for="password">Password</label>
                                    </div>
                                    @error('password')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-12 mt-3">
                                    <div class="form-floating theme-form-floating position-relative">
                                        <input type="password" name="password_confirmation" class="form-control password_input" id="password"
                                            placeholder="Confirm Password" required>
                                            <i class="toggle_password fa fa-eye"></i>
                                        <label for="password">Confirm Password</label>
                                    </div>
                                    @error('password_confirmation')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="col-12 mt-3">
                                    <button class="btn btn-animation w-100" type="submit">Chnage Password</button>
                                </div>
                            </form>
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
    <script src="{{asset('frontend')}}/js/otp.js"></script>
@endpush
