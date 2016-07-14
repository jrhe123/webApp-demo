<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Lato';
        }

        li{
            font-size: 17px;
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}" >
                    <?php echo "<img style='margin-top: -10px' src='https://uwaterloo.ca/conrad-business-entrepreneurship-technology/sites/ca.conrad-business-entrepreneurship-technology/files/uploads/images/poprx_logo.png'>";?>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())

                        <li>
                            <div class="imgtest">
                                <figure>
                                    <div>
                                        @if(session('fb_user'))
                                            <?php echo "<img src='".session('fb_user')->getAvatar()."'>";?>
                                        @else
                                            <?php echo "<img src='data:image/jpeg;base64,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'>";?>
                                        @endif


                                    </div>
                                </figure>
                            </div>
                        </li>

                        <li class="dropdown">
                            <a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                                @if(session('user'))
                                    {{session('user')['user_name']}}
                                @elseif(session('fb_user'))
                                    {{session('fb_user')->getName()}}
                                @endif

                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="">Home</a></li>
                                <li><a href="{{ url('/logout') }}">Log out</a></li>

                            </ul>
                        </li>

                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                user name <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="">Home</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
</body>


<link rel="stylesheet" href="{{ URL::asset('style.css') }}">

{{--set the user Pic--}}
<style type="text/css">
    .imgtest{
        /*margin:5px 3px;*/
        overflow:hidden;}
    .list_ul figcaption p{
        font-size:12px;
        color:#aaa;
    }
    .imgtest figure div{
        display:inline-block;
        margin-top:3px;
        width:40px;
        height:40px;
        border-radius:50px;
        border:2px solid #fff;
        overflow:hidden;
        -webkit-box-shadow:0 0 3px #ccc;
        box-shadow:0 0 3px #ccc;
    }
    .imgtest img{width:100%;
        min-height:100%; text-align:center;}
</style>

</html>
