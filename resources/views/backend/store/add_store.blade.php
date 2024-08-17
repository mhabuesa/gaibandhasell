@extends('layouts.backend')
@push('title')
<title>Add Store | Gaibandhasell.com</title>
@endpush
@include('backend.asset.image_preview')
@section('content')
    <div class="row ">
        <div class="col-lg-12 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Add Store</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('store.add')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                       <div class="row">

                        <div class="mb-3 col-lg-12">
                            <div class="row">
                                <div class="col-lg-4 m-auto text-center">
                                    <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                            <div class="cont m-auto">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input name="photo" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload"></label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview" style="background-image: url({{ asset('backend') }}/img/avatars/pic.png);"></div>
                                                        @error('photo')
                                                        <strong>{{$message}}</strong>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="btn btn-squir bg-light text-dark" style="cursor: default">Vendor Image</p>
                                        <p style="font-size: 12px; color:#00c23d;">Image must be 320 X 320 pixel</p>
                                    </div>
                                </div>

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
                                                        <div id="logoPreview" style="background-image: url({{ asset('backend') }}/img/avatars/logo.png);"></div>
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
                        </div>

                        <div class="mb-3 mt-5 col-lg-12">
                            <label for="name">Vendor Info</label>
                        </div>

                        <div class="mb-3 col-lg-6">
                            <label for="name">Vendor Name <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-solid fa-shop"></i></span>
                                        </span>
                                    </div>
                                    <input required type="text" class="form-control"  value="{{old('name')}}" name="name" id="name" placeholder="Enter Name">
                                    @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 col-lg-6">
                            <label for="email">Vendor Email <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-solid fa-envelope"></i></span>
                                        </span>
                                    </div>
                                    <input required type="email" class="form-control"  value="{{old('email')}}" name="email" id="email" placeholder="Enter Email">
                                </div>
                                @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3 col-lg-6">
                            <label for="phone">Vendor Phone <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-duotone fa-phone"></i></span>
                                        </span>
                                    </div>
                                    <input required type="phone" class="form-control"  value="{{old('phone')}}" name="phone" id="phone" placeholder="01701234567">
                                    @error('phone')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 col-lg-6">
                            <label for="dob">Vendor Date of Birth <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-sharp fa-solid fa-calendar-days"></i></span>
                                        </span>
                                    </div>
                                    <input required type="date" class="form-control"  value="{{old('dob')}}" name="dob" id="dob" placeholder="01701234567">
                                    @error('dob')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 col-lg-6">
                            <label for="nid">Vendor NID Number <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-regular fa-id-card"></i></span>
                                        </span>
                                    </div>
                                    <input required type="number" class="form-control"  value="{{old('nid')}}" name="nid" id="nid" placeholder="9160000000">
                                    @error('nid')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 col-lg-6">
                            <label for="password">Vendor Password <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-solid fa-key"></i></span>
                                        </span>
                                    </div>
                                    <input required type="password" class="form-control"  value="{{old('password')}}" name="password" id="password" placeholder="password">
                                    @error('password')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 mt-5 col-lg-12">
                            <label for="name">Store Info</label>
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
                                    <input required type="text" class="form-control"  value="{{old('store_name')}}" name="store_name" id="name" placeholder="Enter Name">
                                    @error('store_name')
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
                                    <input required type="text" class="form-control"  value="{{old('address')}}" name="address" id="address" placeholder="Enter Address">
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
                                    <input type="phone" class="form-control"  value="{{old('store_phone')}}" name="store_phone" id="store_phone" placeholder="Enter Store Phone">
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
                                    <input type="email" class="form-control"  value="{{old('store_email')}}" name="store_email" id="store_email" placeholder="Enter Store Email">
                                    @error('store_email')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 col-lg-12">
                            <label for="facebook">Facebook</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-brands fa-square-facebook"></i></span>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control"  value="{{old('facebook')}}" name="facebook" id="facebook" placeholder="facebook.com/xyz">
                                </div>
                            </div>
                        </div>


                        <div class="mt-3 col-lg-12">

                           <div class="d-flex justify-content-center">
                            <button class="btn btn-dark w-50">Submit</button>
                           </div>

                        </div>


                       </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
