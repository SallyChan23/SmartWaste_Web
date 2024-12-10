<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
    body {
    font-family: 'Poppins';
    }
    </style>
    <title>Register</title>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100" style="background-color: #F4F7F0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 text-center">
                    <img src="{{ asset('assets/logreg.png') }}" alt="Login Image" class="img-fluid" style="max-width: 80%; height: auto;">
                </div>
                <div class="col-md-5 p-4 mb-4 bg-white rounded-4 mx-auto">
                    <div class="d-flex mb-4 justify-content-center align-items-center fs-4">
                        <a href="{{ route('login') }}" 
                           class="text-decoration-none me-3" 
                           style="color: #A0B948;">Login</a>
                        <p class="text-decoration-underline mb-0" style="color: #183F23;">Register</p>
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
                
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-8 mx-auto">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                        </div>
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
                        <div class="row mb-3">
                            <div class="col-md-8 mx-auto position-relative">
                                <label for="password_confirmation" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                <i class="fa fa-eye position-absolute" id="togglePasswordConfirm" 
                                style="top: 73%; right: 18px; transform: translateY(-50%); cursor: pointer;"></i>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8 mx-auto">
                                <label for="phoneNumber" class="form-label">Phone Number</label>
                                <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mx-auto d-flex justify-content-center">
                                <button type="submit" class="btn btn-success btn-lg rounded-pill">Register</button>
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <p style="font-size: 12px;">Already have an account? 
                                <a href="{{ route('login') }}" class="text-decoration-none" style="color: #183F23;">Login</a>
                            </p>
                        </div>
                        <p class="text-center" style="font-size: 10px;">
                            By clicking Register, you agree to SmartWaste's User Agreement, <br>
                            including Subscription Terms and Privacy Policy.
                        </p>
                        
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

    const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
    const passwordConfirm = document.querySelector('#password_confirmation');
    togglePasswordConfirm.addEventListener('click', function () {
        const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordConfirm.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
</script>