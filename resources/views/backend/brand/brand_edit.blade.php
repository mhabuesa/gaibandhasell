@extends('layouts.backend')
@push('title')
<title>Edit Brand | Gaibandhasell.com</title>
@endpush
@section('content')

    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h2>Edit Brand</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('brand.update',$brand->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Brand Name <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-light fa-text"></i></span>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control"  value="{{$brand->name}}" name="name" id="name" placeholder="Enter Category Name">
                                </div>
                                @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="logo">Brand Logo</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-solid fa-image"></i></span>
                                        </span>
                                    </div>
                                    <input type="file" class="form-control" name="logo" id="logo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                @error('logo')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="logo">Preview</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <img src="{{asset('uploads')}}/brand/{{$brand->logo}}" id="blah" alt="" width="100">
                                </div>
                            </div>
                        </div>



                        <div class="mt-3 col-lg-12">
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-dark w-50">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
