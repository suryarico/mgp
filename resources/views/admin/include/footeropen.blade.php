

 <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- ChartJS -->
<script src="{{ asset('public/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset('public/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('public/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset('public/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('public/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset('public/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset('public/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/dist/js/adminlte.js')}}"></script>
<script src="{{ asset('public/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
@if ($message = Session::get('success'))
<script>

	toastr.options.closeButton = true
	toastr.options.tapToDismiss = true
	toastr.options.timeOut = 0
	toastr.options.extendedTimeOut = 0
	toastr.success('{{ $message }}')
</script>
@endif
@if ($message = Session::get('error'))
<script>
toastr.options.closeButton = true
toastr.options.tapToDismiss = true
toastr.options.timeOut = 0
toastr.options.extendedTimeOut = 0
	toastr.error('{{ $message }}')
</script>
@endif

 <script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })


  })
		$('#timepicker').datetimepicker({
     timePicker: false,
     datePicker: true,
		  format: 'YYYY-MM-DD',
			defaultDate: '<?php echo (isset($selected['date_from'])) ? $selected['date_from']: '';?>'
    });
	$('#timepicker2').datetimepicker({
     timePicker: false,
     datePicker: true,
		  format: 'YYYY-MM-DD',
			defaultDate: '<?php echo (isset($selected['date_to'])) ? $selected['date_to']: '';?>'
    });
		
</script>
</body>
</html>
