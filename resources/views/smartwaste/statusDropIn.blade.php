@extends('layouts.app')

@section('content')
    <div class="mb-5">
        <h1 style="color: #183F23" class="d-flex justify-content-center my-5 fw-bold">Drop In</h1>

        <div class="d-flex flex-column justify-content-center align-items-center my-2">
            <div>
                <h4 class="fw-bold mb-3" style="color: #183F23;">Step 3: Wait for Confirmation</h4>
                <div class="d-flex flex-column align-items-center justify-content-center mb-3 p-5" style="width: 75rem; height:20rem; background-color: #F4F7F0">
                    @if ($status == 'Pending')
                        <img src="{{ asset('assets/statusPending.png') }}" style="width: 3rem" class="mb-1"/>
                        <p class="text-center m-0">Pending</p>
                        <p class="text-center m-0" style="width: 24rem">Your status is still pending, please wait for admin to accept your request</p>
                    @elseif ($status == 'Accepted')
                        <img src="{{ asset('assets/statusApproved.png') }}" style="width: 3rem" class="mb-1"/>
                        <p class="text-center m-0">Accepted</p>
                        <p class="text-center m-0" style="width: 24rem">Your drop in request is accepted. Now you can drop your waste in your chosen location. Please click the button below after you already drop your waste.</p>
                    @elseif ($status == 'Declined')
                        <img src="{{ asset('assets/statusDeclined.png') }}" style="width: 3rem" class="mb-1"/>
                        <p class="text-center m-0">Declined</p>
                        <p class="text-center m-0" style="width: 24rem">Your drop in request is declined because your waste type doesn’t meet our criteria.</p>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection