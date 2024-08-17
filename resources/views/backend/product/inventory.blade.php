@extends('layouts.backend')
@push('title')
    <title>Inventory | Gaibandhasell.com</title>
@endpush
@push('header')
    <style>
        .del{
        width: 10px;
    }
    </style>
@endpush
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card ">
            <div class="card-header">
                <h4>Product Inventory</h4>
                @if (session('inventory_store'))
                    <div class="alert alert-success">{{session('inventory_store')}}</div>
                @endif
            </div>
            <div class="card-body table-responsive">
                <form action="{{route('inventory.store',$product->id)}}" method="POST">
                    @csrf
                    <div class="mt-2">
                        <label for="" class="label-control">Product Name</label>
                        <input class="form-control" disabled type="text" value="{{$product->product_name}}">
                    </div>

                    <div class="mt-2">
                      <table class="table table-bordered">
                       <thead>
                        <tr>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Quantity</th>
                            <th style="width:50px">Action</th>
                        </tr>
                    </thead>



                       <tbody>
                        <tr id="row">
                            <td style="width: 12%; padding:4px;">
                                <select class="form-control" name="color_id[]" id="">
                                    <option value="">Select Color</option>
                                    @foreach ($colors as $color)
                                    <option value="{{$color->id}}">{{$color->color_name}}</option>
                                @endforeach
                                </select>
                            </td>
                            <td style="width: 12%; padding:4px;">
                                <select class="form-control" name="size_id[]" id="">
                                    <option>Select Size</option>

                                @foreach (App\Models\SizeModel::where('category_id',$product->category_id)->get() as $size)
                                    <option value="{{$size->id}}">{{$size->size}}</option>
                                @endforeach
                                </select>
                            </td>
                            <td style="width: 12%; padding:4px;"> <input type="number" class="form-control" name="price[]"></td>
                            <td style="width: 12%; padding:4px;"> <input type="number" class="form-control" name="discount[]"></td>
                            <td style="width: 12%; padding:4px;"> <input type="number" class="form-control" name="quantity[]"></td>
                            <td style="width: 12%; padding:4px;">
                                <button class="btn btn-danger del"
                                    id="DeleteRow"
                                    type="button">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                       </tbody>

                            <tfoot id="newinput"></tfoot>

                      </table>
                      <div class="plus d-flex justify-content-end mt-2">
                        <button id="rowAdder" type="button" class="btn btn-dark">
                            <span class="fa fa-plus ">
                            </span>
                        </button>
                      </div>

                    </div>
                    <div class="mt-2">
                       <button class="btn btn-primary">Add Inventory</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Inventory Of {{$product->product_name}}</h4>
                @if (session('inventory_delete'))
                <div class="alert alert-success">{{session('inventory_delete')}}</div>
            @endif
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>SL</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Discount</th>
                        <th>After Discount</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($inventories as $key=> $inventory)

                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$inventory->rel_to_color->color_name}}</td>
                        <td>{{$inventory->rel_to_size->size}}</td>
                        <td>{{$inventory->price}}</td>
                        <td>{{$inventory->discount == null?'0':$inventory->discount}}</td>
                        <td>{{$inventory->after_discount == null?'0':$inventory->after_discount}}</td>
                        <td>{{$inventory->quantity}}</td>
                        <td style="width:50px;">
                            <a class="dropdown-item d-flex justify-content-center" style="padding: 10px 5px; background:#ea5455;" href="#" data-bs-toggle="modal" data-bs-target="#size_delete{{$inventory->id}}"><i class="fa fa-trash text-white"></i></a>
                        </td>
                    </tr>


                    {{-- Veriant Delete Modal  --}}
                    <div class="modal fade" id="size_delete{{$inventory->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="m-auto">
                                    <h4 class="modal-title text-center" id="mySmallModalLabel">Are you want to <span class="text-danger">Delete</span> this Veriant?</h4>
                                </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="{{route('inventory.delete',$inventory->id)}}" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                        </div>
                    </div>

                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>


@endsection



@push('script')
<script type="text/javascript">
    $("#rowAdder").click(function () {
        newRowAdd =
            '<tr id="row"><td style="width: 12%; padding:4px;">'+
                        '<select class="form-control" name="color_id[]" id="">'+
                        '<option>Select Color</option>'+
                        '@foreach ($colors as $color)'+
                        '<option value="{{$color->id}}">{{$color->color_name}}</option>'+
                        '@endforeach'+
                        '</select></td>'+
                        '<td style="width: 12%; padding:4px;"><select class="form-control" name="size_id[]" id="">'+
                        '<option>Select Size</option>'+
                        '@foreach (App\Models\SizeModel::where("category_id",$product->category_id)->get() as $size)'+
                        '<option value="{{$size->id}}">{{$size->size}}</option>'+
                        '@endforeach'+
                        '</select></td>'+
                        '<td style="width: 12%; padding:4px;"><input type="number" class="form-control" name="price[]"></td>'+
                        '<td style="width: 12%; padding:4px;"><input type="number" class="form-control" name="discount[]"></td>'+
                        '<td style="width: 12%; padding:4px;"><input type="number" class="form-control" name="quantity[]"></td>'+
                        '<td style="width: 12%; padding:4px;"><button class="btn btn-danger del"  id="DeleteRow" type="button">'+
                        '<i class="fa fa-trash"></i></button></td> </tr>';

        $('#newinput').append(newRowAdd);
    });
    $("body").on("click", "#DeleteRow", function () {
        $(this).parents("#row").remove();
    })
</script>


@endpush
