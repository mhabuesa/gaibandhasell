@extends('layouts.backend')
@push('title')
<title>Edit Seller | Gaibandhasell.com</title>
@endpush
@include('backend.asset.image_preview')

@section('content')
    <div class="row ">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h2>Seller Update</h2>
                </div>
                <div class="card-body">
                    <form action="{{route('seller.update',$seller->id)}}" method="POST" enctype="multipart/form-data">
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
                                                            @if ($seller->photo != null)
                                                            <div id="imagePreview" style="background-image: url({{ asset('uploads') }}/profile/{{$seller->photo}});"></div>
                                                            @else
                                                            <div id="imagePreview" style="background-image: url({{ asset('backend') }}/img/avatars/pic.png);"></div>
                                                            @endif
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
                                </div>
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
                                        <input required type="text" class="form-control"  value="{{$seller->name}}" name="name" id="name" placeholder="Enter Name">
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
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
                                        <input required type="email" class="form-control"  value="{{$seller->email}}" name="email" id="email" placeholder="Enter Email">
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
                                                <span><i class="fa-solid fa-phone"></i></span>
                                            </span>
                                        </div>
                                        <input required type="phone" class="form-control"  value="{{$seller->phone}}" name="phone" id="phone" placeholder="01701234567">
                                    </div>
                                    @error('phone')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
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
                                        <input required type="date" class="form-control"  value="{{$seller->dob}}" name="dob" id="dob" placeholder="01701234567">
                                    </div>
                                    @error('dob')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
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
                                        <input required type="number" class="form-control"  value="{{$seller->nid}}" name="nid" id="nid" placeholder="9160000000">
                                    </div>
                                    @error('nid')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 col-lg-6">
                                <label for="password">Password <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <span><i class="fa-solid fa-lock"></i></span>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="*********">
                                    </div>
                                    @error('password')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
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

