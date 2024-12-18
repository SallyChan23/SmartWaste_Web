<nav class="navbar navbar-expand-lg bg-body-tertiary py-0">
    <div class="container-fluid px-5 py-2" style="background-color:rgb(244, 247, 240,0.7); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)">
        <img src="{{asset('assets/logo.png')}}" alt="" width="130px" height="60px">
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end ps-3" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
            <div class="offcanvas-header pt-5 ">
                <h5 class="offcanvas-title fw-bold fs-2" style="color: #183F23;" id="offcanvasMenuLabel">Menu</h5>
                <button type="button" class="btn-close text-reset pe-5" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav flex-column flex-lg-row align-items-lg-center justify-content-lg-center w-100 wide-gap fw-medium fs-6">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('#') ? 'active' : '' }}" href="#">Drop In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('mission.index') ? 'active' : '' }}" href="{{route('mission.index')}}">Mission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('voucher.index') ? 'active' : '' }}" href="{{route('voucher.index')}}">Voucher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('aboutUs') ? 'active' : '' }}" href="{{route('aboutUs')}}">About Us</a>
                    </li>
                </ul>

                <div class="d-flex flex-row align-items-center gap-3 mt-2">
                    <div class="locale-switch">
                        <input 
                            type="checkbox" 
                            id="localeSwitch" 
                            onchange="window.location.href='{{ route('set-locale', ['locale' => app()->getLocale() == 'en' ? 'id' : 'en']) }}'"
                            {{ app()->getLocale() == 'id' ? 'checked' : '' }}
                        >
                        <label for="localeSwitch" class="locale-slider"></label>
                    </div>
                    <a href="{{ route('profile') }}">
                        <img src="{{ asset('icons/profileicon.svg') }}" alt="Profile Icon" width="25" height="25">
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    /* Custom styles for larger screens */
@media (min-width: 992px) { /* 992px is the default breakpoint for medium screens in Bootstrap */
    .wide-gap {
        gap: 60px; /* Adjust the gap as needed */
    }
}

/* Styles for mobile screens */
@media (max-width: 768px) { /* 768px is the default breakpoint for small screens in Bootstrap */
    .wide-gap {
        gap: 1px; /* Adjust the gap as needed for smaller screens */
    }

    .offcanvas {
        max-width: 250px; /* Adjust the maximum width for the entire offcanvas container */
        font-size: 12px; 
    }
}

</style>