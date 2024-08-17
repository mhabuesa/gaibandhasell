@extends('layouts.backend')
@push('title')
<title>Edit Users | Gaibandhasell.com</title>
@endpush
@section('content')

    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h2>Users Update</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('user.update',$user->id)}}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Name <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-solid fa-user"></i></span>
                                        </span>
                                    </div>
                                    <input required type="text" class="form-control"  value="{{$user->name}}" name="name" id="name" placeholder="Enter Name">
                                    @error('name')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-solid fa-envelope"></i></span>
                                        </span>
                                    </div>
                                    <input required type="email" class="form-control"  value="{{$user->email}}" name="email" id="email" placeholder="Enter Email">
                                </div>
                                @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="password">Password</label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-solid fa-key"></i></span>
                                        </span>
                                    </div>
                                    <input type="password" class="form-control"  value="{{old('password')}}" name="password" id="password" placeholder="Enter password">
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 col-lg-12">
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-paimary w-50">Submit</button>
                            </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('script')


@endpush
