@extends('layouts.backend')
@push('title')
    <title>Head Short Text | Gaibandhasell.com</title>
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
                            <th>Text</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($texts as $sl=> $text )
                            <tr>
                                <td>{{$sl+1}}</td>
                                <td>{{$text->text}}</td>
                                <td>
                                    @if ($text->link)
                                    <a href="{{$text->link}}" target="_blank">Link</a>
                                    @else
                                    Null
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('shortText.status', $text->id)}}" method="POST">
                                        @csrf
                                        <label class="switch-btn form-label">
                                            <input type="checkbox" {{$text->status == '0'?'':'checked'}} onchange="this.form.submit()">
                                            <span></span>
                                        </label>
                                    </form>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-icon squir-pill dropdown-toggle hide-arrow waves-effect waves-light" data-bs-toggle="dropdown" aria-expanded="false"><i class="ti ti-dots-vertical"></i></button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="">
                                            <li>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#edit{{$text->id}}">Edit</a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete{{$text->id}}">Delete</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>

                            {{-- Text Update Modal  --}}
                            <div class="modal fade" id="edit{{$text->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Text</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('shortText.update', $text->id) }}" method="POST">
                                            <div class="modal-body">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Text:</label>
                                                        <input type="text" class="form-control"
                                                            id="recipient-name" name="text"
                                                            value="{{$text->text}}">
                                                    </div>
                                                    <div class="mt-3">
                                                        <label class="switch-btn form-label">
                                                            Any Link?
                                                            <input type="checkbox" id="switch2" {{$text->link == ''?'':'checked'}}>
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                    <div class="mt-3" id="short_link2" style="display: {{$text->link == ''?'none':''}};">
                                                        <label for="short_text" class="form-label">Link</label>
                                                        <input type="text" name="link" class="form-control" value="{{$text->link}}">
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
                            <div class="modal fade" id="delete{{$text->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <a href="{{route('shortText.delete',$text->id)}}" class="btn btn-danger">Delete</a>
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
                        <h3>Add Text</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('shortText.store')}}" method="POST">
                            @csrf
                            <div class="mt-3">
                                <label for="short_text" class="form-label">Short Text</label>
                                <input type="text" name="text" class="form-control" id="short_text">
                            </div>
                            <div class="mt-3">
                                <label class="switch-btn form-label">
                                    Any Link?
                                    <input type="checkbox" id="switch">
                                    <span></span>
                                </label>
                            </div>
                            <div class="mt-3" id="short_link" style="display: none;">
                                <label for="short_text" class="form-label">Link</label>
                                <input type="text" name="link" class="form-control">
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
@push('script')
<script>
    $(document).ready(function() {
    $('#switch').change(function() {
        if (this.checked) {
            $('#short_link').fadeIn(500); // You can adjust the speed
        } else {
            $('#short_link').fadeOut(200); // You can adjust the speed
        }
    });
});

    $(document).ready(function() {
    $('#switch2').change(function() {
        if (this.checked) {
            $('#short_link2').fadeIn(500); // You can adjust the speed
        } else {
            $('#short_link2').fadeOut(200); // You can adjust the speed
        }
    });
});
</script>

{{-- <script>
    $(document).ready(function() {
        $('#switch').change(function() {
            $('#short_link').toggle(this.checked);
        });
    });
</script> --}}

@endpush
