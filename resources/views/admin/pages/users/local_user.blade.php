@extends('admin.layouts.master')
@section('title', 'Employee')

@section('style')
    <style>
        body.dark-only .page-wrapper .page-body-wrapper .page-body .card:not(.email-body) .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        body.dark-only .page-wrapper .page-body-wrapper .page-body .card:not(.email-body) .dataTables_wrapper .dataTables_paginate .paginate_button:active {
            border-color: var(--theme-deafult);
            /* color: black; */
            background: #3a3e4a;
        }
    </style>

@endsection

@section('breadcrumb-title')
    <h3>Local Users</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Local Users</li>
    {{-- <li class="breadcrumb-item active">Sample Page</li> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="display: inline">Local Users Details </h5>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="example-style-4_wrapper" class="dataTables_wrapper">

                                <table class="dataTable" id="example-style-5" role="grid"
                                    aria-describedby="example-style-4_info">
                                    <thead>

                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 170.925px;"> User Name</th>

                                            <th class="sorting_asc" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 170.925px;">Contact</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 170.925px;">Email</th>

                                            <th class="sorting" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending" style="width: 99px;">
                                                Country</th>
                                            <th class="sorting" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending" style="width: 99px;">
                                                City</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 170.925px;">Front Driving Licence</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending"
                                                style="width: 170.925px;">Back Driving Licence</th>
                                            <th class="sorting" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending" style="width: 99px;">
                                                Emirated Id</th>
                                            <th class="sorting" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending" style="width: 99px;">
                                                Created At</th>
                                            <th class="sorting" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending" style="width: 99px;">
                                                Updated At</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($get_users as $item)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $item->name }}</td>
                                                <td class="sorting_1">{{ $item->contact_no }}</td>
                                                <td class="sorting_1">{{ $item->email }}</td>
                                                <td class="sorting_1">{{ $item->country }}</td>
                                                <td class="sorting_1">{{ $item->city }}</td>
                                                {{-- <td class="sorting_1">{{ $item->licence_no }}</td> --}}
                                                <td class="sorting_1"><img data-enlargable
                                                        src="{{ url('/' . $item->international_d_licence_front) }}"
                                                        style="width: 100px;height: 100px" alt=""></td>
                                                <td class="sorting_1"><img data-enlargable
                                                        src="{{ url('/' . $item->international_d_licence_back) }}"
                                                        style="width: 100px;height: 100px" alt=""></td>
                                                <td class="sorting_1">{{ $item->emirates_id }}</td>
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
        $('img[data-enlargable]').addClass('img-enlargable').click(function() {
            var src = $(this).attr('src');
            $('<div>').css({
                background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
                backgroundSize: 'contain',
                width: '100%',
                height: '100%',
                position: 'fixed',
                zIndex: '10000',
                top: '0',
                left: '0',
                cursor: 'zoom-out'
            }).click(function() {
                $(this).remove();
            }).appendTo('body');
        });
    </script>
@endsection
