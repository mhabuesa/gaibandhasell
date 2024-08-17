@extends('layouts.frontend')
@push('title')
<title>{{$category->name}} - Gaibandhasell.com </title>
@endpush
@section('content')
        <!-- Breadcrumb Section Start -->
        <section class="breadscrumb-section pt-0">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-12">
                        <div class="breadscrumb-contain">
                            <h2>{{$category->name}}</h2>
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('index')}}">
                                            <i class="fa-solid fa-house"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Shop Section Start -->
        <section class="section-b-space shop-section">
            <div class="container-fluid-lg">
                <div class="row">
                    <div class="col-12">
                        <div class="show-button">
                            <div class="top-filter-menu-2">
                                <div class="ms-auto d-flex align-items-center">
                                    <div class="grid-option grid-option-2">
                                        <ul>
                                            <li class="three-grid">
                                                <a href="javascript:void(0)">
                                                    <img src="{{asset('frontend/images/icon')}}/grid-3.svg" class="blur-up lazyload" alt="">
                                                </a>
                                            </li>
                                            <li class="five-grid d-xxl-inline-block d-none active">
                                                <a href="javascript:void(0)">
                                                    <img src="{{asset('frontend/images/icon')}}/grid-5.svg"
                                                        class="blur-up lazyload d-lg-inline-block d-none" alt="">
                                                </a>
                                            </li>
                                            <li class="list-btn">
                                                <a href="javascript:void(0)">
                                                    <img src="{{asset('frontend/images/icon')}}/list.svg" class="blur-up lazyload" alt="">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row g-sm-4 g-3 row-cols-xxl-5 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">

                            @foreach ($products as $product )
                            <div>
                                <div class="product-box-3 h-100 wow fadeInUp">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="{{route('product', $product->slug)}}">
                                                <img src="{{asset('uploads')}}/product/preview/{{$product->preview}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <ul class="product-option">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                                    <a href="javascript:void(0)" data-bs-toggle="modal"
                                                        data-bs-target="#viewId_{{$product->id}}">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                </li>

                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                                    <a href="compare.html">
                                                        <i data-feather="refresh-cw"></i>
                                                    </a>
                                                </li>

                                                <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                                    <a href="wishlist.html" class="notifi-wishlist">
                                                        <i data-feather="heart"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span class="span-name">{{$category->name}}</span>
                                            <a href="{{route('product', $product->slug)}}">
                                                <h5 class="name">{{$product->product_name}}</h5>
                                            </a>
                                            <p class="text-content mt-1 mb-2 product-content">Cheesy feet cheesy grin brie.
                                                Mascarpone cheese and wine hard cheese the big cheese everyone loves smelly
                                                cheese macaroni cheese croque monsieur.</p>
                                            <div class="product-rating mt-2">
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
                                                <span>(4.0)</span>
                                            </div>
                                            <h5 class="price"><span class="theme-color">&#2547; {{$product->after_discount}}</span> <del>&#2547;{{$product->price}}</del>
                                            </h5>
                                            <div class="add-to-cart-box bg-white">
                                                <button class="btn btn-add-cart addcart-button" >Add to cart
                                                    <span class="add-icon bg-light-gray">
                                                        <i class="fa-solid fa-cart-shopping"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick View Modal Box Start -->
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
                                                            <button onclick="location.href = 'product-left.html';"
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

                        </div>

                        <nav class="custome-pagination">
                            {{-- <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-disabled="true">
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
                            </ul> --}}
                            {{ $products->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shop Section End -->
@endsection
