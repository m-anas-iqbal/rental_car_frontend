@extends('admin.layouts.master')
@section('title', 'Edit Cars')

@section('css')


@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Edit Cars</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Cars</li>
    <li class="breadcrumb-item active"> Edit Cars</li>
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
                                <h5>Edit Cars Details</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{ url('admin/cars/edit') }}" class="theme-form mega-form" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- <h6>Account Information</h6> --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label"> Car Name</label>
                                                <input class="form-control" name="car_name" value="{{ $get_car->car_name }}"
                                                    type="text" placeholder="Enter Car Name" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label"> Rent Price</label>
                                                <input class="form-control" value="{{ $get_car->car_rent_price }}"
                                                    name=" rent_price" value="" type="number"
                                                    placeholder="Enter Rent Price" data-bs-original-title="" title="">
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
                                               <input type="number" value="{{$get_car->discount}}" name="discount" min="0" max="100" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Vin Number</label>
                                                <input class="form-control" name="vin_number"
                                                    value="{{ $get_car->car_vin }}" type="text"
                                                    placeholder="Enter Vin Number" data-bs-original-title="" title="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Registration Number</label>
                                                <input class="form-control" name="registration_number"
                                                    value="{{ $get_car->car_registration_no }}" type="text"
                                                    placeholder="Enter Registeration Number" data-bs-original-title=""
                                                    title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label">Car Image</label>
                                                <input type="file" name="car_image[]" class="form-control" multiple>
                                            </div>
                                        </div>
                                        @php
                                            $getimages = json_decode($get_car->car_images);
                                            // dd($car_images);
                                        @endphp
                                        <div class="row">
                                            @foreach ($getimages as $key => $image)
                                                <div class="col-md-2"><img src="{{ asset('uploads/') . '/' . $image }}"
                                                        width="250px" height="250px" alt=""></div>
                                            @endforeach
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label">Car Brand</label>
                                                <select class="form-control" name="car_brand" id="">
                                                    @foreach($get_brands as $car_brand)
                                                    <option value="{{$car_brand->brand_name}}">{{$car_brand->brand_name}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label"> Car Make</label>
                                                <input class="form-control" name="car_make" value="{{ $get_car->car_make }}"
                                                    type="text" placeholder="Enter Car Make" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Car Model</label>
                                                <input class="form-control" name="car_model" value="{{ $get_car->car_model }}"
                                                    type="text" placeholder="Enter Car Model"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label"> Model Year</label>
                                                <input class="form-control" id="model_year" name="model_year"
                                                value="{{ $get_car->model_year }}" type="number" min="<?php  echo date('Y', strtotime('-6 year')); ?>" placeholder="Enter Model Year"
                                                    data-bs-original-title="" title="Sorry! Only under <?php  echo date('Y', strtotime('-6 year')); ?>  Car Model can be upload">


                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Product Type</label>
                                                <input class="form-control" name="product_type" value="{{ $get_car->product_type }}"
                                                    type="text" placeholder="Enter Product Type"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label"> Car Body</label>
                                                <input class="form-control" name="car_body" value="{{ $get_car->body }}"
                                                    type="text" placeholder="Enter Car Body" data-bs-original-title=""
                                                    title="">

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Car Series</label>
                                                <input class="form-control" name="car_series" value="{{ $get_car->series }}"
                                                    type="text" placeholder="Enter Car Series"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Car Drive</label>
                                                <input class="form-control" name="car_drive" value="{{ $get_car->drive }}"
                                                    type="text" placeholder="Enter Car Drive"
                                                    data-bs-original-title="" title="">

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Fuel Type Primary</label>
                                                <input class="form-control" name="fuel_type_primary" value="{{ $get_car->fuel_type_primary }}"
                                                    type="text" placeholder="Enter Fuel Type Primary"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Manufacturer</label>
                                                <input class="form-control" name="manufacturer" value="{{ $get_car->manufacturer }}"
                                                    type="text" placeholder="Enter Manufacturer"
                                                    data-bs-original-title="" title="">

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Number Of Doors</label>
                                                <input class="form-control" name="no_of_doors" value="{{ $get_car->no_of_doors }}"
                                                    type="text" placeholder="Enter Number Of Doors"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Number Of Seats</label>
                                                <input class="form-control" name="no_of_seats" value="{{ $get_car->no_of_seats }}"
                                                    type="text" placeholder="Enter Number Of Seats"
                                                    data-bs-original-title="" title="">

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Max Trunk Capacity</label>
                                                <input class="form-control" name="max_trunk_capacity" value="{{ $get_car->max_trunk_capacity}}"
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
                                                    <option @if($get_car->is_borrowed=="1") selected @endif value="1">Yes</option>
                                                    <option @if($get_car->is_borrowed=="0") selected @endif value="0">No</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Select Vehicle Type</label>
                                                <select name="vehicle_type" aria-label="Default select example"
                                                    class="form-control py-3 rounded form-select">
                                                    <option>Select Vehicle Type</option>
                                                    <option @if($get_car->vehicle_type=="Luxury") selected @endif value="Luxury">Luxury</option>
                                                    <option @if($get_car->vehicle_type=="SUV") selected @endif value="SUV">SUV</option>
                                                    <option @if($get_car->vehicle_type=="Sedan") selected @endif value="Sedan">Sedan</option>
                                                    <option @if($get_car->vehicle_type=="Economy") selected @endif value="Economy">Economy</option>
                                                    <option @if($get_car->vehicle_type=="Sports") selected @endif value="Sports">Sports</option>
                                                    <option @if($get_car->vehicle_type=="Convertible") selected @endif value="Convertible">Convertible</option>
                                                    <option @if($get_car->vehicle_type=="CrossOver") selected @endif value="CrossOver">CrossOver</option>
                                                    <option @if($get_car->vehicle_type=="SuperCar") selected @endif value="SuperCar">SuperCar</option>
                                                    <option @if($get_car->vehicle_type=="Musle") selected @endif value="Muscle">Muscle</option>
                                                    <option @if($get_car->vehicle_type=="Special Edition") selected @endif value="Special Edition">Special Edition</option>
                                                    <option @if($get_car->vehicle_type=="Coupe") selected @endif value="Coupe">Coupe</option>
                                                    <option @if($get_car->vehicle_type=="Compact") selected @endif value="Compact">Compact</option>
                                                    <option @if($get_car->vehicle_type=="Electric") selected @endif value="Electric">Electric</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label">Abs</label>
                                                <select name="abs" id="" class="form-control">
                                                    <option  value="yes" @if($get_car->abs=="yes") selected @endif >Yes</option>
                                                    <option value="no" @if($get_car->abs=="no") selected @endif >No</option>
                                                </select>
<input type="hidden" value="{{$get_car->id}}" name="car_id">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" value="{{ \Crypt::encrypt($get_car->id) }}">
                                            <div class="mb-3">
                                                <label class="col-form-label">Description</label>
                                                <textarea rows="10" class="form-control" name="description"  id="editor" placeholder=" Enter Description"
                                                    data-bs-original-title="" title="">{!! $get_car->car_description !!}</textarea>
                                            </div>
                                        </div>

                                    </div>



                                    <a href="{{ url('admin/cars') }}" type="submit"
                                        class="btn btn-primary text-end mt-2" style="" data-bs-original-title=""
                                        title="">Back</a>
                                    <input type="submit" class="btn btn-primary text-end mt-2" style="float: right"
                                        value="Update" data-bs-original-title="" title="">

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
@endsection
