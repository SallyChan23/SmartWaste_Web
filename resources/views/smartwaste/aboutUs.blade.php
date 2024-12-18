@extends('layouts.app')

@section('content')
 
<style>

    @media(max-width:768px){
        .contactUsimg{
            width:60%;
            height: auto;
            display: flex;
            justify-content: center;
        }
    }
</style>
    <div class="banner" style="position: relative;">
        <img src="{{ asset('assets/aboutUsBanner.png') }}" alt="" style="width: 100%; height: auto;">
        <div class="d-flex flex-column justify-content-center align-items-center text-center"
            style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100%;">
            <p class="fs-1 fw-bold" style="color: #183F23; margin: 0;">@lang('aboutUs.banner_title')</p>
        </div>
    </div>

    <div class="col-12 " style="padding: 70px 130px 20px 130px;">
        <div class="card mb-4 " style="background-color: transparent; border: none;">
            <div class="row g-3 d-flex justify-content-center align-items-center ">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <img src="{{asset('assets/aboutUs1.png')}}" class="img-fluid" style="border-radius: 40px;  height: 90%; width: 90%;" alt="">
                </div>
                <div class="col-md-8 ">
                    <div class="card-body mt-5">
                        <h5 class="card-title fs-1 fw-bold mb-5" style="color: #183F23;">@lang('aboutUs.what_is')</h5>
                        <p class="card-text" style="font-size: 18px;">@lang('aboutUs.what_is_smartwaste')</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container px-5 pt-5 pb-5" style="">
        <div class="row row-cols-lg-2 row-cols-md-1 d-flex justify-content-center">
            <div class="col-md-6 col-10 mb-3">
                <div class="card h-100" style="background-color: #f3f5f0; border-radius: 8px; border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div class="card-body d-flex align-items-center my-2">
                        <img src="{{ asset('assets/vision-icon.png') }}" alt="Vision Icon" style="width: 60px; height: 60px; margin-right: 20px"/>
                        <div>
                            <h5 class="card-title mb-2" style="font-size: 26px; color: #183F23">@lang('aboutUs.vision_title')</h5>
                            <p class="card-text">
                            @lang('aboutUs.vision_description')
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-10 mb-3">
                <div class="card" style="background-color: #f3f5f0; border-radius: 8px; border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <div class="card-body d-flex align-items-center my-2">
                        <img src="{{ asset('assets/mission-icon.png') }}" alt="Mission Icon" style="width: 60px; height: 60px; margin-right: 20px"/>
                        <div>
                            <h5 class="card-title mb-2" style="font-size: 26px; color: #183F23">@lang('aboutUs.mission_title')</h5>
                                <p class="card-text">
                                @lang('aboutUs.mission_description')
                                </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="service">
        <div class="container-fluid p-5 d-flex flex-column justify-content-center align-items-center" style=" background-color: #f3f5f0">
            <h5 class="card-title fs-1 fw-bold pt-5 mb-5" style="color: #183F23;">@lang('aboutUs.how_smartwaste_works_title')</h5>
            <div class="row mb-5 mx-5 px-5 d-flex flex-row align-items-center justify-content-center w-100">
                <div class="col-md-2  d-flex justify-content-center ">
                    <img src="{{ asset('assets/drop-in-picture.png') }}" alt="Drop-in" class="img-fluid rounded" style="max-width: 100%; height: auto;" />
                </div>
                <div class="col-lg-8 col-md-9">
                    <div class="card" style="background-color: #A0B948; border-radius: 20px; border: none;">
                        <div class="card-body row my-2 mx-4">
                            <div class="col-md-3 align-content-center">
                                <h5 class="card-title text-white fs-3">@lang('aboutUs.drop_in_title')</h5>
                            </div>
                            <div class="col-md-9">
                                <p class="card-text fw-semibold">
                                @lang('aboutUs.drop_in_description')
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-5 mx-5 px-5 d-flex flex-row align-items-center justify-content-center w-100">
                <div class="col-md-2  d-flex justify-content-center">
                    <img src="{{ asset('assets/earn-picture.png') }}" alt="Earn" class="img-fluid rounded" style="max-width: 100%; height: auto;" />
                </div>
                <div class="col-lg-8 col-md-9">
                    <div class="card" style="background-color: #A0B948; border-radius: 20px; border: none;">
                        <div class="card-body row my-2 mx-4">
                            <div class="col-md-3 align-content-center">
                                <h5 class="card-title text-white fs-3">@lang('aboutUs.earn_title')</h5>
                            </div>
                            <div class="col-md-9">
                                <p class="card-text fw-semibold">
                                @lang('aboutUs.earn_description')
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mb-5 mx-5 px-5 d-flex flex-row align-items-center justify-content-center w-100">
                <div class="col-md-2  d-flex justify-content-center">
                    <img src="{{ asset('assets/redeem-picture.png') }}" alt="Redeem" class="img-fluid rounded" style="max-width: 100%; height: auto;" />
                </div>
                <div class="col-lg-8 col-md-9">
                    <div class="card" style="background-color: #A0B948; border-radius: 20px; border: none;">
                        <div class="card-body row my-2 mx-4">
                            <div class="col-md-3 align-content-center">
                                <h5 class="card-title text-white fs-3">@lang('aboutUs.redeem_title')</h5>
                            </div>
                            <div class="col-md-9">
                                <p class="card-text fw-semibold">
                                    @lang('aboutUs.redeem_description')
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container p-5" style="">
        <h5 class="card-title fs-1 fw-bold  pt-5 mb-5" style="color: #183F23;">@lang('aboutUs.accepted_waste_types_title')</h5>
        <div class="row row-cols-lg-2 row-cols-md-1 justify-content-center gap-5">
            <div class="col-md-7 col-lg-4 col-8 mb-3  "> 
                <div class="card py-3" style="background-color: #f3f5f0; border-radius: 8px; border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); height: 350px;">
                    <div class="card-body align-items-center ">
                        <div>
                            <h5 class="card-title mb-3 text-center" style="font-size: 26px; color: #183F23">@lang('aboutUs.organic_waste_title')</h5>
                            <ol class="card-text px-5">
                                <li>@lang('aboutUs.organic_waste_items')</li>
                                <li>@lang('aboutUs.organic_waste_items2')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-lg-4 col-8  mb-3  ">
                <div class="card py-3" style="background-color: #f3f5f0; border-radius: 8px; border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); height: 350px;">
                    <div class="card-body justify-content-center align-items-center  ">
                        <div>
                            <h5 class="card-title mb-3 text-center" style="font-size: 26px; color: #183F23">@lang('aboutUs.non_organic_waste_title')</h5>
                            <ol class="card-text px-xl-5 px-lg-4 px-md">
                                <li>@lang('aboutUs.non_organic_waste_items')</li>
                                <li>@lang('aboutUs.non_organic_waste_items2')</li>
                                <li>@lang('aboutUs.non_organic_waste_items3')</li>
                                <li>@lang('aboutUs.non_organic_waste_items4')</li>
                                <li>@lang('aboutUs.non_organic_waste_items5')</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid p-5" style=" background-color: #183F23">
        <h5 class="card-title fs-1 fw-bold mt-5 mb-5 text-center text-white">@lang('aboutUs.why_choose_us_title')</h5>
        <div class="row mx-5 my-5 px-5">
            <div class="col" style="border: 1px solid white;">
                <img src="{{ asset('assets/convenience.png') }}" alt="Convenience" class="img-fluid mt-5 mx-5 my-3" style="max-width: 100%; height: auto;" />
                <h5 class="card-title mb-3 text-white mx-5" style="font-size: 26px;">Convenience</h5>
                <p class="card-text text-white mx-5 mb-5">
                @lang('aboutUs.why_choose_us_options.convenience')
                </p>
            </div>
            <div class="col" style="border: 1px solid white;">
                <img src="{{ asset('assets/reward.png') }}" alt="Reward" class="img-fluid mt-5 mx-5 my-3" style="max-width: 100%; height: auto;" />
                <h5 class="card-title mb-3 text-white mx-5" style="font-size: 26px;">Rewards</h5>
                <p class="card-text text-white mx-5 mb-5">
                @lang('aboutUs.why_choose_us_options.rewards')
                </p>
            </div>
            <div class="col" style="border: 1px solid white;">
                <img src="{{ asset('assets/sustainability.png') }}" alt="Sustainability" class="img-fluid mt-5 mx-5 my-3" style="max-width: 100%; height: auto;" />
                <h5 class="card-title mb-3 text-white mx-5" style="font-size: 26px;">Sustainability Impact</h5>
                <p class="card-text text-white mx-5 mb-5">
                @lang('aboutUs.why_choose_us_options.sustainability')
                </p>
            </div>
        </div>
    </div>

    <div class="container" style="padding: 70px;">
        <h5 class="fs-1 fw-bold mt-5 mb-5 text-center" style="color: #183F23;">@lang('aboutUs.our_locations_title')</h5>
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
                                    <iframe class="col-9"src="{{ $location->urllocation }}" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container-fluid pt-3 pb-3" style="background-color: #f3f5f0">
        <h5 class="card-title fs-1 fw-bold mt-5 mb-5 text-center" style="color: #183F23;">@lang('aboutUs.contact_us_title')</h5>
        <div class="row row-cols-lg-2 row-cols-md-1 row-cols-1 justify-content-center" style="padding: 0 180px 0 180px;">
            <div class="col-md-4  mb-3"> 
                <div class="card " style="background-color: #f3f5f0; border-radius: 8px; border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); height: 170px;">
                    <div class="card-body align-items-center my-3 p-2">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('assets/phone1.png') }}" alt="Phone" class="img-fluid mb-4" style="width: 20%; height: auto; " />
                            <h5 class="card-title mb-5 text-center" style="font-size: 20px; color: #183F23">@lang('aboutUs.contact_phone')</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card" style="background-color: #f3f5f0; border-radius: 8px; border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); height: 170px;">
                    <div class="card-body align-items-center my-3 p-2">
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <img src="{{ asset('assets/mail.png') }}" alt="Email" class="img-fluid mb-4" style="width: 20%; height: auto;" />
                            <h5 class="card-title mb-5 text-center" style="font-size: 20px; color: #183F23">@lang('aboutUs.contact_email')</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="getInTouch">
        <div class="container-fluid p-3 " style=" background-color: #f3f5f0">
        <div class="row row-cols-lg-1 row-cols-md-1 d-flex justify-content-center gap-1 py-3">
            <div class="col-md-4 col-lg-5 ">
                <div class="contactUs d-flex flex-column justify-content-center align-items-center">
                    <h2 class="mb-5 text-left" style="color: #183F23;">@lang('aboutUs.get_in_touch_title')</h2>
                    <img class="contactUsimg"src="{{ asset('assets/aboutUs-2.png') }}" alt="Contact Us" class="img-fluid mt-5">
                </div>
            </div>
            <div class="col-md-4 col-lg-5 col-8 px-0 ">
                <div class="contactUs">
                    <div class="box py-5 mb-5" style="background-color: #f3f5f0; border-radius: 8px; border: none; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
                        <div class="contactForm">
                            <h2 class="mb-5 text-center" style="color: #183F23;">@lang('aboutUs.fill_up_form_title')</h2>
                            <form action="{{ route('about-us.sendMessage') }}" method="POST" id="formData">
                                @csrf
                                <div class="formBox" style="width: 100%">
                                    <div class="row mb-3">
                                        <div class="col-lg-8  col-sm-6 mx-auto">
                                            <label for="fullName" class="form-label">@lang('aboutUs.form_labels.full_name')</label>
                                            <input type="text" name="fullName" id="inputFullName" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-8  col-md-6 col-sm-6 mx-auto ">
                                            <label for="email" class="form-label">@lang('aboutUs.form_labels.email')</label>
                                            <input type="email" name="email" id="email" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-8 col-md-6 col-sm-6 mx-auto  ">
                                            <label for="phone" class="form-label">@lang('aboutUs.form_labels.phone')</label>
                                            <input type="tel" name="phone" id="phone" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-lg-8 col-md-6 col-sm-6 mx-auto">
                                            <label for="message" class="form-label">@lang('aboutUs.form_labels.message')</label>
                                            <textarea name="message" id="msg" class="form-control" placeholder="@lang('aboutUs.form_labels.placeholder')" ></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-6 col-sm-6 mx-auto d-flex justify-content-end">
                                            <button type="submit" id="send-button" class="btn btn-lg border-5" style="background-color: #183F23; color: white; padding: 6px 10px; font-size: 16px;">@lang('aboutUs.button')</button>
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
                    feedbackElement.innerHTML = '<div class="alert alert-success">@lang('aboutUs.alert.success')</div>';
                    setTimeout(() => {
                        feedbackElement.innerHTML = ''; 
                    }, 5000);
                    form.reset();
                } else {
                    feedbackElement.innerHTML = '<div class="alert alert-danger">@lang('aboutUs.alert.fail')</div>';
                    setTimeout(() => {
                        feedbackElement.innerHTML = ''; 
                    }, 5000);
                }
            });
        });
    </script>

@endsection
