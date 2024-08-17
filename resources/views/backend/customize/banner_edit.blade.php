@extends('layouts.backend')
@push('title')
    <title>Banner Edit | Gaibandhasell.com</title>
@endpush
@section('content')
<div class="row m-auto">
    @include('backend.customize.side_link')
    <div class="col-12 col-sm-12 col-md-8 col-lg-10">
        <div class="card">
            <div class="card-body">
              <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Banner Info</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('banner.update', $banner->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label for="sub_title" class="form-label">Sub Title <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                                <input type="text" name="sub_title" class="form-control" id="sub_title" required value="{{$banner->sub_title}}">
                                @error('sub_title')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="title" class="form-label">Title <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                                <input type="text" name="title" class="form-control" id="title" required value="{{$banner->title}}">
                                @error('title')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="text" class="form-label">Text</label>
                                <input type="text" name="text" class="form-control" id="text" value="{{$banner->text}}">
                                @error('text')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="sub_text" class="form-label">Sub Text</label>
                                <input type="text" name="sub_text" class="form-control" id="sub_text" value="{{$banner->sub_text}}">
                                @error('sub_text')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="link" class="form-label">Link <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                                <input type="text" name="link" class="form-control" id="link" required value="{{$banner->link}}">
                                @error('link')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="img" class="form-label">Image &nbsp;<span class="text-danger">(Image Size Must be 375*243)</span></label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <span><i class="fa-light fa-image"></i></span>
                                            </span>
                                        </div>
                                        <input type="file" class="form-control" name="image" id="img" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])">
                                    </div>
                                    @error('image')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="logo">Preview</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <img src="{{asset('uploads/banner')}}/{{$banner->image}}" id="image" alt="" width="500">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3" id="short_link">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection

