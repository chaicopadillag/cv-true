@extends('plantilla')
@section('titulo','Mi Perfil')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-10 col-sm-12">
        <div class="card">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">person</i>
                </div>
                <h4 class="card-title d-inline-block">Mi Perfil - <small class="category">Completa tus datos
                        personales</small></h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('usuarios.update',$user->id)}}" enctype="multipart/form-data"
                    name="form_perfil" id="form_perfil" class="form">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class=" form-group fileinput fileinput-new text-center" data-provides="fileinput">
                                <div class="fileinput-new thumbnail img-circle">
                                    <img src="{{$user->foto??asset('img/usuarios/default.png')}}" alt="Foto de perfil"
                                        class="img_foto">
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                                <div class="d-flex flex-wrap justify-content-center">
                                    <small class="text-muted d-block w-100">Tamaño: Min.512x512 - Max.764x764
                                        1MB</small>
                                    <span class="btn btn-round btn-rose btn-file btn-block">
                                        <span class="fileinput-new">Agregar foto</span>
                                        <span class="fileinput-exists">Cambiar</span>
                                        <input type="file" name="foto" id="foto" />
                                    </span>
                                    <br />
                                    <a href="#" class="btn btn-danger btn-round fileinput-exists btn-block"
                                        data-dismiss="fileinput"><i class="material-icons">delete_forever</i> Quitar</a>
                                </div>
                                @error('foto')
                                <label for="foto" class="error">{{$message}}</label>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Nombres</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{  old('name') ?? $user->name }}">
                                        @error('name')
                                        <label id="name-error" class="error"
                                            for="name">{{$errors->first('name')}}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Apellidos</label>
                                        <input type="text" class="form-control" name="apellidos" id="apellidos"
                                            value="{{old('apellidos')??$user->apellidos}}">
                                        @error('apellidos')
                                        <label id="apellidos-error" class="error"
                                            for="apellidos">{{$errors->first('apellidos')}}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Correo electrónico</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{old('email')??$user->email}}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Especialidad</label>
                                        <input type="text" class="form-control" name="especialidad" id="especialidad"
                                            value="{{old('especialidad')??$user->especialidad}}">
                                        @error('especialidad')
                                        <label id="especialidad-error" class="error"
                                            for="especialidad">{{$errors->first('especialidad')}}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Dirección</label>
                                        <input type="text" class="form-control" name="direccion" id="direccion"
                                            value="{{old('direccion')??$user->direccion}}">
                                        @error('direccion')
                                        <label id="direccion-error" class="error"
                                            for="direccion">{{$errors->first('direccion')}}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Teléfono movil</label>
                                        <input type="tel" class="form-control" name="telefono" id="telefono"
                                            value="{{old('telefono')??$user->telefono}}">
                                        @error('telefono')
                                        <label id="telefono-error" class="error"
                                            for="telefono">{{$errors->first('telefono')}}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Ciudad</label>
                                        <input type="text" class="form-control" name="ciudad" id="ciudad"
                                            value="{{old('ciudad')??$user->ciudad}}">
                                        @error('ciudad')
                                        <label id="ciudad-error" class="error"
                                            for="ciudad">{{$errors->first('ciudad')}}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Pais</label>
                                        <input type="text" class="form-control" name="pais" id="pais"
                                            value="{{old('pais')??$user->pais}}">
                                        @error('pais')
                                        <label id="pais-error" class="error"
                                            for="pais">{{$errors->first('pais')}}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class="form-group">
                                <label class="form-check-label">Género</label>
                                @error('genero')
                                <label id="genero-error" class="error" for="genero">{{$errors->first('genero')}}</label>
                                @enderror
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="genero" value="1" id="genero"
                                        {{$user->genero==1 ? 'checked' : ''}}>
                                    Másculino
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="genero" value="2" id="genero"
                                        {{$user->genero==2 ? 'checked' : ''}}>
                                    Femenino
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Edad</label>
                                        <input type="text" class="form-control" name="edad" id="edad"
                                            value="{{old('edad')??$user->edad}}">
                                        @error('edad')
                                        <label id="edad-error" class="error"
                                            for="edad">{{$errors->first('edad')}}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Estado civil</label>
                                        <input type="text" class="form-control" name="estado_civil" id="estado_civil"
                                            value="{{old('estado_civil')??$user->estado_civil}}">
                                        @error('estado_civil')
                                        <label id="estado_civil-error" class="error"
                                            for="estado_civil">{{$errors->first('estado_civil')}}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="bmd-label-floating">Frase</label>
                                        <input type="text" class="form-control" name="frase" id="frase"
                                            value="{{old('frase')??$user->frase}}">
                                        @error('frase')
                                        <label id="frase-error" class="error"
                                            for="frase">{{$errors->first('frase')}}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Resumen</label>
                                <textarea class="form-control" name="resumen" id="resumen" cols="30"
                                    rows="10">{{old('resumen')??$user->resumen}}</textarea>
                                @error('resumen')
                                <label id="resumen-error" class="error"
                                    for="resumen">{{$errors->first('resumen')}}</label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-rose float-right">Actualizar perfil</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- script --}}
@section('js')
@parent
<script src="{{asset('js/perfil.js')}}"></script>
<script type="text/javascript">
    @if(session('perfil-save-success'))
    swal({
        title: '¡Buen trabajo!',
        text: '{{session("perfil-save-success")}}',
        buttonsStyling: false,
        confirmButtonClass: 'btn btn-success',
        type: 'success'
        }).catch(swal.noop);
@endif

@if(session('perfil-save-error'))
    swal({
        title: '¡Ups, algo salio mal!',
        text: '{{session("perfil-save-error")}}',
        buttonsStyling: false,
        confirmButtonClass: 'btn btn-danger',
        type: 'danger'
        }).catch(swal.noop);
@endif
</script>
@endsection
{{-- fin script --}}
