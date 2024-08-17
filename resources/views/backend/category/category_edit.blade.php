@extends('layouts.backend')
@push('title')
<title>Edit Category | Gaibandhasell.com</title>
@endpush
@section('content')

    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h2>Edit Category</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Category Name <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-light fa-text"></i></span>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control"  value="{{$category->name}}" name="name" id="name" placeholder="Enter Category Name">
                                </div>
                                @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="icon">Icon</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-solid fa-image"></i></span>
                                        </span>
                                    </div>
                                    <input type="file" class="form-control" name="icon" id="icon" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                </div>
                                @error('icon')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="icon">Preview</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <img src="{{asset('uploads')}}/category/{{$category->icon}}" id="blah" alt="" width="100">
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
