@extends('layouts.app')

@section('content')

<h1>Drop In Requests</h1>

<!-- Pending Requests -->
<h3>Drop In Requests</h3>
@foreach ($pendingDropIns as $dropIn)
    <div>
        <p>User: {{ $dropIn->user->username ?? 'Unknown User' }}</p>
        <p>Location: {{ $dropIn->location->locationName ?? 'Unknown Location' }}</p>
        <p>Date: {{ $dropIn->date }}</p>
        <p>Status: <strong>{{ $dropIn->status }}</strong></p>

        <h5>Waste Types:</h5>
        @foreach ($dropIn->wasteTypes as $wasteType)
        <li>{{ $wasteType->wasteTypeName ?? 'Unknown Type' }}</li>
    @endforeach

        <form action="{{ route('admin.dropin.accept', $dropIn->dropInId) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-success">Accept</button>
        </form>

        <form action="{{ route('admin.dropin.decline', $dropIn->dropInId) }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-danger">Decline</button>
        </form>
    </div>
    <hr>
@endforeach


<!-- Dropped In Requests -->
<h3>Dropped In Requests</h3>

@foreach($droppedInRequests as $dropIn)
    <div>
        <p>User: {{ $dropIn->user->username ?? 'N/A' }}</p>
        <p>Location: {{ $dropIn->location->locationName ?? 'N/A' }}</p>
        <p>Date: {{ $dropIn->date }}</p>
        <p>Status: {{ $dropIn->status }}</p>
        <a href="{{ route('admin.validateDropIn', $dropIn->dropInId) }}" class="btn btn-success">Validate</a>
    </div>
@endforeach

@endsection



