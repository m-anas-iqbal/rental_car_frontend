@extends('admin.layouts.master')
@section('title', 'Edit Car Brand')

@section('css')


@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Edit Car Brand</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Car Brands</li>
    <li class="breadcrumb-item active"> Edit Car Brand</li>
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
                                <h5>Edit Car Brand</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{url('admin/car_brands/edit')}}" class="theme-form mega-form" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <h6>Account Information</h6> --}}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label"> Brand Name</label>
                                                <input class="form-control" name="Brand_name" value="{{$edit_brand->brand_name}}" type="text"
                                                    placeholder="Brand Name" data-bs-original-title="" title="">

                                            </div>
                                            <input type="hidden" name="b_id" value="{{\Crypt::encrypt($edit_brand->id)}}">
                                        </div>

                                    </div>
                                    <a href="{{url('admin/car_Brands')}}" type="submit" class="btn btn-primary text-end mt-2" style=""
                                         data-bs-original-title="" title="">Back</a>
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
