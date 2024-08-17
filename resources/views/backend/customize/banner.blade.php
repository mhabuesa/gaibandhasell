@extends('layouts.backend')
@push('title')
    <title>Banner | Gaibandhasell.com</title>
@endpush
@section('content')
<div class="row m-auto">
    @include('backend.customize.side_link')
    <div class="col-12 col-sm-12 col-md-8 col-lg-10">
        <div class="card">
            <div class="card-body d-flex">
              <div class="col-lg-8">
                <div class="card-header text-center">
                    <h3>All Short Text </h3>
                </div>
                <div class="card-body table-responsive h-100">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Sub Title</th>
                            <th>Title</th>
                            <th>Link</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($banners as $sl=> $banner )
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$banner->sub_title}}</td>
                                <td>{{$banner->title}}</td>
                                <td>
                                    <a href="{{$banner->link}}" target="_blank">Link</a>
                                </td>
                                <td>
                                    <img src="{{asset('uploads/banner')}}/{{$banner->image}}" width="100" alt="">
                                </td>
                                <td>
                                    <form action="{{route('banner.status', $banner->id)}}" method="POST">
                                        @csrf
                                        <label class="switch-btn form-label">
                                            <input type="checkbox" {{$banner->status == '0'?'':'checked'}} onchange="this.form.submit()">
                                            <span></span>
                                        </label>
                                    </form>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-icon squir-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="">
                                            <li>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit{{$banner->id}}">Details</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{route('banner.edit', $banner->id)}}">Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete{{$banner->id}}">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            {{-- Banner Details Modal  --}}
                            <div class="modal fade" id="edit{{$banner->id}}" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalCenteredScrollableTitle">Banner Details</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-center">
                                      <p>{{$banner->sub_title}}</p>
                                      <p>{{$banner->title}}</p>
                                      <p>{{$banner->text}}</p>
                                      <p>{{$banner->sub_text}}</p>
                                      <p><img src="{{asset('uploads/banner')}}/{{$banner->image}}" width="300" alt=""></p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                      <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            {{-- Banner Delete Modal  --}}
                            <div class="modal fade" id="delete{{$banner->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="m-auto">
                                            <h4 class="modal-title text-center" id="mySmallModalLabel">Are you want to <span class="text-danger">Delete</span> this Text?</h4>
                                        </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('banner.delete',$banner->id)}}" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                                </div>
                            </div>
                        @endforeach
                    </table>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Banner Info</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('banner.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mt-3">
                                <label for="sub_title" class="form-label">Sub Title <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                                <input type="text" name="sub_title" class="form-control" id="sub_title" required value="{{old('sub_title')}}">
                                @error('sub_title')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="title" class="form-label">Title <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                                <input type="text" name="title" class="form-control" id="title" required value="{{old('title')}}">
                                @error('title')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="text" class="form-label">Text</label>
                                <input type="text" name="text" class="form-control" id="text" value="{{old('text')}}">
                                @error('text')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="sub_text" class="form-label">Sub Text</label>
                                <input type="text" name="sub_text" class="form-control" id="sub_text" value="{{old('sub_text')}}">
                                @error('sub_text')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="mt-3">
                                <label for="link" class="form-label">Link <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                                <input type="text" name="link" class="form-control" id="link" required value="{{old('link')}}">
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
                                        <input type="file" class="form-control" name="image" id="img" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" required>
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
                                        <img src="" id="image" alt="" width="250">
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

