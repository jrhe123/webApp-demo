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
					<i class="fa fa-home"></i> <a href="#">Admin</a> > My Invitation
				</div>
				<br/>

				<h1 class="page-header">Invite Your Patients</h1>


				<div class="row">
					<div class="col-xs-6 col-sm-3 placeholder">

						<form class="form-horizontal" role="form" method="GET" action="{{url('email')}}">
							{{ csrf_field() }}

							<div class="container-fluid">

								<p style="width: 400px">Invite your patient so they can start managing their health with PopRx</p>
								<p style="width: 400px">Once they accept your invitation you will be able to keep track of their adherence and measurements such as blood pressure and glucose.</p><br/>

								<p style="width: 400px">Patient Email:</p>
								<div style="width: 400px;">
								<input style="border-radius: 10px;width: 400px;" name="search" type="text" class="form-control" placeholder="Ex. jon@gmail.com">

									<div style="width: 110px;float:right"><a title="send a default email" href="" style="margin-top: 30px;" class="btn btn-info">SEND INVITE</a></div>
								</div>

							</div>

						</form>

					</div>
				</div>






			{{--content end--}}

		</div>
	</div>














@endsection