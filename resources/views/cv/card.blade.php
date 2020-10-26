<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/ico" href="{{asset('img/app/favicon.ico')}}">
    <title>{{config('app.name')}} | {{$usuario->name}} {{$usuario->apellidos}}</title>
    <meta name="description" content="CV, Portafolio, Resumen">
    <meta name="author" content="Gerardo Chaico Padilla">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome.min.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('cv/css/card/card.css') }}" media="all" id="thema">
</head>

<body>
    <div class="hoja" id="hoja">
        <div class="izquierda">
            <div class="info">
                <figure>
                    <img src="{{asset($usuario->foto??'img/usuarios/default.png')}}">
                    <figcaption>
                        <h1 class="nombre">
                            {{$usuario->name.' '}}{{($usuario->apellidos==null) ? abort(403,'Permiso denegado, datos de perfil incompletos'):$usuario->apellidos}}
                        </h1>
                        <h2 class="trabajo">{{$usuario->especialidad}}</h2>
                        <p class="descripcion">{{$usuario->resumen}}</p>
                    </figcaption>
                </figure>
            </div>
            <div class="contacto">
                <h2 class="titulo-contact">Contactos</h2>
                <ul class="lista-contacto">
                    <li class="icono"><i class="fa fa-mobile"></i></li>
                    <li><a href="tel:{{$usuario->telefono}}">{{$usuario->telefono}}</a></li>
                    <li class="icono"><i class="fa fa-envelope"></i></li>
                    <li><a href="mailto:{{$usuario->email}}">{{$usuario->email}}</a></li>
                    <li class="icono"><i class="fa fa-globe"></i></li>
                    <li><a href="{{$contactos->pagina_web}}" target="_blank">{{$contactos->pagina_web}}</a></li>
                    <li class="icono"><i class="fa fa-home"></i></li>
                    <li>{{$usuario->direccion}}</li>
                </ul>
                <ul class="lista-redes">
                    <li class="icono-redes"><a href="{{$contactos->facebook}}" class="fab fa-facebook"
                            target="_blank"></a>
                    </li>
                    <li class="icono-redes"><a href="{{$contactos->instagram}}" class="fab fa-instagram"
                            target="_blank"></a></li>
                    <li class="icono-redes"><a href="{{$contactos->twitter}}" class="fab fa-twitter"
                            target="_blank"></a>
                    </li>
                    <li class="icono-redes"><a href="{{$contactos->linkedin}}" class="fab fa-linkedin"
                            target="_blank"></a></li>
                </ul>
            </div>
            <div class="hobies">
                <h2 class="titulo-hobies">Mis Herramientas / Software</h2>
                <ul class="lista-hobies">
                    @php
                    $softwars=json_decode($softwares->softwares,true);
                    @endphp
                    @foreach ($softwars as $soft)
                    <li><i class="fa fa-check"></i> {{$soft}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="derecha">
            <div class="block-info">
                <h2 class="titulo-block"><i class="fa fa-graduation-cap"></i> Mi Formación Profesional</h2>
                <ul class="lista-block">
                    @foreach ($estudios as $estudio)
                    <li class="item-block">
                        <div class="block-iz">
                            <h2 class="anio">{{date('d/m/Y',strtotime($estudio->fecha_inicio))}} -
                                {{date('d/m/Y',strtotime($estudio->fecha_fin))}}</h2>
                            <h3 class="sub-titulo">{{$estudio->especialidad}}</h3>
                        </div>
                        <div class="block-der">
                            <h2 class="subtitulo-der">{{$estudio->universidad}}</h2>
                            <p class="desc">{{$estudio->descripcion}}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="block-info">
                <h2 class="titulo-block"><i class="fa fa-briefcase"></i> Mis Experiencias Profesionales</h2>
                <ul class="lista-block">
                    @foreach ($experiencias as $experiencia)
                    <li class="item-block">
                        <div class="block-iz">
                            <h2 class="anio">{{date('d/m/Y',strtotime($experiencia->fecha_inicio))}} -
                                {{date('d/m/Y',strtotime($experiencia->fecha_fin))}}</h2>
                            <h3 class="sub-titulo">{{$experiencia->cargo}}</h3>
                        </div>
                        <div class="block-der">
                            <h2 class="subtitulo-der">{{$experiencia->empresa}}</h2>
                            <p class="desc">{{$experiencia->descripcion}}</p>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="block-info">
                <h2 class="titulo-block"><i class="fa fa-shield-alt"></i> Mis Habilidades</h2>
                <ul class=" lista-block">
                    @foreach ($habilidades as $habilidad)
                    <li class="item-block">
                        <h2 class="nombr-hab">{{$habilidad->habilidad}}<small>{{$habilidad->nivel}}%</small></h2>
                        <div class="barra">
                            <span class="progreso" style="width:{{$habilidad->nivel}}%"></span>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="config" id="config">
        <i class="fa fa-cog" id="btn-color"></i>
        <ul id="colores" class="colores">
            <li class="active"><a class="original" href="{{ asset('cv/css/card/card.css') }}" title="Original"></a></li>
            <li><a class="color morado" href="{{ asset('cv/css/card/morado.css') }}" title="Naranaja"></a></li>
            <li><a class="color celeste" href="{{ asset('cv/css/card/celeste.css') }}" title="Celeste"></a></li>
            <li><a class="color rojo" href="{{ asset('cv/css/card/rojo.css') }}" title="Rojo"></a></li>
            <li><a class="color sublime" href="{{ asset('cv/css/card/sublime.css') }}" title="Sublime"></a></li>
            <li><a class="color rosado" href="{{ asset('cv/css/card/rosado.css') }}" title="Rosado"></a></li>
            <li><a class="color verde" href="{{ asset('cv/css/card/verde.css') }}" title="Verde"></a></li>
        </ul>
    </div>
    <script type="text/javascript" src="{{ asset('js/core/jquery.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {

        $('#btn-color').click(function() {
			var config=$('#colores');
           if(config.hasClass('abrir')){
           	config.removeClass('abrir');
           }else {
           	config.addClass('abrir');
           }
        });
        $('#colores li a').click(function (e) {
        	e.preventDefault();
        	var estilo=$(this).attr('href');
        	$('#colores li').removeClass('active');
        	$('#thema').attr('href', estilo);
        	$(this).parent('li').addClass('active');
        });

    });
    </script>
</body>

</html>
