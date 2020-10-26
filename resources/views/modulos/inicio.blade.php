@extends('plantilla')
@section('titulo','Inicio')
@section('contenido')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div id="slide" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#slide" data-slide-to="0" class="active"></li>
                    <li data-target="#slide" data-slide-to="1"></li>
                    <li data-target="#slide" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('img/app/slide1.png')}}" class="d-block w-100" alt="">
                        <div class="carousel-caption d-none d-md-block"
                            style="background-color: rgb(225, 43, 107,0.7); border-radius: 2px;">
                            <h5 style="color: white; font-weight: 400;">CV's Modernos y Profesionales</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('img/app/slide2.jpg')}}" class="d-block w-100" alt="">
                        <div class="carousel-caption d-none d-md-block"
                            style="background-color: rgb(225, 43, 107,0.7); border-radius: 2px;">
                            <h5 style="color: white; font-weight: 400;">Más de 10 Diseños</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('img/app/slide3.png')}}" class="d-block w-100" alt="">
                        <div class="carousel-caption d-none d-md-block"
                            style="background-color: rgb(225, 43, 107,0.7); border-radius: 2px;">
                            <h5 style="color: white; font-weight: 400;">Colores Personalizables</h5>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#slide" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#slide" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-profile">
            <div class="card-avatar">
                <a href="#pablo">
                    <img class="img" src="{{asset('img/usuarios/default.png')}}" />
                </a>
            </div>
            <div class="card-body">
                <h6 class="card-category text-gray"><a href="{{env('URL_CREADOR')}}"
                        target="_blank">{{env('APP_CREADOR')}}</a></h6>
                <h4 class="card-title">{{env('SKILL_CREADOR')}}</h4>
                <p class="card-description">
                    Te gustaria crear un <span class="text-primary">Curriculum Vitae Moderno y
                        Profesional. </span> <b>¿No sabes por donde empezar? </b>Soy el creador de esta aplicación y te
                    doy la bienvenida a <b class="text-primary">CV TRUE.</b> Ahora podrás crear un CV moderno y
                    profesional de una forma muy sencilla y rápida. Olvidate del Office que CV TRUE lo hará por ti. <br>
                    <b>¿Qué esperas? </b>
                    <a href="{{route('register')}}" class="btn-link text-primary">
                        <b>Registrate.</b>
                    </a>
                    Y felicidades por tu próximo empleo.<br>
                    <small class="text-muted">Aprovecha!!!. Gratis temporalmente.</small>
                </p>
                <a href="{{env('APP_URL')}}/demo" target="_blak" class="btn btn-rose btn-round">Ver CV Demo</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">style</i>
                </div>
                <p class="card-category">Modelos CV's</p>
                <h3 class="card-title">+5</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    CV's Profesionales
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">equalizer</i>
                </div>
                <p class="card-category">Visitas</p>
                <h3 class="card-title">+5K</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    Visitas a la Web
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">store</i>
                </div>
                <p class="card-category">CV Gratis</p>
                <h3 class="card-title">$00,00</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    Totalmente gratis
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">group_add</i>
                </div>
                <p class="card-category">Usuarios</p>
                <h3 class="card-title">+{{mt_rand(1,999)}} Nuevos</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    Usuarios registrados
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-content">
        <h4 class="card-title">CV TRUE -
            <small class="category">Video Demo</small>
        </h4>
        <div
            style="width: 100%; display: flex;flex-wrap: wrap;justify-content: center;align-items: center;padding: 10px">

            {{-- <iframe width="506" height="315" src="" frameborder="0" allow="autoplay; encrypted-media"
                allowfullscreen></iframe> --}}

        </div>
    </div>
</div>
@endsection
