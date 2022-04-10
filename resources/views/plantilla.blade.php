<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/ico" href="{{asset('img/app/favicon.ico')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name') }} | @yield('titulo')</title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <link rel="canonical" href="" />
  <meta name="keywords" content="Creador de curriculúm vitae">
  <meta name="description" content="Creador de curriculúm vitae">
  <meta itemprop="name" content="{{config('app.name')}}">
  <meta itemprop="description" content="Creador de curriculúm vitae">
  <meta itemprop="image" content="">
  <meta name="twitter:card" content="product">
  <meta name="twitter:site" content="{{config('app.name')}}">
  <meta name="twitter:title" content="CV True">
  <meta name="twitter:description" content="Creador de curriculúm vitae">
  <meta name="twitter:creator" content="{{env('CREADOR_APP')}}">
  <meta name="twitter:image" content="">
  <meta property="fb:app_id" content="655968634437471">
  <meta property="og:title" content="CV True" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="dashboard.html" />
  <meta property="og:image" content="" />
  <meta property="og:description" content="" />
  <meta property="og:site_name" content="CV True" />
  <link rel="stylesheet" href="{{ asset('css/iconos.css') }}">
   <link rel="stylesheet" href="{{asset('css/material-dashboard.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
   <!-- <script src="{{url('/')}}/js/fontawesome.js"></script> -->
</head>
<body>
  <div class="wrapper ">
    {{-- sidebar --}}
    @include('secciones.sidebar')
    {{-- ensidebar --}}
    <div class="main-panel">
      {{-- Navbar --}}
      @include('secciones.menu_top')
      {{-- End Navbar --}}
      <div class="content">
          <div class="container-fluid">
            @yield('contenido')
          </div>
      </div>
      {{-- footer --}}
      @include('secciones.footer')
      {{-- footer --}}
    </div>
  </div>
  {{-- icon config --}}
  {{-- @include('secciones.config')
  endconfig --}}
  @section('js')
  @include('secciones.scripts')
  @show
</body>

</html>
