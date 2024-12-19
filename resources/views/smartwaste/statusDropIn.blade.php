@extends('layouts.app')

@section('content')
    <div class="mb-5">
        <h1 class="title d-flex justify-content-center my-5 fw-bold" style="color: #183F23">@lang('createDropIn.title')</h1>

        <div class="d-flex flex-column justify-content-center align-items-center my-2">
            <h4 class="step text-center fw-bold mb-3" style="color: #183F23;">@lang('createDropIn.step3')</h4>
            <div class="status-container d-flex flex-column align-items-center justify-content-center mb-3 p-5 rounded-4 " style="width: 75rem; height:20rem; background-color: #F4F7F0;">
                @if ($status == 'Pending')
                    <img src="{{ asset('assets/statusPending.png') }}" style="width: 3rem" class="mb-1"/>
                    <p class="text-center mb-3 fs-4 fw-medium" style="color: #183F23;">@lang('createDropIn.pending')</p>
                    <p class="text-center m-0" style="width: 24rem; color: #183F23;">@lang('createDropIn.pendingDetail')</p>
                    @elseif ($status == 'Accepted')
                    <img src="{{ asset('assets/statusApproved.png') }}" style="width: 3rem" class="mb-1"/>
                    <p class="text-center mb-3 fs-4 fw-medium" style="color: #183F23;">@lang('createDropIn.accepted')</p>
                    <p class="text-center m-0" style="width: 24rem; color: #183F23;">@lang('createDropIn.acceptedDetail')</p>
                @elseif ($status == 'Declined')
                    <img src="{{ asset('assets/statusDeclined.png') }}" style="width: 3rem" class="mb-1"/>
                    <p class="text-center mb-3 fs-4 fw-medium" style="color: #183F23;">@lang('createDropIn.decline')</p>
                    <p class="text-center m-0" style="width: 24rem; color: #183F23;">@lang('createDropIn.declineDetail')</p>
                @endif
            </div>
        </div>
    </div>
@endsection 

<style>
    @media (max-width: 768px) {
        .title{
            font-size: 50px !important;
        }

        .step{
            font-size: 25px !important;
        }

        .status-container{
            width: 90% !important;
        }
    }
</style>
