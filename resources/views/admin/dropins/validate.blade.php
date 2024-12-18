@extends('layouts.app')

@section('content')
<style>
    body{
        background-color:rgba(152, 195, 132, 1);
    }
</style>
<p class='text-center fs-1 pt-4 fw-bold'style='color:white; font-family:var(-primaryFont)'>Drop In Validation</p>
<div class="container rounded-2 shadow p-5 mb-5" style="background-color: var(--basic);font-family:var(-primaryFont)  " >
    <form action="{{ route('admin.verifyDropIn', $validation->dropInId) }}" method="POST">
        @csrf
        <div class="col d-flex flex-column gap-4 px-5 py-2 fs-6 fw-semibold" style="width:100%">
            <div class="row">
                <label class="mb-2" for="quantity">Quantity</label>
                <input class="form-control" type="number" name="quantity" placeholder="Quantity" value="{{ $validation->quantity }}">
            </div>
            <div class="row">
                <label class="mb-2" for="weight">Weight</label>
                <input class="form-control" type="number" name="weight" placeholder="Weight" value="{{ $validation->weight }}">
            </div>
            <div class="row">
                <label class="mb-2" for="status">Status</label>
                <select name="status" class="form-select">
                    <option value="Verified" {{ $validation->status == 'Verified' ? 'selected' : '' }}>Verified</option>
                    <option value="Declined" {{ $validation->status == 'Declined' ? 'selected' : '' }}>Declined</option>
                </select>
            </div>
            <div class="d-flex justify-content-center pt-3" style="width:100%">
                <button type="submit" style="background-color:var(--darkgreen);color:white; " class="col-6">Submit</button>
            </div>

            

            


        </div>
        
    </form>
</div>

@endsection
