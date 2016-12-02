@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">AdUnit</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ route('storeUnit') }}">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="fk_app" class="col-md-4 control-label">Application ID</label>
							<div class="col-md-6">
								<select name="fk_app" class="form-control">
									<option>-- Choose Application ID -- </option>
								    @foreach($all as $appid)
								     <option value="{{ $appid->id }}">{{ $appid->app_id}}</option>
								    @endforeach
								</select>
							</div>
						</div>
						{{-- input adunit ID --}}
						<div class="form-group">
							<label for="adUnit_id" class="col-md-4 control-label">AdUnit ID</label>
								<div class="col-md-6">
									<input type="text" id="adUnit_id" class="form-control" name="adUnit_id">
								</div>
						</div>
						{{-- input adunit name --}}
						<div class="form-group">
							<label for="name" class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" id="name" class="form-control" name="name">
							</div>
						</div>
						{{-- dropdown application ID --}}
						{{-- submit save --}}
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-btn fa-user"></i>Save
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