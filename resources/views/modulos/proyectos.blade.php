@extends('plantilla')
@section('titulo','Mis Proyectos')

@section('contenido')
<div class="row">
    <div class="card">
        <div class="card-header card-header-icon card-header-rose">
            <div class="card-icon">
                <i class="material-icons">
                    perm_media
                </i>
            </div>
            <h4 class="card-title">
                Mis Proyectos
            </h4>
            <button class="btn btn-primary float-right" data-target="#nuevoProyecto" data-toggle="modal">
                <i class="material-icons">
                    add
                </i>
                Agregar proyecto
            </button>
        </div>
        <div class="card-body">
        </div>
    </div>
</div>
<div class="row">

    @foreach ($proyectos as $proyecto)
    <div class="col-md-4">
        <div class="card card-product">
            <div class="card-header card-header-image" data-header-animation="true">
                <a href="#pablo">
                    <img class="img" src="{{ asset($proyecto->foto ?? 'img/proyectos/default.jpg') }}">
                    </img>
                </a>
            </div>
            <div class="card-body">
                <div class="card-actions text-center">
                    <button class="btn btn-danger btn-link fix-broken-card" type="button">
                        <i class="material-icons">
                            build
                        </i>
                        Colocar imagen
                    </button>
                    <a class="btn btn-info btn-link" data-placement="bottom" href="{{$proyecto->url}}" rel="tooltip" target="_blank" title="Visitar Proyecto">
                        <i class="material-icons">
                            link
                        </i>
                    </a>
                    <a class="btn btn-success btn-link" data-placement="bottom" href="{{route('proyectos.show',$proyecto->id_proyecto)}}" rel="tooltip" title="Editar">
                        <i class="material-icons">
                            edit
                        </i>
                    </a>
                    <a class="btn btn-danger btn-link btn_eliminar" data-placement="bottom" href="{{route('proyectos.destroy',$proyecto->id_proyecto)}}" rel="tooltip" title="Eliminar" data-form="form{{$proyecto->id_proyecto}}">
                        <i class="material-icons">
                            delete
                        </i>
                    </a>
                    <form id="form{{$proyecto->id_proyecto}}"
                        action="{{ route('proyectos.destroy',$proyecto->id_proyecto) }}" method="post"
                        accept-charset="utf-8" style="display: none;">
                        @method('DELETE')
                        @csrf
                    </form>
                </div>
                <h4 class="card-title">
                    <a href="#pablo">
                        {{$proyecto->titulo}}
                    </a>
                </h4>
                <div class="card-description">
                    {{$proyecto->descripcion}}
                </div>
            </div>
            <div class="card-footer">
                <div class="price">
                    <h4>
                        {{date('d/m/Y',strtotime($proyecto->fecha))}}
                    </h4>
                </div>
                <div class="stats">
                    <p class="card-category">
                        <i class="material-icons">
                            place
                        </i>
                        {{$proyecto->lugar}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{-- new proyecto --}}
<div aria-hidden="true" aria-labelledby="nuevoProyecto" class="modal fade" id="nuevoProyecto" role="dialog" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('proyectos.store')}}" class="form" id="formNuevoProyecto" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">
                        Nuevo proyecto
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        <i class="material-icons">
                            clear
                        </i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class=" form-group fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="max-width: 100%">
                                    <img class="img_foto" alt="Proyecto" src="{{asset('img/proyectos/default.jpg')}}"/>
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100%">
                                </div>
                                <div>
                                	<small class="text-muted d-block w-100">Tamaño: 1200 x 764 - Max:1MB</small>
                                    <span class="btn btn-rose btn-round btn-file btn-block">
                                        <span class="fileinput-new">
                                            Seleccionar imagen
                                        </span>
                                        <span class="fileinput-exists">
                                            Cambiar
                                        </span>
                                        <input type="file" name="foto" id="foto"/>
                                    </span>
                                    <a class="btn btn-danger btn-round fileinput-exists btn-block" data-dismiss="fileinput" href="#pablo">
                                        <i class="fa fa-times">
                                        </i>
                                        Eliminar
                                    </a>
                                </div>
                                @error('foto')
                                <label for="foto" class="error" id="foto_titulo">{{$message}}</label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating" for="titulo">Titulo</label>
                        <input class="form-control" id="titulo" name="titulo" type="text" value="{{old('titulo')}}" autofocus="true" />
                        @error('titulo')
                        <label class="error" for="titulo" id="titulo-error">
                            {{$errors->first('titulo')}}
                        </label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating" for="pagina_web">
                            Pigina web / Artículo
                        </label>
                        <input class="form-control" id="pagina_web" name="pagina_web" type="text" value="{{old('pagina_web')}}">
                        @error('pagina_web')
                        <label class="error" for="pagina_web" id="pagina_web-error">
                            {{$errors->first('pagina_web')}}
                        </label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating" for="lugar">
                            Lugar / Ciudad
                        </label>
                        <input class="form-control" id="lugar" name="lugar" type="text" value="{{old('lugar')}}">
                        @error('lugar')
                        <label class="error" for="lugar" id="lugar-error">
                            {{$errors->first('lugar')}}
                        </label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating" for="fecha">
                            Fecha
                        </label>
                        <input class="form-control datepicker" id="fecha" name="fecha" type="text" value="{{old('fecha')}}">
                        @error('fecha')
                        <label class="error" for="fecha" id="fecha-error">
                            {{$errors->first('fecha')}}
                        </label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="bmd-label-floating" for="descripcion">
                            Descripción
                        </label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="5">{{old('descripcion')}}</textarea>
                        @error('descripcion')
                        <label class="error" for="descripcion" id="descripcion-error">
                            {{$errors->first('descripcion')}}
                        </label>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger btn-link" data-dismiss="modal" type="button">
                        Cancelar
                    </button>
                    <button class="btn btn-primary" type="submit">
                        Agregar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
	@if (isset($status))
		@if ($status==200)
			{{-- new proyecto --}}
			<div aria-hidden="true" aria-labelledby="editarProyecto" class="modal fade" id="editarProyecto" role="dialog" tabindex="-1">
			    <div class="modal-dialog">
			        <div class="modal-content">
			            <form action="{{route('proyectos.update',$project->id_proyecto)}}" class="form" id="formEditarProyecto" method="post" enctype="multipart/form-data" >
			            	@method('PUT')
			                @csrf
			                <div class="modal-header">
			                    <h4 class="modal-title">
			                        Editar proyecto
			                    </h4>
			                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
			                        <i class="material-icons">
			                            clear
			                        </i>
			                    </button>
			                </div>
			                <div class="modal-body">
			                    <div class="row">
			                        <div class="col-md-12">
			                            <div class=" form-group fileinput fileinput-new text-center" data-provides="fileinput">
			                                <div class="fileinput-new thumbnail" style="max-width: 100%">
			                                    <img class="img_foto" alt="Proyecto" src="{{asset($project->foto)}}"/>
			                                </div>
			                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 100%">
			                                </div>
			                                <div>
			                                	<small class="text-muted d-block w-100">Tamaño: 1200 x 764 - Max:1MB</small>
			                                    <span class="btn btn-rose btn-round btn-file btn-block">
			                                        <span class="fileinput-new">
			                                            Seleccionar imagen
			                                        </span>
			                                        <span class="fileinput-exists">
			                                            Cambiar
			                                        </span>
			                                        <input type="file" name="foto" id="foto"/>
			                                        <input type="hidden" name="foto_actual" value="{{$project->foto}}">
			                                    </span>
			                                    <a class="btn btn-danger btn-round fileinput-exists btn-block" data-dismiss="fileinput" href="#pablo">
			                                        <i class="fa fa-times">
			                                        </i>
			                                        Eliminar
			                                    </a>
			                                </div>
			                                @error('foto')
			                                <label for="foto" class="error" id="foto_titulo">{{$message}}</label>
			                                @enderror
			                                @error('foto_actual')
			                                <label for="foto_actual" class="error" id="foto_actual_titulo">{{$message}}</label>
			                                @enderror
			                            </div>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label class="bmd-label-floating" for="titulo">Titulo</label>
			                        <input class="form-control" id="titulo" name="titulo" type="text" value="{{old('titulo')??$project->titulo}}" autofocus="true" />
			                        @error('titulo')
			                        <label class="error" for="titulo" id="titulo-error">
			                            {{$errors->first('titulo')}}
			                        </label>
			                        @enderror
			                    </div>
			                    <div class="form-group">
			                        <label class="bmd-label-floating" for="pagina_web">
			                            Pigina web / Artículo
			                        </label>
			                        <input class="form-control" id="pagina_web" name="pagina_web" type="text" value="{{old('pagina_web')??$project->url}}">
			                        @error('pagina_web')
			                        <label class="error" for="pagina_web" id="pagina_web-error">
			                            {{$errors->first('pagina_web')}}
			                        </label>
			                        @enderror
			                    </div>
			                    <div class="form-group">
			                        <label class="bmd-label-floating" for="lugar">
			                            Lugar / Ciudad
			                        </label>
			                        <input class="form-control" id="lugar" name="lugar" type="text" value="{{old('lugar')??$project->lugar}}">
			                        @error('lugar')
			                        <label class="error" for="lugar" id="lugar-error">
			                            {{$errors->first('lugar')}}
			                        </label>
			                        @enderror
			                    </div>
			                    <div class="form-group">
			                        <label class="bmd-label-floating" for="fecha">
			                            Fecha
			                        </label>
			                        <input class="form-control datepicker" id="fecha" name="fecha" type="text" value="{{old('fecha')??date('d-m-Y',strtotime($project->fecha))}}">
			                        @error('fecha')
			                        <label class="error" for="fecha" id="fecha-error">
			                            {{$errors->first('fecha')}}
			                        </label>
			                        @enderror
			                    </div>
			                    <div class="form-group">
			                        <label class="bmd-label-floating" for="descripcion">
			                            Descripción
			                        </label>
			                        <textarea class="form-control" id="descripcion" name="descripcion" rows="5">{{old('descripcion')??$project->descripcion}}</textarea>
			                        @error('descripcion')
			                        <label class="error" for="descripcion" id="descripcion-error">
			                            {{$errors->first('descripcion')}}
			                        </label>
			                        @enderror
			                    </div>
			                </div>
			                <div class="modal-footer">
			                    <button class="btn btn-danger btn-link" data-dismiss="modal" type="button">
			                        Cancelar
			                    </button>
			                    <button class="btn btn-primary" type="submit">
			                        Actualizar
			                    </button>
			                </div>
			            </form>
			        </div>
			    </div>
			</div>
		@endif
	@endif
@endsection

@section('js')
@parent
<script src="{{ asset('js/proyectos.js') }}" type="text/javascript" charset="utf-8" async defer></script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('.datepicker').datetimepicker({
            format: 'DD-MM-YYYY',
            locale:'es',
            icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
            }
        });
    });
    @if (!isset($status))
    	@if ($errors->any())
    		$('#nuevoProyecto').modal();
		@endif
    @endif

	@if (isset($status))
		@if ($status==200)
			$('#editarProyecto').modal();
		@endif
	@endif
	{{-- save --}}
	@if (session('save-success-proyecto'))
	    swal({
	title: '¡Buen trabajo!',
	text: '{{session("save-success-proyecto")}}',
	buttonsStyling: false,
	confirmButtonClass: 'btn btn-success',
	type: 'success'
	}).catch(swal.noop);
	@endif

	@if (session('save-error-proyecto'))
	    swal({
	title: '¡Ups, algo salio mal!',
	text: '{{session("save-error-proyecto")}}',
	buttonsStyling: false,
	confirmButtonClass: 'btn btn-danger',
	type: 'danger'
	}).catch(swal.noop);
	@endif

	{{-- update --}}
	@if (session('succes-update-proyecto'))
	swal({
	title: '¡Buen trabajo!',
	text: '{{session("succes-update-proyecto")}}',
	buttonsStyling: false,
	confirmButtonClass: 'btn btn-success',
	type: 'success'
	}).catch(swal.noop);
	@endif

	@if (session('error-update-proyecto'))
	swal({
	title: '¡Ups, algo salio mal!',
	text: '{{session("error-update-proyecto")}}',
	buttonsStyling: false,
	confirmButtonClass: 'btn btn-danger',
	type: 'danger'
	}).catch(swal.noop);
	@endif
	{{-- delete --}}
	$(document).on('click','.btn_eliminar',function(e){
	    e.preventDefault();
	    const formulario=$(this).attr('data-form');
	    swal({
	        title: '¿Esta seguro de eliminar?',
	        text: "Una ves eliminado su Proyecto no hay marcha atras",
	        type: 'question',
	        showCancelButton: true,
	        confirmButtonClass: 'btn btn-success',
	        cancelButtonClass: 'btn btn-danger',
	        confirmButtonText: 'Si, Eliminar!',
	        cancelButtonText: 'Cancelar',
	    }).then(function(result){
	        if(result.value){
	            $('#'+formulario).submit();
	        }else {
	            console.log('Ha cancelado la eliminación');
	        }

	    }).catch(swal.noop);

	});
	@if (session('success-delete-proyecto'))
	swal({
	title: '¡Buen trabajo!',
	text: '{{session("success-delete-proyecto")}}',
	buttonsStyling: false,
	confirmButtonClass: 'btn btn-success',
	type: 'success'
	}).catch(swal.noop);
	@endif

	@if(session('error-delete-proyecto'))
	swal({
	title: '¡Ups, algo salio mal!',
	text: '{{session("error-delete-proyecto")}}',
	buttonsStyling: false,
	confirmButtonClass: 'btn btn-danger',
	type: 'danger'
	}).catch(swal.noop)
	@endif

	@if(session('null-delete-habilidad'))
	swal({
	title: '¡Ups, algo salio mal!',
	text: '{{session("null-delete-proyecto")}}',
	buttonsStyling: false,
	confirmButtonClass: 'btn btn-danger',
	type: 'danger'
	}).catch(swal.noop)
	@endif
</script>
@endsection