@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Process Page</h2>
    @if($dropIns->isEmpty())
        <p>No drop-in requests found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Location</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dropIns as $dropIn)
                    <tr>
                        <td>{{ $dropIn->location->locationName ?? 'N/A' }}</td>
                        <td>{{ $dropIn->date }}</td>
                        <td>{{ $dropIn->status }}</td>
                        <td>
                            @if($dropIn->status == 'Waiting for Dropped In')
                                <form action="{{ route('drop_in.confirm', $dropIn->dropInId) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Drop In</button>
                                </form>
                            @elseif($dropIn->status == 'Declined')
                                <span class="text-danger">Declined</span>
                            @else
                                <span class="text-success">Already Dropped</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif


</div>
@endsection
