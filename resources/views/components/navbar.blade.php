<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary  py-0">
        <div class="container-fluid px-5 py-2" style="background-color:rgb(244, 247, 240,0.7); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)">
            <img src="{{asset('assets/logo.png')}}" alt="" width="130px" height="60px">
            <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav" style="font-family:var(--primaryFont);font-size:16px">
                <ul class="navbar-nav d-flex gap-5">
                    <li class="nav-item">
                        <a class="nav-link  {{ request()->routeIs('home') ? 'active' : '' }}"  aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ request()->routeIs('#') ? 'active' : '' }}"  aria-current="page" href="#">Drop In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('mission.index') ? 'active' : '' }}"  aria-current="page" href="{{route('mission.index')}}">Mission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  {{ request()->routeIs('voucher.index') ? 'active' : '' }}"  aria-current="page" href="{{route('voucher.index')}}">Voucher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link   {{ request()->routeIs('aboutUs') ? 'active' : '' }}"  aria-current="page" href="{{route('aboutUs')}}">About Us</a>
                    </li>

                </ul>
            </div>

            <div class="d-flex flex-row align-items-center gap-3">
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
    </nav>
</body>
</html>