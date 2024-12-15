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

    .voucher-img {
        border-radius: 10px; /* Adds slight curve to the image */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Adds subtle shadow */
        margin-right: 10px; /* Space between image and text */
        height: 90px;
        width: 140px;
        object-fit: cover; /* Ensures the image fits perfectly */
    }

    .voucher-card {
        background-color: white; 
        min-height: 170px; 
        font-family: var(--primaryFont); 
        position: relative; 
        overflow: hidden; 
        border-radius: 10px; /* Rounded corners for the entire card */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Card shadow */
    }

    .voucher-title {
        font-size: 1.2rem;
        font-weight: bold;
        color: black;
    }

    .voucher-points {
        font-size: 0.9rem;
        color: black;
        display: flex;
        align-items: center;
        gap: 5px; /* Space between points icon and text */
    }

    .redeemed-date {
        font-size: 0.9rem;
        color: black;
    }
</style>

<!-- Page Title -->
<p class="text-center fs-1 pt-4 fw-bold" style="color:white; font-family:var(--primaryFont);">
    Redeemed Vouchers
</p>

<!-- Vouchers Section -->
<div class="container pt-3 pb-5">
    <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 g-5">
        @forelse ($redeemedVouchers as $redeemedVoucher)
            <!-- Each Voucher -->
            <div class="col">
                <div class="d-flex flex-row align-items-center justify-content-center px-4 voucher-card">
                    <!-- Left Decorative Circle -->
                    <div class="circle-left"></div>
                    
                    <!-- Voucher Image -->
                    <img src="{{ asset($redeemedVoucher->voucher->voucherPicture) }}" 
                         alt="{{ $redeemedVoucher->voucher->name }}" 
                         class="voucher-img">

                    <!-- Voucher Details -->
                    <div class="card-body d-flex flex-column justify-content-center">
                        <!-- Voucher Name -->
                        <p class="voucher-title">
                            {{ $redeemedVoucher->voucher->name }}
                        </p>
                        
                        <!-- Points Needed -->
                        <div class="voucher-points">
                            <img src="{{ asset('assets/points.png') }}" 
                                 alt="Points" 
                                 style="height: 20px; width: 20px;">
                            {{ $redeemedVoucher->voucher->pointsNeeded }} points
                        </div>
                        
                        <!-- Redeemed Date -->
                        <p class="redeemed-date">
                            Date Redeemed: {{ $redeemedVoucher->created_at->format('d-m-Y') }}
                        </p>
                    </div>

                    <!-- Right Decorative Circle -->
                    <div class="circle-right"></div>
                </div>
            </div>
        @empty
            <!-- Empty State -->
            <p class="text-center">No vouchers redeemed yet.</p>
        @endforelse
    </div>
</div>

@endsection