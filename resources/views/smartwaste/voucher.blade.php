@extends('layouts.app')

@section('content')

<style>
    body{
        background-color:rgb(160, 185, 72,0.8);

    }
    .circle-left{
        position: absolute; 
        top: 50%; 
        left: -10px; 
        transform: translateY(-50%);
        width: 30px; 
        height: 30px; 
        background-color: rgb(160, 185, 72,0.8); 
        border-radius: 50%;
    }

    .circle-right{
        position: absolute; 
        top: 50%; 
        right: -10px; 
        transform: translateY(-50%);
        width: 30px; 
        height: 30px; 
        background-color: rgb(160, 185, 72,0.8); 
        border-radius: 50%;
    }

</style>

    @if (session ('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <p class='text-center fs-1 pt-4 fw-bold'style='color:white; font-family:var(-primaryFont)'>Voucher</p>

    <div class="container d-flex justify-content-end">
        <a href="{{route('voucher.create')}}" class="btn " style="background-color:white">
            <p style="color:var(--darkgreen); margin:0">Add Voucher</p>
        </a>
    </div>

    <div class="container pt-3 pb-5">
        <div class="row row-cols-lg-3  row-cols-md-2 g-5">
            @foreach ($vouchers as $voucher)
            <div class="col ">
                <div class="d-flex flex-row align-items-center justify-content-center px-4  " style="background-color:white;min-height: 170px; font-family:var(-primaryFont);position: relative;
                             overflow: hidden;" >
                     <div class="circle-left"></div>   
                    <img src="{{asset($voucher->voucherPicture)}}" alt="" class='img-fluid 'style="object-fit:cover; height: 90px; width:140px">
                    <div class="card-body d-flex flex-column justify-content-center ">
                        <p class="card-title fs-5 fw-bold " style="color:black">{{$voucher->name}}</p>
                        <div class="d-flex flex-row align-items-center gap-1 pt-2">
                            <img src="assets/points.png" alt="" srcset="" style="object-fit:cover; height:20px;width:20px">
                            <p class="card-text"  style="color:black">{{$voucher->pointsNeeded}} points</p>
                        </div>
                        <p class="card-text"  style="color:black">{{$voucher->price}}</p>
                    </div>
                    <div class="d-flex flex-column ustiy-content-between align-items-end" style="gap:4.5rem">
                        <img src="assets/trash-can.png" alt="" style="height:20px; width:20px; cursor:pointer" data-bs-toggle="modal" data-bs-target="#modalVoucher{{ $voucher->voucherId }}">
                        <button type="button" class="btn btn-warning" >Redeem</button>
                    </div>
                    <div class="circle-right"></div>
                </div>
            </div>

            <div class="modal fade" id="modalVoucher{{ $voucher->voucherId}}" tabindex="-1" aria-labelledby="modalVoucherLabel{{ $voucher->voucherId }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure want to delete this Voucher? This action cannot be undone</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form action="{{ route('voucher.destroy', $voucher->voucherId) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" >Delete</button>
                            </form>
                    </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>
@endsection