@extends('layouts.backend')
@push('title')
<title>Store List | Gaibandhasell.com</title>
@endpush
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell d-flex justify-content-between">
                                <h2>Store List</h2>
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
                            <th>Store Name</th>
                            <th>Owner Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Atcion</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($stores as $sl=> $store )
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$store->store_name}}</td>
                                <td>{{$store->vendor->name}}</td>
                                <td>{{$store->phone}}</td>
                                <td>{{$store->email}}</td>
                                <td>
                                    <a href="" class="badge bg-{{$store->status == '1'? 'success':'danger'}} text-white" data-bs-toggle="modal" data-bs-target="#modal{{$store->id}}">{{$store->status == '1'? 'Enable':'Disable'}}</a>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-icon squir-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="">
                                            <li><a class="dropdown-item" href="{{route('store.details',$store->id)}}">Details</a></li>
                                            <li><a class="dropdown-item" href="{{route('stores.edit',$store->id)}}">Edit</a></li>
                                            <li>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete{{$store->id}}">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>

                            </tr>


                            {{-- Store Status Change Modal  --}}

                                <div class="modal fade" id="modal{{$store->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-center" id="mySmallModalLabel">Are you want to <span class="text-{{$store->status == '1'? 'danger':'success'}}">{{$store->status == '1'? 'Disable':'Enable'}}</span> this Store?</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('store.status',$store->id)}}" class="btn btn-{{$store->status == '1'? 'danger':'success'}}">{{$store->status == '1'? 'Disable':'Enable'}}</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>


                            {{-- Store Delete Modal  --}}
                                <div class="modal fade" id="delete{{$store->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-center" id="mySmallModalLabel">Are you want to <span class="text-danger">Delete</span> this Store?</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>

                                        <div class="modal-footer d-flex justify-content-center">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a href="{{route('delete.store',$store->id)}}" class="btn btn-danger">Delete</a>
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
