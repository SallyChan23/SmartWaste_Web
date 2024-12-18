@extends('layouts.app')

@section('content')

<style>

    .mission-modal{
        display: flex;
        flex-direction: row;
    }
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

    @media(max-width:768px){
        .waste-type{
            width:50%;
            height: auto;
        }

        .mission-modal{
            display: flex;
            flex-direction: column;
        }

        .article-card {
            width:90%;
        }
    }

    @media(max-width:576px){
        .waste-type{
            width:40%;
            height: auto;
        }

        .article-card {
            width:80%;
        }
    }

</style>
<div>
    <!-- Banner Section -->
    <div class="banner"style="position: relative;">
        <img src="{{asset('assets/banner.jpeg')}}" alt="" style="width: 100%; height: auto;">
        <div class="d-flex flex-column justify-content-center align-items-center" 
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
            <p class="fs-1 fw-bold" style="color: #183F23;">@lang('home.banner_title')</p>
            <p class="text-center" style="width: 475px;">@lang('home.banner_desc')</p>
            @guest
                <a href="{{ route('login') }}">
                    <button class="px-5 py-2 rounded-3 border border-0" style="background-color: #183F23; color: white;">@lang('home.join_button')</button>
                </a>
            @endguest
        </div>
    </div>

    <!-- Welcome Section -->
    <div class="container mt-5">
        <div class="text-center">
            <p class="fs-2 fw-semibold text-center">@lang('home.welcome_title')</p>
            <p class="fs-5 fw-normal text-center">@lang('home.welcome_header')</p>
            <p class="fs-6 fw-normal text-center ms-5 me-5">@lang('home.welcome_desc')</p>
        </div>
    </div>

    <!-- How SmartWaste Works -->
    <div class="row justify-content-center" style="width: 70%; margin: 0 auto;">
        <p class="fs-2 fw-semibold text-center mt-5 mb-5 " style="color: #183F23;">@lang('home.how_smartwaste_works')</p>
            <div class="col-lg-4 col-md-6 col-sm-10 d-flex justify-content-center mt-4 mb-5">
                <div class="card text-center p-4 position-relative" style="background-color: #F4F7F0; border-radius: 15px; overflow: visible;">
                    <div class="icon-wrapper position-absolute top-0 start-50 translate-middle" 
                        style="background-color: #A0B948; width: 80px; height: 80px; border-radius: 50%;">
                        <img src="{{asset('assets/dropin.png')}}" alt="Drop In Icon" style="width: 40px; height: 40px; position: relative; top: 20px;">
                    </div>
                    <h4 class="mt-lg-5 mt-md-3 mt-sm-2 pt-3">@lang('home.drop_in_title')</h4>
                    <p>@lang('home.drop_in_desc')</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-10 d-flex justify-content-center mt-4 mb-5">
                <div class="card text-center p-4 position-relative" style="background-color: #F4F7F0; border-radius: 15px; overflow: visible;">
                    <div class="icon-wrapper position-absolute top-0 start-50 translate-middle" 
                        style="background-color: #A0B948; width: 80px; height: 80px; border-radius: 50%;">
                        <img src="{{asset('assets/earnings.png')}}" alt="Drop In Icon" style="width: 40px; height: 40px; position: relative; top: 20px;">
                    </div>
                    <h4 class="mt-lg-5 mt-md-3 mt-sm-2 pt-3">@lang('home.earn_title')</h4>
                    <p>@lang('home.earn_description')</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-10 d-flex justify-content-center mt-4 mb-5">
                <div class="card text-center p-4 position-relative" style="background-color: #F4F7F0; border-radius: 15px; overflow: visible;">
                    <div class="icon-wrapper position-absolute top-0 start-50 translate-middle" 
                        style="background-color: #A0B948; width: 80px; height: 80px; border-radius: 50%;">
                        <img src="{{asset('assets/promo-code.png')}}" alt="Drop In Icon" style="width: 40px; height: 40px; position: relative; top: 20px; ">
                    </div>
                    <h4 class="mt-lg-5 mt-md-3 mt-sm-2 pt-3">@lang('home.redeem_title')</h4>
                    <p>@lang('home.redeem_description')</p>
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="row mt-lg-5 mb-lg-5 mt-md-2 mb-md-2" style="width: 70%; margin: 0 auto;">
        <div class="col-5">
            <div>
                <img src="{{asset('assets/Compostable.jpeg')}}" alt="Trash pict" class="img-fluid rounded-5" style="max-width: 80%; position: relative; top: 20px;">
            </div>
        </div>
        <div class="col-7 d-flex justify-content-center mt-4">
            <div class="text-left p-4 position-relative" style="height: 100%;">
                <h4 class="fw-bold fs-2" style="color:#183F23;">@lang('home.dispose_title')</h4>
                <p class="fw-normal"> @lang('home.dispose_description')</p>
                <a href="{{ route('aboutUs') }}" class="text-decoration-underline" style="color: #183F23; position: absolute; bottom: 0; right: 0;">@lang('home.aboutus_links')</a>
            </div>
        </div>
    </div>
    
    
    <!-- Types of Waste Section -->
    <div class="container my-5">
        <h2 class="text-center mb-lg-4 mb-md-2 mb-sm-1 mb-1" style="color: #183F23;">@lang('home.types_waste')</h2>
        <hr style="width: 50%; margin: 0 auto; border-top: 2px solid #183F23;">
            <div class="container mt-5">
                <div class="row row-cols-lg-2 row-cols-md-1 justify-content-center d-flex gap-5">
                    <div class="col-lg-5 col-md-9 col-sm-10 col-10" >
                        <div class="row h-100 align-items-center p-4 rounded-3" style="background-color: #E6F7D4; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <h3 class="fw-bold text-center" style="color: #183F23;">@lang('home.biodegradable_waste')</h3>
                            <p class="text-center fw-6" style="color: #3E5732;">@lang('home.biodegradable_desc')</p>
                            <div class="col-md-8">
                                <h5 class="fw-bold mt-3 text-center" style="color: #183F23;">@lang('home.biodegradable_example_title')</h5>
                                <p class="text-center fw-6" style="color: #3E5732;">@lang('home.biodegradable_example')</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <img class="waste-type"src="{{asset('assets/organic.png')}}" alt="Biodegradable Bin" style="max-width: 120%; height: auto; object-fit: contain;">
                            </div>
                        </div>
                    </div>

                    <!-- Non-Biodegradable Waste Card -->
                    <div class="col-lg-5 col-md-9 col-sm-10 col-10">
                        <div class="row h-100 align-items-center p-4 rounded-3" style="background-color: #F2E3B9; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                            <h3 class=" text-center fw-bold" style="color: #183F23;">@lang('home.nonbio_waste')</h3>
                            <p class="text-center fw-6" style="color: #3E5732;">@lang('home.nonbio_desc') <br> @lang('home.nonbio_desc2')</p>
                            <div class="col-md-8">
                                <h5 class=" text-center fw-bold mt-3" style="color: #183F23;">@lang('home.nonbio_example_title')</h5>
                                <p class="text-center fw-6" style="color: #3E5732;">@lang('home.nonbio_example')</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <img class="waste-type" src="{{asset('assets/anorganic.png')}}" alt="anorganic" style="max-width: 120%; height: auto; object-fit: contain;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- Mission Section -->
    <div class="container my-5 mb-5">
        <h2 class="text-center mb-lg-4 mb-md-2 mb-sm-1 mb-1 fs-1 pt-2 fw-bold" style="color: #183F23;">@lang('home.mission_title')</h2>
        <hr class="mb-5" style="width: 50%; margin: 0 auto; border-top: 2px solid #183F23; font-family:var(-primaryFont);">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container pt-3 pb-5 d-flex justify-content-center align-items-center">
            <div class="row row-cols-lg-2 row-cols-md-1 row-cols-sm-1 row-cols-1 g-5 d-flex justify-content-center">
                @foreach ($missions as $mission)
                <div class="col col-sm-11 col-11 d-flex justify-content-center align-items-center">
                    <div class="h-100 card article-card flex-row rounded-4 align-items-center p-3 shadow" style="background-color: var(--lightgreen); min-height: 210px; font-family: var(--primaryFont);" data-bs-toggle="modal" data-bs-target="#modalMission{{ $mission->missionId }}">
                        <img src="{{ asset($mission->missionPicture) }}" alt="" class='img-fluid' style="object-fit: contain; height: 150px; width: auto;">
                        <div class="card-body d-flex flex-column justify-content-between gap-5 text-end">
                            <p class="fs-2 card-title fw-bold" style="color: white;">{{ $mission->title }}</p>
                            <p class="fs-3 card-text fw-bold" style="color: black;">{{ $mission->totalPoints }} @lang('home.mission_points')</p>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="modalMission{{ $mission->missionId }}" tabindex="-1" aria-labelledby="modalMissionLabel{{ $mission->missionId }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg rounded-5" style="background-color: var(--lightgreen);">
                        <div class="modal-content p-5" style="background-color: var(--lightgreen);">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5 class="modal-title text-center fw-bold fs-2" style="color: white;" 
                                    id="modalMissionLabel{{ $mission->missionId }}">{{ $mission->title }}</h5>
                                <div class="mission-modal justify-content-between align-items-center py-3">
                                    <div class="d-flex flex-column justify-content-center align-items-center gap-4" style="width: 40%;">
                                        <img src="{{ asset($mission->missionPicture) }}" alt="" class='img-fluid' style="object-fit: contain; height: 200px; width: auto;">
                                        <p class="fw-bold fs-5 text-center"><strong>@lang('home.mission_totalpoints')</strong> {{ $mission->totalPoints }} @lang('home.mission_points')</p>
                                    </div>
                                    <div class="d-flex flex-column justify-content-between gap-1" style="width:55%">
                                        <p class="text-center fw-normal fs-6"style="font-family:var(--secondaryFont)"><strong></strong> {{ $mission->description }}</p>
                                            @if(Auth::check() && Auth::user()->role === 'user')
                                                <form action="{{ route('mission.start', $mission->missionId) }}" method="POST">
                                                @csrf
                                                <div class="d-flex justify-content-center" style="font-family:var(--primaryFont)">
                                                    <button type="submit" style="background-color:var(--basic);color:var(--darkgreen)" class="btn fw-semibold px-4 py-2">@lang('home.start_mission')</button>
                                                </div>
                                            @else
                                                <p class="text-center text-danger fw-bold">@lang('home.please_login')</p>
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
        <div class="text-center" style="position: absolute; left: 50%; transform: translateX(-50%); ">
            <a href="{{ route('mission.index') }}" class="text-decoration-underline fw-light text-center" 
            style="color: #183F23;">@lang('home.browse_more')</a>
        </div>
    </div>


    <!-- Voucher Section -->
    <div class="container my-5 position-relative">
        
        <h2 class="text-center mb-lg-4 mb-md-2 mb-sm-1 mb-1 fs-1 pt-2 fw-bold" style="color: #183F23;">Voucher</h2>
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
            
        <div class="text-end mb-lg-4 mb-md-2 mb-sm-1 mb-1">
            <a href="{{ route('voucher.index') }}" class="text-decoration-underline fw-light" style="color: #183F23;">@lang('home.see_more')</a>
        </div>
        <div class="container pt-3 pb-5 " >
            <div class="row g-5 d-flex justify-content-center align-items-center">
                @foreach ($vouchers->chunk(2) as $voucherRow)
                    <div class="d-flex row row-cols-md-1 row-cols-lg-2 row-cols-sm-1  row-cols-1 g-4 justify-content-center align-items-center">
                        @foreach ($voucherRow as $voucher)
                            <div class="col col-11">
                                <div class="d-flex flex-row align-items-center justify-content-center px-4" style="background-color: rgb(160, 185, 72, 0.8); min-height: 170px; font-family: var(--primaryFont); position: relative; overflow: hidden;">
                                    <div class="circle-left"></div>
                                    <img src="{{ asset($voucher->voucherPicture) }}" alt="" class="img-fluid" style="object-fit: cover; height: 90px; width: 140px;">
                                    <div class="card-body d-flex flex-column justify-content-center">
                                        <p class="card-title fs-5 fw-bold" style="color: black;">{{ $voucher->name }}</p>
                                        <div class="d-flex flex-row align-items-center gap-1 pt-2">
                                            <img src="assets/points.png" alt="" style="object-fit: cover; height: 20px; width: 20px;">
                                            <p class="card-text" style="color: black;">{{ $voucher->pointsNeeded }} @lang('home.mission_points')</p>
                                        </div>
                                        <p class="card-text" style="color: black;">{{ $voucher->price }}</p>
                                    </div>
                                    @if(Auth::check() && Auth::user()->role === 'user')
                                        <div class="d-flex flex-column justify-content-end align-items-end" style="height:120px">
                                            <form action="{{ route('voucher.redeem', $voucher->voucherId) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-warning">@lang('home.redeem')</button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="d-flex flex-column justify-content-end align-items-end" style="height:120px">
                                            <p class="text-danger fw-bold">@lang('home.login_redeem')</p>
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
    <div class="container my-5">
    <h2 class="text-center mb-4 fs-1 pt-2 fw-bold" style="color: #183F23;">@lang('home.news')</h2>
    <hr class="mb-5" style="width: 50%; margin: 0 auto; border-top: 2px solid #183F23; font-family:var(-primaryFont);">
        <div class="row row-cols-lg-4 row-cols-md-3 row-cols-sm d-flex justify-content-center">
            @foreach($articles as $article)
                <div class="article-card col-md-3 mb-5 justify-content-center d-flex">
                    <div class="card h-100 w-100 border-1 col-10">
                        <img src="{{ asset( $article->articlePicture) }}" alt="{{ $article->articleTitle }}" class="card-img-top" style="height: 200px;">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title ms-2 fs-5 mb-2">{{ $article->articleTitle }}</h6>
                            <a href="{{ $article->articleUrl }}" class="d-flex justify-content-end mt-auto text-decoration-none fw-light" style="color: #183F23; font-size: 14px;" target="_blank">@lang('home.read_more')</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection