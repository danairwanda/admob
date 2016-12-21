@extends('admin.layout')
@section('content')
	{{-- page content --}}
	<div class="right_col" role="main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading">Upload Your Photo Profile</div>
						<div class="panel-body">
							@if(count($errors) > 0)
								<div class="alert alert-danger">
									<strong>Whoops!</strong> There were some problem with your input. <br><br>
									<ul>
										@foreach($errors->all() as $errors)
											<li>{{ $errors }}</li>
										@endforeach
									</ul>
								</div>
							@endif

							@if ($message = Session::get('success'))
								<div class="alert alert-success alert-block">
									<button type="button" class="close" data-dismiss="alert">×</button>	
										<strong>{{ $message }}</strong>
								</div>
								<div class="row">
									<div class="col-md-4">
										<strong>Original Image:</strong>
										<br/>
										<img src="/images/{{ Session::get('imageName') }}" />
									</div>
									<div class="col-md-4">
										<strong>Thumbnail Image:</strong>
										<br/>
										<img src="/thumbnail/{{ Session::get('imageName') }}" />
									</div>
								</div>
							@endif
							{!! Form::open(array('route' => 'image','enctype' => 'multipart/form-data')) !!}
							<div class="row">
								<div class="col-md-4">
									<br/>
									{!! Form::text('title', null,array('class' => 'form-control','placeholder'=>'Add Title')) !!}
								</div>
								<div class="col-md-12">
									<br/>
									{!! Form::file('image', array('class' => 'image')) !!}
								</div>
								<div class="col-md-12">
									<br/>
									<button type="submit" class="btn btn-success">Upload</button>
								</div>
							</div>
						{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection