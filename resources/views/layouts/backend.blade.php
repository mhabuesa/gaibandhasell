@php
    $url = $_SERVER['REQUEST_URI'];
    $explode = explode('/', $url);
    $title = $explode[1];
    $page_title = ucwords($explode[1]);
@endphp
<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="{{asset('backend')}}/" data-template="vertical-menu-template">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    {{-- Title --}}
    @stack('title')
    {{-- Title End --}}

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('backend/logo/favicon.png') }}" />

    <!-- Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap"
        rel="stylesheet">

    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css">

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/fonts/tabler-icons.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/css/rtl/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/css/demo.css" />
	<link rel="stylesheet" href="{{asset('backend')}}/css/custom.css">


    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet"
        href="{{ asset('backend') }}/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet"
        href="{{ asset('backend') }}/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/quill/katex.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/quill/editor.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/libs/select2/select2.css" />

    <link rel="stylesheet" href="{{ asset('backend') }}/richtexteditor/rte_theme_default.css" />


    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/css/pages/cards-advance.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/css/pages/app-email.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/css/pages/page-account-settings.css" />
    <link rel="stylesheet" href="{{ asset('backend') }}/vendor/css/pages/page-profile.css" />

    <!-- Helpers -->
    <script src="{{ asset('backend') }}/vendor/js/helpers.js"></script>
    <script src="{{ asset('backend') }}/js/config.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />

    {{-- SummerNote --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    {{-- toggle --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.1.1/css/bootstrap5-toggle.min.css" rel="stylesheet">

    @stack('header')

</head>

<body>
  <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
  <div class="layout-container">
<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


    <div class="app-brand demo">
        <a href="{{route('dashboard')}}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('backend/logo/logo.png') }}" alt="logo" />
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item {{$title == 'dashboard'?'active':''}}">
        <a href="{{route('dashboard')}}" class="menu-link">
            <i class="menu-icon tf-icons ti ti-align-box-bottom-center"></i>
          <div data-i18n="Dashboard">Dashboard</div>
        </a>
    </li>

      <!-- Order -->
    <li class="menu-item
        {{$url == '/add_storea'?'open':''}}
        {{$title == 'store_edita'?'open':''}}
    ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="fa-solid fa-chart-simple fa-lg me-2"></i>
        <div data-i18n="Orders">Orders</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item {{$title == 'orders'?'active':''}}">
            <a href="{{route('add.store')}}" class="menu-link">
            <div data-i18n="All Orders">All Orders</div>
            </a>
        </li>

      </ul>
    </li>

      <!-- Product -->
    <li class="menu-item
        {{$url == '/addProduct'?'open':''}}
        {{$url == '/allProduct'?'open':''}}
        {{$title == 'editProduct'?'open':''}}
        {{$title == 'inventory'?'open':''}}
        {{$url == '/categories'?'open':''}}
        {{$title == 'category_edit'?'open':''}}
        {{$url == '/brands'?'open':''}}
        {{$title == 'brand_edit'?'open':''}}
        {{$title == 'attributes'?'open':''}}
    ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="fa-solid fa-cart-plus fa-lg me-2"></i>
        <div data-i18n="Product">Product</div>
      </a>

      <ul class="menu-sub">

        <li class="menu-item
        {{$title == 'addProduct'?'active':''}}
        ">
            <a href="{{route('add.product')}}" class="menu-link">
            <div data-i18n="Add Product">Add Product</div>
            </a>
        </li>

        <li class="menu-item
        {{$title == 'allProduct'?'active':''}}
        {{$title == 'editProduct'?'active':''}}
        {{$title == 'inventory'?'active':''}}
        ">
            <a href="{{route('all.product')}}" class="menu-link">
            <div data-i18n="All Product">All Product</div>
            </a>
        </li>

        <li class="menu-item
        {{$title == 'categories'?'active':''}}
        {{$title == 'category_edit'?'active':''}}
        ">
            <a href="{{route('categories')}}" class="menu-link">
            <div data-i18n="Category">Category</div>
            </a>
        </li>

        <li class="menu-item
        {{$url == '/brands'?'active':''}}
        {{$title == 'brand_edit'?'active':''}}
        ">
          <a href="{{route('brands')}}" class="menu-link">
            <div data-i18n="Brands">Brands</div>
          </a>
        </li>

        <li class="menu-item
        {{$url == '/attributes'?'active':''}}
        ">
          <a href="{{route('attributes')}}" class="menu-link">
            <div data-i18n="Attributes">Attribute</div>
          </a>
        </li>

      </ul>
    </li>

    <!-- Store -->
    <li class="menu-item
        {{$url == '/add_store'?'open':''}}
        {{$url == '/stores'?'open':''}}
        {{$title == 'store_edit'?'open':''}}
        {{$title == 'store_details'?'open':''}}
    ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="fa-solid fa-store fa-lg me-2"></i>
        <div data-i18n="Stores">Stores</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item {{$title == 'add_store'?'active':''}}">
            <a href="{{route('add.store')}}" class="menu-link">
            <div data-i18n="Add Store">Add Store</div>
            </a>
        </li>

        <li class="menu-item
        {{$url == '/stores'?'active':''}}
        {{$title == 'store_edit'?'active':''}}
        {{$title == 'store_details'?'active':''}}
        ">
          <a href="{{route('stores')}}" class="menu-link">
            <div data-i18n="Store List">Store List</div>
          </a>
        </li>

      </ul>
    </li>

    <!-- Sellers -->
    <li class="menu-item{{$url == '/sellers'?'open':''}}
    {{$title == 'seller_edit'?'open':''}}
    {{$title == 'payoutsList'?'open':''}}
    {{$title == 'payoutRequest'?'open':''}}
    {{$title == 'rejectedPayout'?'open':''}}
        {{$title == 'payoutReject'?'open':''}}">
      <a href="javascript:void(0);" class="menu-link menu-toggle bg-warning">
        <i class="fa-sharp fa-bags-shopping fa-lg me-2"></i>
        <div data-i18n="Sellers">Sellers</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item
        {{$title == 'sellers'?'active':''}}
        {{$title == 'seller_edit'?'active':''}}
        ">
            <a href="{{route('sellers')}}" class="menu-link">
            <div data-i18n="All Sellers">All Sellers</div>
            </a>
        </li>

        <li class="menu-item
        {{$title == 'payoutsList'?'active':''}}
        ">
            <a href="{{route('payouts.list')}}" class="menu-link">
            <div data-i18n="Payouts">Payouts</div>
            </a>
        </li>

        <li class="menu-item
        {{$title == 'payoutRequest'?'active':''}}
        {{$title == 'payoutReject'?'active':''}}
        ">
            <a href="{{route('payout.request')}}" class="menu-link">
            <div data-i18n="Payout Request">Payout Request</div>
            </a>
        </li>

        <li class="menu-item
        {{$title == 'rejectedPayout'?'active':''}}
        ">
            <a href="{{route('rejected.payout')}}" class="menu-link">
            <div data-i18n="Rejected Payouts">Rejected Payouts</div>
            </a>
        </li>
      </ul>
    </li>











    <!-- Frontend Customize -->
    <li class="menu-item">
        <a href="{{route('shortText')}}" class="menu-link
        {{$title == 'shortText'?'front_bg':''}}
        {{$title == 'logo'?'front_bg':''}}
        {{$title == 'contactInfo'?'front_bg':''}}
        {{$title == 'banner'?'front_bg':''}}
        ">
            <i class="fa-sharp fa-globe-pointer me-2"></i>
          <div data-i18n="Frontend Customize">Frontend Customize</div>
        </a>
    </li>
    <!-- System -->
    <li class="menu-item
        {{$url == '/users'?'open':''}}
        {{$url == '/add_user'?'open':''}}
        {{$title == 'user_edit'?'open':''}}

    ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="fa-duotone fa-gear fa-lg me-2"></i>
        <div data-i18n="System">System</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item
        {{$title == 'users'?'active':''}}
        {{$title == 'add_user'?'active':''}}
        {{$title == 'user_edit'?'active':''}}
        ">
            <a href="{{route('users')}}" class="menu-link">
            <div data-i18n="Users">Users</div>
            </a>
        </li>

      </ul>
    </li>
  </ul>
</aside>
<!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">

        <!-- Top Navbar Start -->
        <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="ti ti-menu-2 ti-sm"></i>
                </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <ul class="navbar-nav flex-row align-items-center ms-auto">


                    <!-- Message -->
                    <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">

                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                        data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                        <i class="ti ti-mail ti-md"></i>
                        <span class="badge bg-danger rounded-pill badge-notifications">12</span>
                    </a>

                        <ul class="dropdown-menu dropdown-menu-end py-0">
                            <li class="dropdown-menu-header border-bottom">
                                <div class="dropdown-header d-flex align-items-center py-3">
                                    <h5 class="text-body mb-0 me-auto">Messages</h5>

                                </div>
                            </li>
                            <li class="dropdown-notifications-list scrollable-container">
                                <ul class="list-group list-group-flush">



                                    <a href="" class="d-flex">
                                        <li
                                            class="list-group-item list-group-item-action dropdown-notifications-item">
                                            <div class="d-flex">
                                                <div class="flex-grow-1 mx-4">
                                                    <h6 class="mb-1">Name</h6>
                                                    <p class="mb-0">subject</p>
                                                    <small class="text-muted">diffForHumans ()</small>
                                                </div>
                                            </div>
                                        </li>
                                    </a>
                                    <li
                                        class="list-group-item list-group-item-action dropdown-notifications-item">
                                        <span>No new message found!</span>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-menu-footer border-top">
                                <a href=""
                                    class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                                    View all Messages
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--/ Message -->

                    <!-- User -->
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                            data-bs-toggle="dropdown">
                            <div class="avatar">
                                @if (Auth::user()->photo == null)
                                    <img src="{{ asset('backend') }}/img/avatars/9.png" alt="profile photo" class="h-auto rounded-circle">
                                @else
                                    <img src="{{ asset('uploads') }}/profile/{{Auth::user()->photo}}" alt class="h-auto rounded-circle">
                                @endif
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="{{route('profile')}}">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar">
                                                @if (Auth::user()->photo == null)
                                                <img src="{{ asset('backend') }}/img/avatars/9.png" alt="profile photo" class="h-auto rounded-circle">
                                            @else
                                                <img src="{{ asset('uploads') }}/profile/{{Auth::user()->photo}}" alt class="h-auto rounded-circle">
                                            @endif
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <span class="fw-medium d-block">{{ Auth::user()->name }}</span>
                                            <small
                                                class="text-muted text-capitalize">{{ Auth::user()->role }}</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('profile')}}">
                                    <i class="ti ti-user-check me-2 ti-sm"></i>
                                    <span class="align-middle">My Profile</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="">
                                    <i class="ti ti-settings me-2 ti-sm"></i>
                                    <span class="align-middle">Settings</span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}" target="_blank"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        <i class="ti ti-logout me-2 ti-sm"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </form>
                            </li>

                        </ul>
                    </li>
                    <!--/ User -->

                </ul>
            </div>

        </nav>
        <!-- Top Navbar End -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
                <!-- Content -->
                @yield('content')
                <!-- / Content -->
            </div>

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
                <hr>
                <div class="container-xxl">
                    <div class="footer-container text-center py-2">
                        <div>
                            &copy; GAIBANDHA SELL</a>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->
  <!-- JS -->
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
  <script src="{{asset('backend')}}/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="{{asset('backend')}}/vendor/libs/swiper/swiper.js"></script>

  <!-- Main JS -->
  <script src="{{asset('backend')}}/js/main.js"></script>

  <!-- Page JS -->
  <script src="{{asset('backend')}}/js/dashboards-analytics.js"></script>

  {{-- Sweet Alart --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  /* Data Table */

  <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
  <script>
        new DataTable('#example', {
        layout: {
            bottomEnd: {
                paging: {
                    boundaryNumbers: false
                }
            }
        }
        });
    </script>
        <script
        src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
        integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
        ></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap5-toggle@5.1.1/js/bootstrap5-toggle.ecmas.min.js"></script>

  @stack('script')

    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: "bottom-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: false,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
            });
            Toast.fire({
            icon: "success",
            title: "{{session('success')}}"
            });
        </script>
    @endif
    @if (session('delete'))
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: "bottom-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
            });
            Toast.fire({
            icon: "success",
            title: "{{session('delete')}}"
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            const Toast = Swal.mixin({
            toast: true,
            position: "bottom-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: false,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
            });
            Toast.fire({
            icon: "error",
            title: "{{session('error')}}"
            });
        </script>
    @endif
</body>
</html>



