<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>{{config('app.name')}} | {{$usuario->name}} {{$usuario->apellidos}}</title>
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="CV, Portafolio, Resumen">
    <meta name="author" content="Gerardo Chaico Padilla">
    <link rel="icon" type="image/ico" href="{{asset('img/app/favicon.ico')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('cv/css/material/materialize.min.css') }}" media="all">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,400italic,700italic' rel='stylesheet'
        type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome.min.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('cv/css/material/style.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('cv/css/material/colors/lime.css') }}" title="lime" media="all" id="temas">
    <link rel="stylesheet" type="text/css" href="{{ asset('cv/css/material/demo.css') }}" media="all">
</head>

<body>
    <div class="container">
        <div class="row">
            <aside class="col l4 m12 s12 sidebar z-depth-1" id="sidebar">
                <div class="row">
                    <div class="heading">
                        <div class="feature-img">
                            <img src="{{asset($usuario->foto??'img/usuarios/default.png')}}" class="responsive-img"
                                alt="">
                        </div>
                        <div class="" data-wow-delay="0.1s">
                            <h4 style="text-align: center; text-transform: uppercase;">
                                {{$usuario->name.' '}}{{($usuario->apellidos==null) ? abort(403,'Permiso denegado, datos de perfil incompletos') : $usuario->apellidos}}
                            </h4>
                        </div>
                    </div>
                    <div class="col l12 m12 s12 sort-info sidebar-item">
                        <div class="row">
                            <div class="col m12 s12 l3 icon">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="col m12 s12 l9 info wow fadeIn a1" data-wow-delay="0.1s">
                                <div class="section-item-details">
                                    <p style="text-align: justify;">{{$usuario->resumen}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col l12 m12 s12  mobile sidebar-item">
                        <div class="row">
                            <div class="col m12 s12 l3 icon">
                                <i class="fa fa-mobile"></i>
                            </div>
                            <div class="col m12 s12 l9 info wow fadeIn a2" data-wow-delay="0.2s">
                                <div class="section-item-details">
                                    <div class="personal">
                                        <h4><a href="tel:{{$usuario->telefono}}">{{$usuario->telefono}}</a></h4>
                                        <span>Celular personal</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col l12 m12 s12  email sidebar-item ">
                        <div class="row">
                            <div class="col m12 s12 l3 icon">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="col m12 s12 l9 info wow fadeIn a3" data-wow-delay="0.3s">
                                <div class="section-item-details">
                                    <div class="personal">
                                        <h4><a href="mailto:{{$usuario->email}}">{{$usuario->email}}</a></h4>
                                        <span>Correo personal</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col l12 m12 s12  address sidebar-item ">
                        <div class="row">
                            <div class="col l3 m12  s12 icon">
                                <i class="fa fa-home"></i>
                            </div>
                            <div class="col m12 s12 l9 info wow fadeIn a4" data-wow-delay="0.4s">
                                <div class="section-item-details">
                                    <div class="address-details">
                                        <p>{{$usuario->direccion}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col l12 m12 s12 address sidebar-item">
                        <div class="row">
                            <div class="col m12 l3 s12 icon">
                                <i class="fa fa-shield-alt"></i>
                            </div>
                            <div class="col m12 l9 s12 skill-line a5 wow fadeIn" data-wow-delay="0.4s">
                                <h3>Mis Habilidades</h3>
                                @foreach ($habilidades as $habilidad)
                                <span>{{$habilidad->habilidad}} - <small
                                        class="text-muted">{{$habilidad->nivel}}%</small></span>
                                <div class="progress tooltipped" data-position="top" data-delay="50"
                                    data-tooltip="Nivel {{$habilidad->nivel}}%">
                                    <div class="determinate" style="width: {{$habilidad->nivel}}%"><i
                                            class="fa icon-brightness_1"></i></div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <section class="col s12 m12 l8 section">
                <div class="row">
                    <div class="section-wrapper z-depth-1">
                        <div class="custom-content col s12 m12 l12 wow fadeIn a1" data-wow-delay="0.1s">
                            <h2><i class="fa fa-graduation-cap"></i> Formación Profesional</h2>
                            @foreach ($estudios as $estudio)
                            <div class="custom-content-wrapper wow fadeIn a2" data-wow-delay="0.2s">
                                <h3>{{$estudio->especialidad}} - <span>{{$estudio->universidad}}</span></h3>
                                <span>{{date('d/m/Y',strtotime($estudio->fecha_inicio))}} -
                                    {{date('d/m/Y',strtotime($estudio->fecha_fin))}}</span>
                                <p style="text-align: justify;">{{$estudio->descripcion}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="section-wrapper z-depth-1">
                        <div class="custom-content col s12 m12 l12 wow fadeIn a1" data-wow-delay="0.1s">
                            <h2><i class="fa fa-briefcase"></i> Experiencias Profesionales</h2>
                            @foreach ($experiencias as $experiencia)
                            <div class="custom-content-wrapper wow fadeIn a2" data-wow-delay="0.2s">
                                <h3>{{$experiencia->cargo}} - <span>{{$experiencia->empresa}}</span></h3>
                                <span>{{date('d/m/Y',strtotime($experiencia->fecha_inicio))}} -
                                    {{date('d/m/Y',strtotime($experiencia->fecha_fin))}}</span>
                                <p style="text-align: justify;">{{$experiencia->descripcion}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="section-wrapper z-depth-1 wow fadeIn">
                        <div class="col s12 m12 l10" data-wow-delay="0.1s">
                            <h2><i class="fa fa-keyboard"></i> Mis Herramientas / Software's</h2>
                            <div class="row interests">
                                @php
                                $softwars=json_decode($softwares->softwares,true);
                                @endphp
                                @foreach ($softwars as $software)
                                <div class="col s12 m6 l4">
                                    <span>
                                        <a class="badge badge-primary">{{$software}}</a>
                                    </span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="section-wrapper z-depth-1 wow fadeIn" data-wow-delay="0.1s">
                        <div class="col s12 m12 l12 website">
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <span class="tooltipped" data-position="top" data-delay="50"
                                        data-tooltip="Pagina Web">
                                        <a href="{{$contactos->pagina_web}}" target="_blank">
                                            <i class="fa fa-globe"></i>
                                            {{$contactos->pagina_web}}
                                        </a>
                                    </span>
                                </div>
                                <div class="col col s12 m6 l6">
                                    <span class="tooltipped" data-position="top" data-delay="50"
                                        data-tooltip="Facebook">
                                        <a href="{{$contactos->facebook}}" target="_blank">
                                            <i class="fab fa-facebook"></i>
                                            {{$contactos->facebook}}
                                        </a>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m6 l6">
                                    <span class="tooltipped" data-position="top" data-delay="50"
                                        data-tooltip="Twitter"><a href="{{$contactos->twiter}}" target="_blank"><i
                                                class="fab fa-twitter"></i> {{$contactos->twitter}}</a></span>
                                </div>
                                <div class="col col s12 m6 l6">
                                    <span class="tooltipped" data-position="top" data-delay="50"
                                        data-tooltip="Instagram"><a href="{{$contactos->instagram}}" target="_blank"><i
                                                class="fab fa-instagram"></i>
                                            {{$contactos->instagram}}</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="cv-style-switch" id="switch-style">
        <a id="toggle-switcher" class="switch-button icon_tools"> <i class="fa fa-cog"></i></a>
        <div class="switched-options">
            <div class="config-title">
                Colores disponibles :
            </div>
            <ul class="styles">
                <li><a href="{{ asset('cv/css/material/colors/red.css') }}" title="Red" id="red">
                        <div class="red"></div>
                    </a></li>

                <li><a href="{{ asset('cv/css/material/colors/purple.css') }}" title="purple" id="purple">
                        <div class="purple"></div>
                    </a></li>

                <li><a href="{{ asset('cv/css/material/colors/orange.css') }}" title="orange" id="orange">
                        <div class="orange"></div>
                    </a></li>

                <li><a href="{{ asset('cv/css/material/colors/green.css') }}" title="green" id="green">
                        <div class="green"></div>
                    </a></li>

                <li><a href="{{ asset('cv/css/material/colors/lime.css') }}" title="lime" id="lime">
                        <div class="lime"></div>
                    </a></li>
            </ul>
        </div>
    </div>
    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    <script src="{{asset('cv/js/material/materialize.min.js')}}"></script>
    <!-- <script src="js/styleswitcher.js"></script> -->
    <script type="text/javascript">
        jQuery(document).ready(function($) {
                 $('.cv-style-switch').click(function() {
                    if ($(this).hasClass('open')) {
                        $(this).removeClass('open');
                        $('#switch-style').animate({
                            'right': '0'
                        });
                    } else {
                        $(this).addClass('open');
                        $('#switch-style').animate({
                            'right': '-300'
                        });
                    }
                });
                 $('.tooltipped').tooltip({
                    delay: 50
                });
                 $('#red').click(function(e) {
                    $('#temas').attr('href', $(this).attr( 'href'));
                    e.preventDefault();
                 });
                 $('#purple').click(function(e) {
                    $('#temas').attr('href', $(this).attr( 'href'));
                    e.preventDefault();
                 });
                   $('#green').click(function(e) {
                     $('#temas').attr('href', $(this).attr( 'href'));
                    e.preventDefault();
                 });
                 $('#orange').click(function(e) {
                     $('#temas').attr('href', $(this).attr( 'href'));
                    e.preventDefault();
                 });
                 $('#lime').click(function(e) {
                     $('#temas').attr('href', $(this).attr( 'href'));
                    e.preventDefault();
                 });
            });
    </script>
</body>

</html>