@extends('admin.layout')
@section('content')
<!-- page content -->
  <div class="right_col" role="main">
    <!-- top tiles -->
      <div class="container spark-screen">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
            <div class="panel-heading">Dashboard Admin</div>
            <div class="panel-body">
              Assalamualaikum : <b>{{ Auth::user()->name }}</b><br>
              Anda login sebagai admin, anda bisa melakukan manajemen data.
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
    </div>
  </div>
<!-- /page content -->
@endsection