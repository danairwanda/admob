<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Belajar Datatables</title>
  <script src="//code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
</head>
<body>
    <table id="example" class="display" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Date</th>
          <th>App</th>
          <th>Ad Unit</th>
          <th>AdMob Network requests</th>
          <th>Impressions</th>
          <th>Clicks</th>
          <th>Estimated earnings (IDR)</th>
        </tr>
      </thead>
      <tbody>
      @foreach($reports as $data)
        <tr>
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
</body>
<script src="{{ asset('custom/customDatatables.js') }}" type="text/javascript"></script>

</html>