@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Application</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ route('updateApp', $app->id) }}">
						{{ csrf_field() }}

						<div class="form-group">
							<label for="idapps" class="col-md-4 control-label">ID Application</label>
							<div class="col-md-6">
								<input type="text" id="idapps" class="form-control" name="idapps" value="{{ $app->app_id }}">
							</div>
						</div>

						<div class="form-group">
							<label for="name" class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" id="name" class="form-control" name="name" value="{{ $app->name }}">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-btn fa-user"></i> Update
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection