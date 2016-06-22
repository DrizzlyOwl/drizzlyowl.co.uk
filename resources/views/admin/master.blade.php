<!doctype html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href='//fonts.googleapis.com/css?family=Crimson+Text:400,400italic,600'>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script type="text/javascript" src="/js/scripts.js" ></script>
</head>
    <body class="admin">

        <header class="header-container header-container--admin">
            <div class="container">
                <div class="admin-head">
                    <p class="current-user">Logged in as: <strong>{{ Auth::user()->email }}</strong></p>
                    <p class="current-time">{{ date('d-m-Y H:i:s') }}</p>
                </div>
            </div>

        </header>

        <div class="admin-container container">

            <div class="grid">
                <div class="span--4-12">
                    <div class="admin__sidebar sidebar">
                        <ul class="block-links">
                            <li><a href="{{ url('admin/pages') }}"><i class="fa fa-fw fa-file-text-o"></i>Pages</a></li>
                            <li><a href="{{ url('admin/posts') }}"><i class="fa fa-fw fa-pencil-square-o"></i>Posts</a></li>
                        </ul>
                    </div>
                </div>
                <div class="span--8-12">
                    <div class="admin__dashboard dashboard">
                        <!-- Display Validation Errors -->
                        @include('errors.notices')
                        @yield('content')
                    </div>
                </div>
            </div>

        </div>

    </body>
</html>