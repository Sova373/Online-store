<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Booking tickets on football</title>
    <!-- CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/236026cc83.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/footer.css') }}">

</head>
<body>
<section class="header">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('home') }}"> Online Store </a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ route('home') }}"> Products </a></li>
                <li><a href="#">Something else</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                @else
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();" >
                            <span class="glyphicon glyphicon-log-in"></span> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</section>
<section class="main">
    @include('common.errors')
    @include('common.flash_message')
    @yield('content')
</section>
<section class="footer">
    <footer class="footer">
        <div class="container">
            <b>Online store. Project created by Sokolov Vladimir</b>

            <ul class="social-icon animate pull-right">
                <li><a href="https://www.linkedin.com/in/vladimir-sokolov-1377b3154/" title="linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li> <!-- change the link to social page and edit title-->
                <li><a href="https://t.me/sova373" title="telegram" target="_blank"><i class="fa fa-telegram"></i></a></li>
                <li><a href="https://github.com/Sova373" title="github" target="_blank"><i class="fa fa-github"></i></a></li>
                <li><a href="https://plus.google.com/u/0/104229305315854041538" title="google plus" target="_blank"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
    </footer>
</section>

@yield('modal')

<script>
    Window.Laravel = { csrfToken : '{{ csrf_token() }}'};
</script>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="{{ asset('js/app.js') }}"></script>

@yield('script')

</body>
</html>