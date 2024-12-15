@extends('layouts.app')

@section('content')

<style>

    .circle-left{
        position: absolute; 
        top: 50%; 
        left: -10px; 
        transform: translateY(-50%);
        width: 30px; 
        height: 30px; 
        background-color: white; 
        border-radius: 50%;
    }

    .circle-right{
        position: absolute; 
        top: 50%; 
        right: -10px; 
        transform: translateY(-50%);
        width: 30px; 
        height: 30px; 
        background-color: white; 
        border-radius: 50%;
    }

</style>
<div>
    <!-- Banner Section -->
    <div style="position: relative;">
        <img src="{{asset('assets/banner.jpeg')}}" alt="" style="width: 100%; height: auto;">
        <div class="d-flex flex-column justify-content-center align-items-center" 
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
            <p class="fs-1 fw-bold" style="color: #183F23;">Dispose Waste, Earn Rewards!</p>
            <p class="text-center" style="width: 475px;">Turn your waste into rewards with SmartWaste. Dispose responsibly, complete missions, and redeem points for exclusive rewards!</p>
            <button class="px-5 py-2 rounded-3 border border-0" style="background-color: #183F23; color: white;">Join SmartWaste Today!</button>
        </div>
    </div>

    <!-- Welcome Section -->
    <div class="container mt-5">
        <div class="text-center">
            <p class="fs-2 fw-semibold text-center">Welcome to SmartWaste!</p>
            <p class="fs-5 fw-normal text-center">Your Smart Way to Dispose and Earn!</p>
            <p class="fs-6 fw-normal text-center ms-5 me-5">
                At SmartWaste, we make it easy to dispose of your waste responsibly while earning rewards. 
                Whether it's organic or non-organic waste, you can drop it off at our warehouse, complete missions 
                to earn extra points, and redeem those points for exclusive vouchers. 
                Join us in creating a cleaner, greener future—one smart drop at a time!
            </p>
        </div>
    </div>

    <!-- How SmartWaste Works -->

    <div class="row justify-content-center" style="width: 70%; margin: 0 auto;">
        <p class="fs-2 fw-semibold text-center mt-5 mb-5" style="color: #183F23;">How SmartWaste Works</p>

        <div class="col-4 d-flex justify-content-center mt-4 mb-5">
            <div class="card text-center p-4 position-relative" style="background-color: #F4F7F0; border-radius: 15px; overflow: visible;">
                <div class="icon-wrapper position-absolute top-0 start-50 translate-middle" 
                    style="background-color: #A0B948; width: 80px; height: 80px; border-radius: 50%;">
                    <img src="{{asset('assets/dropin.png')}}" alt="Drop In Icon" 
                        style="width: 40px; height: 40px; position: relative; top: 20px;">
                </div>
                <h4 class="mt-5 pt-3">Drop In</h4>
                <p>
                    Dispose of your organic and non-organic waste at our SmartWaste warehouse by filling out a simple form. 
                    Every drop-off brings us closer to a cleaner environment.
                </p>
            </div>
        </div>

        <div class="col-4 d-flex justify-content-center mt-4 mb-5">
            <div class="card text-center p-4 position-relative" style="background-color: #F4F7F0; border-radius: 15px; overflow: visible;">
                <div class="icon-wrapper position-absolute top-0 start-50 translate-middle" 
                    style="background-color: #A0B948; width: 80px; height: 80px; border-radius: 50%;">
                    <img src="{{asset('assets/earnings.png')}}" alt="Drop In Icon" 
                        style="width: 40px; height: 40px; position: relative; top: 20px;">
                </div>
                <h4 class="mt-5 pt-3">Earn</h4>
                <p>
                    For every waste drop, you earn points. 
                    Complete exciting waste disposal missions to earn even more points!
                </p>
            </div>
        </div>

        <div class="col-4 d-flex justify-content-center mt-4 mb-5">
            <div class="card text-center p-4 position-relative" style="background-color: #F4F7F0; border-radius: 15px; overflow: visible;">
                <div class="icon-wrapper position-absolute top-0 start-50 translate-middle" 
                    style="background-color: #A0B948; width: 80px; height: 80px; border-radius: 50%;">
                    <img src="{{asset('assets/promo-code.png')}}" alt="Drop In Icon" 
                        style="width: 40px; height: 40px; position: relative; top: 20px; ">
                </div>
                <h4 class="mt-5 pt-3">Redeem</h4>
                <p>
                    Exchange your points for vouchers and exclusive rewards. 
                    Your waste disposal efforts make a big difference!
                </p>
            </div>
        </div>
    </div>
    
    {{-- move to about us sect --}}
    <div class="row mt-5 mb-5" style="width: 70%; margin: 0 auto;">
        <div class="col-5">
            <div>
                <img src="{{asset('assets/Compostable.jpeg')}}" alt="Trash pict" 
                class="img-fluid rounded-5" style="max-width: 80%; position: relative; top: 20px;">
            </div>
        </div>
        <div class="col-7 d-flex justify-content-center mt-4">
            <div class="text-left p-4 position-relative" style="height: 100%;"> <!-- Add position-relative here -->
                <h4 class="mt-5 pt-3 fw-bold fs-2" style="color:#183F23;">Dispose Smartly and Easily!</h4>
                <p class="fw-normal">
                    Drop off your waste—both organic and non-organic—at our warehouse and earn points for every visit. 
                    Just sign up, fill out a form, and start making a difference.
                </p>
                <a href="{{ route('aboutUs') }}" 
                class="text-decoration-underline" 
                style="color: #183F23; position: absolute; bottom: 0; right: 0;">Learn about the waste we accept</a>
            </div>
        </div>
    </div>
    
    
    <!-- Types of Waste Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4" style="color: #183F23;">Types of Waste</h2>
        <hr style="width: 50%; margin: 0 auto; border-top: 2px solid #183F23;">

            <div class="container mt-5">
                <!-- Row for Waste Cards -->
                <div class="row justify-content-center g-4">

                    <!-- Biodegradable Waste Card -->
                    <div class="col-lg-5 col-md-6 me-5">
                        <div class="row align-items-center p-4 rounded-3" style="background-color: #E6F7D4; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <h3 class="fw-bold text-center" style="color: #183F23;">Biodegradable Waste</h3>
                            <p class="text-center fw-6" style="color: #3E5732;">
                                A biodegradable material is one that may quickly break down by bacteria or any other natural organisms 
                                without contributing to pollution. Biodegradable waste is also known as moist waste. This can be composted 
                                to obtain manure. Biodegradable wastes decompose themselves over a period of time depending on the material.
                            </p>
                            <div class="col-md-8">
                                <h5 class="fw-bold mt-3 text-center" style="color: #183F23;">Example of Biodegradable Waste:</h5>
                                <p class="text-center fw-6" style="color: #3E5732;">
                                    Paper, Food waste, Human waste, Manure, Sewage sludge, Slaughterhouse waste, Dead animals and plants, Hospital Waste, etc.
                                </p>
                            </div>
                            <div class="col-md-4">
                                <img src="{{asset('assets/organic.png')}}" alt="Biodegradable Bin" 
                                    style="max-width: 120%; height: auto; object-fit: contain;">
                            </div>
                        </div>
                    </div>

                    <!-- Non-Biodegradable Waste Card -->
                    <div class="col-lg-5 col-md-6 ms-5">
                        <div class="row align-items-center p-4 rounded-3" style="background-color: #F2E3B9; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <h3 class=" text-center fw-bold" style="color: #183F23;">Non-biodegradable Waste</h3>
                            <p class="text-center fw-6" style="color: #3E5732;">
                                A non-biodegradable material is any type of substance that is a cause of pollution and cannot be degraded by living things. 
                                Non-biodegradable waste is known as dry waste. <br>
                                Dry wastes can be recycled and can be reused. Non-biodegradable wastes do 
                                not decompose by themselves and hence are major pollutants.
                            </p>
                            <div class="col-md-8">
                                <h5 class=" text-center fw-bold mt-3" style="color: #183F23;">Example of Non-biodegradable Waste:</h5>
                                <p class="text-center fw-6" style="color: #3E5732;">
                                    Glass, Plastic, Metals, Pesticides, Fibers, E-waste, Hazardous substances, Artificial rubber, Artificial polymers, etc.
                                </p>
                            </div>
                            <div class="col-md-4 text-center">
                                <img src="{{asset('assets/anorganic.png')}}" alt="anorganic"
                                    style="max-width: 120%; height: auto; object-fit: contain;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- Mission Section -->
    <div class="container my-5 mb-5 position-relative">
        <h2 class="text-center mb-4 fs-1 pt-2 fw-bold" style="color: #183F23;">Mission</h2>
        <hr class="mb-5" style="width: 50%; margin: 0 auto; border-top: 2px solid #183F23; font-family:var(-primaryFont);">
        
        <!-- Mission card -->
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="container pt-3 pb-5">
            <div class="row row-cols-2 g-5">
                @foreach ($missions as $mission)
                <div class="col">
                    <div class="h-100 card article-card flex-row rounded-4 align-items-center p-3 shadow" 
                        style="background-color: var(--lightgreen); min-height: 210px; font-family: var(--primaryFont);" 
                        data-bs-toggle="modal" 
                        data-bs-target="#modalMission{{ $mission->missionId }}">
                        <img src="{{ asset($mission->missionPicture) }}" alt="" class='img-fluid' 
                            style="object-fit: contain; height: 150px; width: auto;">
                        <div class="card-body d-flex flex-column justify-content-between gap-5 text-end">
                            <p class="fs-2 card-title fw-bold" style="color: white;">{{ $mission->title }}</p>
                            <p class="fs-3 card-text fw-bold" style="color: black;">{{ $mission->totalPoints }} points</p>
                        </div>
                    </div>
                </div>
                    
                <!-- Modal -->
                <div class="modal fade" id="modalMission{{ $mission->missionId }}" tabindex="-1" 
                    aria-labelledby="modalMissionLabel{{ $mission->missionId }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg rounded-5" style="background-color: var(--lightgreen);">
                        <div class="modal-content p-5" style="background-color: var(--lightgreen);">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5 class="modal-title text-center fw-bold fs-2" style="color: white;" 
                                    id="modalMissionLabel{{ $mission->missionId }}">{{ $mission->title }}</h5>
                                <div class="d-flex justify-content-between align-items-center py-3">
                                    <div class="d-flex flex-column justify-content-center align-items-center gap-4" style="width: 40%;">
                                        <img src="{{ asset($mission->missionPicture) }}" alt="" class='img-fluid' 
                                            style="object-fit: contain; height: 200px; width: auto;">
                                        <p class="fw-bold fs-5"><strong>Total Points:</strong> {{ $mission->totalPoints }} points</p>
                                    </div>
                                    <div class="d-flex flex-column justify-content-between gap-1" style="width:55%">
                                        <p class="text-center fw-normal fs-6"style="font-family:var(--secondaryFont)"><strong></strong> {{ $mission->description }}</p>
                                            @if(Auth::check() && Auth::user()->role === 'user')
                                                <form action="{{ route('mission.start', $mission->missionId) }}" method="POST">
                                                @csrf
                                                    <div class="d-flex justify-content-center " style="font-family:var(--primaryFont)">
                                                        <button type="submit" style="background-color:var(--basic);color:var(--darkgreen)" class="btn col-6 fw-semibold">Start Mission</button>
                                                    </div>
                                                </form>
                                            @else
                                                <p class="text-center text-danger fw-bold">Please log in to start this mission.</p>
                                            @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Browse More Button -->
        <div class="text-center" style="position: absolute; left: 50%; transform: translateX(-50%); ">
            <a href="{{ route('mission.index') }}" class="text-decoration-underline fw-light text-center" 
            style="color: #183F23;">Browse more</a>
        </div>
    </div>


    <!-- Voucher Section -->
    <div class="container my-5 position-relative">
        
        <h2 class="text-center mb-4 fs-1 pt-2 fw-bold" style="color: #183F23;">Voucher</h2>
        <hr class="mb-5" style="width: 50%; margin: 0 auto; border-top: 2px solid #183F23; font-family: var(--primaryFont);">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            
        <!-- See More Button -->
        <div class="text-end mb-4">
            <a href="{{ route('voucher.index') }}" class="text-decoration-underline fw-light" 
            style="color: #183F23;">See more</a>
        </div>

        <div class="container pt-3 pb-5">
            <div class="row g-5">
                @foreach ($vouchers->chunk(2) as $voucherRow)
                    <div class="row row-cols-md-2 row-cols-lg-2 g-4">
                        @foreach ($voucherRow as $voucher)
                            <div class="col">
                                <div class="d-flex flex-row align-items-center justify-content-center px-4" style="background-color: rgb(160, 185, 72, 0.8); min-height: 170px; font-family: var(--primaryFont); position: relative; overflow: hidden;">
                                    <div class="circle-left"></div>
                                    <img src="{{ asset($voucher->voucherPicture) }}" alt="" class="img-fluid" style="object-fit: cover; height: 90px; width: 140px;">
                                    <div class="card-body d-flex flex-column justify-content-center">
                                        <p class="card-title fs-5 fw-bold" style="color: black;">{{ $voucher->name }}</p>
                                        <div class="d-flex flex-row align-items-center gap-1 pt-2">
                                            <img src="assets/points.png" alt="" style="object-fit: cover; height: 20px; width: 20px;">
                                            <p class="card-text" style="color: black;">{{ $voucher->pointsNeeded }} points</p>
                                        </div>
                                        <p class="card-text" style="color: black;">{{ $voucher->price }}</p>
                                    </div>
                                    @if(Auth::check() && Auth::user()->role === 'user')
                                    <div class="d-flex flex-column justify-content-end align-items-end" style="height:120px">
                                        <form action="{{ route('voucher.redeem', $voucher->voucherId) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-warning">Redeem</button>
                                        </form>
                                    </div>
                                    @else
                                    <div class="d-flex flex-column justify-content-end align-items-end" style="height:120px">
                                        <p class="text-danger fw-bold">Log in to redeem this voucher.</p>
                                    </div>
                                    @endif
                                    <div class="circle-right"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    

    <!-- Article Section -->
    <div class="container my-5  position-relative">
    <h2 class="text-center mb-4 fs-1 pt-2 fw-bold" style="color: #183F23;">News & Insights</h2>
    <hr class="mb-5" style="width: 50%; margin: 0 auto; border-top: 2px solid #183F23; font-family:var(-primaryFont);">
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-3 mb-5 justify-content-between">
                    <div class="card h-100 border-1">
                        <img src="{{ asset( $article->articlePicture) }}" alt="{{ $article->articleTitle }}" class="card-img-top" style="height: 200px;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title ms-2">{{ $article->articleTitle }}</h5>
                            <a href="{{ $article->articleUrl }}" class="d-flex justify-content-end mt-auto text-decoration-none fw-light" style="color: #183F23" target="_blank">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection