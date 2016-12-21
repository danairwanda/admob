@extends('admin.layout')
@section('content')
  <!-- page content -->
  <div class="right_col" role="main"><br><br><br>
  <div class="container">
  <div class="panel panel-heading">
    <h3>Import Excel to MySQL</h3>
    <form class="form_horizontal" method="POST" enctype="multipart/form-data" action="{{ route('upload') }}">
      <input type="file" name="import_file">
      {{ csrf_field() }}
      <br>
      <button class="btn btn-primary">Upload</button>
    </form>
  </div>
  </div>
  </div>
@endsection