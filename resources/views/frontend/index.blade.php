@extends('layouts.frontend')
@push('title')
<title>Home - Gaibandhasell.com </title>
@endpush
@section('content')
<!-- Home Section Start -->
<section class="home-section-2 home-section-bg pt-0 overflow-hidden">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="slider-animate">

                    @foreach ($banners as $banner )
                    <div>
                        <div class="home-contain rounded-0 p-0">
                            <img src="{{asset('uploads')}}/banner/{{$banner->image}}"
                                class="img-fluid bg-img blur-up lazyload" alt="">
                            <div class="home-detail home-big-space p-center-left home-overlay position-relative">
                                <div class="container-fluid-lg">
                                    <div>
                                        <h6 class="ls-expanded theme-color text-uppercase">{{$banner->sub_title}}
                                        </h6>
                                        <h1 class="heding-2">{{$banner->title}}</h1>
                                        <h2 class="content-2">{{$banner->text}}</h2>
                                        <h5 class="text-content">{{$banner->sub_text}}
                                        </h5>
                                        <button
                                            class="btn theme-bg-color btn-md text-white fw-bold mt-md-4 mt-2 mend-auto"
                                            onclick="location.href = '{{$banner->link}}';">Shop Now <i
                                                class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{-- <div>
                        <div class="home-contain rounded-0 p-0">
                            <img src="{{asset('frontend')}}/images/grocery/banner/3.jpg"
                                class="img-fluid bg-img blur-up lazyload" alt="">
                            <div class="home-detail home-big-space p-center-left home-overlay position-relative">
                                <div class="container-fluid-lg">
                                    <div>
                                        <h6 class="ls-expanded theme-color text-uppercase">Special offer
                                        </h6>
                                        <h1 class="heding-2">Quality Dry Fruits</h1>
                                        <h2 class="content-2">shopping made Easy</h2>
                                        <h5 class="text-content">& Top Quality Dry Fruits are available here!
                                        </h5>
                                        <button
                                            class="btn theme-bg-color btn-md text-white fw-bold mt-md-4 mt-2 mend-auto"
                                            onclick="location.href = 'shop-left-sidebar.html';">Shop Now <i
                                                class="fa-solid fa-arrow-right icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Home Section End -->


<!-- Category Section Start -->
<section class="category-section-3">
    <div class="container-fluid-lg">
        <div class="title">
            <h2>Shop By Categories</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="category-slider-1 arrow-slider wow fadeInUp">

                    @foreach ($categories as $category )
                    <div>
                        <div class="category-box-list">
                            <a href="{{route('category',$category->slug)}}" class="category-name">
                                <h4>{{$category->name}}</h4>
                                <h6>{{App\Models\ProductModel::where('category_id',$category->id)->count()}} items</h6>
                            </a>
                            <div class="category-box-view">
                                <a href="{{route('category',$category->slug)}}">
                                    <img src="{{asset('uploads')}}/category/{{$category->icon}}"
                                        class="img-fluid blur-up lazyload" alt="">
                                </a>
                                <button onclick="location.href = '{{route('category',$category->slug)}}';" class="btn shop-button">
                                    <span>Shop Now</span>
                                    <i class="fas fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    {{-- <div>
                        <div class="category-box-list">
                            <a href="shop-left-sidebar.html" class="category-name">
                                <h4>Beauty</h4>
                                <h6>20 items</h6>
                            </a>
                            <div class="category-box-view">
                                <a href="shop-left-sidebar.html">
                                    <img src="{{asset('frontend')}}/images/grocery/category/2.png"
                                        class="img-fluid blur-up lazyload" alt="">
                                </a>
                                <button onclick="location.href = 'shop-left-sidebar.html';" class="btn shop-button">
                                    <span>Shop Now</span>
                                    <i class="fas fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Category Section End -->



<!-- Product Start -->

@foreach ($categories as $category )
<section class="product-section-3">
    <div class="container-fluid-lg">
        <div class="title">
            <h2>{{$category->name}}</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="slider-7_1 arrow-slider img-slider">

                    @foreach ($category->products as $product)
                    <div>
                        <div class="product-box-4 wow fadeInUp" data-wow-delay="0.35s">
                            <div class="product-image product-image-2">
                                <a href="{{route('product', $product->slug)}}">
                                    <img src="{{asset('uploads')}}/product/preview/{{$product->preview}}"
                                        class="img-fluid blur-up lazyload" alt="">
                                </a>

                                <ul class="option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#viewId_{{$product->id}}">
                                           <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="javascript:void(0)" class="notifi-wishlist">
                                           <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="compare.html">
                                            <i class="fa-solid fa-rotate"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                                <a href="product-left-thumbnail.html">
                                    @if (strlen($product->product_name) > 20)
                                        <a href="{{route('product', $product->slug)}}"> <h5 class="text-title">{{substr($product->product_name, 0,20).'...'}}</h5></a>
                                    @else
                                        <a href="{{route('product', $product->slug)}}"><h5 class="text-title">{{$product->product_name}}</h5></a>
                                    @endif

                                </a>
                                @php
                                    $inventory = $product->inventories->first();
                                @endphp
                                {{-- <h5 class="price theme-color">&#2547;{{App\Models\InventoryModel::where('product_id', $product->id)->first()->after_discount}}
                                    @if ($product->discount != '0')
                                    <del>&#2547;{{$product->price}}</del>
                                    @endif
                                </h5> --}}
                                @if($inventory)
                                    <h5 class="price theme-color">&#2547;{{ $inventory->after_discount }}
                                        @if ($inventory->discount != null)
                                        <del>&#2547;{{$inventory->price}}</del>
                                        @endif
                                    </h5>
                                @else
                                    <h5 class="price theme-color">Price not available</h5>
                                @endif
                                <div class="addtocart_btn">
                                    <a href="#" class="add-button addcart-button btn buy-button text-light">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @if ($category->products->count() >= 15)
            <div class=" col-lg-12 m-auto">
                <div>
                    <button
                        class="btn theme-bg-color btn-md text-white fw-bold mt-md-4 mt-2 mend-auto m-auto"
                        onclick="location.href = '{{route('category',$category->slug)}}';">View More
                        <i class="fa-solid fa-arrow-right icon"></i>
                    </button>
                </div>
            </div>
            @endif

        </div>
    </div>
</section>
@endforeach

<!-- Quick View Modal Box Start -->
@foreach ($products as $product)
    <div class="modal fade theme-modal view-modal" id="viewId_{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header p-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row g-sm-4 g-2">
                        <div class="col-lg-6">
                            <div class="slider-image">
                                <img src="{{asset('uploads')}}/product/preview/{{$product->preview}}" class="img-fluid blur-up lazyload"
                                    alt="">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="right-sidebar-modal">
                                <h4 class="title-name">{{$product->product_name}}</h4>
                                <h4 class="price">&#2547; {{$product->after_discount}}</h4>
                                <div class="product-rating">
                                    <ul class="rating">
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star"></i>
                                        </li>
                                    </ul>
                                    <span class="ms-2">8 Reviews</span>
                                    <span class="ms-2 text-danger">6 sold in last 16 hours</span>
                                </div>

                                <div class="product-detail">
                                    <h4>Product Details :</h4>
                                    <p>{{$product->short_desp}}</p>
                                </div>

                                <ul class="brand-list">
                                    <li>
                                        <div class="brand-box">
                                            <h5>Brand Name:</h5>
                                            <h6>{{$product->brand->name}}</h6>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="brand-box">
                                            <h5>Category:</h5>
                                            <h6>{{$product->category->name}}</h6>
                                        </div>
                                    </li>
                                </ul>

                                <div class="modal-button">
                                    <button onclick="location.href = 'cart.html';"
                                        class="btn btn-md add-cart-button icon">Add
                                        To Cart</button>
                                    <button onclick="location.href = '{{route('product', $product->slug)}}';"
                                        class="btn theme-bg-color view-button icon text-white fw-bold btn-md">
                                        View More Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick View Modal Box End -->
@endforeach

<!-- Product End -->



<!-- Offer Section Start -->
{{-- <section class="offer-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="offer-box hover-effect">
                    <h2><span>FREE GIFT ANY ORDER</span> 70% oFF</h2>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!-- Offer Section End -->



<!-- Deal Section Start -->
<section class="product-section product-section-3">
    <div class="container-fluid-lg">
        <div class="title">
            <h2>Top Selling Items</h2>
        </div>
        <div class="row g-sm-4 g-3">
            <div class="col-xxl-4 col-lg-5 order-lg-2">
                <div class="product-bg-image wow fadeInUp">
                    <div class="product-title product-warning">
                        <h2>Special Offer</h2>
                    </div>

                    <div class="product-box-4 product-box-3 rounded-0">
                        <div class="deal-box">
                            <div class="circle-box">
                                <div class="shape-circle">
                                    <img src="https://themes.pixelstrap.com/fastkart/assets/images/grocery/circle.svg" class="blur-up lazyload" alt="">
                                    <div class="shape-text">
                                        <h6>Hot <br> Deal</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="top-selling-slider product-arrow">
                            <div>
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="{{asset('frontend')}}/images/grocery/deal/big.png"
                                            class="img-fluid product-image blur-up lazyload" alt="">
                                    </a>

                                    <ul class="option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#view">
                                               <i class="fa-regular fa-eye"></i>
                                            </a>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="javascript:void(0)" class="notifi-wishlist">
                                               <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i class="fa-solid fa-rotate"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail text-center">
                                    <ul class="rating justify-content-center">
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star"></i>
                                        </li>
                                    </ul>
                                    <a href="product-left-thumbnail.html">
                                        <h3 class="name w-100 mx-auto text-center">Unisex Small Trolley
                                            Suitcase</h3>
                                    </a>
                                    <h3 class="price theme-color d-flex justify-content-center">
                                        $65.21<del class="delete-price">$71.25</del>
                                    </h3>
                                    <div class="progress custom-progressbar">
                                        <div class="progress-bar" style="width: 79%" role="progressbar"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h5 class="text-content">Solid : <span class="text-dark">30 items</span>
                                        <span class="ms-auto text-content">Hurry up offer end in</span></h5>

                                    <div class="timer timer-2 ms-0 my-4" id="clockdiv-1" data-hours="1"
                                        data-minutes="2" data-seconds="3">
                                        <ul class="d-flex justify-content-center">
                                            <li>
                                                <div class="counter">
                                                    <div class="days">
                                                        <h6></h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="counter">
                                                    <div class="hours">
                                                        <h6></h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="counter">
                                                    <div class="minutes">
                                                        <h6></h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="counter">
                                                    <div class="seconds">
                                                        <h6></h6>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="{{asset('frontend')}}/images/grocery/deal/big.png"
                                            class="img-fluid product-image blur-up lazyload" alt="">
                                    </a>

                                    <ul class="option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                                data-bs-target="#view">
                                               <i class="fa-regular fa-eye"></i>
                                            </a>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="javascript:void(0)" class="notifi-wishlist">
                                               <i class="fa-regular fa-heart"></i>
                                            </a>
                                        </li>
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i class="fa-solid fa-rotate"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="product-detail text-center">
                                    <ul class="rating justify-content-center">
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star" class="fill"></i>
                                        </li>
                                        <li>
                                            <i data-feather="star"></i>
                                        </li>
                                    </ul>
                                    <a href="product-left-thumbnail.html">
                                        <h3 class="name w-100 mx-auto text-center text-title">Unisex Small Trolley
                                            Suitcase</h3>
                                    </a>
                                    <h3 class="price theme-color d-flex justify-content-center">
                                        $65.21<del class="delete-price">$71.25</del>
                                    </h3>
                                    <div class="progress custom-progressbar">
                                        <div class="progress-bar" style="width: 41%" role="progressbar"
                                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h5 class="text-content">Solid : <span class="text-dark">30 items</span>
                                        <span class="ms-auto text-content">Hurry up offer end in</span></h5>

                                    <div class="timer timer-2 ms-0 my-4" id="clockdiv-2" data-hours="1"
                                        data-minutes="2" data-seconds="3">
                                        <ul class="d-flex justify-content-center">
                                            <li>
                                                <div class="counter">
                                                    <div class="days">
                                                        <h6></h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="counter">
                                                    <div class="hours">
                                                        <h6></h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="counter">
                                                    <div class="minutes">
                                                        <h6></h6>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="counter">
                                                    <div class="seconds">
                                                        <h6></h6>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-8 col-lg-7 order-lg-1">
                <div class="slider-5_2 img-slider">
                    <div>
                        <div class="product-box-4 wow fadeInUp">
                            <div class="product-image product-image-2">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{asset('frontend')}}/images/grocery/deal/1.png"
                                        class="img-fluid blur-up lazyload" alt="">
                                </a>

                                <ul class="option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                           <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="javascript:void(0)" class="notifi-wishlist">
                                           <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="compare.html">
                                            <i class="fa-solid fa-rotate"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name text-title">Potato Chips</h5>
                                </a>
                                <h5 class="price theme-color">$65.21<del>$71.25</del></h5>
                                <div class="addtocart_btn">
                                    <button class="add-button addcart-button btn buy-button text-light">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn qty-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                name="quantity" value="1">
                                            <button type="button" class="btn qty-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product-box-4 wow fadeInUp" data-wow-delay="0.05s">
                            <div class="product-image product-image-2">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{asset('frontend')}}/images/grocery/deal/2.png"
                                        class="img-fluid blur-up lazyload" alt="">
                                </a>

                                <ul class="option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                           <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="javascript:void(0)" class="notifi-wishlist">
                                           <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="compare.html">
                                            <i class="fa-solid fa-rotate"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name text-title">Body Lotion</h5>
                                </a>
                                <h5 class="price theme-color">$65.21<del>$71.25</del></h5>
                                <div class="addtocart_btn">
                                    <button class="add-button addcart-button btn buy-button text-light">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn qty-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                name="quantity" value="1">
                                            <button type="button" class="btn qty-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="product-box-4 wow fadeInUp">
                            <div class="product-image product-image-2">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{asset('frontend')}}/images/grocery/deal/3.png"
                                        class="img-fluid blur-up lazyload" alt="">
                                </a>

                                <ul class="option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                           <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="javascript:void(0)" class="notifi-wishlist">
                                           <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="compare.html">
                                            <i class="fa-solid fa-rotate"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name text-title">Nithara Coffee</h5>
                                </a>
                                <h5 class="price theme-color">$65.21<del>$71.25</del></h5>
                                <div class="addtocart_btn">
                                    <button class="add-button addcart-button btn buy-button text-light">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn qty-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                name="quantity" value="1">
                                            <button type="button" class="btn qty-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product-box-4 wow fadeInUp" data-wow-delay="0.05s">
                            <div class="product-image product-image-2">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{asset('frontend')}}/images/grocery/deal/4.png"
                                        class="img-fluid blur-up lazyload" alt="">
                                </a>

                                <ul class="option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                           <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="javascript:void(0)" class="notifi-wishlist">
                                           <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="compare.html">
                                            <i class="fa-solid fa-rotate"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name text-title">Cow Ghee</h5>
                                </a>
                                <h5 class="price theme-color">$65.21<del>$71.25</del></h5>
                                <div class="addtocart_btn">
                                    <button class="add-button addcart-button btn buy-button text-light">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn qty-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                name="quantity" value="1">
                                            <button type="button" class="btn qty-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="product-box-4 wow fadeInUp">
                            <div class="product-image product-image-2">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{asset('frontend')}}/images/grocery/deal/5.png"
                                        class="img-fluid blur-up lazyload" alt="">
                                </a>

                                <ul class="option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                           <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="javascript:void(0)" class="notifi-wishlist">
                                           <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="compare.html">
                                            <i class="fa-solid fa-rotate"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name text-title">Fresh Cilantro</h5>
                                </a>
                                <h5 class="price theme-color">$65.21<del>$71.25</del></h5>
                                <div class="addtocart_btn">
                                    <button class="add-button addcart-button btn buy-button text-light">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn qty-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                name="quantity" value="1">
                                            <button type="button" class="btn qty-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product-box-4 wow fadeInUp" data-wow-delay="0.05s">
                            <div class="product-image product-image-2">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{asset('frontend')}}/images/grocery/deal/6.png"
                                        class="img-fluid blur-up lazyload" alt="">
                                </a>

                                <ul class="option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                           <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="javascript:void(0)" class="notifi-wishlist">
                                           <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="compare.html">
                                            <i class="fa-solid fa-rotate"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name text-title">Sandwich Bread</h5>
                                </a>
                                <h5 class="price theme-color">$65.21<del>$71.25</del></h5>
                                <div class="addtocart_btn">
                                    <button class="add-button addcart-button btn buy-button text-light">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn qty-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                name="quantity" value="1">
                                            <button type="button" class="btn qty-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="product-box-4 wow fadeInUp">
                            <div class="product-image product-image-2">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{asset('frontend')}}/images/grocery/deal/7.png"
                                        class="img-fluid blur-up lazyload" alt="">
                                </a>

                                <ul class="option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                           <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="javascript:void(0)" class="notifi-wishlist">
                                           <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="compare.html">
                                            <i class="fa-solid fa-rotate"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name text-title">Popcorn</h5>
                                </a>
                                <h5 class="price theme-color">$65.21<del>$71.25</del></h5>
                                <div class="addtocart_btn">
                                    <button class="add-button addcart-button btn buy-button text-light">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn qty-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                name="quantity" value="1">
                                            <button type="button" class="btn qty-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product-box-4 wow fadeInUp" data-wow-delay="0.05s">
                            <div class="product-image product-image-2">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{asset('frontend')}}/images/grocery/deal/5.png"
                                        class="img-fluid blur-up lazyload" alt="">
                                </a>

                                <ul class="option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                           <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="javascript:void(0)" class="notifi-wishlist">
                                           <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="compare.html">
                                            <i class="fa-solid fa-rotate"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name text-title">Fresh Cilantro</h5>
                                </a>
                                <h5 class="price theme-color">$65.21<del>$71.25</del></h5>
                                <div class="addtocart_btn">
                                    <button class="add-button addcart-button btn buy-button text-light">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn qty-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                name="quantity" value="1">
                                            <button type="button" class="btn qty-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div class="product-box-4 wow fadeInUp">
                            <div class="product-image product-image-2">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{asset('frontend')}}/images/grocery/deal/8.png"
                                        class="img-fluid blur-up lazyload" alt="">
                                </a>

                                <ul class="option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                           <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="javascript:void(0)" class="notifi-wishlist">
                                           <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="compare.html">
                                            <i class="fa-solid fa-rotate"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name text-title">Fresh Eggs</h5>
                                </a>
                                <h5 class="price theme-color">$65.21<del>$71.25</del></h5>
                                <div class="addtocart_btn">
                                    <button class="add-button addcart-button btn buy-button text-light">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn qty-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                name="quantity" value="1">
                                            <button type="button" class="btn qty-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product-box-4 wow fadeInUp" data-wow-delay="0.05s">
                            <div class="product-image product-image-2">
                                <a href="product-left-thumbnail.html">
                                    <img src="{{asset('frontend')}}/images/grocery/deal/9.png"
                                        class="img-fluid blur-up lazyload" alt="">
                                </a>

                                <ul class="option">
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                           <i class="fa-regular fa-eye"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                        <a href="javascript:void(0)" class="notifi-wishlist">
                                           <i class="fa-regular fa-heart"></i>
                                        </a>
                                    </li>
                                    <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                        <a href="compare.html">
                                            <i class="fa-solid fa-rotate"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="product-detail">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                                <a href="product-left-thumbnail.html">
                                    <h5 class="name text-title">Tomato Ketchup</h5>
                                </a>
                                <h5 class="price theme-color">$65.21<del>$71.25</del></h5>
                                <div class="addtocart_btn">
                                    <button class="add-button addcart-button btn buy-button text-light">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                                    <div class="qty-box cart_qty">
                                        <div class="input-group">
                                            <button type="button" class="btn qty-left-minus" data-type="minus"
                                                data-field="">
                                                <i class="fa fa-minus" aria-hidden="true"></i>
                                            </button>
                                            <input class="form-control input-number qty-input" type="text"
                                                name="quantity" value="1">
                                            <button type="button" class="btn qty-right-plus" data-type="plus"
                                                data-field="">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                            </button>
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
<!-- Deal Section End -->

<!-- Banner Section Start -->
<section class="banner-section">
    <div class="container-fluid-lg">
        <div class="row gy-lg-0 gy-3">
            <div class="col-lg-8">
                <div class="banner-contain-3 h-100 pt-sm-5 hover-effect">
                    <img src="{{asset('frontend')}}/images/grocery/banner/8.png" class="bg-img blur-up lazyload" alt="">
                    <div
                        class="banner-detail banner-p-sm p-center-right position-relative banner-minus-position banner-detail-deliver">
                        <div>
                            <h3 class="fw-bold banner-contain">Safe Delivery to the door</h3>
                            <h4 class="mb-sm-3 mb-2 delivery-contain">Make money on your terms. Anytime and anyhow.
                            </h4>
                            <ul class="banner-list">
                                <li>
                                    <div class="delivery-box">
                                        <div class="check-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </div>

                                        <div class="check-contain">
                                            <h5>Get live order tracking</h5>
                                        </div>
                                    </div>
                                </li>

                                <li>
                                    <div class="delivery-box">
                                        <div class="check-icon">
                                            <i class="fa-solid fa-check"></i>
                                        </div>

                                        <div class="check-contain">
                                            <h5>Get latest feature updates</h5>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <button class="btn theme-bg-color text-white mt-sm-4 mt-3 fw-bold"
                                onclick="location.href = 'shop-left-sidebar.html';">Read More</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="banner-contain-3 pt-lg-4 h-100 hover-effect">
                    <a href="javascript:void(0)">
                        <img src="{{asset('frontend')}}/images/grocery/banner/9.jpg"
                            class="img-fluid social-image blur-up lazyload w-100" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Service Section Start -->
<section class="service-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row g-3 row-cols-xxl-5 row-cols-lg-3 row-cols-md-2">
            <div>
                <div class="service-contain-2">
                    <svg class="icon-width">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/svg/service-icon-4.svg#shipping"></use>
                    </svg>
                    <div class="service-detail">
                        <h3>Free Shipping</h3>
                        <h6 class="text-content">Free Shipping world wide</h6>
                    </div>
                </div>
            </div>
            <div>
                <div class="service-contain-2">
                    <svg class="icon-width">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/svg/service-icon-4.svg#service"></use>
                    </svg>
                    <div class="service-detail">
                        <h3>24 x 7 Service</h3>
                        <h6 class="text-content">Online Service For 24 x 7</h6>
                    </div>
                </div>
            </div>
            <div>
                <div class="service-contain-2">
                    <svg class="icon-width">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/svg/service-icon-4.svg#pay"></use>
                    </svg>
                    <div class="service-detail">
                        <h3>Online Pay</h3>
                        <h6 class="text-content">Online Payment Avaible</h6>
                    </div>
                </div>
            </div>
            <div>
                <div class="service-contain-2">
                    <svg class="icon-width">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/svg/service-icon-4.svg#offer"></use>
                    </svg>
                    <div class="service-detail">
                        <h3>Festival Offer</h3>
                        <h6 class="text-content">Super Sale Upto 50% off</h6>
                    </div>
                </div>
            </div>
            <div>
                <div class="service-contain-2">
                    <svg class="icon-width">
                        <use xlink:href="https://themes.pixelstrap.com/fastkart/assets/svg/svg/service-icon-4.svg#return"></use>
                    </svg>
                    <div class="service-detail">
                        <h3>100% Original</h3>
                        <h6 class="text-content">100% Money Back</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Service Section End -->
@endsection
