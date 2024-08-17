@extends('layouts.backend')
@push('title')
    <title>Profile Security | Gaibandhasell.com</title>
@endpush
@section('content')

        <div class="row">
            <div class="col-md-12">
                @include('backend.profile.acount_nav_pills')

                <!-- Change Password -->
                <div class="card mb-4">
                    <h5 class="card-header">Change Password</h5>
                    <div class="card-body">
                        <form id="formAccountSettings" action="{{route('profile.security.update')}}" method="POST"
                            class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                                    <label class="form-label" for="currentPassword">Current Password</label>
                                    <div class="input-group input-group-merge has-validation">
                                        <input class="form-control" type="password" name="current_password"
                                            id="currentPassword" placeholder="············" value="{{old('current_password')}}">
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                    @error('current_password')
                                        <strong class="text-danger text-capitalize">{{$message}}</strong>
                                    @enderror

                                    @if (session('error'))
                                        <strong class="text-danger text-capitalize">{{session('error')}}</strong>
                                    @endif


                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                                    <label class="form-label" for="newPassword">New Password</label>
                                    <div class="input-group input-group-merge has-validation">
                                        <input class="form-control" type="password" id="newPassword" name="password"
                                            placeholder="············" value="{{old('password')}}">
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                    </div>
                                    @error('password')
                                        <strong class="text-danger text-capitalize">{{$message}}</strong>
                                    @enderror
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>

                                <div class="mb-3 col-md-6 form-password-toggle fv-plugins-icon-container">
                                    <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                    <div class="input-group input-group-merge has-validation">
                                        <input class="form-control" type="password" name="password_confirmation"
                                            id="confirmPassword" placeholder="············" value="{{old('password_confirmation')}}">
                                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>

                                    </div>
                                    @error('password_confirmation')
                                        <strong class="text-danger text-capitalize">{{$message}}</strong>
                                    @enderror
                                    <div
                                        class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                    </div>
                                </div>
                                <div class="col-12 mb-4">
                                    <h6>Password Requirements:</h6>
                                    <ul class="ps-3 mb-0">
                                        <li class="mb-1">Minimum 8 characters long - the more, the better</li>
                                        <li class="mb-1">At least one lowercase character</li>
                                        <li>At least one number, symbol, or whitespace character</li>
                                    </ul>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary me-2 waves-effect waves-light">Save
                                        changes</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <!--/ Change Password -->

            </div>
        </div>



@endsection

@push('script')

@if (session('update'))
<script>
    const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
    }
    });
    Toast.fire({
    icon: "success",
    title: "{{session('update')}}"
    });
</script>
@endif

@endpush
