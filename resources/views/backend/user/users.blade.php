@extends('layouts.backend')
@push('title')
<title>Users List | Gaibandhasell.com</title>
@endpush
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card table-responsive">
                <div class="card-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell d-flex justify-content-between">
                                <h2>Users List</h2>
                                <a href="{{route('add.user')}}" class="btn btn-success"><i class="fa-solid fa-plus"></i> &nbsp; Add User</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Atcion</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $sl=> $user )
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                @if (Auth::user()->id == $user->id)
                                    <td>
                                        <div class="badge bg-primary text-white">Auth</div>
                                    </td>
                                @else
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-icon squir-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="">
                                            <li><a class="dropdown-item" href="{{route('user.edit',$user->id)}}">Edit</a></li>
                                            <li>
                                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete{{$user->id}}">Delete</a></li>
                                        </ul>
                                    </div>
                                </td>
                                @endif


                            </tr>

                            {{-- User Delete Modal  --}}
                            <div class="modal fade" id="delete{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="m-auto">
                                            <h4 class="modal-title text-center" id="mySmallModalLabel">Are you want to <span class="text-danger">Delete</span> this User?</h4>
                                        </div>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-footer d-flex justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('delete.store',$user->id)}}" class="btn btn-danger">Delete</a>
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
