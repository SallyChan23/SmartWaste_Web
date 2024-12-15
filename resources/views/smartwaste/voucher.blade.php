@extends('layouts.app')

@section('content')

<style>
    body {
        background-color: rgb(160, 185, 72, 0.8);
    }

    .circle-left {
        position: absolute; 
        top: 50%; 
        left: -10px; 
        transform: translateY(-50%);
        width: 30px; 
        height: 30px; 
        background-color: rgb(160, 185, 72, 0.8); 
        border-radius: 50%;
    }

    .circle-right {
        position: absolute; 
        top: 50%; 
        right: -10px; 
        transform: translateY(-50%);
        width: 30px; 
        height: 30px; 
        background-color: rgb(160, 185, 72, 0.8); 
        border-radius: 50%;
    }

    .notification-bar {
        margin-top: 10px;
        text-align: center;
        padding: 10px;
        font-weight: bold;
        border-radius: 5px;
        font-size: 1rem;
    }

    .notification-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .notification-error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }
</style>

<!-- Title -->
<p class="text-center fs-1 pt-4 fw-bold" style="color:white; font-family:var(--primaryFont);">
    Voucher
</p>

<!-- Notification Bar -->
@if (session('success'))
    <div class="container">
        <div class="notification-bar notification-success">
            {{ session('success') }}
        </div>
    </div>
@elseif (session('error'))
    <div class="container">
        <div class="notification-bar notification-error">
            {{ session('error') }}
        </div>
    </div>
@endif

<!-- Add Voucher Button for Admin -->
@if(Auth::user()->role === 'admin')
    <div class="container d-flex justify-content-end">
        <a href="{{ route('voucher.create') }}" class="btn" style="background-color:white;">
            <p style="color:var(--darkgreen); margin:0;">Add Voucher</p>
        </a>
    </div>
@endif

<!-- Voucher List -->
<div class="container pt-3 pb-5">
    <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 g-5">
        @foreach ($vouchers as $voucher)
            <div class="col">
                <div class="voucher-card d-flex align-items-center justify-content-start p-3" style="background-color: white; border-radius: 10px; overflow: hidden; position: relative;">
                    
                    <!-- Left Decorative Circle -->
                    <div class="circle-left"></div>

                    <!-- Voucher Image -->
                    <div class="voucher-image" style="flex: 0 0 40%; max-width: 40%;">
                        <img src="{{ asset($voucher->voucherPicture) }}" 
                             alt="{{ $voucher->name }}" 
                             class="img-fluid" 
                             style="border-radius: 10px; object-fit: cover; height: 100%; width: 100%;">
                    </div>

                    <!-- Voucher Details -->
                    <div class="voucher-details ms-3" style="flex: 1;">
                        <p class="voucher-title fw-bold fs-5 mb-1" style="color: black;">{{ $voucher->name }}</p>
                        <div class="voucher-points d-flex align-items-center gap-1 mb-2">
                            <img src="{{ asset('assets/points.png') }}" 
                                 alt="Points Icon" 
                                 style="height: 20px; width: 20px;">
                            <span style="color: black;">{{ $voucher->pointsNeeded }} points</span>
                        </div>
                        <p class="voucher-price mb-2" style="color: black;">Price: {{ $voucher->price }}</p>

                        <!-- User Redeem Button -->
                        @if (Auth::user()->role === 'user')
                            <form action="{{ route('voucher.redeem', $voucher->voucherId) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning">Redeem</button>
                            </form>
                        @endif
                    </div>

                    <!-- Right Decorative Circle -->
                    <div class="circle-right"></div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection