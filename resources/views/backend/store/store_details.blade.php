@extends('layouts.backend')
@push('title')
    <title>Store Details | Gaibandhasell.com</title>
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Store Details</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th width="200px">Store Logo</th>
                            <td class="text-center">
                                @if ($store->logo == '')
                                <img src="{{asset('backend')}}/asset/img/avatar-1-256.png" width="100" alt="">
                                @else
                                <img src="{{asset('uploads')}}/store/{{$store->logo}}" width="100" alt="">
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th width="150px">Store Name</th>
                            <td>
                                {{$store->store_name}}
                            </td>
                        </tr>

                        <tr>
                            <th width="150px">Store Owner Name</th>
                            <td>
                                {{$store->vendor->name}}
                            </td>
                        </tr>

                        <tr>
                            <th width="150px">Store Address</th>
                            <td>
                                {{$store->address}}
                            </td>
                        </tr>
                        <tr>
                            <th width="150px">Phone</th>
                            <td>
                                {{$store->phone}}
                            </td>
                        </tr>
                        <tr>
                            <th width="150px">Email</th>
                            <td>
                                {{$store->email}}
                            </td>
                        </tr>
                        <tr>
                            <th width="150px">Facebook</th>
                            <td>
                                {{$store->facebook}}
                            </td>
                        </tr>


                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
