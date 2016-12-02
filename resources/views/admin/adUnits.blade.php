@extends('layouts.app')
@section('content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-lg-offset-1">
				{{ Session::get('message') }}
				<div class="panel panel-default">
					<div class="panel-heading"><strong>Admin AdUnit</strong>
						<a href="{{ route('createUnit') }}" name="btn_add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add</a><br><br>
					</div>
						<div class="panel-body">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>AdUnit ID</th>
									<th>Name</th>
									<th>Application ID</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
							@foreach($adUnits as $adUnit)
								<tr>
									<td>{{ ++$i }}</td>
									<td>{{ $adUnit->adUnit_id }}</td>
									<td>{{ $adUnit->name }}</td>
									<td>{{ $adUnit->fk_app }}</td>
									<td>
										<form method="POST" action="{{ route('deleteUnit', $adUnit->id) }}" accept-charset="UTF-8">
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<a href="{{ route('editUnit', $adUnit->id) }}" name="btn_edit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a>
											<button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin menghapus data ?');"><span class="glyphicon glyphicon-trash"></span> Delete</button>
										</form>
										
										
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
				{!! $adUnits->render() !!}
			</div>
		</div>
	</div>
@endsection