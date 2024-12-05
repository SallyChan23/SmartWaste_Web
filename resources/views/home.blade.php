@extends('layouts.app')

@section('content')
    <div>
        <div class="position-absolute">
            <img src="{{asset('assets/banner.jpeg')}}" alt="" width="100%" height="100%">
            <div class="d-flex flex-column justify-content-center align-items-center position-absolute top-50 start-50 translate-middle">
                <p class="fs-1 fw-bold" style="color: #183F23;">Dispose Waste, Earn Rewards!</p>
                <p class="text-center" style="width: 475px;">Turn your waste into rewards with SmartWaste. Dispose responsibly, complete missions, and redeem points for exclusive rewards!</p>
                <button class="px-5 py-2 rounded-3 border border-0" style="background-color: #183F23; color: white;">Join SmartWaste Today!</button>
            </div>
        </div>

        <div>
            <div>
                <p>Welcome to SmartWaste!</p>
                <p>Your Smart Way to Dispose and Earn!</p>
                <p>At SmartWaste, we make it easy to dispose of your waste responsibly while earning rewards. Whether it’s organic or non-organic waste, you can drop it off at our warehouse, complete missions to earn extra points, and redeem those points for exclusive vouchers. Join us in creating a cleaner, greener future—one smart drop at a time!</p>
            </div>

            <!-- <div>
                <p>How SmartWaste Works</p>

                <div style="background-color: #F4F7F0;">
                    <div class="rounded-full p-2" style="background-color: #A0B948; width: fit-content;">
                        <img src="{{asset('assets/dropin.png')}}" alt="" width="30" height="30"/>
                    </div>

                    <p>Drop In</p>
                    <p>Dispose of your organic and non-organic waste at our SmartWaste warehouse by filling out a simple form. Every drop-off brings us closer to a cleaner environment.</p>
                </div>
            </div> -->
        </div>
    </div>
@endsection