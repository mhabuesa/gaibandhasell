@php
    $contactInfo = App\Models\ContactInfoModel::find(1);
    $logo = App\Models\logoModel::find(1);
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('backend/logo/favicon.png') }}" type="image/x-icon"/>

    {{-- Title Container --}}
    @stack('title')

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap" rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/vendors/bootstrap.css">

    <!-- wow css -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/animate.min.css" />

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/vendors/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/vendors/feather-icon.css">

    <!-- Plugin CSS file with desired skin css -->
    <link rel="stylesheet" href="{{asset('frontend')}}/css/vendors/ion.rangeSlider.min.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/vendors/slick/slick-theme.css">

    <!-- animation css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/font-style.css">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/style.css">
    <link id="color-link" rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/custom.css">


    @stack('header')
</head>

<body class="theme-color-5 dark">

    <!-- Loader Start -->
    {{-- <div class="fullpage-loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div> --}}
    <!-- Loader End -->

    <!-- Header Start -->
    <header class="pb-md-4 pb-0">
        @if (App\Models\HeaderShortTextModel::where('status', '1')->count() >= 1)
        <div class="header-top">
            <div class="container-fluid-lg">
                <div class="row d-flex justify-content-center">
                    <div class="col-xxl-6 col-lg-9 d-lg-block d-none">
                        <div class="header-offer">
                            <div class="notification-slider">

                                @foreach (App\Models\HeaderShortTextModel::where('status', '1')->get() as $text )

                                <div>
                                    <div class="timer-notification">
                                        <h6>{{$text->text}}
                                            @if ($text->link)
                                            <a href="{{$text->link}}" class="text-white">Buy Now!</a>
                                            @endif
                                        </h6>
                                    </div>
                                </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="top-nav top-header sticky-header">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-12">
                        <div class="navbar-top">
                            <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                                <span class="navbar-toggler-icon">
                                    <i class="fa-solid fa-bars"></i>
                                </span>
                            </button>
                            <a href="{{route('index')}}" class="web-logo nav-logo">
                                <img src="{{asset('uploads')}}/logo/{{$logo->main_logo}}" class="img-fluid blur-up lazyload" alt="">
                            </a>

                            <div class="middle-box">
                                <div class="search-box">
                                    <div class="input-group">
                                        <input type="search" class="form-control" placeholder="I'm searching for..."
                                            aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button class="btn" type="button" id="button-addon2">
                                            <i data-feather="search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="rightside-box">
                                <div class="search-full">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i data-feather="search" class="font-light"></i>
                                        </span>
                                        <input type="text" class="form-control search-type" placeholder="Search here..">
                                        <span class="input-group-text close-search">
                                            <i data-feather="x" class="font-light"></i>
                                        </span>
                                    </div>
                                </div>
                                <ul class="right-side-menu">
                                    <li class="right-side">
                                        <div class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <div class="search-box">
                                                    <i data-feather="search"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="right-side">
                                        <a href="contact-us.html" class="delivery-login-box">
                                            <div class="delivery-icon">
                                                <i data-feather="phone-call"></i>
                                            </div>
                                            <div class="delivery-detail">
                                                <h6>24/7 Delivery</h6>
                                                <h5>{{$contactInfo->phone}}</h5>
                                            </div>
                                        </a>
                                    </li>
                                    @auth('customer')
                                    <li class="right-side">
                                        <a href="wishlist.html" class="btn p-0 position-relative header-wishlist">
                                            <i data-feather="heart"></i>
                                        </a>
                                    </li>
                                    <li class="right-side">
                                        <div class="onhover-dropdown header-badge">
                                            <button type="button" class="btn p-0 position-relative header-wishlist">
                                                <i data-feather="shopping-cart"></i>
                                                <span class="position-absolute top-0 start-100 translate-middle badge">{{ App\Models\CartModel::where('customer_id', Auth::guard('customer')->id())->count() }}
                                                    <span class="visually-hidden">unread messages</span>
                                                </span>
                                            </button>

                                            <div class="onhover-div">
                                                <ul class="cart-list">
                                                    @php
                                                    $sub = 0;
                                                    @endphp
                                                    @forelse (App\Models\CartModel::where('customer_id', Auth::guard('customer')->id())->get() as $cart)
                                                    <li class="product-box-contain">
                                                        <div class="drop-cart">
                                                            <a href="product-left-thumbnail.html" class="drop-image">
                                                                <img src="{{asset('uploads/product/preview')}}/{{ $cart->rel_to_product->preview }}"
                                                                    class="blur-up lazyload" alt="">
                                                            </a>

                                                            <div class="drop-contain">
                                                                <a href="product-left-thumbnail.html" title="{{ $cart->rel_to_product->product_name }}">
                                                                    <h5>{{ Str::substr($cart->rel_to_product->product_name, 0, 18).'..' }}</h5>
                                                                </a>
                                                                <h6><span>{{ $cart->quantity }} x</span> &#2547;{{ $cart->rel_to_product->after_discount }}</h6>
                                                                <button class="close-button close_button" onclick="location.href = '{{route('cart.delete',$cart->id)}}';">
                                                                    <i class="fa-solid fa-xmark"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    @php
                                                        $sub += $cart->rel_to_product->after_discount*$cart->quantity;
                                                    @endphp
                                                    @empty
                                                    <h4 class="text-center w-100">Your cart is Empty</h4>
                                                    @endforelse

                                                </ul>

                                                <div class="price-box">
                                                    <h5>Total :</h5>
                                                    <h4 class="theme-color fw-bold">&#2547;{{$sub}}</h4>
                                                </div>

                                                <div class="button-group">
                                                    <a href="{{route('cart')}}" class="btn btn-sm cart-button">View Cart</a>
                                                    <a href="{{route('checkout')}}" class="btn btn-sm cart-button theme-bg-color
                                                    text-white">Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="right-side">
                                        <div class="delivery-login-box auth_hover">
                                            <div class="delivery-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                            <div class="delivery-detail">
                                                <a href="{{route('customer.dashboard')}}"><h5>{{Auth::guard('customer')->user()->name}}</h5></a>
                                            </div>
                                        </div>
                                    </li>
                                    @else
                                    <li class="right-side">
                                        <a href="{{route('signin')}}">
                                        <div class="delivery-login-box auth_hover">
                                            <div class="delivery-icon">
                                                <i data-feather="user"></i>
                                            </div>
                                            <div class="delivery-detail">
                                                <h5>Login</h5>
                                            </div>
                                        </div>
                                        </a>
                                    </li>
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="header-nav">
                        <div class="header-nav-left">
                            <button class="dropdown-category">
                                <i data-feather="align-left"></i>
                                <span>All Categories</span>
                            </button>

                            <div class="category-dropdown">
                                <div class="category-title">
                                    <h5>Categories</h5>
                                    <button type="button" class="btn p-0 close-button text-content">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>

                                <ul class="category-list">
                                    @foreach (App\Models\CategoryModel::where('status', '1')->get() as $category )
                                    <li class="onhover-category-list">
                                        <a href="{{route('category',$category->slug)}}" class="category-name">
                                            <img src="{{asset('uploads')}}/category/{{$category->icon}}" alt="">
                                            <h6>{{$category->name}}</h6>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="header-nav-middle">
                            <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                                <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                    <div class="offcanvas-header navbar-shadow">
                                        <h5>Menu</h5>
                                        <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                        <ul class="navbar-nav">
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                    data-bs-toggle="dropdown">Home</a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="index.html">Kartshop</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index-2.html">Sweetshop</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index-3.html">Organic</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index-4.html">Supershop</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index-5.html">Classic shop</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index-6.html">Furniture</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index-7.html">Search Oriented</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index-8.html">Category Focus</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="index-9.html">Fashion</a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                    data-bs-toggle="dropdown">Shop</a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="shop-category-slider.html">Shop
                                                            Category Slider</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="shop-category.html">Shop
                                                            Category Sidebar</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="shop-banner.html">Shop Banner</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="shop-left-sidebar.html">Shop Left
                                                            Sidebar</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="shop-list.html">Shop List</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="shop-right-sidebar.html">Shop
                                                            Right Sidebar</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="shop-top-filter.html">Shop Top
                                                            Filter</a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                    data-bs-toggle="dropdown">Product</a>

                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="product-4-image.html">Product
                                                            4 Image</a>
                                                    </li>
                                                    <li class="sub-dropdown-hover">
                                                        <a href="javascript:void(0)" class="dropdown-item">Product
                                                            Thumbnail</a>
                                                        <ul class="sub-menu">
                                                            <li>
                                                                <a href="product-left-thumbnail.html">Left Thumbnail</a>
                                                            </li>

                                                            <li>
                                                                <a href="product-right-thumbnail.html">Right
                                                                    Thumbnail</a>
                                                            </li>

                                                            <li>
                                                                <a href="product-bottom-thumbnail.html">Bottom
                                                                    Thumbnail</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="product-bundle.html" class="dropdown-item">Product
                                                            Bundle</a>
                                                    </li>
                                                    <li>
                                                        <a href="product-slider.html" class="dropdown-item">Product
                                                            Slider</a>
                                                    </li>
                                                    <li>
                                                        <a href="product-sticky.html" class="dropdown-item">Product
                                                            Sticky</a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="nav-item dropdown dropdown-mega">
                                                <a class="nav-link dropdown-toggle ps-xl-2 ps-0"
                                                    href="javascript:void(0)" data-bs-toggle="dropdown">Mega Menu</a>

                                                <div class="dropdown-menu dropdown-menu-2">
                                                    <div class="row">
                                                        <div class="dropdown-column col-xl-3">
                                                            <h5 class="dropdown-header">Daily Vegetables</h5>
                                                            <a class="dropdown-item" href="shop-left-sidebar.html">Beans
                                                                & Brinjals</a>

                                                            <a class="dropdown-item"
                                                                href="shop-left-sidebar.html">Broccoli & Cauliflower</a>

                                                            <a href="shop-left-sidebar.html"
                                                                class="dropdown-item">Chilies, Garlic</a>

                                                            <a class="dropdown-item"
                                                                href="shop-left-sidebar.html">Vegetables & Salads</a>

                                                            <a class="dropdown-item"
                                                                href="shop-left-sidebar.html">Gourd, Cucumber</a>

                                                            <a class="dropdown-item" href="shop-left-sidebar.html">Herbs
                                                                & Sprouts</a>

                                                            <a href="demo-personal-portfolio.html"
                                                                class="dropdown-item">Lettuce & Leafy</a>
                                                        </div>

                                                        <div class="dropdown-column col-xl-3">
                                                            <h5 class="dropdown-header">Baby Tender</h5>
                                                            <a class="dropdown-item" href="shop-left-sidebar.html">Beans
                                                                & Brinjals</a>

                                                            <a class="dropdown-item"
                                                                href="shop-left-sidebar.html">Broccoli & Cauliflower</a>

                                                            <a class="dropdown-item"
                                                                href="shop-left-sidebar.html">Chilies, Garlic</a>

                                                            <a class="dropdown-item"
                                                                href="shop-left-sidebar.html">Vegetables & Salads</a>

                                                            <a class="dropdown-item"
                                                                href="shop-left-sidebar.html">Gourd, Cucumber</a>

                                                            <a class="dropdown-item"
                                                                href="shop-left-sidebar.html">Potatoes & Tomatoes</a>

                                                            <a href="shop-left-sidebar.html" class="dropdown-item">Peas
                                                                & Corn</a>
                                                        </div>

                                                        <div class="dropdown-column col-xl-3">
                                                            <h5 class="dropdown-header">Exotic Vegetables</h5>
                                                            <a class="dropdown-item"
                                                                href="shop-left-sidebar.html">Asparagus & Artichokes</a>

                                                            <a class="dropdown-item"
                                                                href="shop-left-sidebar.html">Avocados & Peppers</a>

                                                            <a class="dropdown-item"
                                                                href="shop-left-sidebar.html">Broccoli & Zucchini</a>

                                                            <a class="dropdown-item"
                                                                href="shop-left-sidebar.html">Celery, Fennel & Leeks</a>

                                                            <a class="dropdown-item"
                                                                href="shop-left-sidebar.html">Chilies & Lime</a>
                                                        </div>

                                                        <div class="dropdown-column dropdown-column-img col-3"></div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                    data-bs-toggle="dropdown">Blog</a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="blog-detail.html">Blog Detail</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="blog-grid.html">Blog Grid</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="blog-list.html">Blog List</a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="nav-item dropdown new-nav-item">
                                                <label class="new-dropdown">New</label>
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                    data-bs-toggle="dropdown">Pages</a>
                                                <ul class="dropdown-menu">
                                                    <li class="sub-dropdown-hover">
                                                        <a class="dropdown-item" href="javascript:void(0)">Email
                                                            Template <span class="new-text"><i
                                                                    class="fa-solid fa-bolt-lightning"></i></span></a>
                                                        <ul class="sub-menu">
                                                            <li>
                                                                <a
                                                                    href="https://themes.pixelstrap.com/fastkart/email-templete/abandonment-email.html">Abandonment</a>
                                                            </li>
                                                            <li>
                                                                <a href="https://themes.pixelstrap.com/fastkart/email-templete/offer-template.html">Offer
                                                                    Template</a>
                                                            </li>
                                                            <li>
                                                                <a href="https://themes.pixelstrap.com/fastkart/email-templete/order-success.html">Order
                                                                    Success</a>
                                                            </li>
                                                            <li>
                                                                <a href="https://themes.pixelstrap.com/fastkart/email-templete/reset-password.html">Reset
                                                                    Password</a>
                                                            </li>
                                                            <li>
                                                                <a href="https://themes.pixelstrap.com/fastkart/email-templete/welcome.html">Welcome
                                                                    template</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-dropdown-hover">
                                                        <a class="dropdown-item" href="javascript:void(0)">Invoice
                                                            Template <span class="new-text"><i
                                                                    class="fa-solid fa-bolt-lightning"></i></span></a>
                                                        <ul class="sub-menu">
                                                            <li>
                                                                <a href="https://themes.pixelstrap.com/fastkart/invoice/invoice-1.html">Invoice 1</a>
                                                            </li>

                                                            <li>
                                                                <a href="https://themes.pixelstrap.com/fastkart/invoice/invoice-2.html">Invoice 2</a>
                                                            </li>

                                                            <li>
                                                                <a href="https://themes.pixelstrap.com/fastkart/invoice/invoice-3.html">Invoice 3</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="404.html">404</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="about-us.html">About Us</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="cart.html">Cart</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="contact-us.html">Contact</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="checkout.html">Checkout</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="coming-soon.html">Coming Soon</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="compare.html">Compare</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="faq.html">Faq</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="order-success.html">Order
                                                            Success</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="order-tracking.html">Order
                                                            Tracking</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="otp.html">OTP</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="search.html">Search</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="user-dashboard.html">User
                                                            Dashboard</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="wishlist.html">Wishlist</a>
                                                    </li>
                                                </ul>
                                            </li>

                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                                    data-bs-toggle="dropdown">Seller</a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="seller-become.html">Become a
                                                            Seller</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="seller-dashboard.html">Seller
                                                            Dashboard</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="seller-detail.html">Seller
                                                            Detail</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="seller-detail-2.html">Seller
                                                            Detail 2</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="seller-grid.html">Seller Grid</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="seller-grid-2.html">Seller Grid
                                                            2</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="header-nav-right">
                            <button class="btn deal-button" data-bs-toggle="modal" data-bs-target="#deal-box">
                                <i data-feather="zap"></i>
                                <span>Deal Today</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- mobile fix menu start -->
    <div class="mobile-menu d-md-none d-block mobile-cart">
        <ul>
            <li class="active">
                <a href="index.html">
                    <i class="fa-solid fa-house fa-lg" style="color: #ffffff;"></i>
                    <span>Home</span>
                </a>
            </li>

            <li class="mobile-category">
                <a href="javascript:void(0)">
                    <i class="fa-solid fa-list fa-lg" style="color: #ffffff;"></i>
                    <span>Category</span>
                </a>
            </li>

            <li>
                <a href="search.html" class="search-box">
                    <i class="fa-solid fa-magnifying-glass fa-lg" style="color: #ffffff;"></i>
                    <span>Search</span>
                </a>
            </li>

            <li>
                <a href="wishlist.html" class="notifi-wishlist">
                    <i class="fa-solid fa-shield-heart fa-lg" style="color: #ffffff;"></i>
                    <span>My Wish</span>
                </a>
            </li>

            <li>
                <a href="cart.html">
                    <i class="fa-solid fa-cart-shopping fa-lg" style="color: #ffffff;"></i>
                    <span>Cart</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- mobile fix menu end -->




    {{-- Body Container Start --}}
        @yield('content')
    {{-- Body Container End --}}


    <!-- Footer Start -->
    <footer class="section-t-space footer-section-2 footer-color-2">
        <div class="container-fluid-lg">
            <div class="main-footer">
                <div class="row g-md-4 gy-sm-5">
                    <div class="col-xxl-3 col-xl-4 col-sm-6">
                        <a href="index.html" class="foot-logo theme-logo">
                            <img src="{{asset('uploads')}}/logo/{{$logo->footer_logo}}" class="img-fluid blur-up lazyload" alt="">
                        </a>
                        <p class="information-text information-text-2">{{$contactInfo->about_us}}</p>
                        <ul class="social-icon">

                            @if ($contactInfo->facebook)
                            <li class="light-bg">
                                <a href="{{$contactInfo->facebook}}" class="footer-link-color">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </li>
                            @endif

                            @if ($contactInfo->twitter)
                            <li class="light-bg">
                                <a href="{{$contactInfo->twitter}}" class="footer-link-color">
                                    <i class="fab fa-twitter"></i>
                                </a>
                            </li>
                            @endif

                            @if ($contactInfo->instagram)
                            <li class="light-bg">
                                <a href="{{$contactInfo->instagram}}" class="footer-link-color">
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                            @endif

                            @if ($contactInfo->linkedin)
                            <li class="light-bg">
                                <a href="{{$contactInfo->linkedin}}" class="footer-link-color">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>

                    <div class="col-xxl-2 col-xl-4 col-sm-6">
                        <div class="footer-title">
                            <h4 class="text-white">About Fastkart</h4>
                        </div>
                        <ul class="footer-list footer-contact footer-list-light">
                            <li>
                                <a href="about-us.html" class="light-text">About Us</a>
                            </li>
                            <li>
                                <a href="contact-us.html" class="light-text">Contact Us</a>
                            </li>
                            <li>
                                <a href="term_condition.html" class="light-text">Terms & Coditions</a>
                            </li>
                            <li>
                                <a href="careers.html" class="light-text">Careers</a>
                            </li>
                            <li>
                                <a href="blog-list.html" class="light-text">Latest Blog</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-xxl-2 col-xl-4 col-sm-6">
                        <div class="footer-title">
                            <h4 class="text-white">Useful Link</h4>
                        </div>
                        <ul class="footer-list footer-list-light footer-contact">
                            <li>
                                <a href="order-success.html" class="light-text">Your Order</a>
                            </li>
                            <li>
                                <a href="user-dashboard.html" class="light-text">Your Account</a>
                            </li>
                            <li>
                                <a href="order-tracking.html" class="light-text">Track Orders</a>
                            </li>
                            <li>
                                <a href="wishlist.html" class="light-text">Your Wishlist</a>
                            </li>
                            <li>
                                <a href="faq.html" class="light-text">FAQs</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-xxl-2 col-xl-4 col-sm-6">
                        <div class="footer-title">
                            <h4 class="text-white">Categories</h4>
                        </div>
                        <ul class="footer-list footer-list-light footer-contact">
                            <li>
                                <a href="vegetables-demo.html" class="light-text">Fresh Vegetables</a>
                            </li>
                            <li>
                                <a href="spice-demo.html" class="light-text">Hot Spice</a>
                            </li>
                            <li>
                                <a href="bags-demo.html" class="light-text">Brand New Bags</a>
                            </li>
                            <li>
                                <a href="bakery-demo.html" class="light-text">New Bakery</a>
                            </li>
                            <li>
                                <a href="grocery-demo.html" class="light-text">New Grocery</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-xxl-3 col-xl-4 col-sm-6">
                        <div class="footer-title">
                            <h4 class="text-white">Contact infomation</h4>
                        </div>
                        <ul class="footer-address footer-contact">
                            <li>
                                <a href="javascript:void(0)" class="light-text">
                                    <div class="inform-box flex-start-box">
                                        <i data-feather="map-pin"></i>
                                        <p>{{$contactInfo->address}}</p>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)" class="light-text">
                                    <div class="inform-box">
                                        <i data-feather="phone"></i>
                                        <p>Call us: {{$contactInfo->phone}}</p>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0)" class="light-text">
                                    <div class="inform-box">
                                        <i data-feather="mail"></i>
                                        <p>Email Us: {{$contactInfo->email}}</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="sub-footer sub-footer-lite section-b-space section-t-space">
                <div class="left-footer">
                    <p class="light-text">2022 Copyright By Themeforest Powered By Pixelstrap</p>
                </div>

                <ul class="payment-box">
                    <li>
                        <img src="{{asset('frontend')}}/images/icon/paymant/visa.png" class="blur-up lazyload" alt="">
                    </li>
                    <li>
                        <img src="{{asset('frontend')}}/images/icon/paymant/discover.png" alt="" class="blur-up lazyload">
                    </li>
                    <li>
                        <img src="{{asset('frontend')}}/images/icon/paymant/american.png" alt="" class="blur-up lazyload">
                    </li>
                    <li>
                        <img src="{{asset('frontend')}}/images/icon/paymant/master-card.png" alt="" class="blur-up lazyload">
                    </li>
                    <li>
                        <img src="{{asset('frontend')}}/images/icon/paymant/giro-pay.png" alt="" class="blur-up lazyload">
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- Footer End -->



    <!-- Cookie Bar Box Start -->
    {{-- <div class="cookie-bar-box">
        <div class="cookie-box">
            <div class="cookie-image">
                <img src="{{asset('frontend')}}/images/cookie-bar.png" class="blur-up lazyload" alt="">
                <h2>Cookies!</h2>
            </div>

            <div class="cookie-contain">
                <h5 class="text-content">We use cookies to make your experience better</h5>
            </div>
        </div>

        <div class="button-group">
            <button class="btn privacy-button">Privacy Policy</button>
            <button class="btn ok-button">OK</button>
        </div>
    </div> --}}
    <!-- Cookie Bar Box End -->


    <!-- Tap to top start -->
    <div class="theme-option">
        <div class="back-to-top">
            <a id="back-to-top" href="#">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>
    </div>
    <!-- Tap to top end -->

    <!-- Deal Box Modal Start -->
    <div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <div>
                        <h5 class="modal-title w-100" id="deal_today">Deal Today</h5>
                        <p class="mt-1 text-content">Recommended deals for you.</p>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="deal-offer-box">
                        <ul class="deal-offer-list">
                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="../assets/images/vegetable/product/10.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-2">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="../assets/images/vegetable/product/11.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-3">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="../assets/images/vegetable/product/12.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>

                            <li class="list-1">
                                <div class="deal-offer-contain">
                                    <a href="shop-left-sidebar.html" class="deal-image">
                                        <img src="../assets/images/vegetable/product/13.png" class="blur-up lazyload"
                                            alt="">
                                    </a>

                                    <a href="shop-left-sidebar.html" class="deal-contain">
                                        <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                        <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Deal Box Modal End -->

    <!-- Bg overlay Start -->
    <div class="bg-overlay"></div>
    <!-- Bg overlay End -->

    <!-- latest jquery-->
    <script src="{{asset('frontend')}}/js/jquery-3.6.0.min.js"></script>

    <!-- jquery ui-->
    <script src="{{asset('frontend')}}/js/jquery-ui.min.js"></script>

    <!-- Lordicon Js -->
    <script src="{{asset('frontend')}}/js/lusqsztk.js"></script>

    <!-- Bootstrap js-->
    <script src="{{asset('frontend')}}/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend')}}/js/bootstrap/bootstrap-notify.min.js"></script>
    <script src="{{asset('frontend')}}/js/bootstrap/popper.min.js"></script>

    <!-- feather icon js-->
    <script src="{{asset('frontend')}}/js/feather/feather.min.js"></script>
    <script src="{{asset('frontend')}}/js/feather/feather-icon.js"></script>

    <!-- LazyLoad Js -->
    <script src="{{asset('frontend')}}/js/lazysizes.min.js"></script>

    <!-- Slick js-->
    <script src="{{asset('frontend')}}/js/slick/slick.js"></script>
    <script src="{{asset('frontend')}}/js/slick/slick-animation.min.js"></script>
    <script src="{{asset('frontend')}}/js/custom-slick-animated.js"></script>
    <script src="{{asset('frontend')}}/js/slick/custom_slick.js"></script>

    <!-- Range slider js -->
    <script src="{{asset('frontend')}}/js/ion.rangeSlider.min.js"></script>

    <!-- Auto Height Js -->
    <script src="{{asset('frontend')}}/js/auto-height.js"></script>

    <!-- Quantity js -->
    <script src="{{asset('frontend')}}/js/quantity-2.js"></script>

    <!-- Fly Cart Js -->
    <script src="{{asset('frontend')}}/js/fly-cart.js"></script>

    <!-- Timer Js -->
    <script src="{{asset('frontend')}}/js/timer1.js"></script>
    <script src="{{asset('frontend')}}/js/timer2.js"></script>

     <!-- Sticky-bar js -->
     <script src="{{asset('frontend')}}/js/sticky-cart-bottom.js"></script>

    <!-- Copy clipboard Js -->
    <script src="{{asset('frontend')}}/js/clipboard.min.js"></script>
    <script src="{{asset('frontend')}}/js/copy-clipboard.js"></script>

    <!-- WOW js -->
    <script src="{{asset('frontend')}}/js/wow.min.js"></script>
    <script src="{{asset('frontend')}}/js/custom-wow.js"></script>

    <!-- script js -->
    <script src="{{asset('frontend')}}/js/script.js"></script>

    <!-- theme setting js -->
    <script src="{{asset('frontend')}}/js/theme-setting.js"></script>

      {{-- Sweet Alart --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
</body>
</html>
