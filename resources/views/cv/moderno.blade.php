<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>{{config('app.name')}} | {{$usuario->name}} {{$usuario->apellidos}}</title>
    <meta name="description" content="Responsive HTML5 Resume/CV Template for Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">
    <link rel="icon" type="image/ico" href="{{asset('img/app/favicon.ico')}}">
    <link
        href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome.min.css') }}" media="all">
    <link id="theme-style" rel="stylesheet" href="{{ asset('cv/css/moderno/styles.css') }}" media="all">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar-wrapper">
            <div class="profile-container">
                <img class="profile" src="{{asset($usuario->foto??'img/usuarios/default.png')}}" alt=""
                    style="width: 100px;height: 100px; border-radius: 50%" />
                <h2 class="name">
                    {{$usuario->name.' '}}{{($usuario->apellidos==null) ? abort(403,'Permiso denegado, datos de perfil incompletos'):$usuario->apellidos}}
                </h2>
                <h3 class="tagline">{{$usuario->especialidad}}</h3>
            </div>
            <div class="container-block">
                <ul class="list-unstyled contact-list">
                    <li style="text-align: center; font-size: 20px"><i class="fa fa-user"></i></li>
                </ul>
                <p style="text-align: justify;">{{$usuario->resumen}}</p>
            </div>
            <div class="contact-container container-block">
                <h2 class="container-block-title">Contactos</h2>
                <ul class="list-unstyled contact-list">
                    <li><i class="fa fa-mobile" style="font-size: 20px"></i> <a
                            href="tel:{{$usuario->telefono}}">{{$usuario->telefono}}</a></li>
                    <li><i class="fa fa-envelope" style="font-size: 20px"></i> <a
                            href="mailto:{{$usuario->email}}">{{$usuario->email}}</a></li>
                    <li><i class="fa fa-home" style="font-size: 20px"></i> {{$usuario->direccion}}</li>
                </ul>
            </div>
            <div class="contact-container container-block">
                <h2 class="container-block-title">Mis Redes Sociales</h2>
                <ul class="list-unstyled contact-list">
                    <li class="website"><i class="fa fa-globe"></i><a href="{{$contactos->pagina_web}}"
                            target="_blank">{{$contactos->pagina_web}}</a></li>
                    <li class="linkedin"><i class="fab fa-facebook"></i><a href="{{$contactos->facebook}}"
                            target="_blank"> {{$contactos->facebook}}</a></li>
                    <li class="github"><i class="fab fa-instagram"></i><a href="{{$contactos->instagram}}"
                            target="_blank"> {{$contactos->instagram}}</a></li>
                    <li class="twitter"><i class="fab fa-twitter"></i><a href="{{$contactos->twitter}}" target="_blank">
                            {{$contactos->twitter}}</a></li>
                </ul>
            </div>
            <div class="interests-container container-block">
                <h2 class="container-block-title">Mis Herramientas / Software's</h2>
                <ul class="list-unstyled interests-list">
                    @php
                    $softwars=json_decode($softwares->softwares,true);
                    @endphp
                    @foreach ($softwars as $soft)
                    <li><i class="fa fa-check"></i> {{$soft}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="main-wrapper">
            <section class="section experiences-section">
                <h2 class="section-title"><i class="fa fa-graduation-cap"></i>Mis Estudios</h2>
                @foreach ($estudios as $estudio)
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">{{$estudio->especialidad}}</h3>
                            <div class="time">{{date('d/m/Y',strtotime($estudio->fecha_inicio))}} -
                                {{date('d/m/Y',strtotime($estudio->fecha_fin))}}</div>
                        </div>
                        <div class="company">{{$estudio->universidad}}</div>
                    </div>
                    <div class="details">
                        <p style="text-align: justify;">{{$estudio->descripcion}}</p>
                    </div>
                </div>
                @endforeach
            </section>
            <section class="section experiences-section">
                <h2 class="section-title"><i class="fa fa-briefcase"></i>Mis Experiencias</h2>
                @foreach ($experiencias as $experiencia)
                <div class="item">
                    <div class="meta">
                        <div class="upper-row">
                            <h3 class="job-title">{{$experiencia->cargo}}</h3>
                            <div class="time">{{date('d/m/Y',strtotime($experiencia->fecha_inicio))}} -
                                {{date('d/m/Y',strtotime($experiencia->fecha_fin))}}</div>
                        </div>
                        <div class="company">{{$experiencia->empresa}}</div>
                    </div>
                    <div class="details">
                        <p style="text-align: justify;">{{$experiencia->descripcion}}</p>
                    </div>
                </div>
                @endforeach
            </section>
            <section class="skills-section section">
                <h2 class="section-title"><i class="fa fa-shield-alt"></i>Mis Habilidades</h2>
                <div class="skillset">
                    @foreach ($habilidades as $habilidad)
                    <div class="item">
                        <h3 class="level-title">{{$habilidad->habilidad}} <small>{{$habilidad->nivel}}%</small></h3>
                        <div class="level-bar">
                            <div class="level-bar-inner" style="width:{{$habilidad->nivel}}%">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
    <footer class="footer">
        <div class="text-center">
            <small class="copyright">&copy; <?php echo date('Y'); ?> | Diseñado por <a
                    href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> para
                desarrolladores</small>
        </div>
    </footer>
</body>

</html>