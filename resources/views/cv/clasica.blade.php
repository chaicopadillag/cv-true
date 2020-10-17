<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>{{config('app.name')}} | {{$usuario->name}} {{$usuario->apellidos}}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="{{ asset('cv/css/clasica/bootstrap.min.css') }}" rel="stylesheet" media="all">
	<link href="{{ asset('cv/css/clasica/style.css') }}" rel="stylesheet" media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome.min.css') }}" media="all">
	<link rel="icon" type="image/ico" href="{{asset('img/app/favicon.ico')}}">
</head>

<body>
	<section class="container">
		<header class="row-fluid">
			<div class="title span7">
				<img class="perfil" src="{{asset($usuario->foto??'img/usuarios/default.png')}}"
					title="{{$usuario->name.' '}}{{($usuario->apellidos==null) ? abort(403,'Permiso denegado, datos de perfil incompletos'):$usuario->apellidos}}"
					alt="Mi Perfil" />
				<h1 style="font-size: 30px">
					{{$usuario->name.' '}}{{($usuario->apellidos==null) ? abort(403,'Permiso denegado, datos de perfil incompletos'):$usuario->apellidos}}
				</h1>
				<h2 style="font-size: 20px;font-style: italic; ">{{$usuario->especialidad}}</h2>
			</div>
			<div class="social offset1 span4">
				<ul>
					<li><i class="fa fa-mobile"></i> <a href="tel:{{$usuario->telefono}}">{{$usuario->telefono}}</a>
					</li>
					<li><i class=" fa fa-envelope"></i> <a href="mailto:{{$usuario->email}}">{{$usuario->email}}</a>
					</li>
					<li><i class="fa fa-home"></i> {{$usuario->direccion}}</li>
					<li>
						<a href="{{$contactos->twitter}}" target="_blank"><i class=" fab fa-twitter"></i></a>
						<a href="{{$contactos->facebook}}" target="_blank"><i class=" fab fa-facebook"></i></a>
						<a href="{{$contactos->instagram}}" target="_blank"><i class=" fab fa-instagram"></i></a>
						<a href="{{$contactos->linkedin}}" target="_blank"><i class=" fab fa-linkedin"></i></a>
					</li>
				</ul>
			</div>
		</header>
		<article class="row-fluid">
			<header class="span3">
				<h3>Mi Resumen</h3>
			</header>
			<div class="span9 ">
				<p class="welcome">{{$usuario->resumen}}</p>
			</div>
		</article>
		<article class="row-fluid">
			<header class="span3">
				<h3>Mis Habilidades</h3>
			</header>
			<div class="span9">
				<div class="row-fluid skills">
					@foreach ($habilidades as $habilidad)
					<div class="progress progress-info">
						<div class="bar" style="text-align: left; padding-left: 10px; width:{{$habilidad->nivel}}%">
							{{$habilidad->habilidad}} {{$habilidad->nivel}}%</div>
					</div>
					@endforeach
				</div>
			</div>
		</article>
		<article class="row-fluid">
			<header class="span3">
				<h3>Mis Estudios</h3>
			</header>
			<div class="span9">
				@foreach ($estudios as $estudio)
				<h4>{{$estudio->universidad}} - <small class="text-danger">{{$estudio->especialidad}}</small></h4>
				<h5 class="text-muted">{{date('d/m/Y',strtotime($estudio->fecha_inicio))}} -
					{{date('d/m/Y',strtotime($estudio->fecha_fin))}}</h5>
				<p style="text-align: justify;">{{$estudio->descripcion}}</p>
				@endforeach

			</div>
		</article>
		<article class="row-fluid">
			<header class="span3">
				<h3>Mis Experiencias</h3>
			</header>
			<div class="span9">
				@foreach ($experiencias as $experiencia)
				<h4>{{$experiencia->cargo}} - <small class="text-danger">{{$experiencia->empresa}}</small></h4>
				<h5 class="text-muted">{{date('d/m/Y',strtotime($experiencia->fecha_inicio))}} -
					{{date('d/m/Y',strtotime($experiencia->fecha_fin))}}</h5>
				<p style="text-align: justify;">{{$experiencia->descripcion}}</p>
				@endforeach
			</div>
		</article>
		<article class="row-fluid">
			<header class="span3">
				<h3>Mis Herramientas / Software's</h3>
			</header>
			<div class="span9">
				@php
				$softwars=json_decode($softwares->softwares,true);
				@endphp
				@foreach ($softwars as $soft)
				<h4>{{$soft}}</h4>
				@endforeach
			</div>
		</article>
	</section>
</body>

</html>