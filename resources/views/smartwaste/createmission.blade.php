@extends('layouts.app')

@section('content')

<p class='text-center fs-1 pt-4 fw-bold'style='color:var(--darkgreen); font-family:var(-primaryFont)'>@lang('mission.add_new')</p>
    <div class="container rounded-2 shadow p-5 mb-5" style="background-color: var(--basic);">
    <form action="{{route('mission.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col d-flex flex-column gap-4 px-5 py-2 fs-6 fw-semibold "style="width:100%">
            <div class="row">
                <label class="mb-2 "for="">@lang('mission.mission_title')</label>
                <input class="form-control" type="text" name="title" id="title" placeholder="@lang('mission.form_title')"required>
            </div>
            <div class="row">
                <label class="mb-2" for="">@lang('mission.mission_description')</label>
                <textarea class="form-control" rows="3"type="text" name="desc" id="desc" placeholder="@lang('mission.form_description')" required></textarea>
            </div>
            <div class="row">
                <label class="mb-2" for="">@lang('mission.mission_target')</label>
                <input class="form-control" type="text" name="target" id="target" placeholder="@lang('mission.form_target')" required>
            </div>
            <div class="row">
                <label class="mb-2 " for="">@lang('mission.mission_points')</label>
                <input class="form-control" type="text" name="points" id="points" placeholder="@lang('mission.form_points')" required>
            </div>
            <div class="row">
                <label class="mb-2 " for="">@lang('mission.mission_picture')</label>
                <input class="form-control"type="file" name="missionPicture" id="picture" accept="image/*" required>
            </div>
        </div>
        <div class="d-flex justify-content-center pt-5 " style="width:100%">
            <button type="submit" style="background-color:var(--darkgreen);color:white" class="btn col-6">@lang('mission.save_mission')</button>
        </div>
        
    </form>
        
    </div>
    
@endsection