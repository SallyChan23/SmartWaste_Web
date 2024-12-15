@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 mb-4">
                <img src="{{ asset('Assets/FAQ.jpeg') }}" class="img-fluid" alt="FAQs">
            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <h1 class="fw-medium fs-1 display-1 mb-5">@lang('faq.header')</h1>
                </div>
                <div class="accordion mb-3" id="faqAccordion">
                    <!-- Question 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button collapsed fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                @lang('faq.q1')
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <ol>
                                    <li>@lang('faq.a1.1')</li>
                                    <li>@lang('faq.a1.2')</li>
                                    <li>@lang('faq.a1.3')</li>
                                    <li>@lang('faq.a1.4')</li>
                                    <li>@lang('faq.a1.5')</li>
                                </ol>
                        </div>
                    </div>
                    <!-- Question 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                @lang('faq.q2')
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                @lang('faq.a2.1')
                                <ol>
                                    <li>@lang('faq.a2.2')</li>
                                    <li>@lang('faq.a2.3')</li>
                                </ol>
                                @lang('faq.a2.4')
                            </div>
                        </div>
                    </div>
                    <!-- Question 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                @lang('faq.q3')
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                @lang('faq.a3')
                            </div>
                        </div>
                    </div>
                    <!-- Question 4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            @lang('faq.q4')
                        </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                            @lang('faq.a4.1')
                                <ol>
                                    <li>@lang('faq.a4.2')</li>
                                    <li>@lang('faq.a4.3')</li>
                                    <li>@lang('faq.a4.4')</li>
                                    <li>@lang('faq.a4.5')</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- Question 5 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed fw-medium" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                @lang('faq.q5')
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                @lang('faq.a5.1')
                                <ol>
                                    <li>@lang('faq.a5.2')</li>
                                    <li>@lang('faq.a5.3')</li>
                                    <li>@lang('faq.a5.4')</li>
                                </ol>
                                @lang('faq.a5.5')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
