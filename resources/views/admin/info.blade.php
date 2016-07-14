@extends('layouts.admin')

@section('content')



    <div class="container-fluid">
        <div class="row">
            {{--side bar begin--}}
            <div class="col-sm-3 col-md-2 sidebar" id="side_bar" style="height: 1350px;position: absolute;left:0px;top:51px;">
                <ul class="nav nav-sidebar">

                    <li><a href="{{url('invite')}}"><i class="fa fa-fw glyphicon glyphicon-envelope"></i> My Invitations <span class="sr-only">(current)</span></a></li>
                    <li class="active"><a href="{{url('admin')}}"><i class="fa fa-fw glyphicon glyphicon-user"></i> My Patients <span class="sr-only">(current)</span></a></li>

                </ul>
            </div>

            {{--side bar end--}}

            {{--content begin--}}
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

                <div class="crumb_warp">
                    <i class="fa fa-home"></i> <a href="#">Admin</a> > <a href="{{url('admin')}}">My Patients</a> > {{$patient->patient_name}}
                </div>
                <br/>


                <div style="font-size:50px">{{$patient->patient_name}}</div>

                <span><a title="send the default email" class="navbar-right" href="{{ url('email') }}" >
                    <?php echo "<img style='margin-top: -100px;width: 60px;' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQnmSXXpQ0ljN6GqJuYe_uqSaLhsfrNrAiZCtsQqbkCeAU00NoJVZHttL8'>";?>
                </a></span>

                <span style="font-size:20px">{{$patient->patient_gender}}, {{$patient->patient_birth}}</span>
                <br/>
                <br/>


                <?php echo '<div ng-app="rootApp">';?>
                <div class="row">
                    <div class="col-md-6 placeholder">
                        <div ng-app="myApp1">
                            <div ng-controller="MainController1">
                                <div zingchart id="chart-1" zc-json="myJson" zc-width="100%" zc-height="500px"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 placeholder">

                        <div ng-app="myApp2">
                            <div ng-controller="MainController2">
                                <div zingchart id="chart-2" zc-json="myJson" zc-width="100%" zc-height="568px"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 placeholder">
                        <div ng-app="myApp3">
                            <div ng-controller="MainController3" >
                                <div zingchart id="chart-3" zc-json="myJson" zc-width="100%" zc-height="100%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 placeholder">

                        <div ng-app="myApp4">
                            <div ng-controller="MainController4">
                                <div id ='chartDiv'></div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo '</div>';?>
                {{--content end--}}



            </div>
        </div>





        <script src = "https://ajax.googleapis.com/ajax/libs/angularjs/1.4.5/angular.min.js" ></script>
        <script src = "https://cdn.zingchart.com/zingchart.min.js" ></script>
        <script src = "https://cdn.zingchart.com/angular/zingchart-angularjs.js" ></script>
        <script src="{{ URL::asset('temp.js') }}"></script>
        <link rel="stylesheet" href="{{ URL::asset('temp.css') }}">
        <script>

        </script>






@endsection