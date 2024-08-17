@extends('layouts.backend')
@push('title')
    <title>Profile | Gaibandhasell.com</title>
@endpush
@section('content')
    <!-- Header -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="user-profile-header-banner">
                    <img src="{{ asset('backend') }}/img/pages/profile-banner.png" alt="Banner image"
                        class="rounded-top">
                </div>
                <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        @if (Auth::user()->photo == null)
                        <img src="{{ asset('backend') }}/img/avatars/9.png" alt="user image"
                        class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                        @else
                        <img src="{{ asset('uploads') }}/profile/{{Auth::user()->photo}}" alt="user image"
                        class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img">
                        @endif
                    </div>
                    <div class="flex-grow-1 mt-3 mt-sm-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4>{{Auth::user()->name}}</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                                    <li class="list-inline-item d-flex gap-1 ">
                                        <i class="ti ti-circle-check"></i> <span class="text-capitalize">{{Auth::user()->role}}</span>
                                    </li>
                                    <li class="list-inline-item d-flex gap-1">
                                        <i class="ti ti-calendar"></i> Joined {{Auth::user()->created_at->format('M-Y')}}
                                    </li>
                                </ul>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-primary waves-effect waves-light">
                                <i class="ti ti-check me-1"></i>Connected
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->

    @include('backend.profile.acount_nav_pills')

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-5">
            <!-- About User -->
            <div class="card mb-4">
                <div class="card-body">
                    <small class="card-text text-uppercase">About</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-user text-heading"></i><span
                                class="fw-medium mx-2 text-heading">Full Name:</span> <span class="text-capitalize">{{Auth::user()->name}}</span>
                        </li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-crown text-heading"></i><span
                                class="fw-medium mx-2 text-heading">Role:</span> <span class="text-capitalize">{{Auth::user()->role}}</span>
                        </li>
                    </ul>
                    <small class="card-text text-uppercase">Contacts</small>
                    <ul class="list-unstyled mb-4 mt-3">
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-mail"></i><span
                                class="fw-medium mx-2 text-heading">Email:</span> <span>{{Auth::user()->email}}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/ About User -->
        </div>
        <div class="col-xl-6 col-lg-6 col-md-5">
            <!-- Profile Overview -->
            {{-- <div class="card mb-4">
                <div class="card-body">
                    <p class="card-text text-uppercase">Overview</p>
                    <ul class="list-unstyled mb-0">
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-check"></i><span
                                class="fw-medium mx-2">Task Compiled:</span> <span>13.5k</span></li>
                        <li class="d-flex align-items-center mb-3"><i class="ti ti-layout-grid"></i><span
                                class="fw-medium mx-2">Projects Compiled:</span> <span>146</span></li>
                    </ul>
                </div>
            </div> --}}
            <!--/ Profile Overview -->
        </div>
    </div>
    <!--/ User Profile Content -->


@endsection
