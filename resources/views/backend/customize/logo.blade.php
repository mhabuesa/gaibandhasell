@extends('layouts.backend')
@push('title')
    <title>Logo | Gaibandhasell.com</title>
@endpush
@section('content')
<div class="row m-auto">
    @include('backend.customize.side_link')
    <div class="col-12 col-sm-12 col-md-8 col-lg-10">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3>Main logo</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('mainLogo.update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="logo">logo<i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <span><i class="fa-light fa-image"></i></span>
                                                    </span>
                                                </div>
                                                <input type="file" class="form-control" name="main_logo" id="logo" onchange="document.getElementById('mainLogo').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            @error('main_logo')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="logo">Preview</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <img src="{{asset('uploads')}}/logo/main_logo.png" id="mainLogo" alt="" width="200">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-3" id="short_link">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3>Footer logo</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{route('footerLogo.update')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="footerLogo">logo <i class="fa-solid fa-asterisk fa-xs" style="color: #ff0000;"></i></label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <span><i class="fa-light fa-image"></i></span>
                                                    </span>
                                                </div>
                                                <input type="file" class="form-control" name="footer_logo" onchange="document.getElementById('footerLogo').src = window.URL.createObjectURL(this.files[0])">
                                            </div>
                                            @error('footer_logo')
                                                <small class="text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="logo">Preview</label>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <img src="{{asset('uploads')}}/logo/footer_logo.png" id="footerLogo" alt="" width="200">
                                            </div>
                                        </div>
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
</div>

@endsection
@push('script')
<script>
    $(document).ready(function() {
    $('#switch2').change(function() {
        if (this.checked) {
            $('#short_link2').fadeIn(500);
        } else {
            $('#short_link2').fadeOut(200);
        }
    });
});
</script>
@endpush
