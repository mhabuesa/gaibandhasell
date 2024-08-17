@extends('layouts.backend')
@push('title')
<title>All Products | Gaibandhasell.com</title>
@endpush
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card table-responsive">
                <div class="card-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell d-flex justify-content-between">
                                <h2>All Products</h2>
                                <a href="{{route('add.product')}}" class="btn btn-success"><i class="fa-solid fa-plus"></i> &nbsp; Add Products</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Store Name</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>After Discount</th>
                            <th>Preview Image</th>
                            <th>Total Unit</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $sl=> $product )
                            <tr class="{{$product->store->id == '1'?'bg-secondary':''}}">
                                <td>{{$sl+1}}</td>
                                <td>{{$product->store->store_name}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->discount}}</td>
                                <td>{{$product->after_discount}}</td>
                                <td>
                                    <img width="50" src="{{asset('uploads')}}/product/preview/{{$product->preview}}" alt="">
                                </td>
                                <td>{{"total Unit"}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-icon squir-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="">
                                            <li><a class="dropdown-item" href="#">View</a></li>
                                            <li><a class="dropdown-item" href="{{route('inventory',$product->id)}}">Inventory</a></li>
                                            <li><a class="dropdown-item" href="{{route('edit.product',$product->id)}}">Edit</a></li>
                                            <li>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete{{$product->id}}">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>


                            </tr>

                               {{-- Product Delete Modal  --}}
                            <div class="modal fade" id="delete{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="m-auto">
                                            <h4 class="modal-title text-center" id="mySmallModalLabel">Are you want to <span class="text-danger">Delete</span> this Product?</h4>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('product.delete',$product->id)}}" class="btn btn-danger">Delete</a>
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


