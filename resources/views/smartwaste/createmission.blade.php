@extends('layouts.app')

@section('content')

<p class='text-center fs-1 pt-4 fw-bold'style='color:var(--darkgreen); font-family:var(-primaryFont)'>Add New Mission</p>
    <div class="container rounded-2 shadow p-5 mb-5" style="background-color: var(--basic);">
    <form action="{{route('mission.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col d-flex flex-column gap-4 px-5 py-2 fs-6 fw-semibold "style="width:100%">
            <div class="row">
                <label class="mb-2 "for="">Title</label>
                <input class="form-control" type="text" name="title" id="title" placeholder="Input mission title"required>
            </div>
            <div class="row">
                <label class="mb-2" for="">Description</label>
                <textarea class="form-control" rows="3"type="text" name="desc" id="desc" placeholder="Input mission description" required></textarea>
            </div>
            <div class="row">
                <label class="mb-2" for="">Target Mission</label>
                <input class="form-control" type="text" name="target" id="target" placeholder="Input target mission (ex: 100 bottles/15kg), just input the number" required>
            </div>
            <div class="row">
                <label class="mb-2 " for="">Points</label>
                <input class="form-control" type="text" name="points" id="points" placeholder="Input mission points (using number)" required>
            </div>
            <div class="row">
                <label class="mb-2 " for="">Mission Picture</label>
                <input class="form-control"type="file" name="missionPicture" id="picture" accept="image/*" required>
            </div>
        </div>
        <div class="d-flex justify-content-center pt-5 " style="width:100%">
            <button type="submit" style="background-color:var(--darkgreen);color:white" class="btn col-6">Save</button>
        </div>
        
    </form>
        
    </div>
    
@endsection