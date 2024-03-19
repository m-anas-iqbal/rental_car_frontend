@extends('admin.layouts.master')
@section('title', 'View Order')

@section('css')


@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>View Order</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">View Order</li>
    <li class="breadcrumb-item active"> View Order</li>
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
                    <button class="btn-close" readonly type="button" data-bs-dismiss="alert" aria-label="Close"
                        data-bs-original-title="" title=""></button>
                </div>
            @endif
            <div class="col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>View Order</h5>
                            </div>
                            <div class="card-body">
                                <form class="theme-form mega-form" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <h6>Account Information</h6> --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label"> User Name</label>
                                                <input class="form-control" name="addon_name"
                                                    value="{{ $get_order->users->name }}" readonly type="text"
                                                    placeholder="Addon Name" data-bs-original-title="" title="">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label"> Car Name</label>
                                                <input class="form-control" name="stock" readonly
                                                    value="{{ $get_order->get_cars->car_name }}" type="text"
                                                    data-bs-original-title="" title="">

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label"> Car Image</label>
                                                <img src="{{ url('uploads/cars_images' . '/' . $get_order->car_img) }}"
                                                    alt="">

                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Coupon Name</label>
                                                <input class="form-control" name="rent_price"
                                                    value="{{ $get_order->coupon_name }}" readonly type="text"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        {{-- {{dd($get_order)}} --}}

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Coupon Amount</label>
                                                <input class="form-control" name="rent_price"
                                                    value="{{ $get_order->coupon_amt }}" readonly type="text"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Payment Type</label>
                                                <input class="form-control" name="rent_price"
                                                    value="{{ $get_order->payment_type }}" readonly type="text"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        {{-- {{dd($get_order)}} --}}

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Car Addon </label>
                                                @php
                                                $addons = json_decode($get_order->addon_id);
                                                // dd($addons);
                                            @endphp
                                                @foreach ($addons as $add)
                                                    @php
                                                        $get_add = \App\Models\car_addon::find($add);
                                                        echo '<li>' . $get_add->addon_name . '</li>';
                                                    @endphp
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Car Rent Price </label>
                                                <input class="form-control" name="rent_price"
                                                    value="{{ $get_order->payment_type }}" readonly type="text"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">


                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Pick Up Date</label>
                                                <input class="form-control" name="rent_price"
                                                    value="{{ $get_order->pick_up_date }}" readonly type="text"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Drop Off Date</label>
                                                <input class="form-control" name="rent_price"
                                                    value="{{ $get_order->drop_off_date }}" readonly type="text"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">


                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Pick Up Location</label>
                                                <input class="form-control" name="rent_price"
                                                    value="{{ $get_order->pickup_location }}" readonly type="text"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Drop Off Location</label>
                                                <input class="form-control" name="rent_price"
                                                    value="{{ $get_order->dropoff_location }}" readonly type="text"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">


                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Status</label>
                                                <input class="form-control" name="rent_price"
                                                    value="{{ $get_order->status }}" readonly type="text"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label">Created At</label>
                                                <input class="form-control" name="rent_price"
                                                    value="{{ $get_order->created_at }}" readonly type="text"
                                                    data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>





                                    <a class="btn btn-primary text-end mt-2" href="{{ url('Orders') }}"
                                        style="float: right" data-bs-original-title="" title="">Back</a>

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
