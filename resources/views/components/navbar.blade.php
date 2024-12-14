<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary py-0">
        <div class="container-fluid px-5 py-2" style="background-color: #F4F7F0; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1)">
            <img src="{{asset('assets/logo.png')}}" alt="" width="150px" height="80px">
            <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active rounded-5 text-center me-4" style="background-color: #E7E7E7; width: 100px" aria-current="page" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active rounded-5 text-center me-4" style="background-color: #E7E7E7; width: 100px" aria-current="page" href="#">Drop In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active rounded-5 text-center me-4" style="background-color: #E7E7E7; width: 100px" aria-current="page" href="{{route('mission.index')}}">Mission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active rounded-5 text-center me-4" style="background-color: #E7E7E7; width: 100px" aria-current="page" href="{{route('voucher.index')}}">Voucher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active rounded-5 text-center me-4" style="background-color: #E7E7E7; width: 100px" aria-current="page" href="{{route('aboutUs')}}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active rounded-5 text-center me-4" style="background-color: #E7E7E7; width: 100px" aria-current="page" href="{{ route('set-locale', 'en') }}">English</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active rounded-5 text-center me-4" style="background-color: #E7E7E7; width: 100px" aria-current="page" href="{{ route('set-locale', 'id') }}">Indonesia</a>
                    </li>
                </ul>
            </div>

            <div>
                <a href="{{ route('profile') }}">
                    <img src="{{ asset('icons/profileicon.svg') }}" alt="Profile" width="25" height="25">
                </a>
            </div>
        </div>
    </nav>
</body>
</html>