@php
    $url = $_SERVER['REQUEST_URI'];
    $explode = explode('/', $url);
    $title = $explode[1];
@endphp
<div class="col-12 col-sm-12 col-md-4 col-lg-2">
    <div class="card sticky_top" >
        <div class="card-body">

            <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                <li class="nav-item">
                    <a class="nav-link text-center {{$title == 'shortText'?'active':''}}" href="{{route('shortText')}}">Header Text</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center {{$title == 'logo'?'active':''}}" href="{{route('logo')}}">Logo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center {{$title == 'contactInfo'?'active':''}}" href="{{route('contactInfo')}}">Contact Info</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center {{$title == 'banner'?'active':''}}" href="{{route('banner')}}">Banner</a>
                </li>
            </ul>

        </div>
    </div>
</div>
