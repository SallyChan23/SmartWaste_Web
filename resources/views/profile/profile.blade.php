@extends('layouts.app')

@section('content')
    <div class="container-fluid p-4 mt-4 mb-5" style="background-color: white;">

        <!-- Row gabungan -->
        <div class="row justify-content-center gap-4">

            <!-- Sidebar -->
            <div class="col-md-3 text-center p-4 me-5">
                <div class="row align-items-center">
                    <div class="col-md-6 d-flex justify-content-center">
                        <img 
                            src="{{ $user->profilePicture ? asset('storage/' . $user->profilePicture) : asset('default-profile.png') }}" 
                            alt="@lang('profile.profile_picture')" 
                            class="rounded-circle mb-3" 
                            width="120" 
                            height="120"
                            style="border: 4px solid #5eaf60; box-shadow: 0 0 5px rgba(0,0,0,0.2);"
                        >
                    </div>

                    <div class="col-md-6 d-flex flex-column justify-content-center">
                        <h5 class="fw-bold mb-1">{{ $user->username }}</h5>
                        <p class="text-muted mb-0">
                            <img src="assets/points.png" alt="" srcset="" style="object-fit:cover; height:20px;width:20px">
                            <i class="bi bi-coin text-warning" style="font-size: 1.2rem;"></i>
                            <span class="fw-semibold">{{ $user->points ?? 0 }} @lang('profile.points')</span>
                        </p>
                    </div>
                </div>
                <hr class="mb-4 mt-4" style="width: 100%; margin: 0 auto; border-top: 2px solid #183F23; font-family: var(--primaryFont);">

    
            

            <ul class="list-unstyled text-start">
                <li class="mb-4">
                    <img src="{{ asset('assets/profile3.png') }}" alt="" class="me-2" style="width: 30px">
                    <a href="{{ route('profile.show') }}" class="text-decoration-none fw-semibold text-success">@lang('profile.profile_title')</a>
                    <hr style="width: 50%; margin-top: 0.3rem; margin-left: 40px; border-top: 2px solid #5eaf60; font-family: var(--primaryFont);">
                </li>
                <li class="mb-4">
                    <img src="{{ asset('assets/profile2.png') }}" alt="" class="me-2 ms-1" style="width: 25px">
                    <a href="{{ route('profile.report') }}" class="text-decoration-none text-dark">@lang('profile.report')</a>
                </li>
                <li class="mb-4">
                    <img src="{{ asset('assets/profile1.png') }}" alt="" class="me-2 ms-1" style="width: 25px">
                    <a href="{{ route('redeem') }}" class="text-decoration-none text-dark">@lang('profile.redeemed_vouchers')</a>
                </li>

                <li class="mb-4">
                    <img src="{{ asset('assets/profile1.png') }}" alt="" class="me-2 ms-1" style="width: 25px">
                    <a href="{{ route('drop_in.process') }}" class="text-decoration-none text-dark">@lang('profile.Process')</a>
                </li>
                @if (Auth::check())
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="rounded-5 text-center text-white btn" style="background-color: #183F23; width: 100px; height: 50px">@lang('profile.logout')</button>
                        </form>
                    </li>
                @endif
                </ul>
            </div>

        <!-- Profile Update Form -->
        <div class="col-md-7 p-5 shadow-sm" style="border-radius: 15px; background-color:#F4F7F0">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            <h4 class="fw-normal mb-4 text-start f2-1">@lang('profile.my_profile')</h4>
            <hr class="mb-5" style="width: 100%; margin: 0 auto; border-top: 2px solid #183F23; font-family:var(-primaryFont);">
            
            <div class="row">
                    <!-- Profile Picture Update -->
                        <div class="col-md-5 text-center position-relative" style="min-height: 200px;">
                            <form method="POST" action="{{ route('profile.updatePicture') }}" enctype="multipart/form-data">
                                @csrf
                                <label for="profilePicture" class="d-block " style="cursor: pointer;">
                                    <img 
                                        src="{{ $user->profilePicture ? asset('storage/' . $user->profilePicture) : asset('default-profile.png') }}" 
                                        alt="Profile Picture" 
                                        class="rounded-circle mb-3" 
                                        width="150" 
                                        height="150"
                                        style="border: 4px solid #8DA653; box-shadow: 0 0 5px rgba(0,0,0,0.2);"
                                    >
                                    <input type="file" id="profilePicture" name="profilePicture" class="d-none" accept="image/*" onchange="this.form.submit()">
                                </label>
                                <p class="fw-semibold mb-0">@lang('profile.change_profile_picture')</p>
                            </form>
                        </div>          

                    <div class="col-md-7 text-start fs-6">
                        <form method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-sm-6 form-label fw-Medium text-start">@lang('profile.usernames')</label>
                                <div class="col-sm-6 d-flex">
                                    <input 
                                        type="text" 
                                        name="username" 
                                        value="{{ old('username', $user->username) }}" 
                                        placeholder="@lang('profile.placeholder_username')" 
                                        class="form-control rounded-pill @error('username') is-invalid @enderror"
                                    >
                                    @error('username')
                                        <div class="invalid-feedback text-start">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-6 form-label fw-Medium text-start">@lang('profile.phone_number')</label>
                                <div class="col-sm-6 d-flex">
                                    <input 
                                        type="text" 
                                        name="phoneNumber" 
                                        value="{{ old('phoneNumber', $user->phoneNumber) }}" 
                                        placeholder="@lang('profile.placeholder_phone')" 
                                        class="form-control rounded-pill @error('phoneNumber') is-invalid @enderror"
                                    >
                                    @error('phoneNumber')
                                        <div class="invalid-feedback text-start">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-6 form-label fw-Medium text-start">@lang('profile.emails')</label>
                                <div class="col-sm-6 d-flex">
                                    <input 
                                        type="email" 
                                        name="email" 
                                        value="{{ old('email', $user->email) }}" 
                                        placeholder="@lang('profile.placeholder_email')" 
                                        class="form-control rounded-pill @error('email') is-invalid @enderror"
                                    >
                                    @error('email')
                                        <div class="invalid-feedback text-start">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-6 form-label fw-Medium text-start">@lang('profile.new_password')</label>
                                <div class="col-sm-6 d-flex">
                                    <div class="input-group">
                                        <input 
                                            id="password"
                                            type="password" 
                                            name="password" 
                                            class="form-control rounded-start-pill"
                                            placeholder="@lang('profile.optional_new_password')"
                                        >
                                        <span class="input-group-text bg-white border-0 rounded-end-pill">
                                            <i class="fa fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-5 row">
                                <label for="password_confirmation" class="col-sm-6 form-label fw-Medium text-start">@lang('profile.confirm_password')</label>
                                <div class="col-sm-6 d-flex">
                                    <div class="input-group">
                                        <input 
                                            id="password_confirmation"
                                            type="password" 
                                            name="password_confirmation" 
                                            class="form-control rounded-start-pill"
                                            placeholder="@lang('profile.placeholder_confirm_password')"
                                        >
                                        <span class="input-group-text bg-white border-0 rounded-end-pill">
                                            <i class="fa fa-eye" id="togglePasswordConfirm" style="cursor: pointer;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            
                            
                            <div class="justify-content-start" style="">
                                <button type="submit" class="btn text-white px-4 text-start" style="background-color: #8DA653; border-radius: 15px;">
                                    @lang('profile.save_changes')
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .rounded-circle {
            border: 3px solid #5eaf60; 
        }

        .bg-white {
            background-color: #fff;
        }

        .form-control {
            background-color: #f8f9f6;
            border: 1px solid #dcdcdc;
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(94, 175, 96, 0.5);
            border-color: #5eaf60;
        }

        .shadow-sm {
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .form-label {
        width: 200px; 
        }

        @media (min-width: 768px) and (max-width: 1024px) {
            .form-label {
                width: 250px;
            }
        }

        @media (min-width: 1025px) {
            .form-label {
                width: 300px;
            }
        }

        .col-sm-6 {
            flex: 1;
        }
    </style>
@endsection


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            this.classList.toggle('fa-eye-slash');
            this.classList.toggle('fa-eye');
        });

        const togglePasswordConfirm = document.querySelector('#togglePasswordConfirm');
        const passwordConfirm = document.querySelector('#password_confirmation');
        togglePasswordConfirm.addEventListener('click', function () {
            const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordConfirm.setAttribute('type', type);

            this.classList.toggle('fa-eye-slash');
            this.classList.toggle('fa-eye');
        });
    });

</script>

