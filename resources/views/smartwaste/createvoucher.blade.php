@extends('layouts.app')

@section('content')

<style>
    body{
        background-color:rgb(160, 185, 72,0.8);

    }
</style>



<p class='text-center fs-1 pt-4 fw-bold'style='color:white; font-family:var(-primaryFont)'>Add New Voucher</p>
    <div class="container rounded-2 shadow p-5 mb-5" style="background-color: white; ">
    <form action="{{route('voucher.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col d-flex flex-column gap-4 px-5 py-2 fs-6 fw-semibold ">
            <div class="row">
                <label class="mb-2 "for="">Name</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Input voucher name"required>
            </div>
            <div class="row">
                <label class="mb-2" for="">Price</label>
                <textarea class="form-control" rows="3"type="text" name="price" id="price" placeholder="Input voucher price" required></textarea>
            </div>
            <div class="row">
                <label class="mb-2 " for="">Points</label>
                <input class="form-control" type="text" name="points" id="points" placeholder="Input voucher points (using number)" required>
            </div>
            <div class="row">
                <label class="mb-2 " for="">Voucher Picture</label>
                <input class="form-control"type="file" name="voucherPicture" id="picture" accept="image/*" required>
            </div>
        </div>
        <div class="d-flex justify-content-center pt-5">
            <button type="submit" style="background-color:var(--darkgreen);color:white" class="btn col-6">Save</button>
        </div>
        
    </form>
        
    </div>
    
@endsection