<!doctype html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href='//fonts.googleapis.com/css?family=Crimson+Text:400,400italic,600'>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script type="text/javascript" src="/js/scripts.js" ></script>
</head>
    <body>
        <header class="header-container">

            <div class="container">

                <div class="grid">
                    <div class="span--2-3--m">
                        <div class="navigation-container">
                            <nav class="navigation">
                                <ul class="nav-list">
                                    <li class="nav-list__item">
                                        <a href="{{ url('/') }}" class="nav-list__link"><i class="fa fa-home"></i> Blog</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="loginout">
                    @if ( Auth::user() )
                        <p><i class="fa fa-fw fa-lock"></i>{{ Auth::user()->name }}</p>
                        <p><a href="{{ url('/logout') }}"><i class="fa fa-fw fa-sign-out"></i>Logout</a></p>
                    @else
                        <p><a href="{{ url('/login') }}"><i class="fa fa-fw fa-sign-in"></i>Login</a></p>
                    @endif
                </div>

            </div>


        </header>

        <div class="content-container">
            <div class="container">
                <!-- Display Validation Errors -->
                @include('errors.notices')
                @yield('content')
            </div>
        </div>

        <footer class="footer-container">
            <div class="container">
                <p>&copy; Ash Davies</p>
            </div>
        </footer>
    </body>
</html>