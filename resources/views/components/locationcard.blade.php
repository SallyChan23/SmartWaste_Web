<a href="{{ route('drop_in.create', ['id' => $index]) }}" class="text-decoration-none text-black">
    <div style="background-color: #F4F7F0;" class="p-4 rounded-3 shadow-sm h-100">
        <!-- Image -->
        <img src="{{ asset($location->locationPicture) }}" 
             alt="{{ $location->locationName }}" 
             class="w-100 mb-3 rounded-top" 
             style="height: 200px; object-fit: cover; border-top-left-radius: 15px; border-top-right-radius: 15px;">

        <!-- Location Index -->
        <h5 class="text-center fw-bold mb-2" style="color: #183F23;">Location {{ $index }}</h5>

        <!-- Location Name and Details -->
        <div class="mb-2 d-flex align-items-center justify-content-start">
            <i class="fa-solid fa-location-dot me-2" style="color: red;"></i>
            <h6 class="fw-bold mb-0">{{ $location->locationName ?? "Location $index" }}</h6>
        </div>
        <p class="mb-2 text-muted">{{ $location->locationDescription ?? $LocationDetail }}</p>

        <!-- Open Hours -->
        <p class="small mb-0"><strong>Open: </strong>08:00 - 20:00</p>
    </div>
</a>
