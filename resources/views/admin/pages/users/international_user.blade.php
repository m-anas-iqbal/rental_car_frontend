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
    </style>

@endsection

@section('breadcrumb-title')
    <h3>International Users</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">International Users</li>
    {{-- <li class="breadcrumb-item active">Sample Page</li> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 style="display: inline">International Users Details </h5>

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
                                <table class="dataTable" id="example-style-4" role="grid"
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
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 99px;">Country</th>
                                                <th class="sorting" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 99px;">City</th>


                                            <th class="sorting" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 99px;">Visa Copy</th>
                                            <th class="sorting" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 99px;">Passport Copy</th>
                                            <th class="sorting" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 99px;">International Front  Driving Licence</th>
                                            <th class="sorting" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 99px;">International Back  Driving Licence</th>
                                            {{-- <th class="sorting" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 99px;">Emirates Id</th> --}}
                                            <th class="sorting" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 99px;">Created At</th>

                                            <th class="sorting" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 99px;">Updated At</th>
                                            {{-- <th class="sorting" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 99px;">Status </th> --}}
                                            {{-- <th class="sorting" tabindex="0" aria-controls="example-style-4"
                                                rowspan="1" colspan="1"
                                                aria-label="Salary: activate to sort column ascending"
                                                style="width: 99px;">Actions</th> --}}
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
                                                <td  class="sorting_1"><img data-enlargable src="{{url('/'.$item->visa_copy)}}" style="width: 100px;height: 100px" alt=""></td>
                                                <td  class="sorting_1"><img data-enlargable src="{{url('/'.$item->passport_copy)}}" style="width: 100px;height: 100px" alt=""></td>
                                                <td  class="sorting_1"><img data-enlargable src="{{url('/'.$item->international_d_licence_front)}}" style="width: 100px;height: 100px" alt=""></td>
                                                <td  class="sorting_1"><img data-enlargable src="{{url('/'.$item->international_d_licence_back)}}" style="width: 100px;height: 100px" alt=""></td>
                                                {{-- <td class="sorting_1">{{ $item->emirates_id }}</td> --}}
                                                <td>{{ $item->created_at->isoFormat('D-M-Y') }}</td>
                                                <td>{{ $item->updated_at->isoFormat('D-M-Y') }}</td>
                                                {{-- <td>
                                                    @if ($item->status == 1)
                                                        <a href="{{ url('admin/cars/' . \Crypt::encrypt($item->id) . '/0') }}"
                                                            class="btn btn-success" type="button">Active</a>
                                                    @else
                                                        <a href="{{ url('admin/cars/' . \Crypt::encrypt($item->id) . '/1') }}"
                                                            class="btn btn-danger">Deactive</a>
                                                    @endif
                                                </td> --}}
                                                {{-- <td><a class="btn btn-success mb-3 theme"
                                                        href="{{ url('admin/cars/edit/' . \Crypt::encrypt($item->id)) }}"
                                                        type="button" data-original-title="btn btn-danger btn-xs"
                                                        title="" data-bs-original-title=""><i class="fa fa-pencil"></i></a>

                                                        <a class="btn btn-success theme"
                                                        href="{{ url('admin/cars/view/' . \Crypt::encrypt($item->id)) }}"
                                                        type="button" data-original-title="btn btn-danger btn-xs"
                                                        title="" data-bs-original-title=""><i class="fa fa-eye"></i></a>

                                                    </td> --}}
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
     $(document).ready(function() {
            $('#example-style-4').DataTable({
                // order: [
                //     [12, 'desc']
                // ],

                // dom: 'Bfrtip',
                // buttons: [
                //     'copy', 'csv', 'excel', 'pdf', 'print'
                // ]

            });
        });
        $('img[data-enlargable]').addClass('img-enlargable').click(function(){
    var src = $(this).attr('src');
    $('<div>').css({
        background: 'RGBA(0,0,0,.5) url('+src+') no-repeat center',
        backgroundSize: 'contain',
        width:'100%', height:'100%',
        position:'fixed',
        zIndex:'10000',
        top:'0', left:'0',
        cursor: 'zoom-out'
    }).click(function(){
        $(this).remove();
    }).appendTo('body');
});
</script>
@endsection
