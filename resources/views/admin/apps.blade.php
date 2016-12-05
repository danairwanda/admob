@extends('layouts.app')
@section('content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-lg-offset-1">
			{{ Session::get('message') }}
			<div class="panel panel-default">
				<div class="panel-heading"><strong>Admin Application</strong>
					<a href="{{ route('createApp') }}" name="btn_add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add</a><br><br>
				</div>
				<div class="panel-body">
				<table class="table table-striped table-hover">
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
									<a href="{{ route('editApp', $app->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a>
									<button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');"><span class="glyphicon glyphicon-trash"></span> Delete</button>
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
@endsection