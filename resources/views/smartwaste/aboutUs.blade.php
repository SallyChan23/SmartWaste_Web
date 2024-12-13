@extends('layouts.app')

@section('content')
    <div>
        <div class="banner" style="overflow: hidden;">
            <img src="{{asset('assets/aboutUsBanner.png')}}" class="img-fluid" alt="banner" width="100%" height="100%">
            <p class="fs-1 fw-bold text-center" style="margin-top: -230px; margin-bottom:200px; color: #183F23;">About Us</p>
        </div>

        <div class="col-12" style="padding: 70px 70px 20px 150px;">
            <div class="card mb-4" style="background-color: transparent; border: none;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{asset('assets/aboutUs1.png')}}" class="img-fluid" style="border-radius: 40px;  height: 90%; width: 90%;" alt="">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body mt-5">
                            <h5 class="card-title fs-1 fw-bold mb-5" style="color: #183F23;">What Is SmartWaste</h5>
                            <p class="card-text" style="font-size: 18px;">SmartWaste is your go-to platform for responsible waste disposal. We are dedicated to helping individuals and communities reduce their environmental impact through easy and rewarding waste management solutions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="padding: 0 70px 70px 70px;">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card" style="background-color: #f3f5f0; border-radius: 8px; border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <div class="card-body d-flex align-items-start my-2">
                            <img src="{{ asset('assets/vision-icon.png') }}" alt="Vision Icon" style="width: 60px; height: 60px; margin-right: 20px"/>
                            <div>
                                <h5 class="card-title mb-4" style="font-size: 26px; color: #183F23">Vision</h5>
                                <p class="card-text">
                                    A world where waste is minimized, and everyone participates in building a cleaner, more sustainable future.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card" style="background-color: #f3f5f0; border-radius: 8px; border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <div class="card-body d-flex align-items-start my-2">
                            <img src="{{ asset('assets/mission-icon.png') }}" alt="Mission Icon" style="width: 60px; height: 60px; margin-right: 20px"/>
                            <div>
                                <h5 class="card-title mb-4" style="font-size: 26px; color: #183F23">Mission</h5>
                                    <p class="card-text">
                                        To encourage responsible waste disposal through a simple, rewarding system that benefits both individuals and the planet.
                                    </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid" style="padding: 20px 170px 50px 170px; background-color: #f3f5f0">
            <h5 class="card-title fs-1 fw-bold mt-5 mb-5" style="color: #183F23;">How SmartWaste Works</h5>
            <div class="row mb-5 mx-5 px-5 align-items-center">
                <div class="col-md-3">
                    <img src="{{ asset('assets/drop-in-picture.png') }}" alt="Drop-in" class="img-fluid rounded" style="max-width: 100%; height: auto;" />
                </div>
                <div class="col-md-9">
                    <div class="card" style="background-color: #A0B948; border-radius: 20px; border: none;">
                        <div class="card-body row my-2 mx-4">
                            <div class="col-md-3 align-content-center">
                                <h5 class="card-title text-white fs-3">Drop-in</h5>
                            </div>
                            <div class="col-md-9">
                                <p class="card-text fw-semibold">
                                    Dispose of your organic and non-organic waste at our SmartWaste warehouse by filling out a simple form. Every drop-off brings us closer to a cleaner environment.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5 mx-5 px-5 align-items-center">
                <div class="col-md-3">
                    <img src="{{ asset('assets/earn-picture.png') }}" alt="Earn" class="img-fluid rounded" style="max-width: 100%; height: auto;" />
                </div>
                <div class="col-md-9">
                    <div class="card" style="background-color: #A0B948; border-radius: 20px; border: none;">
                        <div class="card-body row my-2 mx-4">
                            <div class="col-md-3 align-content-center">
                                <h5 class="card-title text-white fs-3">Earn</h5>
                            </div>
                            <div class="col-md-9">
                                <p class="card-text fw-semibold">
                                    For every waste drop, you earn points. Complete exciting waste disposal missions to earn even more points!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5 mx-5 px-5 align-items-center">
                <div class="col-md-3">
                    <img src="{{ asset('assets/redeem-picture.png') }}" alt="Redeem" class="img-fluid rounded" style="max-width: 100%; height: auto;" />
                </div>
                <div class="col-md-9">
                    <div class="card" style="background-color: #A0B948; border-radius: 20px; border: none;">
                        <div class="card-body row my-2 mx-4">
                            <div class="col-md-3 align-content-center">
                                <h5 class="card-title text-white fs-3">Redeem</h5>
                            </div>
                            <div class="col-md-9">
                                <p class="card-text fw-semibold">
                                    Exchange your points for vouchers and exclusive rewards. Your waste disposal efforts make a big difference!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="padding: 70px 70px 70px 70px;">
            <h5 class="card-title fs-1 fw-bold mt-5 mb-5" style="color: #183F23;">Accepted Waste Types</h5>
            <div class="row justify-content-between mx-5">
                <div class="col-md-5 mb-3"> 
                    <div class="card" style="background-color: #f3f5f0; border-radius: 8px; border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); height: 350px;">
                        <div class="card-body align-items-start my-4">
                            <div>
                                <h5 class="card-title mb-5 text-center" style="font-size: 26px; color: #183F23">Organic Waste</h5>
                                <ol class="card-text mx-5">
                                    <li>Garden Waste (e.g., leaves, grass clippings)</li>
                                    <li>Biodegradable Materials (e.g., paper towels, compostable packaging)</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 mb-3">
                    <div class="card" style="background-color: #f3f5f0; border-radius: 8px; border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); height: 350px;">
                        <div class="card-body align-items-center my-4">
                            <div>
                                <h5 class="card-title mb-5 text-center" style="font-size: 26px; color: #183F23">Non-Organic Waste</h5>
                                <ol class="card-text mx-5">
                                    <li>Plastics (e.g., plastic bottles, containers)</li>
                                    <li>Metals (e.g., aluminum cans, metal tools)</li>
                                    <li>Paper (e.g., newspapers, cardboard)</li>
                                    <li>Glass (e.g., glass bottles, jars)</li>
                                    <li>Electronic Waste (e.g., small electronic devices, chargers)</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid" style="padding: 20px 170px 50px 170px; background-color: #183F23">
            <h5 class="card-title fs-1 fw-bold mt-5 mb-5 text-center text-white">Why Choose Us</h5>
            <div class="row mx-5 my-5">
                <div class="col" style="border: 1px solid white;">
                    <img src="{{ asset('assets/convenience.png') }}" alt="Convenience" class="img-fluid mt-5 mx-5 my-3" style="max-width: 100%; height: auto;" />
                    <h5 class="card-title mb-3 text-white mx-5" style="font-size: 26px;">Convenience</h5>
                    <p class="card-text text-white mx-5 mb-5">
                        Drop off your waste at our warehouse with just a few simple steps—no hassle, no stress!
                    </p>
                </div>
                <div class="col" style="border: 1px solid white;">
                    <img src="{{ asset('assets/reward.png') }}" alt="Reward" class="img-fluid mt-5 mx-5 my-3" style="max-width: 100%; height: auto;" />
                    <h5 class="card-title mb-3 text-white mx-5" style="font-size: 26px;">Rewards</h5>
                    <p class="card-text text-white mx-5 mb-5">
                        Turn your waste into points that can be redeemed for real rewards like vouchers and discounts.
                    </p>
                </div>
                <div class="col" style="border: 1px solid white;">
                    <img src="{{ asset('assets/sustainability.png') }}" alt="Sustainability" class="img-fluid mt-5 mx-5 my-3" style="max-width: 100%; height: auto;" />
                    <h5 class="card-title mb-3 text-white mx-5" style="font-size: 26px;">Sustainability Impact</h5>
                    <p class="card-text text-white mx-5 mb-5">
                        By participating, you can contribute to reducing waste and promoting environmental sustainability.
                    </p>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="image">
                    <img src="{{ asset('assets/warehouse1.png') }}" alt="">
            </div>
            <div class="content">
                <h2>Location 1</h2>
                <p>Ki. Basket No. 380, Tidore Kepulauan 70758, Kaltara</p>
                <a href="#" class="btn">Request Appointment</a>
            </div>
        </div>
    </div>

@endsection
