<!doctype html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href='//fonts.googleapis.com/css?family=Crimson+Text:400,400italic,600'>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
    <body class="admin">

        <header class="admin__head">
            <div class="admin-meta">
                <p class="current-user">Logged in as: <strong>{{ Auth::user()->email }}</strong></p>
                <p class="current-time">{{ date('l jS F Y - g:ia') }}</p>
            </div>
        </header>

        <div class="admin-container">
            <div class="admin__sidebar sidebar">
                {!! $AdminNavigation->asUl( ['class' => 'list list--reset'] ) !!}
            </div>
            <div class="admin__dashboard dashboard">
                <!-- Display Validation Errors -->
                @include('errors.notices')
                @yield('content')
            </div>
        </div>

        {{--<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
        {{--<script type="text/javascript" src="{{ asset('js/scripts.js') }}" ></script>--}}

    </body>
</html>
