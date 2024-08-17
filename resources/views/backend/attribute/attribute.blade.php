@extends('layouts.backend')
@push('title')
    <title>Attribute | Gaibandhasell.com</title>
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell d-flex justify-content-between">
                                <h2>Size List</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <div class="row">
                        @foreach ($categories as $category )
                            <div class="col-lg-6 mt-3">
                                <h4>{{$category->name}}</h4>
                                <table class="display table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Atcion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse (App\Models\SizeModel::Where('category_id', $category->id)->get() as $sl => $size)
                                            <tr>
                                                <td>{{ $sl + 1 }}</td>
                                                <td>{{ $size->size }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary btn-icon squir-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></button>
                                                        <ul class="dropdown-menu dropdown-menu-end" style="">
                                                            <li>
                                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#size_edit{{ $size->id }}">Edit</a>
                                                            </li>
                                                            <li>
                                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#size_delete{{$size->id}}">Delete</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>



                                            </tr>

                                            {{-- Attributes Update Modal  --}}
                                            <div class="modal fade" id="size_edit{{$size->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Attribute</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('size.update', $size->id) }}" method="POST">
                                                            <div class="modal-body">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="col-form-label">SIze
                                                                            Name:</label>
                                                                        <input type="text" class="form-control"
                                                                            id="recipient-name" name="size"
                                                                            value="{{ $size->size }}">
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer d-flex justify-content-center">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Size Delete Modal  --}}
                                            <div class="modal fade" id="size_delete{{$size->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <div class="m-auto">
                                                            <h4 class="modal-title text-center" id="mySmallModalLabel">Are you want to <span class="text-danger">Delete</span> this Size?</h4>
                                                        </div>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a href="{{route('size.delete',$size->id)}}" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>

                                            @empty
                                            <tr class="text-center" ><th colspan="3" ><strong>Size Not Found</strong></th></tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h2>Add Size</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('size.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="size">Category Name <i class="fa-solid fa-asterisk fa-xs"
                                    style="color: #ff0000;"></i></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-solid fa-c"></i></span>
                                        </span>
                                    </div>
                                    <select name="category_id" required class="form-control">
                                        <option value="">Select a Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('size')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="size">Size Name <i class="fa-solid fa-asterisk fa-xs"
                                    style="color: #ff0000;"></i></label>
                            <div id="row" class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-light fa-text"></i></span>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ old('size') }}"
                                        name="size[]" id="size" placeholder="Enter Size Name" required>
                                    <div class="input-group-prepend">
                                        <button class="btn btn-danger" id="DeleteRow" type="button">
                                            <i class="fa-solid fa-trash-can"></i>
                                             &nbsp; Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div id="newinput"></div>
                           <div class="d-flex justify-content-end">
                            <button id="rowAdder" type="button" class="btn btn-dark mt-1">
                                <span class="fa-sharp fa-solid fa-plus">
                                </span>&nbsp; ADD
                            </button>
                           </div>
                            @error('size')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="mt-5 col-lg-12">
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-dark w-50">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell d-flex justify-content-between">
                                <h2>Colors List</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="display table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Color</th>
                                <th>Atcion</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $sl => $color)
                                <tr>
                                    <td>{{ $sl + 1 }}</td>
                                    <td>{{ $color->color_name }}</td>
                                    <td><span class="badge p-2 text-dark"
                                            style="background-color: {{ $color->color_code }}">{{ $color->color_code }}</span>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-icon squir-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></button>
                                            <ul class="dropdown-menu dropdown-menu-end" style="">
                                                <li>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#color_edit{{ $color->id }}">Edit</a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#color_delete{{$color->id}}">Delete</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>



                                </tr>

                                {{-- Color Edit Modal  --}}
                                <div class="modal fade" id="color_edit{{$color->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Color</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('color.update', $color->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Color
                                                            Name:</label>
                                                        <input type="text" class="form-control"
                                                            id="recipient-name" name="color_name"
                                                            value="{{ $color->color_name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="recipient-code" class="col-form-label">Color
                                                            Code:</label>
                                                        <input type="text" class="form-control"
                                                            id="recipient-code" name="color_code"
                                                            value="{{ $color->color_code }}">
                                                    </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                {{-- Color Delete Modal  --}}
                                <div class="modal fade" id="color_delete{{$color->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="m-auto">
                                                <h4 class="modal-title text-center" id="mySmallModalLabel">Are you want to <span class="text-danger">Delete</span> this Color?</h4>
                                            </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="{{route('color.delete',$color->id)}}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h2>Add Color</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('color.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="color_name">Color Name <i class="fa-solid fa-asterisk fa-xs"
                                    style="color: #ff0000;"></i></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-light fa-text"></i></span>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ old('color_name') }}"
                                        name="color_name" id="color_name" placeholder="Enter Color Name">
                                </div>
                                @error('color_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="colorInput">Color Code <i class="fa-solid fa-asterisk fa-xs"
                                    style="color: #ff0000;"></i></label>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span><i class="fa-solid fa-hashtag"></i></span>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ old('color_code') }}"
                                        name="color_code" id="colorInput" placeholder="Enter Color Code">

                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                               <input type="color" id="colorPicker">
                                            </span>
                                        </div>
                                </div>
                                @error('color_code')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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

@push('script')
    <script type="text/javascript">
        $("#rowAdder").click(function() {
            newRowAdd =
                '<div id="row" class="form-group mt-2"> <div class="input-group">' +
                '<div class="input-group-prepend"><span class="input-group-text"><span><i class="fa-light fa-text"></i></span></span></div>' +
                '<input type="text" class="form-control"  value="{{ old('size') }}" name="size[]" id="size" placeholder="Enter Size Name" required>' +
                '<div class="input-group-prepend">' +
                '<button class="btn btn-danger" id="DeleteRow" type="button"> <i class="fa-solid fa-trash-can"></i> &nbsp; Delete </button></div></div></div>';



            $('#newinput').append(newRowAdd);
        });
        $("body").on("click", "#DeleteRow", function() {
            $(this).parents("#row").remove();
        })
    </script>


    @error('size')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "bottom-end",
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: false,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: "{{ $message }}"
            });
        </script>
    @enderror

    @error('color_name')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "bottom-end",
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: false,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: "{{ $message }}"
            });
        </script>
    @enderror
    @error('color_code')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "bottom-end",
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: false,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: "{{ $message }}"
            });
        </script>
    @enderror

    <script>
        const colorPicker = document.getElementById('colorPicker');
        const colorInput = document.getElementById('colorInput');

        colorPicker.addEventListener('input', function() {
            colorInput.value = colorPicker.value;
        });
    </script>

@endpush
