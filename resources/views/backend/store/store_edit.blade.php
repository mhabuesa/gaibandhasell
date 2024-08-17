@extends('layouts.backend')
@push('title')
<title>Edit Store | Gaibandhasell.com</title>
@endpush
@include('backend.asset.image_preview')
@section('content')
    <div class="row ">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add Store</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('stores.update',$store->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       <div class="row">

                        <div class="mb-3 col-lg-12">
                            <label>Additional Info</label>
                        </div>

                        <div class="mb-3 col-lg-12">
                            <div class="col-lg-4 m-auto text-center">
                                <div class="card-body">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <div class="cont m-auto">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input name="logo" type='file' id="logoUpload" accept=".png, .jpg, .jpeg" />
                                                    <label for="logoUpload"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    @if ($store->logo == '')
                                                    <div id="logoPreview" style="background-image: url({{ asset('backend') }}/img/avatars/logo.png);"></div>
                                                    @else
                                                    <div id="logoPreview" style="background-image: url({{asset('uploads')}}/store/{{$store->logo}});"></div>
                                                    @endif
                                                    @error('photo')
                                                    <strong>{{$message}}</strong>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="btn btn-squir bg-light text-dark" style="cursor: default">Store Logo</p>
                                    <p style="font-size: 12px; color:#00c23d;">Logo must be 320 X 320 pixel</p>
                                </div>
                            </div>
                        </div>


                        <div class="mb-3 col-lg-6">
                            <label for="name">Store Name <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-solid fa-shop"></i></span>
                                        </span>
                                    </div>
                                    <input required type="text" class="form-control"  value="{{$store->store_name}}" name="store_name" id="name" placeholder="Enter Name">
                                    @error('store_name')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 col-lg-6">
                            <label for="owner">Owner Name <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-solid fa-user"></i></span>
                                        </span>
                                    </div>
                                    <input disabled type="text" class="form-control"  value="{{$store->vendor->name}}" name="owner_name" id="owner" placeholder="Enter Name">
                                    @error('owner_name')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="mb-3 col-lg-6">
                            <label for="address_text">Store Address <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-solid fa-location-dot"></i></span>
                                        </span>
                                    </div>
                                    <input required type="text" class="form-control"  value="{{$store->address}}" name="address" id="address" placeholder="Enter Address">
                                    @error('address')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 col-lg-6">
                            <label for="store_phone">Store Phone</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-duotone fa-phone"></i></span>
                                        </span>
                                    </div>
                                    <input type="phone" class="form-control"  value="{{$store->phone}}" name="store_phone" id="store_phone" placeholder="Enter Store Phone">
                                    @error('store_phone')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 col-lg-6">
                            <label for="store_email">Store Email</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-solid fa-envelope"></i></span>
                                        </span>
                                    </div>
                                    <input type="email" class="form-control"  value="{{$store->email}}" name="store_email" id="store_email" placeholder="Enter Store Email">
                                    @error('store_email')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 col-lg-6">
                            <label for="facebook">Facebook</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-brands fa-square-facebook"></i></span>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control"  value="{{$store->facebook}}" name="facebook" id="facebook" placeholder="facebook.com/xyz">
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 col-lg-12">

                           <div class="d-flex justify-content-center">
                            <button class="btn btn-dark w-50">Update</button>
                           </div>

                        </div>


                       </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

