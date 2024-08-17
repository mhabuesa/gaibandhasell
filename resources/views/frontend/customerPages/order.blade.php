@extends('layouts.frontend')
@push('title')
<title>Orders - Gaibandhasell.com </title>
@endpush
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>All Order</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('index')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">All Order</li>
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
                                <div class="dashboard-order">
                                    <div class="title">
                                        <h2>All Order</h2>
                                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="order-tab dashboard-bg-box">
                                        <div class="table-responsive">
                                            <table class="table order-table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Order ID</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="product-image">#254834</td>
                                                        <td>
                                                            <h6>Fantasy Crunchy Choco Chip Cookies</h6>
                                                        </td>
                                                        <td>
                                                            <label class="success">Shipped</label>
                                                        </td>
                                                        <td>
                                                            <h6>$25.69</h6>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="product-image">#355678</td>
                                                        <td>
                                                            <h6>Peanut Butter Bite Premium Butter Cookies 600 g</h6>
                                                        </td>
                                                        <td>
                                                            <label class="danger">Pending</label>
                                                        </td>
                                                        <td>
                                                            <h6>$25.69</h6>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="product-image">#647536</td>
                                                        <td>
                                                            <h6>Yumitos Chilli Sprinkled Potato Chips 100 g</h6>
                                                        </td>
                                                        <td>
                                                            <label class="success">Shipped</label>
                                                        </td>
                                                        <td>
                                                            <h6>$25.69</h6>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="product-image">#125689</td>
                                                        <td>
                                                            <h6>healthy Long Life Toned Milk 1 L</h6>
                                                        </td>
                                                        <td>
                                                            <label class="danger">Pending</label>
                                                        </td>
                                                        <td>
                                                            <h6>$25.69</h6>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="product-image">#215487</td>
                                                        <td>
                                                            <h6>Raw Mutton Leg, Packaging 5 Kg</h6>
                                                        </td>
                                                        <td>
                                                            <label class="danger">Pending</label>
                                                        </td>
                                                        <td>
                                                            <h6>$25.69</h6>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="product-image">#365474</td>
                                                        <td>
                                                            <h6>Cold Brew Coffee Instant Coffee 50 g</h6>
                                                        </td>
                                                        <td>
                                                            <label class="success">Shipped</label>
                                                        </td>
                                                        <td>
                                                            <h6>$25.69</h6>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="product-image">#368415</td>
                                                        <td>
                                                            <h6>SnackAmor Combo Pack of Jowar Stick and Jowar Chips</h6>
                                                        </td>
                                                        <td>
                                                            <label class="danger">Pending</label>
                                                        </td>
                                                        <td>
                                                            <h6>$25.69</h6>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <nav class="custome-pagination">
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="javascript:void(0)" tabindex="-1">
                                                        <i class="fa-solid fa-angles-left"></i>
                                                    </a>
                                                </li>
                                                <li class="page-item active">
                                                    <a class="page-link" href="javascript:void(0)">1</a>
                                                </li>
                                                <li class="page-item" aria-current="page">
                                                    <a class="page-link" href="javascript:void(0)">2</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="javascript:void(0)">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="javascript:void(0)">
                                                        <i class="fa-solid fa-angles-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
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
