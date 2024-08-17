@extends('layouts.backend')
@push('title')
<title>Seller List | Gaibandhasell.com</title>
@endpush
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell d-flex justify-content-between">
                                <h2>Seller List</h2>
                                <a href="{{route('add.store')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add Store</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Store Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Atcion</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($sellers as $sl=> $seller )
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$seller->name}}</td>
                                <td>{{$seller->store->store_name}}</td>
                                <td>{{$seller->email}}</td>
                                <td>{{$seller->phone}}</td>

                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-icon squir-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li>
                                            <a class="dropdown-item" href="{{route('seller.edit',$seller->id)}}">Edit</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete{{$seller->id}}">Delete</a></li>
                                        </li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>

                            {{-- Vendor Delete Modal  --}}
                                <div class="modal fade" id="delete{{$seller->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="m-auto">
                                                <h4 class="modal-title text-center" id="mySmallModalLabel">Are you want to <span class="text-danger">Delete</span> this Seller</h4>
                                                <h4 class="modal-title text-center" id="mySmallModalLabel">and his (<strong>{{ $seller->store->store_name}}</strong>) Store ?</h4>
                                            </div>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="{{route('seller.delete',$seller->id)}}" class="btn btn-danger">Delete</a>
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
