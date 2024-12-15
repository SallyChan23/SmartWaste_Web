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

        <div class="container" style="padding: 70px;">
            <h5 class="fs-1 fw-bold mt-5 mb-5 text-center" style="color: #183F23;">Our Locations</h5>
            <div class="row">
                @foreach($locations as $location)
                    <div class="col-md-12 mb-5">
                        <div class="card" style="background-color: #f3f5f0; border-radius: 8px; border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                            <div class="row g-0 align-items-center">
                                <div class="col-md-4">
                                    <img src="{{ asset( $location->locationPicture) }}" 
                                        alt="{{ $location->locationName }}" 
                                        class="img-fluid rounded-start" 
                                        style="height: 100%; object-fit: cover; border-top-left-radius: 8px; border-bottom-left-radius: 8px;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body ms-5">
                                        <h5 class="card-title fs-3 mb-3" style="color: #183F23;">{{ $location->locationName }}</h5>
                                        <p class="card-text">{{ $location->locationDescription }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="container-fluid" style="padding: 20px 170px 50px 170px; background-color: #f3f5f0">
            <h5 class="card-title fs-1 fw-bold mt-5 mb-5 text-center" style="color: #183F23;">Contact Us</h5>
            <div class="row justify-content-center" style="padding: 0 180px 0 180px;">
                <div class="col-md-4 mb-3"> 
                    <div class="card" style="background-color: #f3f5f0; border-radius: 8px; border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); height: 170px;">
                        <div class="card-body align-items-center my-3">
                            <div>
                            <img src="{{ asset('assets/phone1.png') }}" alt="Phone" class="img-fluid mb-4" style="width: 22%; height: auto; margin-left: 90px;" />
                                <h5 class="card-title mb-5 text-center" style="font-size: 20px; color: #183F23">+1234-567-8910</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card" style="background-color: #f3f5f0; border-radius: 8px; border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); height: 170px;">
                        <div class="card-body align-items-center my-3">
                            <div>
                                <img src="{{ asset('assets/mail.png') }}" alt="Email" class="img-fluid mb-4" style="width: 22%; height: auto; margin-left: 90px;" />
                                <h5 class="card-title mb-5 text-center" style="font-size: 20px; color: #183F23">smartwaste@gmail.com</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section id="getInTouch">
            <div class="container-fluid" style="padding: 20px 170px 50px 170px; background-color: #f3f5f0">
            <div class="row justify-content-between">
                <div class="col-md-6">
                    <div class="contactUs">
                        <h2 class="mb-5 text-left" style="color: #183F23;">Get In Touch</h2>
                        <img src="{{ asset('assets/Warehouse - 1.jpeg') }}" alt="Contact Us" class="img-fluid">
                    </div>
                </div>
                <div class="col-md-5 px-0">
                    <div class="contactUs">
                        <div class="box py-5" style="background-color: #f3f5f0; border-radius: 8px; border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                            <div class="contactForm">
                                <h2 class="mb-5 text-center" style="color: #183F23;">Fill Up the Form</h2>
                                <form action="{{ route('about-us.sendMessage') }}" method="POST" id="formData">
                                    @csrf
                                    <div class="formBox" style="width: 110%">
                                        <div class="row mb-3">
                                            <div class="col-md-8 mx-auto">
                                                <label for="fullName" class="form-label">Full Name</label>
                                                <input type="text" name="fullName" id="inputFullName" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-8 mx-auto">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" name="email" id="email" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-8 mx-auto">
                                                <label for="phone" class="form-label">Phone Number</label>
                                                <input type="tel" name="phone" id="phone" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="row mb-5">
                                            <div class="col-md-8 mx-auto">
                                                <label for="message" class="form-label">Message</label>
                                                <textarea name="message" id="msg" class="form-control" placeholder="Write your message here ..." ></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8 mx-auto d-flex justify-content-end">
                                                <button type="submit" id="send-button" class="btn btn-lg border-5" style="background-color: #183F23; color: white; padding: 6px 10px; font-size: 16px;">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div id="formFeedback" class="mt-5 mx-auto d-flex justify-content-center" style="width: 300px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('formData');
            const feedbackElement = document.getElementById('formFeedback');

            form.addEventListener('submit', function(event) {
                event.preventDefault();

                const name = document.getElementById('inputFullName').value;
                const email = document.getElementById('email').value;
                const phone = document.getElementById('phone').value;
                const message = document.getElementById('msg').value;
                if (name && email && phone && message) {
                    feedbackElement.innerHTML = '<div class="alert alert-success">Thank you for contacting us!</div>';
                    setTimeout(() => {
                        feedbackElement.innerHTML = ''; 
                    }, 5000);
                    form.reset();
                } else {
                    feedbackElement.innerHTML = '<div class="alert alert-danger">Please fill all the fields.</div>';
                    setTimeout(() => {
                        feedbackElement.innerHTML = ''; 
                    }, 5000);
                }
            });
        });
    </script>

@endsection
