@extends('layouts.app')

@section('content')
<div class="container spark-screen">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Assalamualaikum user :
					<b>{{ Auth::user()->name }}</b>
				</div>
				<div class="panel-body">
					anda login sebagai user
				</div>
			</div>
		</div>
	</div>
</div>
@endsection