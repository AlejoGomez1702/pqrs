<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @stack('styles') {{--Hueco para agregar estilos en las sub-vistas--}}

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PQRS - @yield('title')</title>
    <link rel="icon" href="{{ asset('/img/logo-alcaldia.PNG') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte/adminlte.min.css') }}" rel="stylesheet" >

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/a950d22064.js" crossorigin="anonymous"></script>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        {{-- Barra superior y lateral para el usuario logueado --}}
        @auth
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>         
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="#" class="nav-link">Contact</a>
                    </li>
                </ul>

                <!-- SEARCH FORM -->
                <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    </div>
                </div>
                </form>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                        </div>
                    </li>
                    {{-- Boton para las opciones del usuario logueado --}}
                    <li class="nav-item mr-5">
                        <div class="dropdown show">                        
                            <a class="btn btn-link dropdown-toggle" href="#" role="button" id="dropdownUser" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->names }}
                            </a>
                        
                            <div class="dropdown-menu" aria-labelledby="dropdownUser">
                                <a class="dropdown-item" href="#"><i class="fas fa-user"></i>Mis Datos</a>
                                <a class="dropdown-item" href="/changePassword"><i class="fas fa-lock"></i>Cambiar Contraseña</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                        document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                            </div>
                        </div>

                        {{-- <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
                            class="fas fa-th-large"></i></a> --}}
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!--Aside de opciones para el administrador-->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!--Logo superior-->
                <a href="/" class="brand-link">                
                    <img src="{{ asset('img/AdminLTELogo.png') }}" alt="" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">PQRS</span>
                </a>

                <!--Sidebar-->
                <div class="sidebar" >
                    <!--Foto y nombre de usuario logueado-->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            @if (count(Auth::user()->getMedia()) > 0)
                                <img src="{{ Auth::user()->getMedia()[0]->getUrl() }}" class="img-circle elevation-2" alt="User Image">
                            @else
                                <img src="/storage/default-user.png" class="img-circle elevation-2" alt="User Image">
                            @endif
                            {{-- <img src="{{ asset('img/avatar2.png') }}" class="img-circle elevation-2" alt="User Image"> --}}
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">{{ Auth::user()->names }}</a>
                        </div>
                    </div>
                    
                    {{-- Contiene todos los menus de la izquierda --}}
                    @include('layouts.admin.options')

                </div>

            </aside>
            <!-- /.Aside de opciones-->
        @endauth

        {{-- Barra superior para usuarios no logueados --}}
        @guest
            <!-- navbar por defecto de laravel -->
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        PQRS - Aguadas
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="container mt-4">
                @yield('content')
            </main>
        @endguest
        
        @auth
            <main class="content-wrapper">
                @yield('content')
            </main>
        @endauth
        
    </div>

    @auth
        <!-- JQuery -->
        <script src="{{ asset('js/adminlte/jquery.min.js') }}"></script>

        <!-- AdminLTE -->
        <script src="{{ asset('js/adminlte/adminlte.min.js') }}"></script>

        {{-- Dashboard2 AdminLTE 3.0 --}}
        {{-- <script src="{{ asset('js/adminlte/dashboard2.js') }}"></script> --}}

        {{-- Bootbox -- Utilizado para los dialogos modales --}}
        {{-- <script src="{{ asset('js/bootbox.all.min.js') }}"></script> --}}

        {{-- Sweet Alert --}}
        @include('sweetalert::alert')

        <!-- OverLayScrollbars -->
        {{-- <script src="js/adminlte/jquery.overlayScrollbars.min.js"></script> --}}

        <!-- Bootstrap -->
        {{-- <script src="js/adminlte/bootstrap.bundle.min.js"></script> --}}

        <!-- Dashboard -->
        {{-- <script src="js/adminlte/dashboard2.js"></script> --}}
    @endauth

</body>
</html>
