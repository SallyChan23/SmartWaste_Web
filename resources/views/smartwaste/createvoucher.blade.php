@extends('layouts.app')

@section('content')

<style>
    body{
        background-color:rgb(160, 185, 72,0.8);
    }
</style>



<p class='text-center fs-1 pt-4 fw-bold'style='color:white; font-family:var(-primaryFont)'>@lang('voucher.add_new')</p>
    <div class="container rounded-2 shadow p-5 mb-5" style="background-color: white; ">
        <form action="{{route('voucher.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col d-flex flex-column gap-4 px-5 py-2 fs-6 fw-semibold " style="width:100%">
                <div class="row">
                    <label class="mb-2 "for="">@lang('voucher.voucher_name')</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="@lang('voucher.form_name')"required>
                </div>
                <div class="row">
                    <label class="mb-2" for="">@lang('voucher.voucher_price')</label>
                    <textarea class="form-control" rows="3"type="text" name="price" id="price" placeholder="@lang('voucher.form_price')" required></textarea>
                </div>
                <div class="row">
                    <label class="mb-2 " for="">@lang('voucher.voucher_points')</label>
                    <input class="form-control" type="text" name="points" id="points" placeholder="@lang('voucher.form_price')" required>
                </div>
                <div class="row">
                    <label class="mb-2 " for="">@lang('voucher.voucher_picture')</label>
                    <input class="form-control"type="file" name="voucherPicture" id="picture" accept="image/*" required>
                </div>
            </div>
            <div class="d-flex justify-content-center pt-5" style="width:100%">
                <button type="submit" style="background-color:var(--darkgreen);color:white" class="btn col-6">@lang('voucher.save_voucher')</button>
            </div>
        </form>
    </div>
@endsection