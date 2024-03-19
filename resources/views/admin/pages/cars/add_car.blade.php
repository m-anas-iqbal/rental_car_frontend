@extends('admin.layouts.master')
@section('title', 'Add Cars')

@section('css')


@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Add Cars</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Cars</li>
    <li class="breadcrumb-item active"> Add Cars</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('green'))
                <div class="alert alert-success dark alert-dismissible fade show" role="alert"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-thumbs-up">
                        <path
                            d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                        </path>
                    </svg>
                    <p>{{ session('green') }}</p>
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"
                        data-bs-original-title="" title=""></button>
                </div>
            @endif
            <div class="col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Add Cars Details</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('admin/cars/add') }}" class="theme-form mega-form" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- <h6>Account Information</h6> --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label"> Car Name</label>
                                                <input class="form-control" id="car_name" name="car_name" value=""
                                                    type="text" placeholder="Enter Car Name" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="mb-3">
                                                <label class="col-form-label">Vin Number</label>
                                                <input class="form-control" id="vin_value" name="vin_number" type="text"
                                                    placeholder="Enter Vin Number" data-bs-original-title="" title="">
                                                <span class="text-danger error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="">
                                                <label class="col-form-label"></label><br><br>
                                                <button id="vinclick" class="btn btn-primary ">Fetch</button>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label">Registration Number</label>
                                                <input class="form-control" id="reg_no" name="registration_number"
                                                    value="" type="text" placeholder="Enter Registeration Number"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-4">
                                            <div class="mb-3">
                                                <label class="col-form-label">Registration Number</label>
                                                <input class="form-control" name="registration_number" value=""
                                                    type="text" placeholder="Enter Registeration Number"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label"> Rent Price</label>
                                                <input class="form-control" id="rent_price" name="rent_price" value=""
                                                    type="number" placeholder="Enter Rent Price" data-bs-original-title=""
                                                    title="">
                                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $errors->first('key') }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                @endif --}}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Discount</label>
                                               <input type="number" name="discount" min="0" max="100" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Car Image</label>
                                                <input type="file" name="car_image[]" class="form-control" multiple>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Car Brand</label>
                                                <select class="form-control" name="car_brand" id="">

                                                <option value="">Select Car Brand</option>
                                                    @foreach ($get_brands as $car_brand)
                                                        <option value="{{ $car_brand->brand_name }}">
                                                            {{ $car_brand->brand_name }}</option>
                                                    @endforeach

                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label"> Car Make</label>
                                                <input class="form-control" id="car_make" name="car_make"
                                                    value="" type="text" placeholder="Enter Car Make"
                                                    data-bs-original-title="" title="">

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Car Model</label>
                                                <input class="form-control" id="car_model" name="car_model"
                                                    value="" type="text" placeholder="Enter Car Model"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label"> Model Year</label>
                                                <input class="form-control" id="model_year" name="model_year"
                                                    value="" type="number" min="<?php  echo date('Y', strtotime('-6 year')); ?>" placeholder="Enter Model Year"
                                                    data-bs-original-title="" title="Sorry! Only under <?php  echo date('Y', strtotime('-6 year')); ?>  Car Model can be upload">

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Product Type</label>
                                                <input class="form-control" id="product_type" name="product_type"
                                                    value="" type="text" placeholder="Enter Product Type"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label"> Car Body</label>
                                                <input class="form-control" id="car_body" name="car_body"
                                                    value="" type="text" placeholder="Enter Car Body"
                                                    data-bs-original-title="" title="">

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Car Series</label>
                                                <input class="form-control" id="series" name="car_series"
                                                    value="" type="text" placeholder="Enter Car Series"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Car Drive</label>
                                                <input class="form-control" id="drive" name="car_drive"
                                                    value="" type="text" placeholder="Enter Car Drive"
                                                    data-bs-original-title="" title="">

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Fuel Type Primary</label>
                                                <input class="form-control" id="fuel_type" name="fuel_type_primary"
                                                    value="" type="text" placeholder="Enter Fuel Type Primary"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Manufacturer</label>
                                                <input class="form-control" id="manufacturer" name="manufacturer"
                                                    value="" type="text" placeholder="Enter Manufacturer"
                                                    data-bs-original-title="" title="">

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Number Of Doors</label>
                                                <input class="form-control" id="no_of_door" name="no_of_doors"
                                                    value="" type="text" placeholder="Enter Number Of Doors"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Number Of Seats</label>
                                                <input class="form-control" id="no_of_seats" name="no_of_seats"
                                                    value="" type="text" placeholder="Enter Number Of Seats"
                                                    data-bs-original-title="" title="">

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Max Trunk Capacity</label>
                                                <input class="form-control" name="max_trunk_capacity" value=""
                                                    type="text" placeholder="Enter Max Trunk Capacity"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Is Borrowed</label>
                                                <select name="is_borrowed" class="form-control" id="">
                                                    <option value="">Select Borrowed</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Select Vehicle Type</label>
                                                <select name="vehicle_type" aria-label="Default select example"
                                                    class="form-control py-3 rounded form-select">
                                                    <option value="">Select Vehicle Type</option>
                                                    <option value="Luxury">Luxury</option>
                                                    <option value="SUV">SUV</option>
                                                    <option value="Sedan">Sedan</option>
                                                    <option value="Economy">Economy</option>
                                                    <option value="Sports">Sports</option>
                                                    <option value="Convertible">Convertible</option>
                                                    <option value="CrossOver">CrossOver</option>
                                                    <option value="SuperCar">SuperCar</option>
                                                    <option value="Muscle">Muscle</option>
                                                    <option value="Special Edition">Special Edition</option>
                                                    <option value="Coupe">Coupe</option>
                                                    <option value="Compact">Compact</option>
                                                    <option value="Electric">Electric</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label">Abs</label>
                                                <select name="abs" id="" class="form-control">
                                                    <option value="">Select Abs</option>
                                                    <option value="no">No</option>
                                                    <option value="yes">Yes</option>
                                                </select>

                                            </div>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label">Description</label>
                                                <textarea rows="10" class="form-control" id="editor" name="description" placeholder=" Enter Description"
                                                    data-bs-original-title="" title=""></textarea>
                                            </div>
                                        </div>

                                    </div>



                                    <a href="{{ url('admin/car_addons') }}" type="submit"
                                        class="btn btn-primary text-end mt-2" style="" data-bs-original-title=""
                                        title="">Back</a>
                                    <input type="submit" class="btn btn-primary text-end mt-2" style="float: right"
                                        value="Add" data-bs-original-title="" title="">

                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script type="text/javascript">

        $('#vinclick').click(function(e) {
            e.preventDefault()
            var vin = $('#vin_value').val();
            // var er = $('.error').val();
            // alert(vin);
            $.ajax({
                type: 'GET',
                url: "{{ url('vin_fetch') }}",
                data: {
                    vin_no: vin
                },
                success: function(data) {
                    // alert('sds');


                    // let obj = data.decode.find(o => o.label === 'string 1')
                    let make = data.result.decode.find(o => o.label === 'Make');
                    let model = data.result.decode.find(o => o.label === 'Model');
                    let year = data.result.decode.find(o => o.label === 'Model Year');
                    let p_type = data.result.decode.find(o => o.label === 'Product Type');
                    let body = data.result.decode.find(o => o.label === 'Body');
                    let drive = data.result.decode.find(o => o.label === 'Drive');
                    let series = data.result.decode.find(o => o.label === 'Series');
                    let f_type = data.result.decode.find(o => o.label === 'Fuel Type - Primary');
                    let manu = data.result.decode.find(o => o.label === 'Manufacturer');
                    let doors = data.result.decode.find(o => o.label === 'Number of Doors');
                    // alert(doors.value);
                    $('#car_name').val(make.value)
                    $('#car_make').val(make.value)
                    $('#car_model').val(model.value)
                    $('#model_year').val(year.value)
                    $('#product_type').val(p_type.value)
                    $('#car_body').val(body.value)
                    $('#series').val(series.value)
                    $('#drive').val(drive.value)
                    $('#fuel_type').val(f_type.value)
                    $('#manufacturer').val(manu.value)
                    $('#no_of_door').val(doors.value)


                },
                error: function(xhr, status, error) {
                    // alert(xhr);
                    console.error(xhr);
                }
            });
        })
    </script>

@endsection
