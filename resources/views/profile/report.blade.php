@extends('layouts.app')

@section('content')

<div class="m-5">
    <h1 style="color: #183F23" class="d-flex justify-content-center my-5 fw-bold">History</h1>

    <div class="row row-cols-3 row-gap-4">
        @foreach($validatedDropIns as $index => $validated)
        <div class="col">
            <div class="card" style="background-color: #98c384; height: 10rem">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title fw-bold">Location {{$dropIns[$index]->locationId }}</h5>
                        {{-- <h5 class="card-title fw-bold">{{ $validated->quantity ? 'Non-Organic Waste' : 'Organic Waste' }}</h5> --}}

                        <div class="d-flex align-items-center">
                            <img src="assets/points.png" alt="" srcset="" style="object-fit:cover; height:20px;width:20px">
                            <div class="ms-1">{{ $validated->pointsGenerated }}</div>
                        </div>
                    </div>

                    <div class="mb-1">
                        @if ($validated->quantity)
                            <div class="mb-1">Non-Organic Waste</div>

                            <div class="d-flex">
                                <div class="d-flex me-3">
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-weight-hanging"></i>
                                        <div class="ms-2">{{ $validated->weight }} kg</div>
                                    </div>
                                </div>
                                
                                <div>
                                    {{ $validated->quantity }} Quantity
                                </div>
                            </div>
                        @else
                            <div>Organic Waste</div>
                            <div class="d-flex me-3">
                                <div class="d-flex align-items-center">
                                    <i class="fa-solid fa-weight-hanging"></i>
                                    <div class="ms-2">{{ $validated->weight }} kg</div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-calendar"></i>
                        <div class="ms-2">{{ \Carbon\Carbon::parse($validated->validationDate)->format('d F Y') }}</div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- <table>
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
</table> --}}


@endsection
