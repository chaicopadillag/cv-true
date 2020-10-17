@extends('plantilla')
@section('titulo','Mis Experiencias')
@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">business_center</i>
                </div>
                <h4 class="card-title d-inline-block">Mis experiencias</h4>
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#nuevoExperiencia">
                    <i class="material-icons">
                        add
                    </i>
                    Agregar experiencia
                </button>
            </div>
            <div class="card-body">
                <div id="accordion" role="tablist">
                    @php
                    $item=0
                    @endphp
                    @foreach ($experiencias as $xperence)
                    @php
                    $item++;
                    @endphp
                    <div class="card-collapse">
                        <div class="card-header" role="tab" id="heading{{$xperence->id_experiencia}}">
                            <h5 class="mb-0">
                                <a data-toggle="collapse" href="#collapse{{$xperence->id_experiencia}}"
                                    aria-expanded="{{($item==1) ? 'true' : 'false'}}"
                                    aria-controls="collapse{{$xperence->id_experiencia}}" class="collapsed">
                                    {{$xperence->cargo}} - {{$xperence->empresa}}
                                    <i class="material-icons">keyboard_arrow_down</i>
                                </a>
                            </h5>
                        </div>
                        <div id="collapse{{$xperence->id_experiencia}}" class="collapse {{($item==1) ? 'show' : ''}}"
                            role="tabpanel" aria-labelledby="heading{{$xperence->id_experiencia}}"
                            data-parent="#accordion" style="">
                            <div class="card-body">
                                <p class="category">
                                    {{$xperence->descripcion}}
                                </p>
                                <span
                                    class="badge badge-pill badge-primary float-right">{{date('d/m/Y',strtotime($xperence->fecha_inicio))}}
                                    -
                                    {{ date('d/m/Y',strtotime($xperence->fecha_fin))}}</span>
                            </div>
                            <div>
                                <a href="{{route('experiencias.show',$xperence->id_experiencia)}}" rel="tooltip"
                                    class="btn btn-link btn-success btn-simple btn-sm p-1" data-original-title="Modificar">
                                    <i class="material-icons">create</i>
                                </a>
                                <a href="#" data-form="form{{$xperence->id_experiencia}}" rel="tooltip"
                                    class="btn btn-danger btn-link btn-simple btn-sm p-1 btn_eliminar"
                                    data-original-title="Eliminar">
                                    <i class="material-icons">delete</i>
                                </a>
                                <form id="form{{$xperence->id_experiencia}}"
                                    action="{{ route('experiencias.destroy',$xperence->id_experiencia) }}" method="post"
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
<div class="modal fade" id="nuevoExperiencia" tabindex="-1" role="dialog" aria-labelledby="nuevoExperiencia"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form_experiencia" action="{{route('experiencias.store')}}" method="post"
                id="formNuevoExperiencia">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Nuevo Experiencia</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cargo" class="bmd-label-floating">Cargo</label>
                        <input type="text" class="form-control" id="cargo" name="cargo" value="{{old('cargo')}}">
                        @error('cargo')
                        <label id="cargo-error" class="error" for="cargo">{{$errors->first('cargo')}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="empresa" class="bmd-label-floating">Empresa y/o Trabajo</label>
                        <input type="text" class="form-control" id="empresa" name="empresa" value="{{old('empresa')}}">
                        @error('empresa')
                        <label id="empresa-error" class="error" for="empresa">{{$errors->first('empresa')}}</label>
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
<div class="modal fade" id="EditarExperiencia" tabindex="-1" role="dialog" aria-labelledby="EditarExperiencia"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form_editar_experiencia" action="{{route('experiencias.update',$experiencia->id_experiencia)}}"
                method="post" id="formEditarExperiencia">
                @method('PUT')
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Editando experiencia</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cargo" class="bmd-label-floating">Cargo</label>
                        <input type="text" class="form-control" id="cargo" name="cargo"
                            value="{{($errors->first('cargo')) ? old('cargo') : $experiencia->cargo}}">
                        @error('cargo')
                        <label id="cargo-error" class="error" for="cargo">{{$errors->first('cargo')}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="empresa" class="bmd-label-floating">Empresa y/o Instituto</label>
                        <input type="text" class="form-control" id="empresa" name="empresa"
                            value="{{($errors->first('empresa')) ? old('empresa') : $experiencia->empresa}}">
                        @error('empresa')
                        <label id="empresa-error" class="error" for="empresa">{{$errors->first('empresa')}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio" class="bmd-label-floating">Fecha inicio</label>
                        <input type="text" class="form-control datepicker" id="fecha_inicio" name="fecha_inicio"
                            value="{{($errors->first('fecha_inicio')) ? old('fecha_inicio') : date('d-m-Y',strtotime($xperence->fecha_inicio))}}">
                        @error('fecha_inicio')
                        <label id="fecha_inicio-error" class="error"
                            for="fecha_inicio">{{$errors->first('fecha_inicio')}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin" class="bmd-label-floating">Fecha fin</label>
                        <input type="text" class="form-control datepicker" id="fecha_fin" name="fecha_fin"
                            value="{{($errors->first('fecha_fin')) ? old('fecha_fin') : date('d-m-Y',strtotime($xperence->fecha_fin))}}">
                        @error('fecha_fin')
                        <label id="fecha_fin-error" class="error"
                            for="fecha_fin">{{$errors->first('fecha_fin')}}</label>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="bmd-label-floating">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion"
                            rows="5">{{($errors->first('descripcion')) ? old('descripcion') : $experiencia->descripcion}}</textarea>
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
<script src="{{asset('js/experiencia.js')}}"></script>
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
        $('#nuevoExperiencia').modal();
    @endif
@endif

@if (isset($status))
    @if ($status==200)
    $("#EditarExperiencia").modal();
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
@if (session('succes-save-experiencia'))
    swal({
    title: '¡Buen trabajo!',
    text: '{{session("succes-save-experiencia")}}',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-success',
    type: 'success'
    }).catch(swal.noop);
@endif
@if (session('error-save-experiencia'))
    swal({
    title: '¡Ups, algo salio mal!',
    text: '{{session("error-save-experiencia")}}',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-danger',
    type: 'danger'
    }).catch(swal.noop);
@endif
{{-- update --}}
@if (session('succes-update-experiencia'))
    swal({
    title: '¡Buen trabajo!',
    text: '{{session("succes-update-experiencia")}}',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-success',
    type: 'success'
    }).catch(swal.noop);
@endif
@if (session('error-update-experiencia'))
    swal({
    title: '¡Ups, algo salio mal!',
    text: '{{session("error-update-experiencia")}}',
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
        text: "Una ves eliminado su EXPERIENCIA no hay marcha atras",
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
@if (session('success-delete-experiencia'))
    swal({
    title: '¡Buen trabajo!',
    text: '{{session("success-delete-experiencia")}}',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-success',
    type: 'success'
    }).catch(swal.noop);
@endif

@if(session('error-delete-experiencia'))
    swal({
    title: '¡Ups, algo salio mal!',
    text: '{{session("error-delete-experiencia")}}',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-danger',
    type: 'danger'
    }).catch(swal.noop);
@endif

@if(session('null-delete-experiencia'))
    swal({
    title: '¡Ups, algo salio mal!',
    text: '{{session("null-delete-experiencia")}}',
    buttonsStyling: false,
    confirmButtonClass: 'btn btn-danger',
    type: 'danger'
    }).catch(swal.noop);
@endif
</script>
@endsection