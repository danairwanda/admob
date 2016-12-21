@extends('admin.layout')
@section('content')
<!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Report Management</h3>
        </div>
    
        <div class="title_right">
        <div class="form-group col-lg-offset-6">
          <label for="month" class="col-sm-4 control-label">Select Date :</label>
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
              <table id="datatable-buttons" class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Date</th>
                    <th>App</th>
                    <th>Ad Unit</th>
                    <th>AdMob Network requests</th>
                    <th>Impressions</th>
                    <th>Estimated earnings (IDR)</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($reports as $data)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $data->date }}</td>
                    <td>{{ $data->app }}</td>
                    <td>{{ $data->ad_unit }}</td>
                    <td>{{ $data->admob_network_requests }}</td>
                    <td>{{ $data->impressions }}</td>
                    <td>{{ $data->clicks }}</td>
                    <td>{{ $data->estimated_earnings_idr }}</td>
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
<!-- /page content -->
@endsection
