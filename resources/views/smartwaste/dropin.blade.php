
@extends('layouts.app')

@section('content')
    <div class="mb-5">
        <h1 style="color: #183F23" class="d-flex justify-content-center my-5 fw-bold">@lang('createDropIn.title')</h1>

        <div class="d-flex flex-column justify-content-center align-items-center my-2">
            <div class="justify-content-center">
                <h4 class="fw-bold text-center" style="color: #183F23;">@lang('createDropIn.step1')</h4>
                
                <div class="row row-cols-1 row-cols-md-3 justify-content-center g-5 mx-5 my-2">
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
