@extends('admin.layout')
@section('content')
<!-- page content -->
<div class="right_col" role="main">
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-12 col-lg-offset-0">
			{{ Session::get('message') }}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4><i class="fa fa-pencil"></i><strong> DAFTAR APLIKASI</strong></h4>
					<div class="row">
					</div>
				</div>
				<div class="panel-body">
				<table class="table table-striped table-hover" id="datatable-responsive">
					<thead>
						<tr>
							<th>No</th>
							<th>Application ID</th>
							<th>Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					@foreach($apps as $app)
						<tr>
							<td>{{ ++$i }}</td>
							<td>{{ $app->app_id }}</td>
							<td>{{ $app->name }}</td>
							<td>
								<form  method="POST" action="{{ route('deleteApp', $app->id) }}" accept-charset="UTF-8">
									<input type="hidden" name="_method" value="DELETE">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<a href="{{ url('applications') }}" class="btn btn-success"><i class="fa fa-refresh"></i></a>
									<a href="{{ route('createApp') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a>
									<a href="{{ route('editApp', $app->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
									<button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');"><span class="glyphicon glyphicon-trash"></span></button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				</div>
			</div>
			{!! $apps->render() !!}
		</div>
	</div>
	</div>
</div>
<!-- /page content -->
@endsection