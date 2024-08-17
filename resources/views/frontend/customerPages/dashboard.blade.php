@extends('layouts.frontend')
@push('title')
<title>Profile - Gaibandhasell.com </title>
@endpush
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>User Dashboard</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('index')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">User Dashboard</li>
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


                            <div class="tab-pane fade show active" role="tabpanel"
                                aria-labelledby="pills-dashboard-tab">
                                <div class="dashboard-home">
                                    <div class="title">
                                        <h2>My Dashboard</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="dashboard-user-name">
                                        <h6 class="text-content">Hello, <b class="text-title">{{Auth::guard('customer')->user()->name}}</b></h6>
                                        <p class="text-content">From your My Account Dashboard you have the ability to
                                            view a snapshot of your recent account activity and update your account
                                            information. Select a link below to view or edit information.</p>
                                    </div>

                                    <div class="total-box">
                                        <div class="row g-sm-4 g-3">
                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/order.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/order.svg" class="blur-up lazyload"
                                                        alt="">
                                                    <div class="totle-detail">
                                                        <h5>Total Products</h5>
                                                        <h3>25</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/pending.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/pending.svg" class="blur-up lazyload"
                                                        alt="">
                                                    <div class="totle-detail">
                                                        <h5>Total Sales</h5>
                                                        <h3>12550</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                                <div class="totle-contain">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/wishlist.svg"
                                                        class="img-1 blur-up lazyload" alt="">
                                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/svg/wishlist.svg"
                                                        class="blur-up lazyload" alt="">
                                                    <div class="totle-detail">
                                                        <h5>Order Pending</h5>
                                                        <h3>36</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-4">
                                        <div class="col-xxl-6">
                                            <div class="dashboard-bg-box">
                                                <div id="chart"></div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6">
                                            <div class="dashboard-bg-box">
                                                <div id="sale"></div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6">
                                            <div class="table-responsive dashboard-bg-box">
                                                <div class="dashboard-title mb-4">
                                                    <h3>Trending Products</h3>
                                                </div>

                                                <table class="table product-table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Images</th>
                                                            <th scope="col">Product Name</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Sales</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="product-image">
                                                                <img src="{{asset('frontend')}}/images/vegetable/product/1.png"
                                                                    class="img-fluid" alt="">
                                                            </td>
                                                            <td>
                                                                <h6>Fantasy Crunchy Choco Chip Cookies</h6>
                                                            </td>
                                                            <td>
                                                                <h6>$25.69</h6>
                                                            </td>
                                                            <td>
                                                                <h6>152</h6>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="product-image">
                                                                <img src="{{asset('frontend')}}/images/vegetable/product/2.png"
                                                                    class="img-fluid" alt="">
                                                            </td>
                                                            <td>
                                                                <h6>Peanut Butter Bite Premium Butter Cookies 600 g</h6>
                                                            </td>
                                                            <td>
                                                                <h6>$35.36</h6>
                                                            </td>
                                                            <td>
                                                                <h6>34</h6>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="product-image">
                                                                <img src="{{asset('frontend')}}/images/vegetable/product/3.png"
                                                                    class="img-fluid" alt="">
                                                            </td>
                                                            <td>
                                                                <h6>Yumitos Chilli Sprinkled Potato Chips 100 g</h6>
                                                            </td>
                                                            <td>
                                                                <h6>$78.55</h6>
                                                            </td>
                                                            <td>
                                                                <h6>78</h6>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td class="product-image">
                                                                <img src="{{asset('frontend')}}/images/vegetable/product/4.png"
                                                                    class="img-fluid" alt="">
                                                            </td>
                                                            <td>
                                                                <h6>healthy Long Life Toned Milk 1 L</h6>
                                                            </td>
                                                            <td>
                                                                <h6>$32.98</h6>
                                                            </td>
                                                            <td>
                                                                <h6>135</h6>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6">
                                            <div class="order-tab dashboard-bg-box">
                                                <div class="dashboard-title mb-4">
                                                    <h3>Recent Order</h3>
                                                </div>

                                                <div class="table-responsive">
                                                    <table class="table order-table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Order ID</th>
                                                                <th scope="col">Product Name</th>
                                                                <th scope="col">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="product-image">#254834</td>
                                                                <td>
                                                                    <h6>Choco Chip Cookies</h6>
                                                                </td>
                                                                <td>
                                                                    <label class="success">Shipped</label>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="product-image">#355678</td>
                                                                <td>
                                                                    <h6>Premium Butter Cookies</h6>
                                                                </td>
                                                                <td>
                                                                    <label class="danger">Pending</label>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="product-image">#647536</td>
                                                                <td>
                                                                    <h6>Sprinkled Potato Chips</h6>
                                                                </td>
                                                                <td>
                                                                    <label class="success">Shipped</label>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="product-image">#125689</td>
                                                                <td>
                                                                    <h6>Milk 1 L</h6>
                                                                </td>
                                                                <td>
                                                                    <label class="danger">Pending</label>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="product-image">#215487</td>
                                                                <td>
                                                                    <h6>Raw Mutton Leg</h6>
                                                                </td>
                                                                <td>
                                                                    <label class="danger">Pending</label>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="product-image">#365474</td>
                                                                <td>
                                                                    <h6>Instant Coffee</h6>
                                                                </td>
                                                                <td>
                                                                    <label class="success">Shipped</label>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="product-image">#368415</td>
                                                                <td>
                                                                    <h6>Jowar Stick and Jowar Chips</h6>
                                                                </td>
                                                                <td>
                                                                    <label class="danger">Pending</label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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
