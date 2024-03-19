@extends('admin.layouts.master')
@section('title', 'View Car Addon')

@section('css')


@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>View Car Addon</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Car Addons</li>
    <li class="breadcrumb-item active"> View Car Addon</li>
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
                                <h5>View Car Addon</h5>
                            </div>
                            <div class="card-body">
                                <form  class="theme-form mega-form"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- <h6>Account Information</h6> --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label"> Addon Name</label>
                                                <input class="form-control" name="addon_name"
                                                    value="{{ $view_addon->addon_name }}" readonly  type="text"
                                                    placeholder="Addon Name" data-bs-original-title="" title="">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label"> Stock</label>
                                                <input class="form-control" name="stock" readonly value="{{ $view_addon->addon_name }}" type="number"
                                                     data-bs-original-title="" title="">

                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="col-form-label"> Buying Price</label>
                                                <input class="form-control" name="buying_price"
                                                    value="{{ $view_addon->buying_price }}" readonly type="number"
                                                    placeholder="Buying Price" data-bs-original-title="" title="">
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
                                                <label class="col-form-label">Rent Price</label>
                                                <input class="form-control" name="rent_price"
                                                    value="{{ $view_addon->rent_price }}" readonly type="number"
                                                    placeholder="Rent Price" data-bs-original-title="" title="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="col-form-label">Description</label>
                                                <textarea rows="10" class="form-control" name="description" readonly  id="editor" placeholder="Description" data-bs-original-title=""
                                                    title="">{{ $view_addon->description }}</textarea>
                                            </div>
                                        </div>

                                    </div>



                                    <a class="btn btn-primary text-end mt-2" href="{{url('admin/car_addons')}}" style="float: right" data-bs-original-title=""
                                        title="">Back</a>

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
