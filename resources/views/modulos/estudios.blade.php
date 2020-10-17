@extends('plantilla')
@section('titulo','Mis Estudios')
@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">school</i>
                </div>
                <h4 class="card-title d-inline-block">Mis estudios</h4>
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#nuevoEstudio">
                    <i class="material-icons">
                        add
                    </i>
                    Agregar estudio
                </button>
            </div>
            <div class="card-body">
                <div id="accordion" role="tablist">
                    @php
                    $item=0
                    @endphp
                    @foreach ($estudios as $studio)
                    @php
                    $item++;
                    @endphp
                    <div class="card-collapse">
                        <div class="card-header" role="tab" id="heading{{$studio->id_estudio}}">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapse{{$studio->id_estudio}}"
                                    aria-expanded="{{($item==1) ? 'true' : 'false'}}"
                                    aria-controls="collapse{{$studio->id_estudio}}" class="collapsed">
                                    {{$studio->especialidad}} - {{$studio->universidad}}
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </a>
                            </h5>
                        </div>
                        <div id="collapse{{$studio->id_estudio}}" class="collapse {{($item==1) ? 'show' : ''}}"
                            role="tabpanel" aria-labelledby="heading{{$studio->id_estudio}}" data-parent="#accordion"
                            style="">
                            <div class="card-body">
                                <p class="category">
                                    {{$studio->descripcion}}
                                </p>
                                <span
                                    class="badge badge-pill badge-primary float-right">{{date('d/m/Y',strtotime($studio->fecha_inicio))}}
                                    -
                                    {{ date('d/m/Y',strtotime($studio->fecha_fin))}}</span>
                            </div>
                            <div>
                                <a href="{{route('estudios.show',$studio->id_estudio)}}" rel="tooltip"
                                    class="btn btn-link btn-success btn-simple btn-sm p-1" data-original-title="Modificar">
                                    <i class="material-icons">edit</i>
                                </a>
                                <a href="#" data-form="form{{$studio->id_estudio}}" rel="tooltip"
                                    class="btn btn-link btn-danger btn-simple btn-sm p-1 btn_eliminar"
                                    data-original-title="Eliminar">
                                    <i class="material-icons">delete</i>
                                </a>
                                <form id="form{{$studio->id_estudio}}"
                                    action="{{ route('estudios.destroy',$studio->id_estudio) }}" method="post"
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
<div class="modal fade" id="nuevoEstudio" tabindex="-1" role="dialog" aria-labelledby="nuevoEstudio" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form_estudio" action="{{route('estudios.store')}}" method="post" id="formNuevoEstudio">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Nuevo estudio</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="especialidad" class="bmd-label-floating">Especialidad</label>
                        <input type="text" class="form-control" id="especialidad" name="especialidad"
                            value="{{old('especialidad')}}">
                        @error('especialidad')
                        <label id="especialidad-error" class="error"
                            for="especialidad">{{$errors->first('especialidad')}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="universidad" class="bmd-label-floating">Universidad y/o Instituto</label>
                        <input type="text" class="form-control" id="universidad" name="universidad"
                            value="{{old('universidad')}}">
                        @error('universidad')
                        <label id="universidad-error" class="error"
                            for="universidad">{{$errors->first('universidad')}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio" class="bmd-label-floating">Fecha inicio</label>
                        <input type="text" class="form-control datepicker" id="fecha_inicio" name="fecha_inicio"
                            value="{{old('fecha_inicio')}}">
                        @error('fecha_inicio')
                        <label id="fecha_inicio-error" class="error"
                            for="fecha_inicio">{{$errors->first('fecha_inicio')}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin" class="bmd-label-floating">Fecha fin</label>
                        <input type="text" class="form-control datepicker" id="fecha_fin" name="fecha_fin"
                            value="{{old('fecha_fin')}}">
                        @error('fecha_fin')
                        <label id="fecha_fin-error" class="error"
                            for="fecha_fin">{{$errors->first('fecha_fin')}}</label>
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
<div class="modal fade" id="EditarEstudio" tabindex="-1" role="dialog" aria-labelledby="EditarEstudio"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form_estudio" action="{{route('estudios.update',$estudio->id_estudio)}}" method="post"
                id="formEditarEstudio">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Editando estudio</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="especialidad" class="bmd-label-floating">Especialidad</label>
                        <input type="text" class="form-control" id="especialidad" name="especialidad"
                            value="{{($errors->first('especialidad')) ? old('especialidad') : $estudio->especialidad}}">
                        @error('especialidad')
                        <label id="especialidad-error" class="error"
                            for="especialidad">{{$errors->first('especialidad')}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="uni" class="bmd-label-floating">Universidad y/o Instituto</label>
                        <input type="text" class="form-control" id="uni" name="universidad"
                            value="{{($errors->first('universidad')) ? old('universidad') : $estudio->universidad}}">
                        @error('universidad')
                        <label id="universidad-error" class="error"
                            for="universidad">{{$errors->first('universidad')}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio" class="bmd-label-floating">Fecha inicio</label>
                        <input type="text" class="form-control datepicker" id="fecha_inicio" name="fecha_inicio"
                            value="{{($errors->first('fecha_inicio')) ? old('fecha_inicio') : date('d-m-Y',strtotime($studio->fecha_inicio))}}">
                        @error('fecha_inicio')
                        <label id="fecha_inicio-error" class="error"
                            for="fecha_inicio">{{$errors->first('fecha_inicio')}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin" class="bmd-label-floating">Fecha fin</label>
                        <input type="text" class="form-control datepicker" id="fecha_fin" name="fecha_fin"
                            value="{{($errors->first('fecha_fin')) ? old('fecha_fin') : date('d-m-Y',strtotime($studio->fecha_fin))}}">
                        @error('fecha_fin')
                        <label id="fecha_fin-error" class="error"
                            for="fecha_fin">{{$errors->first('fecha_fin')}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="bmd-label-floating">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion"
                            rows="5">{{($errors->first('descripcion')) ? old('descripcion') : $estudio->descripcion}}</textarea>
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
<script src="{{asset('js/estudio.js')}}"></script>
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
        $('#nuevoEstudio').modal();

    @endif
@endif

@if (isset($status))
    @if ($status==200)
    $("#EditarEstudio").modal();
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
@if (session('succes-save-estudio'))
    swal({
    title: '¡Buen trabajo!',
    text: '{{session("succes-save-estudio")}}',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-success',
    type: 'success'
    }).catch(swal.noop);
@endif

@if (session('error-save-estudio'))
    swal({
    title: '¡Ups, algo salio mal!',
    text: '{{session("error-save-estudio")}}',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-danger',
    type: 'danger'
    }).catch(swal.noop);
@endif
{{-- update --}}
@if (session('succes-update-estudio'))
    swal({
    title: '¡Buen trabajo!',
    text: '{{session("succes-update-estudio")}}',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-success',
    type: 'success'
    }).catch(swal.noop);
@endif

@if (session('error-update-estudio'))
    swal({
    title: '¡Ups, algo salio mal!',
    text: '{{session("error-update-estudio")}}',
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
        text: "Una ves eliminado su ESTUDIO no hay marcha atras",
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
@if (session('success-delete-estudio'))
    swal({
    title: '¡Buen trabajo!',
    text: '{{session("success-delete-estudio")}}',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-success',
    type: 'success'
    }).catch(swal.noop);
@endif

@if(session('error-delete-estudio'))
    swal({
    title: '¡Ups, algo salio mal!',
    text: '{{session("error-delete-estudio")}}',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-danger',
    type: 'danger'
    }).catch(swal.noop);
@endif

@if(session('null-delete-estudio'))
    swal({
    title: '¡Ups, algo salio mal!',
    text: '{{session("null-delete-estudio")}}',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-danger',
    type: 'danger'
    }).catch(swal.noop);
@endif
</script>
@endsection