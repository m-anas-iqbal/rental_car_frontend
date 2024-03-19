{{-- <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap js-->
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> --}}
<script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
<script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
<!-- scrollbar js-->
<script src="{{ asset('assets/js/scrollbar/simplebar.js') }}"></script>
<script src="{{ asset('assets/js/scrollbar/custom.js') }}"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('assets/js/config.js') }}"></script>
<!-- Plugins JS start-->
<script id="menu" src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
@yield('script')

@if (Route::current()->getName() != 'popover')
    <script src="{{ asset('assets/js/tooltip-init.js') }}"></script>
@endif


<!-- Plugins JS Ends-->
<!-- Theme js-->
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/select2/select2-custom.js') }}"></script>
{{-- <script src="{{ asset('assets/js/theme-customizer/customizer.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script> --}}
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>

<script src="{{ asset('assets/js/jsgrid/jsgrid.min.js') }}"></script>
<script src="{{ asset('assets/js/jsgrid/griddata.js') }}"></script>
<script src="{{ asset('assets/js/jsgrid/jsgrid.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
<script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
{{-- https://code.jquery.com/jquery-3.5.1.js
https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js --}}
{{-- <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script> --}}
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>


<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

</script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> --}}
{{-- @if (Route::current()->getName() == 'index')
	<script src="{{asset('assets/js/layout-change.js')}}"></script>
@endif --}}
