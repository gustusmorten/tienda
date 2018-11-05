<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', 'Lobo Shop')</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('plugins/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="app">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="{{ route('home') }}">
                    <img alt="Brand" src="{{ asset('images/brand2.png') }}" width="75px">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <!-- Authentication Links -->

                <!-- Authentication Links -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @auth('cliente')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('shopingCart.index') }}">Carrito de compras</a>
                    </li>
                    <li class="nav-item">
                            <li>  <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a></li>
                        <form id="logout-form" action="{{ route('cliente.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cliente.login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if ( Route::has('cliente.register'))
                            <a class="nav-link" href="{{ route('cliente.register') }}">{{ __('Cliente Register') }}</a>
                        @endif
                    </li>
                    @endauth
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <main class="py-4">
        <div class="container">
         @include('flash::message')
         @yield('contenido')

        </div>

</main>
</body>

</html>
