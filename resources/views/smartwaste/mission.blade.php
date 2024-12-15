@extends('layouts.app')

@section('content')

<style>  
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
    }

</style>
    @if (session ('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <p class='text-center fs-1 pt-4 fw-bold'style='color:var(--darkgreen); font-family:var(-primaryFont)'>Mission</p>

    @if(Auth::user()->role === 'admin')
        <div class="container d-flex justify-content-end">
            <a href="{{route('mission.create')}}" class="btn " style="background-color:var(--darkgreen)">
                <p style="color:white; margin:0">Add Mission</p>
            </a>
        </div>
    @endif


    @if(Auth::user()->role === 'user')
        @if($missionTransactions->where('status', 'ongoing')->count() > 0)
        <p class='text-start fs-3 fw-bold'style='color:var(--darkgreen); font-family:var(-primaryFont); padding-left:7rem; padding-right:7rem'>On Going Mission</p>
        @endif
        <div class="container pt-3 pb-5" >
        <div class="row row-cols-md-2  row-cols-sm-1 g-5" >
                @foreach ($missionTransactions as $transaction )
                <div class="col ">
                    <div class="h-100 card article-card flex-row rounded-4 align-items-center p-3 shadow " style="cursor:pointer;background-color:var(--lightgreen);min-height: 210px; font-family:var(-primaryFont)"
                    data-bs-toggle="modal" 
                    data-bs-target="#modalTransaction{{ $transaction->mission->missionId }}">
                        <div class="card-body d-flex flex-column justiy-content-between gap-3 align-items-center">
                            <img src="{{asset($transaction->mission->missionPicture)}}" alt="" class='img-fluid'style="object-fit:contain; height: 150px; width:auto">
                            <p style="font-size:14px;margin-0"class="fw-semibold">Started on: {{ \Carbon\Carbon::parse($transaction->startDate)->format('d F Y') }}</p>
                        </div>
                        
                        <div class="card-body d-flex flex-column justiy-content-between gap-5 text-end">
                            <div class="d-flex flex-column">
                                <p class="fs-2 card-title fw-bold " style="color:white">{{$transaction->mission->title}}</p>
                                <p class="fs-3 card-text fw-bold "  style="color:black">{{$transaction->mission->totalPoints}} points</p>
                            </div>
                            <div class="d-flex flex-column justify-content-end align-items-end">
                                <div class="progress" style="height: 30px; width: 150px;background-color:var(--lightgreen); border-radius: 10px;border:1px solid var(--darkgreen)">
                                <div 
                                    class="progress-bar" 
                                        role="progressbar" 
                                        style="width: {{  min(($transaction->currentPoints / $transaction->mission->target) * 100, 100)}}%; background-color: var(--darkgreen); border-radius: 10px;" 
                                        aria-valuenow="{{ min($transaction->currentPoints, $transaction->mission->target) }}"
                                        aria-valuemin="0" 
                                        aria-valuemax="{{ $transaction->mission->target }}">
                                        {{ min(round(($transaction->currentPoints / $transaction->mission->target) * 100, 2), 100) }}%
                                    </div>
                                </div>
                                <p class="fs-6 fw-semibold" style="color:var(--darkgreen);margin:0">{{$transaction->currentPoints}} / {{$transaction->mission->target}} waste</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="modalTransaction{{ $transaction->mission->missionId }}" tabindex="-1"
                aria-labelledby="modalTransactionLabel{{ $transaction->mission->missionId }}" aria-hidden="true">
                <div class="modal-dialog modal-lg rounded-5" style="background-color: var(--lightgreen);">
                    <div class="modal-content p-5" style="background-color: var(--lightgreen);">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h5 class="modal-title text-center fw-bold fs-2" style="color:white;" id="modalMissionLabel{{ $transaction->mission->missionId }}">
                                {{ $transaction->mission->title }}</h5>
                            <div class="d-flex justify-content-center text-center py-3">
                            <form action="{{ route('mission.updateProgress', $transaction->missionTransactionId) }}" method="POST">
                            @csrf
                            @method('PUT')
                                    <div class="form-group">
                                        <label for="bottles" class="form-label">Enter Target Collected:</label>
                                        <input type="number" name="currentPoints" id="currentPoints" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-3">Add Progress</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                @endforeach
        </div>
        </div>

    @endif

    <p class='text-start fs-3 fw-bold'style='color:var(--darkgreen); font-family:var(-primaryFont); padding-left:7rem; padding-right:7rem'>All Mission</p>
    <div class="container pt-3 pb-5"  >
        <div class="row row-cols-md-2  row-cols-sm-1 g-5 justify-content-center" >
            @foreach ($missions as $mission )
            <div class="col ">
                <div class="h-100 card article-card flex-row rounded-4 align-items-center p-3 shadow " style="cursor:pointer;background-color:var(--lightgreen);min-height: 210px; font-family:var(-primaryFont)" data-bs-toggle="modal" data-bs-target="#modalMission{{ $mission->missionId }}">
                    <img src="{{asset($mission->missionPicture)}}" alt="" class='img-fluid'style="object-fit:contain; height: 150px; width:auto">
                    <div class="card-body d-flex flex-column justiy-content-between gap-5 text-end">
                        <p class="fs-2 card-title fw-bold " style="color:white">{{$mission->title}}</p>
                        <p class="fs-3 card-text fw-bold "  style="color:black">{{$mission->totalPoints}} points</p>
                    </div>
                </div>
            </div>
                
            <div class="modal fade" id="modalMission{{ $mission->missionId}}" tabindex="-1" aria-labelledby="modalMissionLabel{{ $mission->missionId }}" aria-hidden="true">
            <div class="modal-dialog modal-lg rounded-5" style="background-color: var(--lightgreen);">
                <div class="modal-content p-5 " style="background-color: var(--lightgreen);">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" >
                        <h5 class="modal-title text-center fw-bold fs-2" style="color:white;" id="modalMissionLabel{{ $mission->missionId }}">{{ $mission->title }}</h5>
                        <div class="d-flex justify-content-between align-items-center py-3">
                            <div class="d-flex flex-column justify-content-center align-items-center gap-4" style="width:40%">
                                <img src="{{ asset($mission->missionPicture) }}" alt="" class='img-fluid'style="object-fit:contain; height: 200px; width:auto">
                                <p class="fw-bold fs-5"><strong>Total Points:</strong> {{ $mission->totalPoints }} points</p>
                            </div>
                            <div class="d-flex flex-column justify-content-between gap-1" style="width:55%">
                                <p class="text-center fw-normal fs-6"style="font-family:var(--secondaryFont)"><strong></strong> {{ $mission->description }}</p>
                                    @if(Auth::user()->role === 'user')
                                        <form action="{{ route('mission.start', $mission->missionId) }}" method="POST">
                                        @csrf
                                            <div class="d-flex justify-content-center" style="font-family:var(--primaryFont)">
                                                <button type="submit" style="background-color:var(--basic);color:var(--darkgreen)" class="btn fw-semibold px-4 py-2">Start Mission</button>
                                            </div>
                                        </form>
                                    @endif
                                

                            </div>
                        </div>
                    </div>
                    @if(Auth::user()->role === 'admin')
                        <div class="modal-footer">
                            <a href="{{route('mission.edit',$mission->missionId) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('mission.destroy', $mission->missionId) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this mission?')">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>        
        @endforeach

        </div>
        <div class="d-flex justify-content-center align-items-center mt-5">
            {{ $missions->links() }}
        </div>
    </div>

    @if(Auth::user()->role === 'user')
        @if($completedTransaction->count() > 0)
            <p class='text-start fs-3 fw-bold'style='color:var(--darkgreen); font-family:var(-primaryFont); padding-left:7rem; padding-right:7rem'>Completed Mission</p>
        @endif
        <div class="container pt-3 pb-5" >
            <div class="row row-cols-md-2  row-cols-sm-1 g-5" >
                    @foreach ($completedTransaction as $complete )
                    <div class="col">
                        <div class="h-100 card article-card flex-row rounded-4 align-items-center p-3 shadow" style="background-color:rgb(108, 128, 39);min-height: 210px; font-family:var(-primaryFont)">
                        <div class="card-body d-flex flex-column justiy-content-between gap-3 align-items-center" style="z-index:1">
                                <img src="{{asset($complete->mission->missionPicture)}}" alt="" class='img-fluid'style="object-fit:contain; height: 150px; width:auto">
                                <div class="d-flex flex-column">
                                    <p style="font-size:14px;margin-bottom:0; "class="fw-semibold">Started on: {{ \Carbon\Carbon::parse($complete->startDate)->format('d F Y') }}</p>
                                    <p style="font-size:14px;margin-bottom:0;"class="fw-semibold">Ended on: {{ \Carbon\Carbon::parse($complete->startDate)->format('d F Y') }}</p>
                                </div>
                            </div>
                            
                            <div class="card-body d-flex flex-column justiy-content-between gap-5 text-end">
                                <div class="d-flex flex-column">
                                    <p class="fs-2 card-title fw-bold " style="color:white">{{$complete->mission->title}}</p>
                                    <p class="fs-3 card-text fw-bold "  style="color:black">{{$complete->mission->totalPoints}} points</p>
                                </div>
                                <div class="d-flex flex-column justify-content-end align-items-end">
                                    <div class="progress" style="height: 30px; width: 150px;background-color:var(--lightgreen); border-radius: 10px;border:1px solid var(--darkgreen)">
                                        <div 
                                        class="progress-bar" 
                                            role="progressbar" 
                                            style="width: {{  min(($complete->currentPoints / $complete->mission->target) * 100, 100)}}%; background-color: var(--darkgreen); border-radius: 10px;" 
                                            aria-valuenow="{{ min($complete->currentPoints, $complete->mission->target) }}"
                                            aria-valuemin="0" 
                                            aria-valuemax="{{ $complete->mission->target }}">
                                            {{ min(round(($complete->currentPoints / $complete->mission->target) * 100, 2), 100) }}%
                                        </div>
                                    </div>
                                    <p class="fs-6 fw-semibold" style="color:var(--darkgreen);margin:0;">{{$complete->currentPoints}} / {{$complete->mission->target}} waste</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                
                </div>
            </div>
    @endif
@endsection