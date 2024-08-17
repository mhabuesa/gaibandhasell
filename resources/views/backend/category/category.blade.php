@extends('layouts.backend')
@push('title')
<title>Category | Gaibandhasell.com</title>
@endpush
@push('header')
<style>
    .action_menu {
    min-width: 7rem !important;
    background-color: #090034 !important;
    color: #dedede !important;
}
    .action_menu a:hover {
    background-color: #00a8ff !important;
    color: #ffffff !important;
}
.modal-content {
    width: 420px;
}
</style>
@endpush
@section('content')

    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h2>Category List</h2>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="card-body table-responsive">
                        <div class="card-block">
                            <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th>Product</th>
                                    <th>status</th>
                                    <th>Atcion</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $sl=> $category )
                                    <tr>
                                        <td>{{$sl+1}}</td>
                                        <td>{{$category->name}}</td>
                                        <td><img src="{{asset("uploads")}}/category/{{$category->icon}}" width="40" alt=""></td>
                                        <td>{{App\Models\ProductModel::where('category_id',$category->id)->count()}}</td>
                                        <td>
                                            <form action="{{route('category.status', $category->id)}}" method="POST">
                                                @csrf
                                                <div class="mt-3">
                                                    <label class="switch-btn form-label">
                                                        <input type="checkbox" id="switch" {{$category->status == 1?'checked':''}} onchange="this.form.submit()">
                                                        <span></span>
                                                    </label>
                                                </div>
                                                {{-- <input id="toggle-trigger" {{$category->status == 1?'checked':''}} type="checkbox" data-toggle="toggle" data-size="sm" onchange="this.form.submit()"> --}}
                                            </form>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-icon squir-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></button>
                                                <ul class="dropdown-menu dropdown-menu-end" style="">
                                                    <li>
                                                        <a class="dropdown-item" href="{{route('category.edit',$category->id)}}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete{{$category->id}}">Delete</a></li>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>

                                    {{-- Category Delete Modal  --}}
                                        <div class="modal fade" id="delete{{$category->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                   <div class="m-auto">
                                                    <h4 class="modal-title text-center" id="mySmallModalLabel">Are you want to <span class="text-danger">Delete</span> this Category?</h4>
                                                   </div>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>

                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="{{route('category.delete',$category->id)}}" class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                            </div>
                                        </div>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h2>Add Category</h2>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="card-body">
                        <div class="card-block">
                            <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
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
                                            <input type="text" class="form-control"  value="{{old('name')}}" name="name" id="name" placeholder="Enter Category Name">
                                        </div>
                                        @error('name')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="icon">Icon <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <span><i class="fa-light fa-image"></i></span>
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
                                            <img src="{{asset('backend')}}/img/avatars/img.png" id="blah" alt="" width="100">
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
        </div>
    </div>


@endsection

@push('script')

<script src="{{asset('backend')}}/asset/js/lib/datatables-net/datatables.min.js"></script>
	<script>
		$(function() {
			$('#example').DataTable();
		});
</script>

@endpush
