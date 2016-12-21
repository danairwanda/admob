@extends('admin.layout')
@section('content')
	{{-- page content --}}
	<div class="right_col" role="main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading">Project</div>
						<div class="panel-body">
							<form class="form-horizontal" role="form" method="POST" action="{{ route('storeProj') }}">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="fk_app" class="col-md-4 control-label">User</label>
									<div class="col-md-6">
										<select class="form-control" name="user" id="user">
											<option>-- Choose User -- </option>
											@foreach ($users as $user)
												<option value="{{ $user->id }}">{{ $user->name}}</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="form-group">
									<label for="fk_app" class="col-md-4 control-label">Application ID</label>
									<div class="col-md-6">
										<select class="form-control" name="apps" id="apps">
											<option>-- Choose Application -- </option>
											@foreach ($application as $apps)
												<option value="{{ $apps->id }}">{{ $apps->name}}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="name_apps" class="col-md-4 control-label">Application Name</label>
									<div class="col-md-6">
										<input type="text" id="name_apps" class="form-control" name="name_apps">
									</div>
								</div>
								
								<div class="form-group">
									<label for="adunit" class="col-md-4 control-label">Ads Unit</label>
									<div class="col-md-6">
										<select class="form-control" name="adunit" id="adunit">
											<option>-- Choose Ads Unit -- </option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="name_adunit" class="col-md-4 control-label">Ads Unit Name</label>
									<div class="col-md-6">
										<input type="text" id="name_adunit" class="form-control" name="name_adunit">
									</div>
								</div>								
								<div class="form-group">
									<label for="share" class="col-md-4 control-label">Share</label>
									<div class="col-md-6">
										<input type="text" id="share" class="form-control" name="share">
									</div>
								</div>
								
								<div class="form-group">
									<label for="save" class="col-md-4 control-label"></label>
									<div class="col-md-6">
										<button type="submit" class="btn btn-app"> 
											<i class="fa fa-save"></i>Save
										</button>
									</div>
								</div>
							</form>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
	<script>
		$('#apps').on('change', function(e){
			// console.log(e);

			var unit_id = e.target.value;
			$('#name_apps').val($("#apps").find(":selected").text());
			// ajax
			$.get('/unitDropdown?unit_id=' + unit_id, function(data){
				// success data
				// console.log(data);
				$('#adunit').empty();
				// $('#adunit').append('Please choose one');

				$.each(data, function(index, adunitObj){
					$('#adunit').append('<option value="'+adunitObj.id+'">'+adunitObj.name+'</option>');
				});
				$('#name_adunit').val($("#adunit").find(":selected").text());
			});
		});

		$("#adunit").on('change',function(e){
			$('#name_adunit').val($("#adunit").find(":selected").text());
		});
	</script>
@endsection

