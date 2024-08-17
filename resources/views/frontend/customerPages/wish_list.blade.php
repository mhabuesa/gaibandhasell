@extends('layouts.frontend')
@push('title')
<title>Wishlist - Gaibandhasell.com </title>
@endpush
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Wish List</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('index')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Wish List</li>
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
                                <div class="product-tab">
                                    <div class="title">
                                        <h2>Wish List</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="table-responsive dashboard-bg-box">
                                        <table class="table product-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Images</th>
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Stock</th>
                                                    <th scope="col">Sales</th>
                                                    <th scope="col">Edit / Delete</th>
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
                                                        <h6 class="theme-color fw-bold">$25.69</h6>
                                                    </td>
                                                    <td>
                                                        <h6>63</h6>
                                                    </td>
                                                    <td>
                                                        <h6>152</h6>
                                                    </td>
                                                    <td class="efit-delete">
                                                        <i data-feather="edit" class="edit"></i>
                                                        <i data-feather="trash-2" class="delete"></i>
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
                                                        <h6 class="theme-color fw-bold">$35.36</h6>
                                                    </td>
                                                    <td>
                                                        <h6>14</h6>
                                                    </td>
                                                    <td>
                                                        <h6>34</h6>
                                                    </td>
                                                    <td class="efit-delete">
                                                        <i data-feather="edit" class="edit"></i>
                                                        <i data-feather="trash-2" class="delete"></i>
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
                                                        <h6 class="theme-color fw-bold">$78.55</h6>
                                                    </td>
                                                    <td>
                                                        <h6>55</h6>
                                                    </td>
                                                    <td>
                                                        <h6>78</h6>
                                                    </td>
                                                    <td class="efit-delete">
                                                        <i data-feather="edit" class="edit"></i>
                                                        <i data-feather="trash-2" class="delete"></i>
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
                                                        <h6 class="theme-color fw-bold">$32.98</h6>
                                                    </td>
                                                    <td>
                                                        <h6>69</h6>
                                                    </td>
                                                    <td>
                                                        <h6>135</h6>
                                                    </td>
                                                    <td class="efit-delete">
                                                        <i data-feather="edit" class="edit"></i>
                                                        <i data-feather="trash-2" class="delete"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="product-image">
                                                        <img src="{{asset('frontend')}}/images/vegetable/product/5.png"
                                                            class="img-fluid" alt="">
                                                    </td>
                                                    <td>
                                                        <h6>Raw Mutton Leg, Packaging 5 Kg</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="theme-color fw-bold">$36.98</h6>
                                                    </td>
                                                    <td>
                                                        <h6>35</h6>
                                                    </td>
                                                    <td>
                                                        <h6>154</h6>
                                                    </td>
                                                    <td class="efit-delete">
                                                        <i data-feather="edit" class="edit"></i>
                                                        <i data-feather="trash-2" class="delete"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="product-image">
                                                        <img src="{{asset('frontend')}}/images/vegetable/product/6.png"
                                                            class="img-fluid" alt="">
                                                    </td>
                                                    <td>
                                                        <h6>Cold Brew Coffee Instant Coffee 50 g</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="theme-color fw-bold">$36.58</h6>
                                                    </td>
                                                    <td>
                                                        <h6>69</h6>
                                                    </td>
                                                    <td>
                                                        <h6>168</h6>
                                                    </td>
                                                    <td class="efit-delete">
                                                        <i data-feather="edit" class="edit"></i>
                                                        <i data-feather="trash-2" class="delete"></i>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="product-image">
                                                        <img src="{{asset('frontend')}}/images/vegetable/product/7.png"
                                                            class="img-fluid" alt="">
                                                    </td>
                                                    <td>
                                                        <h6>SnackAmor Combo Pack of Jowar Stick and Jowar Chips</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="theme-color fw-bold">$25.69</h6>
                                                    </td>
                                                    <td>
                                                        <h6>63</h6>
                                                    </td>
                                                    <td>
                                                        <h6>152</h6>
                                                    </td>
                                                    <td class="efit-delete">
                                                        <i data-feather="edit" class="edit"></i>
                                                        <i data-feather="trash-2" class="delete"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

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
