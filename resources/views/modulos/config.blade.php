@extends('plantilla')
@section('titulo','Configuración')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-10 col-sm-12">
        <div class="card">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">settings</i>
                </div>
                <h4 class="card-title d-inline-block">Configuración - <small class="category">configura tu perfil en {{config('app.name')}}</small></h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('updateconfig',$user->id) }}" enctype="multipart/form-data"
                    name="form_config" id="form_config" class="form">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Nombres</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="{{  old('name') ?? $user->name }}" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Apellidos</label>
                                <input type="text" class="form-control" name="apellidos" id="apellidos"
                                    value="{{old('apellidos')??$user->apellidos}}" disabled>
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
                                <label class="bmd-label-floating text-info">Link de Usuario en {{config('app.name')}}</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text text-info" id="usuario_url" style="padding: 0px 0px">{{env('APP_URL')}}</span>
                                    </div>
                                    <input type="text" class="form-control" name="url_usuario" id="url_usuario"
                                        value="{{old('url_usuario')??$user->url_usuario}}" ria-describedby="usuario_url">
                                </div>
                                @error('url_usuario')
                                <label id="url_usuario-error" class="error"
                                    for="url_usuario">{{$errors->first('url_usuario')}}</label>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Modelo de CV</label>
                            @error('cv')
                            <label id="cv-error" class="error d-inline-block"
                                for="cv">{{$errors->first('cv')}}</label>
                            @enderror
                                <div class="row">
                                    <div class="col-lg-11 col-md-10 col-sm-12">
                                        <select class="form-control" title="Seleccione un modelo de CV" name="cv">
                                            <option value="0">--Seleccionar Modelo--</option>
                                            @foreach ($cvs as $cv)
                                            <option value="{{$cv->id_cv}}" {{ $user->id_cv==$cv->id_cv? 'selected': ''}}>{{$cv->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Perfil Público</label>
                                <div class="checkbox-radios">
                                    <div class="form-check form-check-inline">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="radio" value="1" name="perfil_public" {{$user->public==1?'checked':''}}>Público
                                        <span class="circle">
                                          <span class="check"></span>
                                        </span>
                                      </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                      <label class="form-check-label">
                                        <input class="form-check-input" type="radio" value="0" name="perfil_public" {{$user->public==0?'checked':''}}>Privado
                                        <span class="circle">
                                          <span class="check"></span>
                                        </span>
                                      </label>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-rose float-right">Actualizar configuración</button>
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
<script src="{{asset('js/config.js')}}"></script>
<script type="text/javascript" charset="utf-8">
@if(session('configuracion-save-success'))
    swal({
        title: '¡Buen trabajo!',
        text: '{{session("configuracion-save-success")}}',
        buttonsStyling: false,
        confirmButtonClass: 'btn btn-success',
        type: 'success'
        }).catch(swal.noop);
@endif

@if(session('configuracion-save-error'))
    swal({
        title: '¡Ups, algo salio mal!',
        text: '{{session("configuracion-save-error")}}',
        buttonsStyling: false,
        confirmButtonClass: 'btn btn-danger',
        type: 'danger'
        }).catch(swal.noop);
@endif
</script>
@endsection
{{-- fin script --}}