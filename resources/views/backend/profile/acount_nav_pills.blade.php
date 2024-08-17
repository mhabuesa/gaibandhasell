<!-- Navbar pills -->
<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-sm-row mb-4">
            <li class="nav-item">
                <a class="nav-link {{ $_SERVER['REQUEST_URI'] == '/profile' ? 'active' : '' }}"
                    href="{{ route('profile') }}">
                    <i class="ti-xs ti ti-user-check me-1"></i> Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $_SERVER['REQUEST_URI'] == '/profile/setting' ? 'active' : '' }}"
                    href="{{route('profile.setting')}}">
                    <i class="ti-xs ti ti-settings me-1"></i> Settings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $_SERVER['REQUEST_URI'] == '/profile/security' ? 'active' : '' }}"
                    href="{{route('profile.security')}}">
                    <i class="ti-xs ti ti-lock me-1"></i> Security
                </a>
            </li>
        </ul>
    </div>
</div>
<!--/ Navbar pills -->
