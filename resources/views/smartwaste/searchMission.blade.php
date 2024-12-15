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
</style>

<div class="container">
    @if(isset($query))
        <h1 class="my-5 text-center">Showing results for: <strong>{{ $query }}</strong></h1>
    @endif

    @if($missions->isEmpty())
        <div class="alert alert-warning text-center">
            No missions found for your search.
        </div>
    @else
        <div class="container pt-3 pb-5">
            <div class="row row-cols-md-2 row-cols-sm-1 g-5 justify-content-center">
                @foreach ($missions as $mission)
                <div class="col">
                    <div 
                        class="h-100 card article-card flex-row rounded-4 align-items-center p-3 shadow"
                        style="cursor: pointer; background-color: var(--lightgreen); min-height: 210px; font-family: var(--primaryFont);" 
                        data-bs-toggle="modal" 
                        data-bs-target="#modalMission{{ $mission->missionId }}"
                    >
                        <img 
                            src="{{ asset($mission->missionPicture) }}" 
                            alt="Mission Image" 
                            class="img-fluid" 
                            style="object-fit: contain; height: 150px; width: auto;"
                        >
                        <div class="card-body d-flex flex-column justify-content-between gap-5 text-end">
                            <p class="fs-2 card-title fw-bold" style="color: white;">{{ $mission->title }}</p>
                            <p class="fs-3 card-text fw-bold" style="color: black;">{{ $mission->totalPoints }} points</p>
                        </div>
                    </div>
                </div>

                <!-- Modal for Mission Details -->
                <div class="modal fade" id="modalMission{{ $mission->missionId }}" tabindex="-1" aria-labelledby="modalMissionLabel{{ $mission->missionId }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg rounded-5" style="background-color: var(--lightgreen);">
                        <div class="modal-content p-5" style="background-color: var(--lightgreen);">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5 class="modal-title text-center fw-bold fs-2" style="color: white;" id="modalMissionLabel{{ $mission->missionId }}">{{ $mission->title }}</h5>
                                <div class="d-flex justify-content-between align-items-center py-3">
                                    <div class="d-flex flex-column justify-content-center align-items-center gap-4" style="width: 40%;">
                                        <img 
                                            src="{{ asset($mission->missionPicture) }}" 
                                            alt="Mission Image" 
                                            class="img-fluid" 
                                            style="object-fit: contain; height: 200px; width: auto;"
                                        >
                                        <p class="fw-bold fs-5">
                                            <strong>Total Points:</strong> {{ $mission->totalPoints }} points
                                        </p>
                                    </div>
                                    <div class="d-flex flex-column justify-content-between gap-1" style="width: 55%;">
                                        <p class="text-center fw-normal fs-6" style="font-family: var(--secondaryFont);">
                                            {{ $mission->description }}
                                        </p>
                                        @if(Auth::user()->role === 'user')
                                            <form action="{{ route('mission.start', $mission->missionId) }}" method="POST">
                                                @csrf
                                                <div class="d-flex justify-content-center" style="font-family: var(--primaryFont);">
                                                    <button 
                                                        type="submit" 
                                                        style="background-color: var(--basic); color: var(--darkgreen);" 
                                                        class="btn fw-semibold px-4 py-2"
                                                    >
                                                        Start Mission
                                                    </button>
                                                </div>
                                            </form>
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
        <div class="d-flex justify-content-center align-items-center mt-5">
            {{ $missions->appends(['query' => $query])->links() }}
        </div>
    @endif

    <div class="mt-3 mb-5">
        <a href="{{ route('mission.index') }}" class="btn btn-secondary" style="background-color: var(--darkgreen);">Back to All Missions</a>
    </div>

</div>
@endsection
