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
        border-color: var(--darkgreen);
    }

    .mission-card {
        background-color: var(--lightgreen);
        transition: background-color 0.3s ease;
        min-height: 210px; 
        font-family:var(-primaryFont);
    }

    .mission-card:hover {
        cursor: pointer;
        background-color: rgb(108, 128, 39) !important;
    }
</style>

<div class="container">
    @if(isset($query))
        <h1 class="my-5 text-center">@lang('mission.searchResult') <strong>{{ $query }}</strong></h1>
    @endif

    @if($missions->isEmpty())
        <div class="alert alert-warning text-center">
            @lang('mission.noSearchResult')
        </div>
    @else
        <div class="container pt-3 pb-5">
            <div class="row row-cols-md-2 row-cols-sm-1 g-5 justify-content-center">
            @foreach ($missions as $mission )
                <div class="col ">
                    <div class="mission-card h-100 card article-card flex-row rounded-4 align-items-center p-3 shadow " data-bs-toggle="modal" data-bs-target="#modalMission{{ $mission->missionId }}">
                        <img src="{{asset($mission->missionPicture)}}" alt="" class='img-fluid'style="object-fit:contain; height: 150px; width:auto">
                        <div class="card-body d-flex flex-column justiy-content-between gap-5 text-end">
                            <p class="fs-2 card-title fw-bold " style="color:white">{{$mission->title}}</p>
                            <p class="fs-3 card-text fw-bold "  style="color:black">{{$mission->totalPoints}} @lang('mission.points')</p>
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
                                    <p class="fw-bold fs-5"><strong>@lang('mission.total_points')</strong> {{ $mission->totalPoints }} @lang('mission.points')</p>
                                </div>
                                <div class="d-flex flex-column justify-content-between gap-1" style="width:55%">
                                    <p class="text-center fw-normal fs-6"style="font-family:var(--secondaryFont)"><strong></strong> {{ $mission->description }}</p>
                                        @if(Auth::user()->role === 'user')
                                            <form action="{{ route('mission.start', $mission->missionId) }}" method="POST">
                                            @csrf
                                                <div class="d-flex justify-content-center" style="font-family:var(--primaryFont)">
                                                    <button type="submit" style="background-color:var(--basic);color:var(--darkgreen)" class="btn fw-semibold px-4 py-2">@lang('mission.start_mission')</button>
                                                </div>
                                            </form>
                                        @endif
                                    

                                </div>
                            </div>
                        </div>
                        @if(Auth::user()->role === 'admin')
                            <div class="modal-footer">
                                <a href="{{route('mission.edit',$mission->missionId) }}" class="btn btn-success">@lang('mission.edit_mission')</a>
                                <form action="{{ route('mission.destroy', $mission->missionId) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this mission?')">@lang('mission.delete_mission')</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>        
        @endforeach
        </div>
        <div class="d-flex justify-content-center align-items-center mt-5">
            {{ $missions->appends(['query' => $query])->links() }}
        </div>
    @endif

    <div class="mt-3 mb-5">
        <a href="{{ route('mission.index') }}" class="btn btn-secondary" style="background-color: var(--darkgreen);">@lang('mission.backButton')</a>
    </div>

</div>
@endsection
