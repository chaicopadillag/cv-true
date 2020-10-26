<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta charset="utf-8" />
    <link rel="icon" type="image/ico" href="{{asset('img/app/favicon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} | @yield('titulo')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="canonical" href="" />
    <meta name="keywords" content="Creador de curriculúm vitae">
    <meta name="description" content="Creador de curriculúm vitae">
    <meta itemprop="name" content="CV True">
    <meta itemprop="description" content="Creador de curriculúm vitae">
    <meta itemprop="image" content="">
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="CV True">
    <meta name="twitter:description" content="Creador de curriculúm vitae">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="">
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="CV True" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="dashboard.html" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="" />
    <meta property="og:site_name" content="CV True" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <style>
        .error {
            margin-left: 3rem !important;
        }
    </style>
</head>

<body class="off-canvas-sidebar">
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
        <div class="container">
            <div class="navbar-wrapper">
                @yield('pagina-active')
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                aria-expanded="false" aria-label="Menu de Navegación">
                <span class="sr-only">Menu de Navegación</span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
                <span class="navbar-toggler-icon icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{route('inicio')}}" class="nav-link">
                            <i class="material-icons">dashboard</i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item {{request()->is('register') ? 'active' : ''}}">
                        <a href="{{ route('register') }}" class="nav-link">
                            <i class="material-icons">person_add</i>
                            Registrarse
                        </a>
                    </li>
                    <li class="nav-item {{request()->is('login') ? 'active' : ''}}">
                        <a href="{{ route('login') }}" class="nav-link">
                            <i class="material-icons">fingerprint</i>
                            Iniciar Sesión
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper wrapper-full-page">
        <div class="page-header login-page header-filter" filter-color="black"
            style="background-image: url(@yield('img-fondo')); background-size: cover; background-position: top center;">
            <div class="container">
                <div class="row">
                    @yield('formulario')
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a class="nav-link" href="{{route('acerca-de')}}">
                                    Acerca de CV True
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{route('ayuda')}}">
                                    Ayuda
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{route('aviso-legal')}}">
                                    Aviso legal
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{route('politicas-de-privacidad')}}">
                                    Polítcias de privacidad
                                </a>
                            </li>
                            <li>
                                <a class="nav-link" href="{{route('politicas-de-cookies')}}">
                                    Polítcias de Cookies
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, hecho con <i class="material-icons">favorite</i> por
                        <a href="{{env('URL_CREADOR')}}" class="btn-link btn-primary"
                            target="_blank">{{env('APP_CREADOR')}}</a> para ayudarte.
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('secciones.scripts')
    @yield('auth-js')
</body>

</html>
