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
    </div>

@endsection
