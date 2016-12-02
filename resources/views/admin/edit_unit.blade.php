@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">AdUnit</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ route('updateUnit', $adUnits->id) }}">
						{{ csrf_field() }}
						{{-- input adunit ID --}}
						<div class="form-group">
							<label for="AdUnit_id" class="col-md-4 control-label">AdUnit ID</label>
								<div class="col-md-6">
									<input type="text" id="AdUnit_id" class="form-control" name="AdUnit_id" value="{{ $adUnits->adUnit_id}}">
								</div>
						</div>
						{{-- input adunit name --}}
						<div class="form-group">
							<label for="name" class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" id="name" class="form-control" name="name" value="{{ $adUnits->name }}">
							</div>
						</div>
						{{-- dropdown application ID --}}
						<div class="form-group">
							<label for="fk_app" class="col-md-4 control-label">Application ID</label>
							<div class="col-md-6">
								<select name="fk_app" class="form-control">
									<option value="{{ $adUnits->fk_app }}">{{ $adUnits->fk_app }}</option>
									@foreach($all as $unit)
										<option value="{{ $unit->fk_app }}">{{ $unit->fk_app }}</option>
									@endforeach
								</select>
							</div>
						</div>
						{{-- submit save --}}
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-btn fa-user"></i>Update
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