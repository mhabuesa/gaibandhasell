@extends('layouts.frontend')
@push('title')
<title>Setting - Gaibandhasell.com </title>
@endpush
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>My Profile</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('index')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- User Dashboard Section Start -->
    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">

                {{-- Side Tab --}}
                @include('frontend.customerPages.side_tab')

                <div class="col-xxl-9 col-lg-8">
                    <div class="dashboard-right-sidebar">
                        <div class="tab-content" id="pills-tabContent">

                            <div class="tab-pane fade show active">
                                <div class="dashboard-profile">
                                    <div class="title">
                                        <h2>My Profile</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="profile-tab dashboard-bg-box">
                                        <div class="dashboard-title dashboard-flex">
                                            <h3>Profile Info</h3>
                                            <button class="btn btn-sm theme-bg-color text-white" onclick="location.href = '{{route('customer.setting')}}';">Edit Profile</button>

                                        </div>

                                        <ul>
                                            <li>
                                                <h5>Name :</h5>
                                                <h5>{{Auth::guard('customer')->user()->name}}</h5>
                                            </li>

                                            <li>
                                                <h5>Email Address :</h5>
                                                <h5>{{Auth::guard('customer')->user()->email}}</h5>
                                            </li>

                                            <li>
                                                <h5>Phone :</h5>
                                                <h5>{{Auth::guard('customer')->user()->phone}}</h5>
                                            </li>

                                            <li>
                                                <h5>Address :</h5>
                                                <h5>{{Auth::guard('customer')->user()->address}}.</h5>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- User Dashboard Section End -->
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
