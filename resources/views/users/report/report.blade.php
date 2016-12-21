  @extends('users.layout')
@section('content')
<script src="//code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css"> --}}
<!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Report Management</h3>
        </div>

        <div class="title_right">
        <div class="form-group col-lg-offset-6">
          <label for="month" class="col-sm-4 control-label"><h5>Select Date:</h5></label>
          <div class="col-sm-8">
            <select name="month" id="inputMonth" class="form-control" required="required">
              <option value="0"></option>
              <option value="1">January</option>
              <option value="2">February</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">June</option>
              <option value="7">July</option>
              <option value="8">August</option>
              <option value="9">September</option>
              <option value="10">October</option>
              <option value="11">November</option>
              <option value="12">December</option>
            </select>
          </div>
        </div>
      </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Reports Table <small>Users</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <p class="text-muted font-13 m-b-30">
                Tabel reports digunakan untuk melihat laporan detail Adsense Mobile.
              </p>
          {{-- table --}}
          <table id="reportTable" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>No.</th>
                <th>Date</th>
                <th>Application</th>
                <th>Ad Unit</th>
                <th>Earning Share</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No.</th>
                <th>Date</th>
                <th>Application</th>
                <th>Ad Unit</th>
                <th>Earning Share</th>
              </tr>
            </tfoot>
            <tbody>
            @foreach($reportUser as $data)
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $data->date }}</td>
                <td>{{ $data->app }}</td>
                <td>{{ $data->ad_unit }}</td>
                <td>Rp. {{ ( $data->estimated_earnings_idr * $data->share / 100) }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    // dateChangeEvent = function(){
    //   $('#inputMonth').on('change', function(){
    //     $('#reportTable').dataTable().fnDestroy();
    //       GetAllClassbyDate($('#inputMonth : selected').val());
    //   });
    // },
    // GetAllClassbyDate = function(id){
    //   var oTable = $('#reportTable').dataTable({
    //     "bJQueryUI"       : true,
    //     "sPaginationType" : "full_numbers",
    //     "bServerSide"     : true,
    //     "bRetrieve"       : true,
    //     "bDestroy"        : true,
    //     "sAjaxSource"     : "/forms/Setup/Setup.aspx/GetAllClassbyDate?DateId=" + id,
    //     "fnServerData"    : function (sSource, aoData, fnCallback){
    //       $.ajax({
    //         "type"        : "GET",
    //         "dataType"    : 'json',
    //         "contentType" : "application/json;charset=utf-8",
    //         "url"         : sSource,
    //         "data"        : aoData,
    //         "success"     : function(data){
    //           fnCallback(data.d);
    //         } 
    //       });
    //     },
    //     "aoColumns" : [
    //                   {
    //                     "mDataReport"   : "Date",
    //                     "nSearchable"   : false,
    //                     "bSorttable"    : false,
    //                     "sWidth"        : "20"

    //                   },
    //                   {
    //                     "mDataReport"   : "Application",
    //                     "bSearchable"   : false,
    //                     "bSorttable"    : false
    //                   },
    //                   {
    //                     "mDataReport"   : "adunit",
    //                     "bSearchable"   : false,
    //                     "bSorttable"    : false
    //                   },
    //                   {
    //                     "mDataReport"   : "estimated_earnings_idr",
    //                     "bSearchable"   : false,
    //                     "bSorttable"    : false
    //                   },
    //                   {
    //                     "mData"         : null, 
    //                     "bSearchable"   : false,
    //                     "bSorttable"    : false,
    //                     "fnRender"      : function(oObj){
    //                       return '<a class="edit" href="">Edit</a>';
    //                     } 
    //                   }

    //                   ]
    //   });
    // } 
    $(document).ready(function() {
      $('#reportTable').DataTable({
        initComplete:function(){
          this.api().columns().every(function(){
            var column = this;
            var select = $('<select><option value=""></option></select>')
            .appendTo($(column.footer()).empty())
            .on('change', function(){
              var val = $.fn.dataTable.util.escapeRegex(
                $(this).val()
              );
              column
                .search(val ? '^'+val+'$' : '', true, false)
                .draw();
            });
            column.data().unique().sort().each(function(d, j){
              if(column.search() === '^'+d+'$'){
                  select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
              } else {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
              }
            });
          });
        }
      });
    });
  </script>
@endsection



