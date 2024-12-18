<nav class="navbar navbar-expand-lg bg-body-tertiary py-0">
    <div class="container-fluid px-5 py-2" style="background-color:rgb(244, 247, 240,0.7); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)">
        <a href="{{ route('home') }}">
            <img src="{{ asset('assets/logo.png') }}" alt="Logo" width="130px" height="60px">
        </a>
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
                    @if (Auth::check())
                    @if (Auth::user()->role === 'user')
                        <!-- User Drop In Link -->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('drop_in.index') ? 'active' : '' }}"
                            href="{{ route('drop_in.index') }}">
                            Drop In
                            </a>
                        </li>
                    @elseif (Auth::user()->role === 'admin')
                        <!-- Admin Drop In Link -->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('admin.dropin.index') ? 'active' : '' }}"
                            href="{{ route('admin.dropin.index') }}">
                            Admin Drop In
                            </a>
                        </li>
                    @endif
                @endif

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
                    <a href="{{ route('profile.show') }}">
                        <img src="{{ asset('icons/profileicon.svg') }}" alt="Profile Icon" width="25" height="25">
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
    @media (min-width: 992px) { 
        .wide-gap {
            gap: 60px; 
        }
    }

    @media (max-width: 768px) { 
        .wide-gap {
            gap: 1px; 
        }

        .offcanvas {
            max-width: 250px; 
            font-size: 12px; 
        }
    }
</style>
