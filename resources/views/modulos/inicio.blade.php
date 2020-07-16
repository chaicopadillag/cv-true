@extends('plantilla')
@section('contenido')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-content">
                <div id="slides" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slides" data-slide-to="0" class="active"></li>
                        <li data-target="#slides" data-slide-to="1"></li>
                        <li data-target="#slides" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="vista/img/defecto/slide1.png" alt="">
                            <div class="carousel-caption d-none d-md-block"
                                style="background-color: rgb(225, 43, 107,0.7); border-radius: 2px;">
                                <h5 style="color: white; font-weight: 400;">CV's Modernos y Profesionales</h5>
                            </div>
                        </div>
                        <div class="item">
                            <img src="vista/img/defecto/slide2.jpg" alt="">
                            <div class="carousel-caption d-none d-md-block"
                                style="background-color: rgb(225, 43, 107,0.7); border-radius: 2px;">
                                <h5 style="color: white; font-weight: 400;">Más de 10 Diseños</h5>
                            </div>
                        </div>
                        <div class="item">
                            <img src="vista/img/defecto/slide3.png" alt="">
                            <div class="carousel-caption d-none d-md-block"
                                style="background-color: rgb(225, 43, 107,0.7); border-radius: 2px;">
                                <h5 style="color: white; font-weight: 400;">Colores Personalizables</h5>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#slides" role="button" data-slide="prev">
                        <span class="material-icons icon-prev icon-keyboard_arrow_left" aria-hidden="true"
                            style="color: #ffffff; font-size: 30px"></span>
                    </a>
                    <a class="right carousel-control" href="#slides" role="button" data-slide="next">
                        <span class="material-icons icon-next icon-keyboard_arrow_right" aria-hidden="true"
                            style="color: #ffffff; font-size: 30px"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-profile">
            <div class="card-avatar">
                <img class="img" src="vista/img/defecto/gerardo.jpg" />
            </div>
            <div class="card-content">
                <div class="form-group"></div>
                <h6 class="card-title">Gerardo Chaico Padilla</h6>
                <p class="category text-gray">Programador / Desarrollador Web</p>
                <p class="card-content">Te gustaria crear un <span class="text-primary">Curriculum Vitae Moderno y
                        Profesional. </span> <b>¿No sabes por donde empezar? </b>Soy el creador de esta aplicación y te
                    doy la bienvenida a <b class="text-primary">CV TRUE.</b> Ahora podrás crear un CV moderno y
                    profesional de una forma muy sencilla y rápida. Olvidate del Office que CV TRUE lo hará por ti. <br>
                    <?php if (!isset($_SESSION['usuario'])): ?>
                    <b>¿Qué esperas? </b>
                    <a href="usuario.php" class="btn-link text-primary">
                        <b>Registrate.</b>
                    </a>
                    Y felicidades por tu próximo empleo.<br>
                    <?php endif?>
                    <small class="text-muted">Aprovecha!!!. Gratis temporalmente.</small></p>
                <a href="https://chaicopadillag.com" target="_blak" class="btn btn-rose">Ver Perfil</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="material-icons icon-profile"></i>
            </div>
            <div class="card-content">
                <p class="category">Modelos CV's</p>
                <h3 class="card-title">+10</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <p>CV'S Profesionales</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="rose">
                <i class="material-icons icon-favorite"></i>
            </div>
            <div class="card-content">
                <p class="category">Visitas</p>
                <h3 class="card-title">+0.7K</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <p>Visitas a la Web</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="green">
                <i class="material-icons icon-coin-dollar"></i>
            </div>
            <div class="card-content">
                <p class="category">CV Gratis</p>
                <h3 class="card-title">S/. 00</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <p>Totalmente gratis</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header" data-background-color="blue">
                <i class="material-icons  icon-supervisor_account"></i>
            </div>
            <div class="card-content">
                <p class="category">Usuarios</p>
                <h3 class="card-title">+99</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <p>Usuarios</p>
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

            <iframe width="506" height="315" src="" frameborder="0" allow="autoplay; encrypted-media"
                allowfullscreen></iframe>

        </div>
    </div>
</div>
@endsection