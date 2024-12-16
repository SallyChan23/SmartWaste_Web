@extends('layouts.app')

@section('content')

    <div>
        <h1 style="color: #183F23;" class="d-flex justify-content-center my-5 fw-bold">Drop In</h1>

        <div class="d-flex flex-column justify-content-center align-items-center my-2">
            <form action="{{route('drop_in.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="locationId" value={{$id}}>
                <h4 class="fw-bold mb-3" style="color: #183F23;">Step 1: Choose Location</h4>
                <div class="mb-3 p-5 rounded-3" style="background-color: #F4F7F0; width: 75rem">
                    <div class="mb-3">
                        <label class="fs-5 fw-medium mb-1" style="color: #183F23">Waste Type</label>
                        <div>
                            <input type="radio" value="Organic Waste" name="wasteType"/>
                            <label>Organic Waste</label>
                        </div>
                        <div>
                            <input type="radio" value="Non-Organic Waste" name="wasteType"/>
                            <label>Non-Organic Waste</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="fs-5 fw-medium mb-1" style="color: #183F23">Waste Details</label>
                        <div>
                            <input type="checkbox" value="Plastic" name="wasteDetail"/>
                            <label>Plastic</label>
                        </div>
                        <div>
                            <input type="checkbox" value="Cans" name="wasteDetail"/>
                            <label>Cans</label>
                        </div>
                    </div>

                    <div class="d-flex mb-3">
                        <div class="me-5">
                            <label class="fs-5 fw-medium mb-1" style="color: #183F23">Quantity</label>
                            <div>
                                <input type="radio" value="2" name="quantity"/>
                                <label>2 bottles</label>
                            </div>
                            <div>
                                <input type="radio" value="10" name="quantity"/>
                                <label>10 bottles</label>
                            </div>
                        </div>

                        <div class="d-flex flex-column">
                            <label class="fs-5 fw-medium mb-1" style="color: #183F23">Weight</label>
                            <input type="number" name="weight"/>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div>
                            <label class="fs-5 fw-medium mb-1" style="color: #183F23">Pictures</label>
            
                            <div class="d-flex flex-column align-items-center p-5 bg-white" style="border: #183F23"> 
                                <img src="{{ asset('assets/image.png') }}" style="width: 10rem"/>
                                <p>Drag & Drop Image Here</p>
                                <p>or</p>
                                <input type="file" accept="image/*" name="picture"/>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column">
                        <label>Date of Drop In</label>
                        <input type="date" name="date"/>
                    </div>
                </div>
                <div style="width: 100%" class="d-flex justify-content-center">
                    <button type="submit" style="background-color: #183F23; color: white; border:none" class="py-2 px-5 rounded-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection