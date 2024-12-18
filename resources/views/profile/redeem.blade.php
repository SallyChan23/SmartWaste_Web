@extends('layouts.app')

@section('content')

<style>
    .circle-left {
        position: absolute; 
        top: 50%; 
        left: -10px; 
        transform: translateY(-50%);
        width: 30px; 
        height: 30px; 
        background-color: #F4F7F0; 
        border-radius: 50%;
    }

    .circle-right {
        position: absolute; 
        top: 50%; 
        right: -10px; 
        transform: translateY(-50%);
        width: 30px; 
        height: 30px; 
        background-color: #F4F7F0; 
        border-radius: 50%;
    }

    .voucher-img {
        object-fit: cover; 
        height: 90px; 
        width: 140px; 
        border-radius: 10px;
    }

    .card-title {
        font-size: 1.2rem; 
        font-weight: bold;
    }

    .card-text {
        font-size: 0.9rem;
    }

    .page-link {
        background-color: white; 
        color: var(--darkgreen); 
    }

    .page-link:hover {
        background-color: var(--darkgreen); 
        color: white; 
    }

    .page-item.active .page-link {
        background-color: var(--darkgreen); 
        color: white; 
        border-color: var(--darkgreen);
    }
</style>


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
                    <a href="{{ route('profile') }}" class="text-decoration-none fw-semibold text-success">@lang('profile.profile_title')</a>
                    <hr style="width: 50%; margin-top: 0.3rem; margin-left: 40px; border-top: 2px solid #5eaf60; font-family: var(--primaryFont);">
                </li>
                <li class="mb-4">
                    <img src="{{ asset('assets/profile2.png') }}" alt="" class="me-2 ms-1" style="width: 25px">
                    <a href="{{ route('report') }}" class="text-decoration-none text-dark">@lang('profile.report')</a>
                </li>
                <li class="mb-5">
                    <img src="{{ asset('assets/profile1.png') }}" alt="" class="me-2 ms-1" style="width: 25px">
                    <a href="{{ route('redeem') }}" class="text-decoration-none text-dark">@lang('profile.redeemed_vouchers')</a>
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

        <div class="col-md-7 p-5 shadow-sm" style="border-radius: 15px; background-color:#F4F7F0">
            <h4 class="fw-normal mb-2 text-start f2-1">@lang('voucher.my_voucher')</h4>
            <hr class="mb-5" style="width: 100%; margin: 0 auto; border-top: 2px solid #183F23; font-family:var(-primaryFont);">


            <!-- Vouchers Section -->
            <div class="container pt-3">
                <div class="row row-cols-lg-2 row-cols-md-2 row-cols-sm-1 g-4">
                    @forelse ($redeemedVouchers as $redeemedVoucher)

                        <div class="col">
                            <div class="d-flex flex-row align-items-center justify-content-center px-4" 
                                style="background-color: rgb(160, 185, 72, 0.8); min-height: 170px; font-family: var(--primaryFont); position: relative; overflow: hidden; border-radius: 10px;">

                                <div class="circle-left"></div>
                                
                                <img src="{{ asset($redeemedVoucher->voucher->voucherPicture) }}" 
                                    alt="{{ $redeemedVoucher->voucher->name }}" 
                                    style="object-fit: cover; height: 90px; width: 140px; border-radius: 10px; margin-right: 10px;">
                                <div class="card-body d-flex flex-column justify-content-center">
                                    <p class="card-title fs-5 fw-bold" style="color: black;">
                                        {{ $redeemedVoucher->voucher->name }}
                                    </p>
                                    <div class="d-flex flex-row align-items-center gap-1 pt-2">
                                        <img src="{{ asset('assets/points.png') }}" 
                                            alt="Points" 
                                            style="height: 20px; width: 20px;">
                                        <p class="card-text" style="color: black;">
                                            {{ $redeemedVoucher->voucher->pointsNeeded }} @lang('voucher.points')
                                        </p>
                                    </div>
                                    <p class="card-text" style="color: black;">
                                    @lang('voucher.date_redeemed') {{ $redeemedVoucher->created_at->format('d-m-Y') }}
                                    </p>
                                </div>

                                <div class="circle-right"></div>
                            </div>
                        </div>
                        @empty
                        <!-- Empty State -->
                        <p class="text-center">@lang('voucher.no_voucher')</p>
                        @endforelse
                    </div>
                    <div class="d-flex justify-content-center align-items-center mt-5">
                        {{ $redeemedVouchers->links() }}
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection