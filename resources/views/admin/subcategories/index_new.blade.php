@extends('frount.index')

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">User List</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="form-group col-md-8 ">
                <a href="{{route('users.add')}}" class="btn  bg-gradient-success btn-sm "> <i class="fas fa-plus"></i> Add User</a>
              </div>
            </div>
            <table id='empTable' width='100%' class="table table-bordered table-striped">
              <thead>
                <tr>
                  <td>Action</td>
                  <td>Namesss</td>
                  <td>Email</td>
                  <td>User Type</td>
                </tr>
              </thead>
            </table>

          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-6">

      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- jquery-validation -->

<!-- Script -->
<style>
  #empTable_processing {
    background: #2bbb57;
    z-index: 99;
  }
</style>

<script type="text/javascript">
  $(document).ready(function() {
    var row_count = $("#row_count").val();
    // DataTable
    var table = $('#empTable').DataTable({
      "dom": 'Blfrtip',
      buttons: [{
        extend: 'excel',
        text: '<button class="btn btn-sm"><i class="fa fa-file-excel" style="color: green;"></i>  Excel</button>',
        titleAttr: 'Excel',
        columns: [1, 2, 3, 4, 5],
        action: newexportaction,
        className: 'exportExcel',
        filename: 'User Master',

      }, ],
      processing: true,
      //pageLength: 25,
      serverSide: true,
      ajax: "{{route('users.getEmployees')}}",
      columns: [{
          data: 'id'
        },

        {
          data: 'name'
        },
        {
          data: 'email'
        },
        {
          data: 'is_admin'
        },

      ],

      scrollX: 300,
      responsive: true,

    });

    function newexportaction(e, dt, button, config) {
      var self = this;
      var oldStart = dt.settings()[0]._iDisplayStart;
      dt.one('preXhr', function(e, s, data) {
        // Just this once, load all data from the server...
        data.start = 0;
        data.length = 2147483647;
        dt.one('preDraw', function(e, settings) {
          // Call the original action function
          if (button[0].className.indexOf('buttons-copy') >= 0) {
            $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
          } else if (button[0].className.indexOf('buttons-excel') >= 0) {
            $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
              $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
              $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
          } else if (button[0].className.indexOf('buttons-csv') >= 0) {
            $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
              $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
              $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
          } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
            $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
              $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
              $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
          } else if (button[0].className.indexOf('buttons-print') >= 0) {
            $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
          }
          dt.one('preXhr', function(e, s, data) {
            // DataTables thinks the first item displayed is index 0, but we're not drawing that.
            // Set the property to what it was before exporting.
            settings._iDisplayStart = oldStart;
            data.start = oldStart;
          });
          // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
          setTimeout(dt.ajax.reload, 0);
          // Prevent rendering of the full data to the DOM
          return false;
        });
      });
      // Requery the server with the new one-time export settings
      dt.ajax.reload();
    }
  });
</script>

@endsection