@extends('admin.layouts.master')
@section('title', 'Employee')

@section('css')


@endsection

@section('style')
    <style>
        body.dark-only .page-wrapper .page-body-wrapper .page-body .card:not(.email-body) .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        body.dark-only .page-wrapper .page-body-wrapper .page-body .card:not(.email-body) .dataTables_wrapper .dataTables_paginate .paginate_button:active {
            border-color: var(--theme-deafult);
            /* color: black; */
            background: #3a3e4a;
        }

        span.msg,
        span.choose {
            color: #555;
            padding: 5px 0 10px;
            display: inherit
        }

        .container {
            width: 500px;
            margin: 50px auto 0;
            text-align: center
        }

        /*Styling Selectbox*/
        .dropdown {
            width: 300px;
            display: inline-block;
            background-color: #fff;
            border-radius: 2px;
            box-shadow: 0 0 2px rgb(204, 204, 204);
            transition: all .5s ease;
            position: relative;
            font-size: 14px;
            color: #474747;
            height: 100%;
            text-align: left
        }

        .dropdown .select {
            cursor: pointer;
            display: block;
            padding: 10px
        }

        .dropdown .select>i {
            font-size: 13px;
            color: #888;
            cursor: pointer;
            transition: all .3s ease-in-out;
            float: right;
            line-height: 20px
        }

        .dropdown:hover {
            box-shadow: 0 0 4px rgb(204, 204, 204)
        }

        .dropdown:active {
            background-color: #f8f8f8
        }

        .dropdown.active:hover,
        .dropdown.active {
            box-shadow: 0 0 4px rgb(204, 204, 204);
            border-radius: 2px 2px 0 0;
            background-color: #f8f8f8
        }

        .dropdown.active .select>i {
            transform: rotate(-90deg)
        }

        .dropdown .dropdown-menu {
            position: absolute;
            background-color: #fff;
            width: 100%;
            left: 0;
            margin-top: 1px;
            box-shadow: 0 1px 2px rgb(204, 204, 204);
            border-radius: 0 1px 2px 2px;
            overflow: hidden;
            display: none;
            max-height: 144px;
            overflow-y: auto;
            z-index: 9
        }

        .dropdown .dropdown-menu li {
            padding: 10px;
            transition: all .2s ease-in-out;
            cursor: pointer
        }

        .dropdown .dropdown-menu {
            padding: 0;
            list-style: none
        }

        .dropdown .dropdown-menu li:hover {
            background-color: #f2f2f2
        }

        .dropdown .dropdown-menu li:active {
            background-color: #e2e2e2
        }
    </style>

@endsection

@section('breadcrumb-title')
    <h3>Payments</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Payments</li>
    {{-- <li class="breadcrumb-item active">Sample Page</li> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="display: inline">Payments Details </h5>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="example-style-4_wrapper" class="dataTables_wrapper">
                                {{-- <div class="dataTables_length" id="example-style-4_length"><label>Show <select
                                            name="example-style-4_length" aria-controls="example-style-4" class="">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select> entries</label></div> --}}
                                {{-- <div id="example-style-4_filter" class="dataTables_filter"><label>Search:<input
                                            type="search" class="" placeholder="" aria-controls="example-style-4"
                                            data-bs-original-title="" title=""></label></div> --}}
                                <table class="hover dataTable" id="example-style-4" role="grid"
                                    aria-describedby="example-style-4_info">
                                    <thead>
                                        @if (session()->has('green'))
                                            <div class="alert alert-success dark alert-dismissible fade show"
                                                role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-thumbs-up">
                                                    <path
                                                        d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                                                    </path>
                                                </svg>
                                                <p>{{ session('green') }}</p>
                                                <button class="btn-close" type="button" data-bs-dismiss="alert"
                                                    aria-label="Close" data-bs-original-title="" title=""></button>
                                            </div>
                                        @elseif(session()->has('red'))
                                            <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-thumbs-down">
                                                    <path
                                                        d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 0-2 1.7l-1.38 9a2 2 0 0 0 2 2.3zm7-13h2.67A2.31 2.31 0 0 1 22 4v7a2.31 2.31 0 0 1-2.33 2H17">
                                                    </path>
                                                </svg>
                                                <p>{{ session('red') }}</p>
                                                <button class="btn-close" type="button" data-bs-dismiss="alert"
                                                    aria-label="Close" data-bs-original-title="" title=""></button>
                                            </div>
                                        @endif
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 170.925px;">S.No</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 170.925px;">User Name</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 170.925px;">Amount</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 170.925px;">Received Amount</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 170.925px;">Dues</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 170.925px;">Payment Type</th>

                                            <th class="sorting" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 99px;">
                                                Created At</th>

                                            <th class="sorting" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 99px;">
                                                Updated At</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order_payments as $key => $item)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $key + 1 }}</td>
                                                {{-- <td class="sorting_1">{{ $item->users->name }}</td> --}}
                                                {{-- <td class="sorting_1">{{ $item->users->email }}</td> --}}
                                                {{-- <td class="sorting_1"><a class="btn btn-primary"
                                                        href="{{ url('/admin/cars/' . \Crypt::encrypt($item->car_id)) }}">Get
                                                        Detail</a></td> --}}


                                                <td class="sorting_1">{{ $item->get_users->name }}
                                                </td>
                                                <td class="sorting_1">{{ $item->amount }}
                                                <td class="sorting_1">{{ $item->received_amount }}
                                                <td class="sorting_1">{{ $item->amount-$item->received_amount }}
                                                </td>
                                                <td class="sorting_1">{{ $item->payment_type }}
                                                </td>

                                                <td>{{ $item->created_at->isoFormat('D-M-Y') }}</td>
                                                <td>{{ $item->updated_at->isoFormat('D-M-Y') }}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>

                                {{-- <div class="dataTables_info" id="example-style-4_info" role="status"
                                    aria-live="polite">Showing 1 to 10 of 57 entries</div> --}}
                                {{-- <div class="dataTables_paginate paging_simple_numbers" id="example-style-4_paginate"><a
                                        class="paginate_button previous disabled" aria-controls="example-style-4"
                                        data-dt-idx="0" tabindex="0" id="example-style-4_previous"
                                        data-bs-original-title="" title="">Previous</a><span><a
                                            class="paginate_button current" aria-controls="example-style-4"
                                            data-dt-idx="1" tabindex="0" data-bs-original-title=""
                                            title="">1</a><a class="paginate_button "
                                            aria-controls="example-style-4" data-dt-idx="2" tabindex="0"
                                            data-bs-original-title="" title="">2</a><a class="paginate_button "
                                            aria-controls="example-style-4" data-dt-idx="3" tabindex="0"
                                            data-bs-original-title="" title="">3</a><a class="paginate_button "
                                            aria-controls="example-style-4" data-dt-idx="4" tabindex="0"
                                            data-bs-original-title="" title="">4</a><a class="paginate_button "
                                            aria-controls="example-style-4" data-dt-idx="5" tabindex="0"
                                            data-bs-original-title="" title="">5</a><a class="paginate_button "
                                            aria-controls="example-style-4" data-dt-idx="6" tabindex="0"
                                            data-bs-original-title="" title="">6</a></span><a
                                        class="paginate_button next" aria-controls="example-style-4" data-dt-idx="7"
                                        tabindex="0" id="example-style-4_next" data-bs-original-title=""
                                        title="">Next</a></div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        /*Dropdown Menu*/
        $('.dropdown').click(function() {
            $(this).attr('tabindex', 1).focus();
            $(this).toggleClass('active');
            $(this).find('.dropdown-menu').slideToggle(300);
        });
        $('.dropdown').focusout(function() {
            $(this).removeClass('active');
            $(this).find('.dropdown-menu').slideUp(300);
        });
        $('.dropdown .dropdown-menu li').click(function() {
            $(this).parents('.dropdown').find('span').text($(this).text());
            $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
        });
        /*End Dropdown Menu*/


        $('.dropdown-menu li').click(function() {
            var input = '<strong>' + $(this).parents('.dropdown').find('input').val() + '</strong>',
                msg = '<span class="msg">Hidden input value: ';
            $('.msg').html(msg + input + '</span>');
        });
        $('#example-style-4').DataTable({
            order: [
                [4, 'desc']
            ],
        });
    </script>
@endsection
