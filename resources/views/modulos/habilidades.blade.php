@extends('plantilla')
@section('titulo','Mis Habilidades')

@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">verified_user</i>
                </div>
                <h4 class="card-title d-inline-block">Mis habilidades</h4>
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#nuevoHabilidad">
                    <i class="material-icons">
                        add
                    </i>
                    Agregar habilidad
                </button>
            </div>
            <div class="card-body">
                <p class="text-muted text-center">Agregar o modificar según el orden que quiera que aparezca en tu CV
                </p>
                <div id="accordion" role="tablist">
                    @php
                    $item=0
                    @endphp
                    @foreach ($habilidades as $skill)
                    @php
                    $item++;
                    @endphp
                    <div class="card-collapse">
                        <div class="card-header" role="tab" id="heading{{$skill->id_habilidad}}">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapse{{$skill->id_habilidad}}"
                                    aria-expanded="{{($item==1) ? 'true' : 'false'}}"
                                    aria-controls="collapse{{$skill->id_habilidad}}" class="collapsed">
                                    {{$skill->habilidad}}
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </a>
                            </h5>
                        </div>
                        <div id="collapse{{$skill->id_habilidad}}" class="collapse {{($item==1) ? 'show' : ''}}"
                            role="tabpanel" aria-labelledby="heading{{$skill->id_habilidad}}" data-parent="#accordion"
                            style="">
                            <div class="card-body">
                                <p class="category">
                                    {{$skill->descripcion}}
                                </p>
                                <div class="row">
                                    <div class="col-md-12 d-flex justify-content-around align-items-center">
                                        <div class="w-100 skills">
                                            <div class=" progress progress-line-primary skills_nivel" rel="tooltip"
                                                data-placement="bottom"
                                                data-original-title="{{$skill->nivel}}% de Nivel"
                                                style="margin-bottom: 0px; height: 8px">
                                                <div class="progress-bar progress-bar-primary progress-bar-striped active"
                                                    role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                    aria-valuemax="100" role="progressbar"
                                                    style="width: {{$skill->nivel}}%;">
                                                    <span class="sr-only">{{$skill->nivel}}% de nivel</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a href="{{route('habilidades.show',$skill->id_habilidad)}}" rel="tooltip"
                                    class="btn btn-success btn-link btn-simple p-1" data-original-title="Modificar">
                                    <i class="material-icons">create</i>
                                </a>
                                <a href="#" data-form="form{{$skill->id_habilidad}}" rel="tooltip"
                                    class="btn btn-danger btn-link btn-simple p-1 btn_eliminar"
                                    data-original-title="Eliminar">
                                    <i class="material-icons">delete</i>
                                </a>
                                <form id="form{{$skill->id_habilidad}}"
                                    action="{{ route('habilidades.destroy',$skill->id_habilidad) }}" method="post"
                                    accept-charset="utf-8" style="display: none;">
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="nuevoHabilidad" tabindex="-1" role="dialog" aria-labelledby="nuevoHabilidad"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form_estudio" action="{{route('habilidades.store')}}" method="post" id="formNuevoHabilidad">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Nuevo habilidad</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="habilidad" class="bmd-label-floating">Habilidad</label>
                        <input type="text" class="form-control" id="habilidad" name="habilidad"
                            value="{{old('habilidad')}}">
                        @error('habilidad')
                        <label id="habilidad-error" class="error"
                            for="habilidad">{{$errors->first('habilidad')}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nivel" class="bmd-label-floating">Nivel de 0 a 100%</label>
                        <input class="form-control disabled" type="text" id="nivel" name="nivel"
                            value="{{old('nivel')??0}}" range="[1,100]">
                        <div class="w-100">
                            <div id="sliderNivel" class="slider skills2"></div>
                        </div>
                        @error('nivel')
                        <label id="nivel-error" class="error" for="nivel">{{$errors->first('nivel')}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="bmd-label-floating">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion"
                            rows="5">{{old('descripcion')}}</textarea>
                        @error('descripcion')
                        <label id="descripcion-error" class="error"
                            for="descripcion">{{$errors->first('descripcion')}}</label>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (isset($status))
@if ($status==200)
<div class="modal fade" id="editarHabilidad" tabindex="-1" role="dialog" aria-labelledby="editarHabilidad"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form_estudio" action="{{route('habilidades.update',$habilidad->id_habilidad)}}" method="post"
                id="formeditarHabilidad">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Editar habilidad</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="habilidad" class="bmd-label-floating">Habilidad</label>
                        <input type="text" class="form-control" id="habilidad" name="habilidad"
                            value="{{old('habilidad')??$habilidad->habilidad}}">
                        @error('habilidad')
                        <label id="habilidad-error" class="error"
                            for="habilidad">{{$errors->first('habilidad')}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nivel" class="bmd-label-floating">Nivel de 0 a 100%</label>
                        <input class="form-control disabled" type="text" id="nivel2" name="nivel"
                            value="{{old('nivel')??$habilidad->nivel}}" range="[1,100]">
                        <div class="w-100">
                            <div id="sliderNivel2" class="slider skills2"></div>
                        </div>
                        @error('nivel')
                        <label id="nivel-error" class="error" for="nivel">{{$errors->first('nivel')}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="bmd-label-floating">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion"
                            rows="5">{{old('descripcion')??$habilidad->descripcion}}</textarea>
                        @error('descripcion')
                        <label id="descripcion-error" class="error"
                            for="descripcion">{{$errors->first('descripcion')}}</label>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
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
<script src="{{asset('js/skills.js')}}"></script>
<script type="text/javascript" charset="utf-8">
    @if (!isset($status))
    @if ($errors->any())
    $('#nuevoHabilidad').modal();
    @endif
@endif

@if(isset($status))
@if($status==200)
$(document).ready(function () {
        let slider=document.getElementById('sliderNivel2');
            noUiSlider.create(slider,{
                start:[$('#nivel2').val()],
                connect:[!0,!1],
                tooltips:[true],
                range:{
                    'min':0,
                    'max':100
                }
            });

            slider.noUiSlider.on('update',function(values,handle){
                let value=values[handle];
                $('#nivel2').val(value);
            });
    });
    $('#editarHabilidad').modal();
@else
swal({
    title: '¡Ups! Error',
    text: 'El registro que buscas no existe en la base de datos',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-warning',
    type: 'warning'
    }).catch(swal.noop);
@endif
@endif
{{-- save --}}
@if (session('save-success-habilidad'))
    swal({
    title: '¡Buen trabajo!',
    text: '{{session("save-success-habilidad")}}',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-success',
    type: 'success'
    }).catch(swal.noop);
@endif
@if (session('save-error-habilidad'))
    swal({
    title: '¡Ups, algo salio mal!',
    text: '{{session("save-error-habilidad")}}',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-danger',
    type: 'danger'
    }).catch(swal.noop);
@endif
{{-- update --}}
@if (session('succes-update-habilidad'))
    swal({
    title: '¡Buen trabajo!',
    text: '{{session("succes-update-habilidad")}}',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-success',
    type: 'success'
    }).catch(swal.noop);
@endif

@if (session('error-update-habilidad'))
    swal({
    title: '¡Ups, algo salio mal!',
    text: '{{session("error-update-habilidad")}}',
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
        text: "Una ves eliminado su HABILIDAD no hay marcha atras",
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
@if (session('success-delete-habilidad'))
    swal({
    title: '¡Buen trabajo!',
    text: '{{session("success-delete-habilidad")}}',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-success',
    type: 'success'
    }).catch(swal.noop);
@endif

@if(session('error-delete-habilidad'))
    swal({
    title: '¡Ups, algo salio mal!',
    text: '{{session("error-delete-habilidad")}}',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-danger',
    type: 'danger'
    }).catch(swal.noop);
@endif

@if(session('null-delete-habilidad'))
    swal({
    title: '¡Ups, algo salio mal!',
    text: '{{session("null-delete-habilidad")}}',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-danger',
    type: 'danger'
    }).catch(swal.noop);
@endif
</script>
@endsection
