<div class="col-xxl-3 col-lg-4">
    <div class="dashboard-left-sidebar">
        <div class="close-button d-flex d-lg-none">
            <button class="close-sidebar">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="profile-box">
            <div class="cover-image">
                <img src="{{asset('frontend')}}/images/inner-page/cover-img.jpg" class="img-fluid blur-up lazyload"
                    alt="">
            </div>

            <div class="profile-contain">
                <div class="profile-image">
                    <div class="position-relative">
                        @if (Auth::guard('customer')->user()->photo == null)
                        <img src="{{asset('frontend')}}/images/vendor-page/logo.png" class="blur-up lazyload update_img" alt="">
                        @else
                        <div id="imagePreview"
                            style="background-image: url({{ asset('uploads') }}/profile/customer/{{Auth::guard('customer')->user()->photo}});">
                        </div>
                        <img src="{{asset('uploads')}}/profile/customer/{{Auth::guard('customer')->user()->photo}}" class="blur-up lazyload update_img" alt="">
                        @endif
                    </div>
                </div>

                <div class="profile-name">
                    <h3>{{Auth::guard('customer')->user()->name}}</h3>
                    <h6 class="text-content">{{Auth::guard('customer')->user()->email}}</h6>
                </div>
            </div>
        </div>

        <ul class="nav nav-pills user-nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a href="{{route('customer.dashboard')}}" class="nav-link {{ $_SERVER['REQUEST_URI'] == '/user/dashboard' ? 'active' : '' }}">
                    <i data-feather="home"></i>
                    DashBoard
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a href="{{route('customer.wishlist')}}" class="nav-link {{ $_SERVER['REQUEST_URI'] == '/user/wishlist' ? 'active' : '' }}">
                    <i data-feather="shopping-bag"></i>
                    Wishlist
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a href="{{route('customer.order')}}" class="nav-link {{ $_SERVER['REQUEST_URI'] == '/user/order' ? 'active' : '' }}">
                    <i data-feather="shopping-bag"></i>
                    Order
                </a>
            </li>


            <li class="nav-item" role="presentation">
                <a href="{{route('customer.profile')}}" class="nav-link {{ $_SERVER['REQUEST_URI'] == '/user/profile' ? 'active' : '' }}">
                    <i data-feather="user"></i>
                    Profile
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a href="{{route('customer.setting')}}" class="nav-link {{ $_SERVER['REQUEST_URI'] == '/user/setting' ? 'active' : '' }}">
                    <i data-feather="settings"></i>
                    Setting
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" type="button" onclick="location.href = '{{route('signOut')}}';"><i
                        data-feather="log-out"></i>
                    Log Out</button>
            </li>
        </ul>
    </div>
</div>
<div class="col-xxl-9 col-lg-8 d-lg-none">
    <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">Show Menu</button>
</div>
