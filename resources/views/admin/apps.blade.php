@extends('layouts.app')
@section('content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-lg-offset-1">
			{{ Session::get('message') }}
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4><i class="fa fa-pencil"></i><strong> DAFTAR APLIKASI</strong></h4><hr>
					<div class="row">
						<div class="col-md-6">
							<a href="{{ route('createApp') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Tambah</a>
							<a href="{{ url('applications') }}" class="btn btn-success"><i class="fa fa-refresh"></i> Semua Data</a>
						</div>
						<div class="col-md-2">
						</div>
						{{-- Form pencarian --}}
						<div class="col-md-4">
							{!! Form::open(['method' => 'GET', 'route' => 'cariaplikasi','role' => 'search']) !!}
							<div class="input-group custom-search-form">
								<input type="text" class="form-control" name="search" placeholder="Search...">
								<span class="input-group-btn">
									<span class="input-group-btn">
										<button type="submit" class="btn btn-default"><i class="fa fa-search"></i> Cari</button>
									</span>
								</span>
							</div>
							{!! Form::close() !!}
						</div>
					</div>
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
									<button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin akan menghapus data ?');"><span class="glyphicon glyphicon-trash"></span> Hapus</button>
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