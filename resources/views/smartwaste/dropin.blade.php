@extends('layouts.app')

@section('content')
    <div class="mb-5">
        <h1 style="color: #183F23" class="d-flex justify-content-center my-5 fw-bold">Drop In</h1>

        <div class="d-flex flex-column justify-content-center align-items-center my-2">
            <div class="">
                <h4 class="fw-bold mb-3" style="color: #183F23;">Step 1: Choose Location</h4>
                <div class="d-flex grid gap-5 mb-3">
                    @include('component.locationcard', [
                        'index' => 1,
                        'LocationDetail' => 'Location Detail',
                        'openHours' => '08:00 - 09:00'
                    ])
                    @include('component.locationcard', [
                        'index' => 2,
                        'LocationDetail' => 'Location Detail',
                        'openHours' => '09:00 - 10:00'
                    ])
                </div>
                <div style="width: 100%" class="d-flex justify-content-end">
                    <button style="background-color: #183F23; color: white; border:none" class="py-2 px-5 rounded-3">Next</button>
                </div>
            </div>
        </div>

    </div>
@endsection