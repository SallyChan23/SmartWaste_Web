@extends('layouts.app')

@section('content')
<h1>Validate Drop In</h1>
<form action="{{ route('admin.verifyDropIn', $validation->dropInId) }}" method="POST">
    @csrf
    <label for="quantity">Quantity</label>
    <input type="number" name="quantity" placeholder="Quantity" value="{{ $validation->quantity }}">

    <label for="weight">Weight</label>
    <input type="number" name="weight" placeholder="Weight" value="{{ $validation->weight }}">

    <label for="status">Status</label>
    <select name="status">
        <option value="Verified" {{ $validation->status == 'Verified' ? 'selected' : '' }}>Verified</option>
        <option value="Declined" {{ $validation->status == 'Declined' ? 'selected' : '' }}>Declined</option>
    </select>

    <button type="submit">Submit</button>
</form>
@endsection
