<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('css/all.min.css')}}" rel="stylesheet">
    <link href="{{url('css/index.css')}}" rel="stylesheet">
    @yield('style')
</head>
<body>
<header class="row align-items-center justify-content-between col-12" style="width: 100%">
    <div class="col-3 Cname">
        <div class="logoBox">
            <i class="fas fa-seedling"></i><br>
            <h1>CBCO</h1>
        </div>
    </div>
    <div class="col-5 row justify-content-start">
        <a class="nav-item" href="{{ url('/AdminPanel') }}">Home Panel</a>|
        <a class="nav-item" href="{{ url('/AllRQ') }}">Requests & Collaborations</a>|
        <a class="nav-item" href="{{ url('/addUserPage') }}">Add User</a>
    </div>
    <div class="col-2 row justify-content-end loginBox ">
        <div class="text-right col-12 userLogedIn row justify-content-end">
            @if (Auth::guest())
                <a class="nav-item" href="{{ url('/login') }}">Login</a>
                <a class="nav-item" href="{{ url('/register') }}">Register</a>
            @else
                <div class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        @if(Auth::user())
                            {{Auth::user()->name}}
                        @endif
                    </a>
                    <ul class="dropdown-menu" style="width: 100px!important;min-width: 0;margin: 0;padding:8px 0 5px 2px;left:-10px;">
                        <li><a class="nav-item" href="{{ url('/logout') }}" style="font-size: 14px!important;">Logout</a></li>
                    </ul>
                </div>
            @endif

        </div>
    </div>
</header>
@yield('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
<script src="{{url('js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
<script src="{{url('js/tether.min.js')}}" type="text/javascript"></script>
<script src="{{url('js/bootstrap.min.js')}}" type="text/javascript"></script>
@yield('script')
</body>