@extends('layouts.app')

@section('content')

<table>
    <thead>
        <tr>
            <th>Location</th>
            <th>Date</th>
            <th>Waste Type</th>
            <th>Weight (kg)</th>
            <th>Quantity</th>
            <th>Points</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($validatedDropIns as $validated)
            <tr>
                <td>{{ $validated->validationDate }}</td>
                <td>{{ $validated->quantity ? 'Non-Organic Waste' : 'Organic Waste' }}</td>
                <td>{{ $validated->weight }}</td>
                <td>{{ $validated->quantity ?? '-' }}</td>
                <td>{{ $validated->pointsGenerated }}</td>
            </tr>
        @endforeach



    </tbody>
</table>


@endsection
