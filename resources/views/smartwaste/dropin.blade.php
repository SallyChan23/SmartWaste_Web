
@extends('layouts.app')

@section('content')
    <div class="mb-5">
        <h1 style="color: #183F23" class="d-flex justify-content-center my-5 fw-bold">Drop In</h1>

        <div class="d-flex flex-column justify-content-center align-items-center my-2">
            <div class="text-center">
                <h4 class="fw-bold mb-3" style="color: #183F23;">Step 1: Choose Location</h4>
                
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($locations as $location)
                        @include('components.locationcard', [
                            'index' => $loop->index + 1,
                            'LocationDetail' => $location->locationDescription,
                            'openHours' => $location->urllocation
                        ])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
