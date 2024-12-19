@extends('layouts.app')

@section('content')
<div class="container-fluid p-4 mt-4 mb-5" style="background-color: white;">
    <div class="row justify-content-center g-4">
        <!-- Sidebar -->
        <div class="col-12 col-md-3 text-center p-4 me-md-5">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 d-flex justify-content-center">
                    <img 
                        src="{{ $user->profilePicture ? asset('storage/' . $user->profilePicture) : asset('default-profile.png') }}" 
                        alt="@lang('profile.profile_picture')" 
                        class="rounded-circle mb-3" 
                        width="120" 
                        height="120"
                        style="border: 4px solid #5eaf60; box-shadow: 0 0 5px rgba(0,0,0,0.2);"
                    >
                </div>
                <div class="col-12 col-md-6 d-flex flex-column justify-content-center mt-3 mt-md-0">
                    <h5 class="fw-bold mb-1">{{ $user->username }}</h5>
                    <p class="text-muted mb-0">
                        <img src="{{ asset('assets/points.png') }}" alt="" style="object-fit:cover; height:20px;width:20px">
                        <i class="bi bi-coin text-warning" style="font-size: 1.2rem;"></i>
                        <span class="fw-semibold">{{ $user->points ?? 0 }} @lang('profile.points')</span>
                    </p>
                </div>
            </div>
            <hr class="mb-4 mt-4" style="width: 100%; margin: 0 auto; border-top: 2px solid #183F23;">
            <ul class="list-unstyled text-start">
                <li class="mb-4">
                    <img src="{{ asset('assets/profile3.png') }}" alt="" class="me-2" style="width: 30px">
                    <a href="{{ route('profile.show') }}" class="text-decoration-none text-dark">@lang('profile.profile_title')</a>
                </li>
                <li class="mb-4">
                    <img src="{{ asset('assets/profile2.png') }}" alt="" class="me-2 ms-1" style="width: 25px">
                    <a href="{{ route('profile.report') }}" class="text-decoration-none text-dark">@lang('profile.report')</a>
                </li>
                <li class="mb-4">
                    <img src="{{ asset('assets/profile1.png') }}" alt="" class="me-2 ms-1" style="width: 25px">
                    <a href="{{ route('redeem') }}" class="text-decoration-none text-dark">@lang('profile.redeemed_vouchers')</a>
                </li>
                <li class="mb-5">
                    <img src="{{ asset('assets/profile4.png') }}" alt="" class="me-1 ms-0" style="width: 35px">
                    <a href="{{ route('drop_in.process') }}" class="text-decoration-none text-success fw-semibold">@lang('profile.process')</a>
                    <hr style="width: 50%; margin-top: 0.3rem; margin-left: 40px; border-top: 2px solid #5eaf60;">
                </li>
                @if (Auth::check())
                    <li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="rounded-5 text-center text-white btn" style="background-color: #183F23; width: 100px; height: 50px">
                                @lang('profile.logout')
                            </button>
                        </form>
                    </li>
                @endif
            </ul>
        </div>
        

        <div class="col-12 col-md-7 ms-4 p-5 shadow-sm" style="border-radius: 15px; background-color:#F4F7F0">
            <h4 class="fw-normal mb-2 text-start">@lang('process.title')</h4>
            <hr class="mb-5" style="border-top: 2px solid #183F23;">
            @if($dropIns->isEmpty())
                <p>@lang('process.no_requests')</p>
            @else
                <div class="row row-cols-1 g-4">
                    @foreach($dropIns as $dropIn)
                    <div class="col">
                        <div class="card shadow-lg border-0 rounded-4 h-100">
                            <div class="card-body p-4">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <ul class="list-unstyled mb-0">
                                            <li><strong>@lang('process.waste_type'):</strong> <span class="text-secondary">{{ $dropIn->wasteType ?? __('process.not_available') }}</span></li>
                                            <li><strong>@lang('process.location'):</strong> <span class="text-secondary">{{ $dropIn->location->locationName ?? __('process.not_available') }}</span></li>
                                            <li><strong>@lang('process.date'):</strong> <span class="text-secondary">{{ $dropIn->date ?? __('process.not_available') }}</span></li>
                                        </ul>
                                    </div>
                                    <div class="col-4 text-end">
                                        @if($dropIn->status === 'Declined')
                                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $dropIn->dropInId }}">🗑️ @lang('process.delete')</button>
                                        @endif
                                    </div>
                                </div>
                                <!-- Status and Actions -->
                                <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap">
                                    <div>
                                        @if($dropIn->status === 'Pending')
                                        <p class="text-warning fw-bold mb-0 fs-5">🕒 @lang('process.pending')</p>
                                        @elseif($dropIn->status === 'Declined')
                                            <p class="text-danger fw-bold mb-0 fs-5">❌ @lang('process.declined')</p>
                                        @elseif($dropIn->status === 'Waiting for Dropped In')
                                            <p class="text-primary fw-bold mb-0 fs-5">📦 @lang('process.waiting')</p>
                                        @else
                                            <p class="text-success fw-bold mb-0 fs-5">✅ @lang('process.validated')</p>
                                        @endif
                                    </div>
                                    <div>
                                        @if($dropIn->status === 'Waiting for Dropped In')
                                        <form action="{{ route('drop_in.confirm', $dropIn->dropInId) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-primary btn-sm px-3 rounded-3 shadow-sm">@lang('process.drop_in')</button>
                                        </form>
                                        @elseif($dropIn->status === 'Pending')
                                            <span class="btn btn-outline-warning btn-sm px-3 rounded-3 shadow-sm disabled">@lang('process.pending')</span>
                                        @else
                                            <span class="btn btn-outline-success btn-sm px-3 rounded-3 shadow-sm disabled">@lang('process.validated')</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal{{ $dropIn->dropInId }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-body text-center">
                                    <h5 class="mb-3">@lang('process.delete_confirmation')</h5>
                                    <p>@lang('process.confirm_delete')</p>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('process.cancel')</button>
                                    <form action="{{ route('drop_in.delete', $dropIn->dropInId) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">@lang('process.delete_yes')</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center mt-5">
                    {{ $dropIns->links() }}
                </div>
            @endif
        </div>        
    </div>
</div>

<style>
    @media (max-width: 768px) {
        .btn {
            width: 100%;
        }
    }
    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }
    .page-link {
        background-color: white; 
        color: var(--darkgreen); 
    }

    .page-link:hover {
        background-color: var(--darkgreen); 
        color: white; 
    }

    .page-item.active .page-link {
        background-color: var(--darkgreen); 
        color: white; 
        border-color: var(--darkgreen);
    }
</style>
@endsection