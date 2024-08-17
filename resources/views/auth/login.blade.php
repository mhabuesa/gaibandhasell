<!DOCTYPE html>
<html lang="en" class="light-style layout-wide  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="{{asset('backend')}}/" data-template="vertical-menu-template">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>LOGIN | GaibandhaSell </title>


    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://cinenest.vip">


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('backend/logo/favicon.png')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/fonts/tabler-icons.css"/>
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('backend')}}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
<link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/%40form-validation/umd/styles/index.min.css" />

    <!-- Page CSS -->
    <!-- Page -->
<link rel="stylesheet" href="{{asset('backend')}}/vendor/css/pages/page-auth.css">

    <!-- Helpers -->
    <script src="{{asset('backend')}}/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{asset('backend')}}/vendor/js/template-customizer.js"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('backend')}}/js/config.js"></script>

</head>

<body style="background: #323132; color:aliceblue !importent">


  <!-- Content -->

<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">
      <!-- Login -->
      <div class="card" style="background-color: #a3a3a3;">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center mb-4 mt-2">
            <img src="{{asset('backend')}}/logo/favicon.png" width="120" alt="">
          </div>
          <!-- /Logo -->
          <h4 class="mb-1 pt-2">Welcome to Gaibandha Sell!</h4>
            <form action="{{route('login')}}" method="POST" id="formAuthentication"  class="mb-3">
                @csrf


                <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email or username" autofocus>
                    @error('email')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>
                    </div>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control" name="password" placeholder="password" aria-describedby="password" />
                        <span class="input-group-text cursor-pointer" style="background-color: beige;"><i class="ti ti-eye-off"></i></span>
                    </div>
                    @error('password')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
          </form>

        </div>
      </div>
      <!-- /Login -->
    </div>
  </div>
</div>

<!-- / Content -->





  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->

  <script src="{{asset('backend')}}/vendor/libs/jquery/jquery.js"></script>
  <script src="{{asset('backend')}}/vendor/libs/popper/popper.js"></script>
  <script src="{{asset('backend')}}/vendor/js/bootstrap.js"></script>
  <script src="{{asset('backend')}}/vendor/libs/node-waves/node-waves.js"></script>
  <script src="{{asset('backend')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="{{asset('backend')}}/vendor/libs/hammer/hammer.js"></script>
  <script src="{{asset('backend')}}/vendor/libs/i18n/i18n.js"></script>
  <script src="{{asset('backend')}}/vendor/libs/typeahead-js/typeahead.js"></script>
   <script src="{{asset('backend')}}/vendor/js/menu.js"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="{{asset('backend')}}/vendor/libs/%40form-validation/umd/bundle/popular.min.js"></script>
<script src="{{asset('backend')}}/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js"></script>
<script src="{{asset('backend')}}/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js"></script>

  <!-- Main JS -->
  <script src="{{asset('backend')}}/js/main.js"></script>


  <!-- Page JS -->
  <script src="{{asset('backend')}}/js/pages-auth.js"></script>

</body>
</html>
