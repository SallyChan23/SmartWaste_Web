<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid" style="background-color: #F4F7F0;">
            <img src="{{asset('assets/logos.png')}}" alt="" width="150" height="85">
            
            <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active rounded-5 text-center me-4" style="background-color: #E7E7E7; width: 100px" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active rounded-5 text-center me-4" style="background-color: #E7E7E7; width: 100px" aria-current="page" href="#">Drop In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active rounded-5 text-center me-4" style="background-color: #E7E7E7; width: 100px" aria-current="page" href="{{route('mission.index')}}">Mission</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active rounded-5 text-center me-4" style="background-color: #E7E7E7; width: 100px" aria-current="page" href="#">Voucher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active rounded-5 text-center me-4" style="background-color: #E7E7E7; width: 100px" aria-current="page" href="{{route('aboutUs')}}">About Us</a>
                    </li>
                </ul>
            </div>

            <div>
                <img src="{{asset('icons/profileicon.svg')}}" alt="" width="25" height="25">
            </div>
        </div>
    </nav>
</body>
</html>