<!DOCTYPE html>
<html lang="es">

<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="viewport"
		content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="ninodezign.com, ninodezign@gmail.com">
	<meta name="copyright" content="ninodezign.com">
	<title>{{config('app.name')}} | {{$usuario->name}} {{$usuario->apellidos}}</title>
	<link rel="icon" type="image/ico" href="{{asset('img/app/favicon.ico')}}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" media="all" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/fontawesome.min.css') }}" media="all">
	<link rel="stylesheet" type="text/css" href="{{ asset('cv/css/dark/template.css') }}" media="all" />
</head>

<body>
	<div id="nino-cvWrap">
		<div layout="row" class="fw">
			<div id="nino-leftSide" class="fsr">
				<div layout="row" class="fw">
					<header class="col-md-12 col-sm-6 col-xs-12">
						<img src="{{asset($usuario->foto??'img/usuarios/default.png')}}" alt="Avatar" class="avatar">
						<h1 class="name">
							{{$usuario->name.' '}}{{($usuario->apellidos==null) ? abort(403,'Permiso denegado, datos de perfil incompletos'):$usuario->apellidos}}
						</h1>
						<h3 class="regency">{{$usuario->especialidad}}</h3>
					</header>
					<section class="nino-aboutMe col-md-12 col-sm-6 col-xs-12">
						<h2 class="nino-sectionHeading">
							<i class="mdi mdi-account fa fa-user nino-icon"></i> Mi Resumen
						</h2>
						<div class="nino-sectionContent">
							<p style="text-align: justify;">{{$usuario->resumen}}</p>
						</div>
					</section>
					<section class="nino-contactInfo col-md-12 col-sm-6 col-xs-12">
						<h2 class="nino-sectionHeading">
							<i class="mdi mdi-contact-mail fa fa-book nino-icon"></i>Contactos
						</h2>
						<ul class="nino-listWithIcon">
							<li layout="row">
								<div class="fsr">
									<i class="mdi mdi-map-marker fa fa-home nino-icon"></i>
								</div>
								<div class="fg">
									{{$usuario->direccion}}
								</div>
							</li>
							<li layout="row">
								<div class="fsr">
									<i class="mdi mdi-email fa fa-envelope nino-icon"></i>
								</div>
								<div class="fg">
									<a style="color: #fff" href="mailto:{{$usuario->email}}">{{$usuario->email}}</a>
								</div>
							</li>
							<li layout="row">
								<div class="fsr">
									<i class="mdi mdi-cellphone-iphone fa fa-mobile nino-icon"></i>
								</div>
								<div class="fg">
									<a style="color: #fff" href="tel:{{$usuario->telefono}}">{{$usuario->telefono}}</a>
								</div>
							</li>
						</ul>
					</section>
					<section class="nino-mySkill col-md-12 col-sm-6 col-xs-12">
						<h2 class="nino-sectionHeading">
							<i class="mdi mdi-trophy-award fa fa-shield-alt nino-icon"></i>
							Mis Habilidades
						</h2>
						<ul class="nino-listWithIcon">
							@foreach ($habilidades as $habilidad)
							<li layout="row">
								<div class="fg">
									<p>{{$habilidad->habilidad}} <small>{{$habilidad->nivel}}%</small></p>
									<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="60"
											aria-valuemin="0" aria-valuemax="100" style="width:{{$habilidad->nivel}}%;">
											<span class="sr-only">{{$habilidad->nivel}}% Completado</span>
										</div>
									</div>
								</div>
							</li>
							@endforeach
						</ul>
					</section>
				</div>
			</div>
			<div id="nino-rightSide" class="fg">
				<main id="nino-mainContent">
                    <section>
						<h2 class="nino-sectionHeading">
							<i class="mdi mdi-briefcase fa fa-briefcase nino-icon"></i> Mi Experiencia
						</h2>
						<div class="nino-sectionContent">
							<div class="inner">
								@foreach ($experiencias as $experiencia)
								<article>
									<h6 class="nino-articleTitle">{{$experiencia->cargo}}</h6>
									<div class="nino-articleMeta">
										<span><i class="mdi mdi-domain nino-icon"></i>{{$experiencia->empresa}}</span>
										<span><i
												class="mdi mdi-calendar-text nino-icon"></i>{{date('d/m/Y',strtotime($experiencia->fecha_inicio))}}
											- {{date('d/m/Y',strtotime($experiencia->fecha_fin))}}</span>
									</div>
									<div class="nino-articleContent" style="text-align: justify;">
										{{$experiencia->descripcion}}
									</div>
								</article>
								@endforeach
							</div>
						</div>
					</section>
					<section>
						<h2 class="nino-sectionHeading">
							<i class="mdi mdi-school fa fa-graduation-cap nino-icon"></i> Mi Educación
						</h2>
						<div class="nino-sectionContent">
							<div class="inner">
								@foreach ($estudios as $estudio)
								<article>
									<h3 class="nino-articleTitle">{{$estudio->especialidad}}</h3>
									<div class="nino-articleMeta">
										<span><i
												class="mdi mdi-hospital-building nino-icon"></i>{{$estudio->universidad}}</span>
										<span><i
												class="mdi mdi-calendar-text nino-icon"></i>{{date('d/m/Y',strtotime($estudio->fecha_inicio))}}
											- {{date('d/m/Y',strtotime($estudio->fecha_fin))}}</span>
									</div>
									<div class="nino-articleContent" style="text-align: justify;">
										{{$estudio->descripcion}}
									</div>
								</article>
								@endforeach
							</div>
						</div>
					</section>
					<section>
						<h2 class="nino-sectionHeading">
							<i class="mdi mdi-web fa fa-keyboard nino-icon"></i>Mis Herramientas / Software's
						</h2>
						<div class="nino-sectionContent">
							<div class="inner">
								<div class="row nino-languages">
									@php
									$softwars=json_decode($softwares->softwares,true);
									@endphp
									@foreach ($softwars as $soft)
									<div class="col-md-6">
										<p class="languageName text-left"><i class="fa fa-check text-muted"></i>
											{{$soft}}</p>
									</div>
									@endforeach

								</div>
							</div>
						</div>
					</section>
				</main>
			</div>
		</div>
	</div>
</body>

</html>
