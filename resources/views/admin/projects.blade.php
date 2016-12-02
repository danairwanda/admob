@extends('layouts.app')
@section('content')
	<div class="container spark-screen">
		<div class="row">
			<div class="col-md-10 col-lg-offset-1">
				{{ Session::get('message') }}
				<div class="panel panel-default">
					<div class="panel-heading"><strong>Admin AdUnit</strong>
						<a href="" name="btn_add" class="btn btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add</a><br><br>
					</div>
						<div class="panel-body">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>No</th>
									<th>Username </th>
									<th>AdUnit Name</th>
									<th>Share</th>
								</tr>
							</thead>
							<tbody>
							@foreach($projects as $project)
								<tr>
									<td>{{ ++$i }}</td>
									<td>{{ $project->user->name }}</td>
									<td>{{ $project->adunit->name }}</td>
									<td>{{ $project->share }}</td>
									
									<td>
										<form method="POST" action="" accept-charset="UTF-8">
											<input type="hidden" name="_method" value="DELETE">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<a href="" name="btn_edit" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a>
											<button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin menghapus data ?');"><span class="glyphicon glyphicon-trash"></span> Delete</button>
										</form>
										
										
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
				{!! $projects->render() !!}
			</div>
		</div>
	</div>
@endsection