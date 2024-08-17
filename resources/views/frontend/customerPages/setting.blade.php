@extends('layouts.frontend')
@push('title')
<title>Setting - Gaibandhasell.com </title>
@endpush
@push('header')
<style>
    .avatar-upload {
        position: relative;
        max-width: 205px;
    }

    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }

    .avatar-upload .avatar-edit input {
        display: none;
    }

    .avatar-upload .avatar-edit input+label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }

    .avatar-upload .avatar-edit input+label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }

    .avatar-upload .avatar-edit input+label:after {
        content: "\f03e";
        font-family: 'FontAwesome';
        color: #757575;
        position: absolute;
        top: 4px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }

    .avatar-upload .avatar-preview {
        width: 120px;
        height: 120px;
        position: relative;
        border-radius: 10%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }

    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 10px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    .password_input {
        padding-right: 32px;
    }

    .toggle_password {
        position: absolute;
        top: 55px;
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
                        <h2>Setting</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('index')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Setting</li>
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
                                <div class="dashboard-privacy">
                                    <div class="title">
                                        <h2>My Setting</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="dashboard-bg-box">
                                        <div class="dashboard-title mb-4">
                                            <h3>Profile Photo</h3>
                                        </div>

                                        <form action="{{route('customer.photo.update')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <div class="privacy-box">
                                            <div class="form-check custom-form-check custom-form-check-2 d-flex align-items-center">
                                                <div class="cont">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input name="photo" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                            <label for="imageUpload"></label>

                                                        </div>

                                                        <div class="avatar-preview">
                                                            @if (Auth::guard('customer')->user()->photo == null)
                                                            <div class="imagePreview"
                                                                style="background-image: url({{asset('frontend')}}/images/vendor-page/logo.png);">
                                                            </div>
                                                            @else
                                                            <div class="imagePreview"
                                                                style="background-image: url({{asset('uploads')}}/profile/customer/{{Auth::guard('customer')->user()->photo}})">
                                                            </div>
                                                            @endif
                                                            @error('photo')
                                                            <strong>{{$message}}</strong>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn theme-bg-color btn-md fw-bold mt-4 text-white" type="submit">Update</button>
                                    </form>
                                    </div>

                                    <div class="dashboard-bg-box">
                                        <form action="{{route('customer.info.update')}}" method="POST">
                                            @csrf
                                        <div class="dashboard-title mb-4">
                                            <h3>Info Update</h3>
                                        </div>
                                        <div class="privacy-box">
                                            <div class="form-check custom-form-check custom-form-check-2 ">
                                                <label class="form-label ms-2" for="concern">Name</label>
                                                <input name="name" class="form-control" type="text" value="{{Auth::guard('customer')->user()->name}}" required>
                                            </div>
                                        </div>
                                        <div class="privacy-box">
                                            <div class="form-check custom-form-check custom-form-check-2 ">
                                                <label class="form-label ms-2" for="concern">Phone</label>
                                                <input name="phone" class="form-control" type="text" value="{{Auth::guard('customer')->user()->phone}}" required>
                                            </div>
                                        </div>
                                        <div class="privacy-box">
                                            <div class="form-check custom-form-check custom-form-check-2 ">
                                                <label class="form-label ms-2" for="concern">Address</label>
                                                <input name="address" class="form-control" type="text" value="{{Auth::guard('customer')->user()->address}}" required>
                                            </div>
                                        </div>

                                        <button class="btn theme-bg-color btn-md fw-bold mt-4 text-white" type="submit">Update</button>
                                    </form>
                                    </div>

                                    <div class="dashboard-bg-box">
                                        <div class="dashboard-title mb-4">
                                            <h3>Security Update</h3>
                                        </div>

                                        <form action="{{route('customer.security.update')}}" method="POST">
                                            @csrf
                                        <div class="privacy-box">
                                            <div class="form-check custom-form-check custom-form-check-2 position-relative">
                                                <label class="form-label ms-2" for="concern">Current Password</label>
                                                <input name="current_password" class="form-control password_input" type="password" >
                                                <i class="toggle_password fa fa-eye"></i>
                                            </div>
                                            @error('current_password')
                                                <strong class="text-danger text-capitalize">{{$message}}</strong>
                                            @enderror

                                            @if (session('error'))
                                                <strong class="text-danger text-capitalize">{{session('error')}}</strong>
                                            @endif
                                        </div>
                                        <div class="privacy-box">
                                            <div class="form-check custom-form-check custom-form-check-2 position-relative">
                                                <label class="form-label ms-2" for="concern">New Password</label>
                                                <input name="password" class="form-control password_input" type="password" >
                                                <i class="toggle_password fa fa-eye"></i>
                                            </div>
                                            @error('password')
                                                <strong class="text-danger text-capitalize">{{$message}}</strong>
                                            @enderror
                                        </div>
                                        <div class="privacy-box">
                                            <div class="form-check custom-form-check custom-form-check-2 position-relative">
                                                <label class="form-label ms-2" for="concern">Conform Password</label>
                                                <input name="password_confirmation" class="form-control password_input" type="password" >
                                                <i class="toggle_password fa fa-eye"></i>
                                            </div>
                                            @error('password_confirmation')
                                                <strong class="text-danger text-capitalize">{{$message}}</strong>
                                            @enderror
                                        </div>

                                        <button class="btn theme-bg-color btn-md fw-bold mt-4 text-white" type="submit">Delete My
                                            Account</button>
                                        </form>
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
    <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.imagePreview').css('background-image', 'url(' + e.target.result + ')');
                        $('.imagePreview').hide();
                        $('.imagePreview').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imageUpload").change(function () {
                readURL(this);
            });
    </script>
@endpush
