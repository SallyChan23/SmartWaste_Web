@extends('layouts.app')

@section('content')

<div class="container-fluid min-vh-100">

    <p class='text-center fs-1 pt-4 fw-bold'style='color:var(--darkgreen); font-family:var(-primaryFont)'>@lang('dropInAdmin.banner_title')</p>

    <!-- Pending Requests -->
    <p class='text-start fs-3 fw-bold'style='color:var(--darkgreen); font-family:var(-primaryFont); padding-left:7rem; padding-right:7rem'>@lang('dropInAdmin.drop_request')</p>
    @if($pending->where('status', 'Pending')->count() === 0)
        <p class='text-start fs-6 'style='color:var(--darkgreen); font-family:var(-primaryFont); padding-left:7rem; padding-right:7rem'>@lang('dropInAdmin.drop_validation')</p>    
    @endif

    <div class="container d-flex justify-content-center align-items-center flex-column px-4" >
        <div class=" row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 row-cols-1 g-5 " style="width:100%" >
        @foreach ($pendingDropIns as $dropIn)
            <div class="col  col-12 d-flex justify-content-center align-items-center gap-1 " >
                <div class="card article-card h-100  d-flex flex-column rounded-4 p-3" style="width:400px; background-color:#BFDB88;border:none;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);font-family:var(--primaryFont)"
                    data-bs-toggle="modal" data-bs-target="#modalDropIn{{ $dropIn->dropInId }}">
                    <div class="card-status d-flex justify-content-start align-items-start">
                        <p class="text-muted" >{{ $dropIn->status }}</p>
                    </div>
                    <div class="card-name d-flex justify-content-center ">
                        <p class="fs-6 fw-bold" style="color:var(--darkgreen);margin:0">{{ $dropIn->user->username ?? 'Unknown User' }}</p>
                    </div>
                    <div class="card-body d-flex flex-column ">
                        <p style="margin:0"> <span class="fw-semibold"style="color:var(--darkgreen)">@lang('dropInAdmin.location')</span> {{ $dropIn->location->locationName ?? 'Unknown Location' }}</p>
                        @foreach ($dropIn->wasteTypes as $wasteType)
                            <p style="margin:0"><span class="fw-semibold"style="color:var(--darkgreen)">@lang('dropInAdmin.waste_type')</span> {{ $wasteType->wasteTypeName ?? 'Unknown Type' }}</p>
                        @endforeach
                        <p style="margin:0"><span class="fw-semibold"style="color:var(--darkgreen)">@lang('dropInAdmin.waste_detail')</span></p>
                        @foreach ($dropIn->wasteDetails as $detail)
                            <li>{{ $detail->wasteDetailName ?? 'Unknown Detail' }}</li>
                        @endforeach
                        <p style="margin:0"><span class="fw-semibold"style="color:var(--darkgreen)">@lang('dropInAdmin.date')</span> {{ \Carbon\Carbon::parse($dropIn->date)->format('d F Y') }}</p>

                    </div>

                    <div class="modal fade" id="modalDropIn{{ $dropIn->dropInId }}" tabindex="-1"
                        aria-labelledby="modalDropInLabel{{ $dropIn->dropInId }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal" >
                            <div class="modal-content p-5" style="background-color: #BFDB88;">
                                <div class="modal-header" style="border-bottom: 1px solid var(--lightgreen)">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="modal-title text-center fw-bold fs-2" style="color:white;" id="modalDropIn{{ $dropIn->dropInId }}">{{ $dropIn->user->username }}</h5>
                                    <div class="mission-modal justify-content-between align-items-center py-3" style="width:100%">
                                        <div class="d-flex flex-column justify-content-center align-items-center gap-4" >
                                            <img src="{{ asset($dropIn->wastePicture) }}" alt="" class='img-fluid' style="object-fit:contain; height: 150px; width:auto">
                                            <div class="d-flex flex-column justify-content-between gap-1" >
                                                <p style="margin:0"> <span class="fw-semibold"style="color:var(--darkgreen)">@lang('dropInAdmin.location')</span> {{ $dropIn->location->locationName ?? 'Unknown Location' }}</p>
                    
                                                @foreach ($dropIn->wasteTypes as $wasteType)
                                                    <p style="margin:0"><span class="fw-semibold"style="color:var(--darkgreen)">@lang('dropInAdmin.waste_type')</span> {{ $wasteType->wasteTypeName ?? 'Unknown Type' }}</p>
                                                @endforeach
                                                <p style="margin:0"><span class="fw-semibold"style="color:var(--darkgreen)">@lang('dropInAdmin.waste_detail')</span></p>
                                                @foreach ($dropIn->wasteDetails as $detail)
                                                    <li>{{ $detail->wasteDetailName ?? 'Unknown Detail' }}</li>
                                                @endforeach
                                            
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-center " style="border-top: 1px solid var(--lightgreen)">
                                    <div class="d-flex flex-row justify-content-center align-items-center gap-4">
                                        <form action="{{ route('admin.dropin.accept', $dropIn->dropInId) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success">@lang('dropInAdmin.accept')</button>
                                        </form>

                                        <form action="{{ route('admin.dropin.decline', $dropIn->dropInId) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">@lang('dropInAdmin.decline')</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>     
                </div>
            </div> 
        @endforeach
        </div>
    </div>




    <!-- Dropped In Requests -->

    <p class='text-start pt-5 fs-3 fw-bold'style='color:var(--darkgreen); font-family:var(-primaryFont); padding-left:7rem; padding-right:7rem'>@lang('dropInAdmin.drop_validation')</p>

    @if($waiting->whereIn('status', ['Waiting for Dropped In', 'Already Dropped In'])->count() === 0)
        <p class='text-start fs-6 'style='color:var(--darkgreen); font-family:var(-primaryFont); padding-left:7rem; padding-right:7rem'>@lang('dropInAdmin.no_validation')</p>
    @endif

    <div class="container d-flex justify-content-center align-items-center flex-column px-4 pb-5" >
        <div class=" row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 row-cols-1 g-5 " style="width:100%">
            @foreach($droppedInRequests as $dropIn)
            <div class="col d-flex justify-content-center align-items-center gap-1 ">
                <div class="card article-card h-100  d-flex flex-column rounded-4 p-3" style="width:400px; background-color:rgba(152, 195, 132, 1);border:none;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);font-family:var(--primaryFont)"
                    data-bs-toggle="modal" data-bs-target="#modalDropIn{{ $dropIn->dropInId }}">
                    <div class="card-status d-flex justify-content-start align-items-start">
                        <p class="text-muted" >{{ $dropIn->status }}</p>
                    </div>
                    <div class="card-name d-flex justify-content-center ">
                        <p class="fs-6 fw-bold" style="color:var(--darkgreen);margin:0">{{ $dropIn->user->username ?? 'Unknown User' }}</p>
                    </div>
                    <div class="card-body d-flex flex-column ">
                        <p style="margin:0"> <span class="fw-semibold"style="color:var(--darkgreen)">@lang('dropInAdmin.location')</span> {{ $dropIn->location->locationName ?? 'Unknown Location' }}</p>
                        @foreach ($dropIn->wasteTypes as $wasteType)
                            <p style="margin:0"><span class="fw-semibold"style="color:var(--darkgreen)">@lang('dropInAdmin.waste_type')</span> {{ $wasteType->wasteTypeName ?? 'Unknown Type' }}</p>
                        @endforeach
                        <p style="margin:0"><span class="fw-semibold"style="color:var(--darkgreen)">@lang('dropInAdmin.waste_detail')</span></p>
                        @foreach ($dropIn->wasteDetails as $detail)
                            <li>{{ $detail->wasteDetailName ?? 'Unknown Detail' }}</li>
                        @endforeach
                        <p style="margin:0"><span class="fw-semibold"style="color:var(--darkgreen)">@lang('dropInAdmin.date')</span> {{ \Carbon\Carbon::parse($dropIn->date)->format('d F Y') }}</p>

                    </div>

                    <div class="modal fade" id="modalDropIn{{ $dropIn->dropInId }}" tabindex="-1"
                        aria-labelledby="modalDropInLabel{{ $dropIn->dropInId }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal" >
                            <div class="modal-content p-5" style="background-color: #BFDB88;">
                                <div class="modal-header" style="border-bottom: 1px solid var(--lightgreen)">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h5 class="modal-title text-center fw-bold fs-2" style="color:white;" id="modalDropIn{{ $dropIn->dropInId }}">{{ $dropIn->user->username }}</h5>
                                    <div class="mission-modal justify-content-between align-items-center py-3" style="width:100%">
                                        <div class="d-flex flex-column justify-content-center align-items-center gap-4" >
                                            <img src="{{ asset($dropIn->wastePicture) }}" alt="" class='img-fluid' style="object-fit:contain; height: 150px; width:auto">
                                            <div class="d-flex flex-column justify-content-between gap-1" >
                                                <p style="margin:0"> <span class="fw-semibold"style="color:var(--darkgreen)">@lang('dropInAdmin.location')</span> {{ $dropIn->location->locationName ?? 'Unknown Location' }}</p>
                    
                                                @foreach ($dropIn->wasteTypes as $wasteType)
                                                    <p style="margin:0"><span class="fw-semibold"style="color:var(--darkgreen)">@lang('dropInAdmin.waste_type')</span> {{ $wasteType->wasteTypeName ?? 'Unknown Type' }}</p>
                                                @endforeach
                                                <p style="margin:0"><span class="fw-semibold"style="color:var(--darkgreen)">@lang('dropInAdmin.waste_detail')</span></p>
                                                @foreach ($dropIn->wasteDetails as $detail)
                                                    <li>{{ $detail->wasteDetailName ?? 'Unknown Detail' }}</li>
                                                @endforeach
                                            
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-center " style="border-top: 1px solid var(--lightgreen)">
                                    @if ($dropIn->status==='Waiting for Dropped In')
                                        <button type="button" class="btn btn-secondary" disabled>@lang('dropInAdmin.validate')</button>
                                    @elseif($dropIn->status==='Already Dropped In')
                                        <a href="{{ route('admin.validateDropIn', $dropIn->dropInId) }}" class="btn btn-success">@lang('dropInAdmin.validate')</a>
                                    @endif
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection



