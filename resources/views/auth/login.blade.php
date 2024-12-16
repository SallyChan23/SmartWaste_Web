<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="{{ asset('assets/logoSmall.png') }}" type="image/png">
    
    <style>
    body {
    font-family: 'Poppins';
    }
    </style>
    <title>Login</title>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100" style="background-color: #F4F7F0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 text-center">
                    <img src="{{ asset('assets/logreg.png') }}" alt="Login Image" class="img-fluid" style="max-width: 80%; height: auto;">
                </div>
                <div class="col-md-5  p-3 mb-2 bg-white rounded-4">
                    <div class="d-flex mb-3 justify-content-center align-items-center fs-4">

                        <p class="text-decoration-underline me-3 mb-0" style="color: #A0B948;">Login</p>
                        
                        <a href="{{ route('register') }}" 
                           class="text-decoration-none ms-3" 
                           style="color: #183F23;">Register</a>
                    </div>
                    
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-8 mx-auto">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8 mx-auto position-relative">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                            <i class="fa fa-eye position-absolute" id="togglePassword" 
                            style="top: 73%; right: 18px; transform: translateY(-50%); cursor: pointer;"></i>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success btn-lg rounded-pill">Login</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });

</script>