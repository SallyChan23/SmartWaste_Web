@extends('layouts.app')

@section('content')
    <div class="mb-5">
        <h1 style="color: #183F23" class="d-flex justify-content-center my-5 fw-bold">@lang('createDropIn.title')</h1>

        <!-- Display Success or Error Notifications -->
        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="d-flex flex-column justify-content-center align-items-center my-2">
            <form action="{{ route('drop_in.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- Use dynamic location ID -->
                <input type="hidden" name="locationId" value="{{ $location->locationId }}">


                <h4 class="fw-bold mb-3" style="color: #183F23;">@lang('createDropIn.step2')</h4>
                <div class="mb-3 p-5 rounded-3" style="background-color: #F4F7F0; width: 75rem">
                    
                    <!-- Waste Type -->
                    <div class="mb-3">
                        <label class="fs-5 fw-medium mb-1" style="color: #183F23">@lang('createDropIn.wasteType')</label>
                        @foreach($wasteTypes as $wasteType)
                            <div>
                                <input type="radio" name="wasteType" value="{{ $wasteType->wasteTypeId }}" onchange="toggleFields(this.value)">
                                <label>{{ $wasteType->wasteTypeName }}</label>
                            </div>
                        @endforeach
                    </div>

                    <!-- Waste Details -->
                    <div class="mb-3">
                        <label class="fs-5 fw-medium mb-1" style="color: #183F23">@lang('createDropIn.wasteDetails')</label>
                        <div id="wasteDetailsContainer"></div>
                    </div>

                    <!-- Quantity & Weight -->
                    <div class="d-flex mb-3">
                        <div id="quantityField" class="me-5" style="display: none;">
                            <label class="fs-5 fw-medium mb-1" style="color: #183F23">@lang('createDropIn.quantity')</label>
                            <input type="number" name="quantity" placeholder="@lang('createDropIn.quantityDetail')" class="form-control">
                        </div>

                        <div id="weightField" class="d-flex flex-column">
                            <label class="fs-5 fw-medium mb-1" style="color: #183F23">@lang('createDropIn.weight')</label>
                            <input type="number" name="weight" class="form-control" placeholder="Enter weight in kg" required/>
                        </div>
                    </div>

                    <script>
                        const wasteDetails = @json($wasteDetails);

                        function toggleFields(wasteTypeId) {
                            const quantityField = document.getElementById('quantityField');
                            const weightField = document.getElementById('weightField');
                            const wasteDetailsContainer = document.getElementById('wasteDetailsContainer');

                            wasteDetailsContainer.innerHTML = '';

                            const filteredDetails = wasteDetails.filter(detail => detail.wasteTypeId == wasteTypeId);
                            filteredDetails.forEach(detail => {
                                const div = document.createElement('div');
                                div.innerHTML = `
                                    <input type="checkbox" name="wasteDetail[]" value="${detail.wasteDetailId}">
                                    <label>${detail.wasteDetailName}</label>
                                `;
                                wasteDetailsContainer.appendChild(div);
                            });

                            if (wasteTypeId == 1) { 
                                quantityField.style.display = 'none';
                                weightField.style.display = 'block';
                            } else if (wasteTypeId == 2) { 
                                quantityField.style.display = 'block';
                                weightField.style.display = 'block';
                            }
                        }
                    </script>

                    <!-- Picture Upload -->
                    <div class="mb-3">
                        <label class="fs-5 fw-medium mb-1" style="color: #183F23">@lang('createDropIn.pictures')</label>
                        <div class="d-flex flex-column align-items-center p-5 bg-white border rounded-3"> 
                            <img src="{{ asset('assets/image.png') }}" style="width: 10rem" alt="Upload Image"/>
                            <p>@lang('createDropIn.picDetail')</p>
                            <p>@lang('createDropIn.or')</p>
                            <input type="file" accept="image/*" name="picture" required/>
                        </div>
                    </div>

                    <!-- Date of Drop In -->
                    <div class="d-flex flex-column mb-3">
                        <label class="fs-5 fw-medium mb-1" style="color: #183F23">@lang('createDropIn.date')</label>
                        <input type="date" name="date" class="form-control" required/>
                    </div>
                </div>

                <!-- Submit Button -->
                <div style="width: 100%" class="d-flex justify-content-center">
                    <button type="submit" style="background-color: #183F23; color: white; border: none" class="py-2 px-5 rounded-3">
                        @lang('createDropIn.submit')
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection