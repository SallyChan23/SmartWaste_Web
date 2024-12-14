@extends('layouts.app')

@section('content')

    @if (session ('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <p class='text-center fs-1 pt-4 fw-bold'style='color:var(--darkgreen); font-family:var(-primaryFont)'>Mission</p>

        <div class="container d-flex justify-content-end">
            <a href="{{route('mission.create')}}" class="btn " style="background-color:var(--darkgreen)">
                <p style="color:white; margin:0">Add Mission</p>
            </a>
        </div>


    <p class="px-5">On Going Mission</p>
    <div class="container pt-3 pb-5" >
    <div class="row row-cols-md-2  row-cols-sm-1 g-5" >
            @foreach ($missionTransactions as $transaction )
            <div class="col ">
                <div class="h-100 card article-card flex-row rounded-4 align-items-center p-3 shadow " style="background-color:var(--lightgreen);min-height: 210px; font-family:var(-primaryFont)"
                data-bs-toggle="modal" 
                data-bs-target="#modalTransaction{{ $transaction->mission->missionId }}">
                    <img src="{{asset($transaction->mission->missionPicture)}}" alt="" class='img-fluid'style="object-fit:contain; height: 150px; width:auto">
                    <div class="card-body d-flex flex-column justiy-content-between gap-2 text-end">
                        <p class="fs-2 card-title fw-bold " style="color:white">{{$transaction->mission->title}}</p>
                        <p class="fs-2 card-title fw-bold " style="color:white">Target: {{$transaction->mission->target}}</p>
                        <p class="fs-3 card-text fw-bold "  style="color:black">Current Target: {{$transaction->currentPoints}} waste</p>
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
                        <div class="d-flex justify-content-center py-3">
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

    <p class="px-5">All Mission</p>
    <div class="container pt-3 pb-5" >
        <div class="row row-cols-md-2  row-cols-sm-1 g-5" >
            @foreach ($missions as $mission )
            <div class="col ">
                <div class="h-100 card article-card flex-row rounded-4 align-items-center p-3 shadow " style="background-color:var(--lightgreen);min-height: 210px; font-family:var(-primaryFont)" data-bs-toggle="modal" data-bs-target="#modalMission{{ $mission->missionId }}">
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
                            <div class="d-flex flex-column jify-content-center align-items-center gap-4" style="width:40%">
                                <img src="{{ asset($mission->missionPicture) }}" alt="" class='img-fluid'style="object-fit:contain; height: 200px; width:auto">
                                <p class="fw-bold fs-5"><strong>Total Points:</strong> {{ $mission->totalPoints }} points</p>
                            </div>
                            <div class="d-flex flex-column justify-content-between gap-1" style="width:55%">
                                <p class="text-center fw-normal fs-6"style="font-family:var(--secondaryFont)"><strong></strong> {{ $mission->description }}</p>
                                    <form action="{{ route('mission.start', $mission->missionId) }}" method="POST">
                                    @csrf
                                    <div class="d-flex justify-content-center " style="font-family:var(--primaryFont)">
                                        <button type="submit" style="background-color:var(--basic);color:var(--darkgreen)" class="btn col-6 fw-semibold">Start Mission</button>
                                    </div>
                                    </form>
                                

                            </div>
                        </div>
                    </div>
                    

                        <div class="modal-footer">
                            <a href="{{route('mission.edit',$mission->missionId) }}" class="btn btn-success">Edit</a>
                            <form action="{{ route('mission.destroy', $mission->missionId) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this mission?')">Delete</button>
                            </form>
                        </div>

                    

                </div>
            </div>
        </div>        
        @endforeach
        </div>
    </div>

    <p class="px-5">Completed Mission</p>
    <div class="container pt-3 pb-5" >
    <div class="row row-cols-md-2  row-cols-sm-1 g-5" >
            @foreach ($completedTransaction as $complete )
            <div class="col ">
                <div class="h-100 card article-card flex-row rounded-4 align-items-center p-3 shadow " style="background-color:var(--lightgreen);min-height: 210px; font-family:var(-primaryFont)">
                    <img src="{{asset($complete->mission->missionPicture)}}" alt="" class='img-fluid'style="object-fit:contain; height: 150px; width:auto">
                    <div class="card-body d-flex flex-column justiy-content-between gap-2 text-end">
                        <p class="fs-2 card-title fw-bold " style="color:white">{{$complete->mission->title}}</p>
                        <p class="fs-2 card-title fw-bold " style="color:white"> Target: {{$complete->mission->target}} </p>
                        <p class="fs-3 card-text fw-bold "  style="color:black"> Current Target: {{$complete->currentPoints}} waste</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection