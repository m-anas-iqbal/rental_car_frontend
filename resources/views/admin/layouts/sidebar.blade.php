<style>
    span.lan-3 {
        color: rgb(0, 0, 0) !important;
    }

    a.lan-4 {
        color: black !important;
    }

    ::before {
        color: black;
    }

    .simplebar-content-wrapper {
        background: white;
    }

    input.form-control,
    textarea.form-control {
        background: #ec322314 !important;
    }

    input.btn.btn-primary {
        background: red !important;
        border: none !important;
    }

    .page-wrapper.compact-wrapper .page-body-wrapper div.sidebar-wrapper .sidebar-main .sidebar-links .simplebar-wrapper .simplebar-mask .simplebar-content-wrapper .simplebar-content>li .sidebar-link.active {
        -webkit-transition: all 0.5s ease;
        transition: all 0.5s ease;
        position: relative;
        margin-bottom: 10px;
        background-color: transparent !important;
    }

    a.sidebar-link.sidebar-title.clickable:hover {
        background: rgba(128, 128, 128, 0.317)  !important;


    }
</style>
<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="" class="row justify-content-center">
                <img class="  for-light" style=" height: 72px;width: auto !important;"
                    src="http://carrental.arm-sc.com/wp-content/uploads/sites/28/2022/12/logo.png" 
                      alt="">
                <img class=" for-dark" style=" height: 72px;width: auto !important;" src="http://carrental.arm-sc.com/wp-content/uploads/sites/28/2022/12/logo.png" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a style="color: #ec3223;text-decoration: none" href="{{ url('/') }}"><img
                    class="img-fluid" src="" alt="">NP</a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href=""><img class="img-fluid" src="{{ asset('assets/images/logo2.png') }}"
                                alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6 class="lan-1" style="color: black; text-align: center">DashBoard</h6>
                            <p class="lan-2"></p>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == '/admin/dashboard' ? 'active' : '' }}"
                            href="{{ route('admin.dashboard') }}"><i style="font-size: 18px ; color: #2c323f;"
                                class="fa-solid fa-house"></i><span class="lan-3">&nbsp&nbspDashboard</span>
                            {{-- <div class="according-menu"><i
                                    class="fa fa-angle-{{ request()->route()->uri == '/dashboard'? 'down': 'right' }}"></i>
                            </div> --}}
                        </a>

                    <li class="sidebar-list">

                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title clickable {{ request()->route()->uri == 'admin/car_addons' ? 'active' : '' }}"
                            href="#" data-bs-original-title="" title=""><i
                                style="font-size: 18px ; color: #2c323f;" class="fa-solid  fa-users "></i><span
                                class="lan-3">&nbsp&nbspCar Addons</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:{{ request()->route()->uri == 'admin/car_addons' ? 'block' : 'none' }}">

                            <li><a class="lan-4 " href="{{ url('admin/car_addons') }}" data-bs-original-title=""
                                    title="">Car Addons</a>
                            </li>
                            <li><a class="lan-4" href="{{ url('admin/car_addons/add') }}" data-bs-original-title=""
                                    title="">Add Car Addons</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title clickable {{ request()->route()->uri == 'admin/car_brands' ? 'active' : ' ' }}"
                            href="#" data-bs-original-title="" title=""><i
                                style="font-size: 18px ; color: #2c323f;" class="fa-solid  fa-users "></i><span
                                class="lan-3">&nbsp&nbspCar Brands</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:{{ request()->route()->uri == 'admin/car_brands' ? 'block' : 'none' }}">

                            <li><a class="lan-4 " href="{{ url('admin/car_brands') }}" data-bs-original-title=""
                                    title="">Car Brands</a>
                            </li>
                            <li><a class="lan-4" href="{{ url('admin/car_brands/add') }}" data-bs-original-title=""
                                    title="">Add Car Brands</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title clickable {{ request()->route()->uri == 'admin/cars/{id?}' ? 'active' : '' }}"
                            href="#" data-bs-original-title="" title=""><i
                                style="font-size: 18px ; color: #2c323f;" class="fa-solid  fa-users "></i><span
                                class="lan-3">&nbsp&nbspCars</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>

                        <ul class="sidebar-submenu"
                            style="display:{{ request()->route()->uri == 'admin/cars/{id?}' ? 'block' : 'none' }}">

                            <li><a class="lan-4 " href="{{ url('admin/cars') }}" data-bs-original-title=""
                                    title="">Cars</a>
                            </li>
                            <li><a class="lan-4" href="{{ url('admin/cars/add') }}" data-bs-original-title=""
                                    title="">Add Cars</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title clickable"
                            {{-- {{ request()->route()->uri == '/admin/employee'? 'active': '' }} --}} href="#" data-bs-original-title="" title=""><i
                                style="font-size: 18px ; color: #2c323f;" class="fa-solid  fa-users "></i><span
                                class="lan-3">&nbsp&nbspUsers</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:{{ request()->route()->uri == 'admin/local_users' ? 'block' : 'none' }}">

                            <li><a class="lan-4 " href="{{ url('admin/local_users') }}" data-bs-original-title=""
                                    title="">Local Users</a>
                            </li>
                            <li><a class="lan-4" href="{{ url('admin/international_users') }}"
                                    data-bs-original-title="" title="">International Users</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title clickable"
                            {{-- {{ request()->route()->uri == '/admin/employee'? 'active': '' }} --}} href="#" data-bs-original-title="" title=""><i
                                style="font-size: 18px ; color: #2c323f;" class="fa-solid  fa-users "></i><span
                                class="lan-3">&nbsp&nbspCoupons</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <ul class="sidebar-submenu"
                            style=" display:{{ request()->route()->uri == 'admin/coupons' ? 'block' : 'none' }}">

                            <li><a class="lan-4 " href="{{ url('admin/coupons') }}" data-bs-original-title=""
                                    title=""> Coupons</a>
                            </li>
                            <li><a class="lan-4" href="{{ url('admin/coupons/add') }}" data-bs-original-title=""
                                    title="">Create Coupons</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title clickable {{ request()->route()->uri == 'admin/offers' ? 'active' : '' }}"
                            href="#" data-bs-original-title="" title=""><i
                                style="font-size: 18px ; color: #2c323f;" class="fa-solid  fa-users "></i><span
                                class="lan-3">&nbsp&nbspOffers</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:{{ request()->route()->uri == 'admin/offers' ? 'block' : 'none' }}">

                            <li><a class="lan-4 " href="{{ url('admin/offers') }}" data-bs-original-title=""
                                    title="">Offers</a>
                            </li>
                            <li><a class="lan-4" href="{{ url('admin/offers/add') }}" data-bs-original-title=""
                                    title="">Create Offers</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title clickable"
                            {{-- {{ request()->route()->uri == '/admin/employee'? 'active': '' }} --}} href="/Orders" data-bs-original-title="" title=""><i
                                style="font-size: 18px ; color: #2c323f;" class="fa-solid  fa-users "></i><span
                                class="lan-3">&nbsp&nbspOrders</span>
                            {{-- <div class="according-menu"><i class="fa fa-angle-down"></i></div> --}}
                        </a>

                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title clickable"
                            {{-- {{ request()->route()->uri == '/admin/employee'? 'active': '' }} --}} href="/payments" data-bs-original-title="" title=""><i
                                style="font-size: 18px ; color: #2c323f;" class="fa-solid  fa-users "></i><span
                                class="lan-3">&nbsp&nbspPayments</span>
                            {{-- <div class="according-menu"><i class="fa fa-angle-down"></i></div> --}}
                        </a>

                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title clickable"
                            {{-- {{ request()->route()->uri == '/admin/employee'? 'active': '' }} --}} href="{{url('/admin/borrowed_request')}}" data-bs-original-title="" title=""><i
                                style="font-size: 18px ; color: #2c323f;" class="fa-solid  fa-users "></i><span
                                class="lan-3">&nbsp&nbspBorrowed Request</span>
                            {{-- <div class="according-menu"><i class="fa fa-angle-down"></i></div> --}}
                        </a>

                    </li>
                       <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title clickable"
                            {{-- {{ request()->route()->uri == '/admin/employee'? 'active': '' }} --}} href="{{url('admin/cancelation_request')}}" data-bs-original-title="" title=""><i
                                style="font-size: 18px ; color: #2c323f;" class="fa-solid  fa-users "></i><span
                                class="lan-3">&nbsp&nbsp Cancelation Request</span>
                            {{-- <div class="according-menu"><i class="fa fa-angle-down"></i></div> --}}
                        </a>

                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a class="sidebar-link sidebar-title clickable"
                            {{-- {{ request()->route()->uri == '/admin/employee'? 'active': '' }} --}} href="{{url('/admin/Vat_setting')}}" data-bs-original-title="" title=""><i
                                style="font-size: 18px ; color: #2c323f;" class="fa-solid  fa-users "></i><span
                                class="lan-3">&nbsp&nbsp Vat Setting</span>
                            {{-- <div class="according-menu"><i class="fa fa-angle-down"></i></div> --}}
                        </a>

                    </li>
                    {{-- <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == '/admin/designation'? 'active': '' }}"
                            href="#" data-bs-original-title="" title=""><i
                                style="font-size: 18px ; color: #2c323f;" class="fa-solid fa-building"></i><span
                                class="lan-3">&nbsp&nbsp&nbspGate Pass</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:{{ request()->route()->uri  == 'admin/designation' ? 'block' : 'none' }}">
                            <li><a class="lan-4 {{ request()->route()->uri  == 'admin/designation' ? 'active' : '' }}"
                                    href="{{ route('admin.gate_pass') }}" data-bs-original-title=""
                                    title="">Gate Pass</a>
                            </li>
                            <li><a class="lan-4 {{ request()->route()->uri  == 'admin/add_designation' ? 'active' : '' }}"
                                    href="{{ route('admin.add_gate_pass') }}" data-bs-original-title=""
                                    title="">Add Gate Pass</a>
                            </li>
                        </ul>
                    </li> --}}
                    {{-- <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == '/admin/designation'? 'active': '' }}"
                            href="#" data-bs-original-title="" title=""><i
                                style="font-size: 18px ; color: #2c323f;" class="fa-solid fa-house-user"></i><span
                                class="lan-3">&nbsp&nbspOwner Details</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:{{ request()->route()->uri  == 'admin/designation' ? 'block' : 'none' }}">
                            <li><a class="lan-4 {{ request()->route()->uri  == 'admin/designation' ? 'active' : '' }}"
                                    href="{{ route('admin.owner_details') }}" data-bs-original-title=""
                                    title="">Owner Details</a>
                            </li>
                            <li><a class="lan-4 {{ request()->route()->uri  == 'admin/add_designation' ? 'active' : '' }}"
                                    href="{{ route('admin.add_owner_details') }}" data-bs-original-title=""
                                    title="">Add Owner</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-list">
                        <label class="badge badge-success"></label><a
                            class="sidebar-link sidebar-title {{ request()->route()->uri == '/admin/designation'? 'active': '' }}"
                            href="#" data-bs-original-title="" title=""><i
                                style="font-size: 18px ; color: #2c323f;" class="fa-solid fa-bed"></i><span
                                class="lan-3">&nbsp&nbspRental Details</span>
                            <div class="according-menu"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display:{{ request()->route()->uri  == 'admin/designation' ? 'block' : 'none' }}">
                            <li><a class="lan-4 {{ request()->route()->uri  == 'admin/designation' ? 'active' : '' }}"
                                    href="{{ route('admin.rental_details') }}" data-bs-original-title=""
                                    title="">Rental Details</a>
                            </li>
                            <li><a class="lan-4 {{ request()->route()->uri  == 'admin/add_designation' ? 'active' : '' }}"
                                    href="{{ route('admin.add_rental_details') }}" data-bs-original-title=""
                                    title="">Add Rental</a>
                            </li>
                        </ul>
                    </li> --}}
                    {{-- <ul class="sidebar-submenu"
                            style="display: {{ request()->route()->uri == '/dashboard'? 'block;': 'none;' }}">
                            <li><a class="lan-4 {{ request()->route()->uri  == 'index' ? 'active' : '' }}"
                                    href="">{{ trans('lang.Default') }}</a></li>
                            <li><a class="lan-5 {{ request()->route()->uri  == 'dashboard-02' ? 'active' : '' }}"
                                    href="">{{ trans('lang.Ecommerce') }}</a></li>
                        </ul> --}}
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
