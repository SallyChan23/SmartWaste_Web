@extends('layouts.app')

@section('content')

<p class='text-center fs-1 pt-2 fw-bold' style='color:var(--darkgreen); font-family:var(-primaryFont)'>Edit Mission</p>
<div class="container rounded-2 shadow p-5 mb-5" style="background-color: var(--basic);">
    <form action="{{route('mission.update', $mission->missionId) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col d-flex flex-column gap-4 px-5 py-2 fs-6 fw-semibold" style="width:100%">
            <div class="row">
                <label class="mb-2" for="">Title</label>
                <input class="form-control" type="text" name="title" id="title" value="{{ $mission->title }}" required>
            </div>
            <div class="row">
                <label class="mb-2" for="">Description</label>
                <textarea class="form-control" rows="3" name="desc" id="desc" required>{{ $mission->description }}</textarea>
            </div>
            <div class="row">
                <label class="mb-2" for="">Target Mission</label>
                <input class="form-control" type="text" name="target" id="target" value="{{ $mission->target }}" required>
            </div>
            <div class="row">
                <label class="mb-2" for="">Points</label>
                <input class="form-control" type="text" name="points" id="points" value="{{ $mission->totalPoints }}" required>
            </div>
            <div class="row">
                <label class="mb-2" for="">Mission Picture</label>
                <small class="text-muted">Current picture: </small>
                <img src="{{ asset($mission->missionPicture )}}" alt="" class='img-fluid py-2'style="object-fit:contain; height: 150px; width:auto">
                <input class="form-control" type="file" name="missionPicture" id="picture" accept="image/*">
                
            </div>
        </div>
        <div class="d-flex justify-content-center pt-5" style="width:100%">
            <button type="submit" style="background-color:var(--darkgreen); color:white" class="btn col-6">Update</button>
        </div>
    </form>
</div>

@endsection
