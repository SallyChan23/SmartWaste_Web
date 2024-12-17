<a href="{{ route('create-drop-in', ['id' => $index]) }}" class="text-decoration-none text-black">
    <div style="background-color: #F4F7F0;" class="p-5 rounded-3">
        <img src="{{ asset('assets/location.jpeg') }}" style="width: 40rem; background-color: aqua" class="rounded-3 object-fit-cover mb-2"/>
        <h5 style="color: #183F23" class="fw-bold mb-3">Location {{ $index }}</h5>
        <div class="d-flex">
            <i class="fa-sharp fa-solid fa-location-dot" style="color: red"></i>
            <p class="ps-2">{{ $LocationDetail}}</p>
        </div>
        <p>Open : {{ $openHours }}</p>
    </div>
</a>