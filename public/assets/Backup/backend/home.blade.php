<!-- latest jquery-->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<!-- Bootstrap js-->
<script src="{{ asset('assets/vendor/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- feather icon js-->
<script src="{{ asset('assets/vendor/fonts/feather-icon/js/feather.min.js') }}"></script>
<script src="{{ asset('assets/vendor/fonts/feather-icon/js/feather-icon.js') }}"></script>
<!-- scrollbar js-->
<script src="{{ asset('assets/vendor/libs/scrollbar/js/simplebar.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/scrollbar/js/custom.js') }}"></script>
<!-- Sidebar jquery-->
<script src="{{ asset('assets/vendor/libs/pages/config.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/pages/sidebar-menu.js') }}"></script>

<script src="{{ asset('assets/vendor/libs/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/select2/js/select2-custom.js') }}"></script>

<script src="{{ asset('assets/vendor/libs/pages/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datepicker/flatpickr/js/flatpickr.js') }}"></script>
<script src="{{ asset('assets/js/pages/datetimepicker.init.js') }}"></script>

<script src="{{ asset('assets/vendor/libs/datatable/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/jszip.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.autoFill.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/buttons.html5.min.js') }}"></script>
{{-- <script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/buttons.print.min.js') }}"></script> --}}
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/responsive.bootstrap4.min.js') }}"></script>
{{-- <script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.colReorder.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.rowReorder.min.js') }}"></script> --}}
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/datatable/datatable-extension/js/custom.js') }}"></script>

{{-- <script src="{{ asset('assets/vendor/libs/chart/chartist/js/chartist.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/chart/chartist/js/chartist-plugin-tooltip.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/chart/apex-chart/apex-chart.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/chart/apex-chart/stock-prices.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/chart/apex-chart/chart-custom.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/prism/prism.min.js') }}"></script> 
<script src="{{ asset('assets/vendor/libs/clipboard/clipboard.min.js') }}"></script> --}}

<script src="{{ asset('assets/vendor/libs/custom-card/custom-card.js') }}"></script>

{{-- <script src="{{ asset('assets/vendor/libs/notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/dashboard/chart.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/notify/index.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/typeahead/handlebars.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/typeahead/typeahead.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/typeahead/typeahead.custom.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/typeahead-search/handlebars.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/typeahead-search/typeahead-custom.js') }}"></script> --}}
<!-- custom admin script -->
<script src="{{asset('assets/js/admin_script.js')}}"></script>
<!-- Template js-->
<script src="{{ asset('assets/js/script.js') }}"></script>

<script>
    // Permanently visible Datepicker
    var datePicker = document.querySelector("#date-picker");

    flatpickr(datePicker, {
    inline: true,
    defaultDate: new Date() // or any other date
    });

</script>

<script type="text/javascript">
    var base_url = "{{url('/')}}";
</script>

<script>
    $('div.alert').not('.alert-important').delay(2000).fadeOut(600);
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<script src="{{url('ckeditor/ckeditor.js')}}"></script>

<!-- fileinput js -->
<script src="{{asset('assets/js/fileinput.js')}}"></script>

<script>
  $('input[type="file"]').fileinput({
    multipleText: '{0} files',
    showMultipleNames: true,
    buttonClass: 'btn btn-danger',
  });
</script>



@yield('scripts')
