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
						<h4><i class="fa fa-book"></i><strong> DAFTAR ADS UNIT</strong></h4>
						<div class="row">
							<div class="col-md-6">
							</div>
							<div class="col-md-2">
								{{-- nothing --}}
							</div>
						</div>
					</div>
						<div class="panel-body">
						<table class="table table-striped table-hover" id="datatable-responsive">
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
									<td>{{ $adUnit->application->name }}</td>
									<td>
										<form method="POST" action="{{ route('deleteUnit', $adUnit->id) }}" accept-charset="UTF-8">
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<a href="{{ url('adunit') }}" class="btn btn-success"><i class="fa fa-refresh"></i></a>	
											<a href="{{ route('createUnit') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i></a>		
											<a href="{{ route('editUnit', $adUnit->id) }}" name="btn_edit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
											<button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin menghapus data ?');"><span class="glyphicon glyphicon-trash"></span></button>
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
</div>
@endsection