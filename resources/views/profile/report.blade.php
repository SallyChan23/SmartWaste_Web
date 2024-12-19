@extends('layouts.app')

@section('content')

<div class="m-5">
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
                    <a href="{{ route('profile.show') }}" class="text-decoration-none text-dark" >@lang('profile.profile_title')</a>
                </li>
                @if (Auth::user()->role === 'user')
                    <li class="mb-4">
                        <img src="{{ asset('assets/profile2.png') }}" alt="" class="me-2 ms-1" style="width: 25px">
                        <a href="{{ route('profile.report') }}" class="text-decoration-none text-dark">@lang('profile.report')</a>
                    </li>
                    <li class="mb-4">
                        <img src="{{ asset('assets/profile1.png') }}" alt="" class="me-2 ms-1" style="width: 25px">
                        <a href="{{ route('redeem') }}" class="text-decoration-none text-dark">@lang('profile.redeemed_vouchers')</a>
                    </li>
                    <li class="mb-4">
                        <img src="{{ asset('assets/profile4.png') }}" alt="" class="me-1 ms-0" style="width: 35px">
                        <a href="{{ route('drop_in.process') }}" class="text-decoration-none text-dark">@lang('profile.process')</a>
                    </li>
                @endif
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
            <h4 class="fw-normal mb-2 text-start f2-1">@lang('profile.history')</h4>
            <hr class="mb-5" style="width: 100%; margin: 0 auto; border-top: 2px solid #183F23; font-family:var(-primaryFont);">

            <div class="row row-cols-2 row-gap-4">
                @foreach($validatedDropIns as $index => $validated)
                <div class="col">
                    <div class="card" style="background-color: #98c384; height: 10rem">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="card-title fw-bold">Location {{$dropIns[$index]->locationId }}</h5>
                                {{-- <h5 class="card-title fw-bold">{{ $validated->quantity ? 'Non-Organic Waste' : 'Organic Waste' }}</h5> --}}
        
                                <div class="d-flex align-items-center">
                                    <img src="assets/points.png" alt="" srcset="" style="object-fit:cover; height:20px;width:20px">
                                    <div class="ms-1">{{ $validated->pointsGenerated }}</div>
                                </div>
                            </div>
        
                            <div class="mb-1">
                                @if ($validated->quantity)
                                    <div class="mb-1">@lang('profile.nonOrganicWaste')</div>
        
                                    <div class="d-flex">
                                        <div class="d-flex me-3">
                                            <div class="d-flex align-items-center">
                                                <i class="fa-solid fa-weight-hanging"></i>
                                                <div class="ms-2">{{ $validated->weight }} kg</div>
                                            </div>
                                        </div>
                                        
                                        <div>
                                            {{ $validated->quantity }} Quantity
                                        </div>
                                    </div>
                                @else
                                    <div>@lang('profile.organicWaste')</div>
                                    <div class="d-flex me-3">
                                        <div class="d-flex align-items-center">
                                            <i class="fa-solid fa-weight-hanging"></i>
                                            <div class="ms-2">{{ $validated->weight }} kg</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
        
                            <div class="d-flex align-items-center">
                                <i class="fa-solid fa-calendar"></i>
                                <div class="ms-2">{{ \Carbon\Carbon::parse($validated->validationDate)->format('d F Y') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
