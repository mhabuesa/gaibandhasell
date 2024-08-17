@extends('layouts.backend')
@push('title')
    <title>Contact Info | Gaibandhasell.com</title>
@endpush
@section('content')
<div class="row m-auto">
    @include('backend.customize.side_link')
    <div class="col-12 col-sm-12 col-md-8 col-lg-10">
        <div class="card p-4">
            <div class="card-header">
                <h3>Contact Info</h3>
            </div>
            <div class="card-body">
                <form action="{{route('contactInfo.update')}}" method="POST"">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="phone">Phone <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                                <input type="phone" class="form-control" name="phone" id="phone" value="{{$info->phone}}">
                                    @error('phone')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="email">Email <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                                <input type="email" class="form-control" name="email" id="email" value="{{$info->email}}">
                                    @error('email')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="address">Address <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                                <textarea name="address" id="address" cols="30" rows="5" class="form-control">{{$info->address}}</textarea>
                                    @error('address')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="about">About Us <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                                <textarea name="about_us" id="about_us" cols="30" rows="5" class="form-control">{{$info->about_us}}</textarea>
                                    @error('about_us')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="facebook">Facebook</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <span><i class="fa-brands fa-facebook-f"></i></span>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="facebook" id="facebook" value="{{$info->facebook}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="twitter">Twitter</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <span><i class="fa-brands fa-twitter"></i></span>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="twitter" id="twitter" value="{{$info->twitter}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="instagram">Instagram</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <span><i class="fa-brands fa-instagram"></i></span>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="instagram" id="instagram" value="{{$info->instagram}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="mb-3">
                                <label for="linkedin">Linkedin</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <span><i class="fa-brands fa-linkedin-in"></i></span>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="linkedin" id="linkedin" value="{{$info->linkedin}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="mt-3" id="short_link">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

