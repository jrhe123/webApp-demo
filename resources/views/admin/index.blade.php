@extends('layouts.admin')

@section('content')


	<div class="container-fluid">
		<div class="row">
			{{--side bar begin--}}
			<div class="col-sm-3 col-md-2 sidebar" id="side_bar" style="position: absolute;left:0px;top:51px;">
				<ul class="nav nav-sidebar">

					<li><a href="{{url('invite')}}"><i class="fa fa-fw glyphicon glyphicon-envelope"></i> My Invitations <span class="sr-only">(current)</span></a></li>
					<li class="active"><a href="{{url('admin')}}"><i class="fa fa-fw glyphicon glyphicon-user"></i> My Patients <span class="sr-only">(current)</span></a></li>

				</ul>
			</div>
			{{--side bar end--}}



			{{--content begin--}}
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

				<div class="crumb_warp">
					<i class="fa fa-home"></i> <a href="#">Admin</a> > My Patients
				</div>
				<br/>

				<h1 class="page-header">My Patients
					<span><a title="send a default email" data-toggle="tooltip" href="{{url('invite')}}"  class="navbar-right btn btn-info btn-lg " style="margin-top: -5px;">INVITE PATIENTS</a>
					</span>
				</h1>
				<br/>


				<div class="row">
					<div class="col-xs-6 col-sm-3 placeholder">

						<form class="form-horizontal" role="form" method="POST" action="{{url('admin')}}">
							{{ csrf_field() }}
							<div class="form-group">
								<input style="border-radius: 10px;margin-left:20px;width: 200px;" name="search" type="text" class="form-control" placeholder="Search by Name...">
							</div>
							<span><p style="width: 300%;">"If no data is shown for new register, please do the search by empty string, and show some default data"</p></span>
						</form>

					</div>
				</div>


				<div class="table-responsive">
					<table class="table table-striped">
						<thead>
						<tr>
							<th>Name</th>
							<th>Gender</th>
							<th>Birth Year</th>
							<th>Condition</th>
							<th>Adherence</th>
						</tr>
						</thead>

						<tbody>

						@if(isset($patient))
							@foreach($patient as $k=>$v)
								<tr>
									<td><a href="{{url('info/'.$v->patient_id)}}" title='{{$v->patient_name}} detail info' data-toggle="tooltip">{{$v->patient_name}}</a></td>
									<td>{{$v->patient_gender}}</td>
									<td>{{$v->patient_birth}}</td>
									<td>{{$v->patient_condition}}</td>
									<td>{{$v->patient_adherence}}</td>
								</tr>
							@endforeach
						@endif

						</tbody>
					</table>
				</div>
			</div>
			{{--content end--}}

		</div>
	</div>






	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script>

		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});

	</script>







@endsection