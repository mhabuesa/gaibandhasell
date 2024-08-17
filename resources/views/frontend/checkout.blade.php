@extends('layouts.frontend')
@push('title')
<title>Checkout - Gaibandhasell.com </title>
@endpush
@push('header')
    <style>
        .selection{
            padding: 10px 20px;
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
                            <h2>Checkout</h2>
                            <nav>
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <i class="fa-solid fa-house"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- Checkout section Start -->
        <section class="checkout-section-2 section-b-space">
            <div class="container-fluid-lg">
                <div class="row g-sm-4 g-3">
                    <div class="col-lg-8">
                        <div class="left-sidebar-checkout">
                            <div class="checkout-detail-box">
                                <ul>
                                    <li>
                                        <div class="checkout-icon">
                                            <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json"
                                                trigger="loop-on-hover"
                                                colors="primary:#121331,secondary:#646e78,tertiary:#0baf9a"
                                                class="lord-icon">
                                            </lord-icon>
                                        </div>
                                        <div class="checkout-box">
                                            <div class="checkout-title">
                                                <h4>Delivery Information </h4>
                                            </div>

                                            <div class="checkout-detail">
                                                <div class="row g-4">

                                                    <div class="col-xxl-12 col-lg-12 col-md-12">


                                                        <div class="checkout-detail">
                                                            <div class="accordion accordion-flush custom-accordion" id="accordionFlushExample">
                                                                <div class="accordion-item">
                                                                    <div class="accordion-body">
                                                                        <div class="checkout-title">
                                                                            <h4>Billing Information </h4>
                                                                        </div>
                                                                        <div class="row g-2 mt-3">

                                                                            <div class="col-xxl-12">
                                                                                <div
                                                                                    class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                                    <input name="name" type="text" class="form-control" id="name"
                                                                                        placeholder="Enter Full Name" value="{{Auth::guard('customer')->user()->name}}">
                                                                                    <label for="name">Full Name</label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xxl-6">
                                                                                <div class="select-option">
                                                                                    <div class="form-floating theme-form-floating">
                                                                                        <select name="district_id" class="form-select theme-form-select district" aria-label="Default select example">
                                                                                            <option value="">Select District</option>
                                                                                            @foreach ($districts as $district )
                                                                                            <option value="{{$district->id}}">{{$district->name}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <label>Select District</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xxl-6">
                                                                                <div class="select-option">
                                                                                    <div class="form-floating theme-form-floating">
                                                                                        <select name="upazila_id" class="form-select theme-form-select upazila" aria-label="Default select example">
                                                                                            <option value="">Select Upazila</option>
                                                                                        </select>
                                                                                        <label>Select Upazila</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xxl-6 mt-3">
                                                                                <div
                                                                                    class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                                    <input name="email" type="text" class="form-control" id="email"
                                                                                        placeholder="Enter Email" value="{{Auth::guard('customer')->user()->email}}">
                                                                                    <label for="email">Email</label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xxl-6 mt-3">
                                                                                <div
                                                                                    class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                                    <input name="phone" type="text" class="form-control" id="phone"
                                                                                        placeholder="Enter Phone">
                                                                                    <label for="phone">Phone</label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xxl-12 mt-3">
                                                                                <div class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                                    <input name="address" type="text" class="form-control" id="address"
                                                                                        placeholder="Enter Address">
                                                                                    <label for="address">Address</label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xxl-12 mt-3">
                                                                                <div class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                                    <textarea name="note" class="form-control" id="note" cols="30" rows="10"></textarea>
                                                                                    <label for="note">Notes</label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xxl-12 mt-3">
                                                                                <div class="form-check custom-form-check hide-check-box">
                                                                                    <input class="form-check-input" type="checkbox" name="ship_check" id="ship_check">
                                                                                    <label class="form-check-label" for="ship_check">Ship to a Different Address?</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div id="ship_info" class="accordion-item">
                                                                    <div class="accordion-body">
                                                                        <div class="checkout-title">
                                                                            <h4>Shiping Information </h4>
                                                                        </div>
                                                                        <div class="row g-2 mt-3">

                                                                            <div class="col-xxl-12">
                                                                                <div
                                                                                    class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                                    <input name="name" type="text" class="form-control" id="name"
                                                                                        placeholder="Enter Full Name">
                                                                                    <label for="name">Full Name</label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xxl-6">
                                                                                <div class="select-option">
                                                                                    <div class="form-floating theme-form-floating">
                                                                                        <select name="district_id" class="form-select theme-form-select district" aria-label="Default select example">
                                                                                            <option value="">Select District</option>
                                                                                            @foreach ($districts as $district )
                                                                                            <option value="{{$district->id}}">{{$district->name}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                        <label>Select District</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xxl-6">
                                                                                <div class="select-option">
                                                                                    <div class="form-floating theme-form-floating">
                                                                                        <select name="upazila_id" class="form-select theme-form-select upazila" aria-label="Default select example">
                                                                                            <option value="">Select Upazila</option>
                                                                                        </select>
                                                                                        <label>Select Upazila</label>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xxl-6 mt-3">
                                                                                <div
                                                                                    class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                                    <input name="email" type="text" class="form-control" id="email"
                                                                                        placeholder="Enter Email">
                                                                                    <label for="email">Email</label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xxl-6 mt-3">
                                                                                <div
                                                                                    class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                                    <input name="phone" type="text" class="form-control" id="phone"
                                                                                        placeholder="Enter Phone">
                                                                                    <label for="phone">Phone</label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xxl-12 mt-3">
                                                                                <div class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                                    <input name="address" type="text" class="form-control" id="address"
                                                                                        placeholder="Enter Address">
                                                                                    <label for="address">Address</label>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-xxl-12 mt-3">
                                                                                <div class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                                    <textarea name="note" class="form-control" id="note" cols="30" rows="10"></textarea>
                                                                                    <label for="note">Notes</label>
                                                                                </div>
                                                                            </div>


                                                                            {{-- <div class="button-group mt-3">
                                                                                <ul>
                                                                                    <li>
                                                                                        <button
                                                                                            class="btn btn-light shopping-button">Cancel</button>
                                                                                    </li>

                                                                                    <li>
                                                                                        <button class="btn btn-animation">Use This
                                                                                            Card</button>
                                                                                    </li>
                                                                                </ul>
                                                                            </div> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="checkout-icon">
                                            <lord-icon target=".nav-item" src="https://cdn.lordicon.com/oaflahpk.json"
                                                trigger="loop-on-hover" colors="primary:#0baf9a" class="lord-icon">
                                            </lord-icon>
                                        </div>
                                        <div class="checkout-box">
                                            <div class="checkout-title">
                                                <h4>Delivery Option</h4>
                                            </div>

                                            <div class="checkout-detail">
                                                <div class="row g-4">
                                                    <div class="col-xxl-6">
                                                        <div class="delivery-option">
                                                            <div class="delivery-category">
                                                                <div class="shipment-detail">
                                                                    <div class="form-check custom-form-check hide-check-box">
                                                                        <input class="form-check-input" type="radio" name="standard" id="standard" checked>
                                                                        <label class="form-check-label" for="standard">Inside City</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xxl-6">
                                                        <div class="delivery-option">
                                                            <div class="delivery-category">
                                                                <div class="shipment-detail">
                                                                    <div class="form-check mb-0 custom-form-check show-box-checked">
                                                                        <input class="form-check-input" type="radio" name="standard" id="future">
                                                                        <label class="form-check-label" for="future">Outside City</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="checkout-icon">
                                            <lord-icon target=".nav-item" src="https://cdn.lordicon.com/qmcsqnle.json"
                                                trigger="loop-on-hover" colors="primary:#0baf9a,secondary:#0baf9a" class="lord-icon">
                                            </lord-icon>
                                        </div>
                                        <div class="checkout-box">
                                            <div class="checkout-title">
                                                <h4>Payment Option</h4>
                                            </div>

                                            <div class="checkout-detail">
                                                <div class="accordion accordion-flush custom-accordion" id="accordionFlushExample">

                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="flush-headingFour">
                                                            <div class="accordion-button collapsed"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#flush-collapseFour">
                                                                <div class="custom-form-check form-check mb-0">
                                                                    <label class="form-check-label" for="cod">
                                                                        <input class="form-check-input mt-0" type="radio" name="payment" id="cod" checked>
                                                                        Cash On Delivery
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="flush-collapseFour"
                                                            class="accordion-collapse collapse show"
                                                            data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                <p class="cod-review">Pay digitally with SMS Pay
                                                                    Link. Cash may not be accepted in COVID restricted
                                                                    areas. <a href="javascript:void(0)">Know more.</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="accordion-item">
                                                        <div class="accordion-header" id="flush-headingFour">
                                                            <div class="accordion-button collapsed"
                                                                data-bs-toggle="collapse"
                                                                data-bs-target="#sslcommerz">
                                                                <div class="custom-form-check form-check mb-0">
                                                                    <label class="form-check-label" for="cash">
                                                                        <input class="form-check-input mt-0" type="radio" name="payment" id="cash">
                                                                        SSLCommerz Pay
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="sslcommerz"
                                                            class="accordion-collapse collapse"
                                                            data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                <p class="cod-review">Pay digitally with SMS Pay
                                                                    Link. Cash may not be accepted in COVID restricted
                                                                    areas. <a href="javascript:void(0)">Know more.</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>




                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="right-side-summery-box">
                            <div class="summery-box-2">
                                <div class="summery-header">
                                    <h3>Order Summery</h3>
                                </div>

                                <ul class="summery-contain">
                                    <li>
                                        <img src="{{asset('frontend')}}/images/vegetable/product/1.png"
                                            class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                        <h4>Bell pepper <span>X 1</span></h4>
                                        <h4 class="price">$32.34</h4>
                                    </li>

                                    <li>
                                        <img src="{{asset('frontend')}}/images/vegetable/product/2.png"
                                            class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                        <h4>Eggplant <span>X 3</span></h4>
                                        <h4 class="price">$12.23</h4>
                                    </li>

                                    <li>
                                        <img src="{{asset('frontend')}}/images/vegetable/product/3.png"
                                            class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                        <h4>Onion <span>X 2</span></h4>
                                        <h4 class="price">$18.27</h4>
                                    </li>

                                    <li>
                                        <img src="{{asset('frontend')}}/images/vegetable/product/4.png"
                                            class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                        <h4>Potato <span>X 1</span></h4>
                                        <h4 class="price">$26.90</h4>
                                    </li>

                                    <li>
                                        <img src="{{asset('frontend')}}/images/vegetable/product/5.png"
                                            class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                        <h4>Baby Chili <span>X 1</span></h4>
                                        <h4 class="price">$19.28</h4>
                                    </li>

                                    <li>
                                        <img src="{{asset('frontend')}}/images/vegetable/product/6.png"
                                            class="img-fluid blur-up lazyloaded checkout-image" alt="">
                                        <h4>Broccoli <span>X 2</span></h4>
                                        <h4 class="price">$29.69</h4>
                                    </li>
                                </ul>

                                <ul class="summery-total">
                                    <li>
                                        <h4>Subtotal</h4>
                                        <h4 class="price">$111.81</h4>
                                    </li>

                                    <li>
                                        <h4>Shipping</h4>
                                        <h4 class="price">$8.90</h4>
                                    </li>

                                    <li>
                                        <h4>Tax</h4>
                                        <h4 class="price">$29.498</h4>
                                    </li>

                                    <li>
                                        <h4>Coupon/Code</h4>
                                        <h4 class="price">$-23.10</h4>
                                    </li>

                                    <li class="list-total">
                                        <h4>Total (USD)</h4>
                                        <h4 class="price">$19.28</h4>
                                    </li>
                                </ul>
                            </div>

                            <div class="checkout-offer">
                                <div class="offer-title">
                                    <div class="offer-icon">
                                        <img src="https://themes.pixelstrap.com/fastkart/assets/images/inner-page/offer.svg" class="img-fluid" alt="">
                                    </div>
                                    <div class="offer-name">
                                        <h6>Available Offers</h6>
                                    </div>
                                </div>

                                <ul class="offer-detail">
                                    <li>
                                        <p>Combo: BB Royal Almond/Badam Californian, Extra Bold 100 gm...</p>
                                    </li>
                                    <li>
                                        <p>combo: Royal Cashew Californian, Extra Bold 100 gm + BB Royal Honey 500 gm</p>
                                    </li>
                                </ul>
                            </div>

                            <button class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Checkout section End -->
@endsection
@push('script')
    <script>
        $('.district').change(function(){
            var district_id = $(this).val();

            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

            $.ajax({
                url: '/get_upazila',
                type: 'POST',
                data: {'district_id':district_id},
                success: function(data) {
                   $('.upazila').html(data)
                }
            });

        })
    </script>

    <script>
        $(document).ready(function(){
        $('#ship_info').hide();

        $('#ship_check').change(function() {
            if($(this).is(':checked')) {
                $('#ship_info').slideDown();
            } else {
                $('#ship_info').slideUp();
            }
        });
        });
    </script>
@endpush
