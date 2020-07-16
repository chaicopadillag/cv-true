@extends('plantilla')
@section('contenido')
<div class="row">
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
                @foreach ($estudios as $estudio)
                <div class="card-collapse">
                    <div class="card-header" role="tab" id="heading{{$estudio->id_estudio}}">
                        <h5 class="mb-0">
                            <a data-toggle="collapse" href="#collapse{{$estudio->id_estudio}}" aria-expanded="true"
                                aria-controls="collapse{{$estudio->id_estudio}}" class="collapsed">
                                {{$estudio->especialidad}} | {{$estudio->fecha_inicio}} - {{$estudio->fech_fin}}
                                <i class="material-icons">keyboard_arrow_down</i>
                            </a>
                        </h5>
                    </div>
                    <div id="collapse{{$estudio->id_estudio}}" class="collapse show" role="tabpanel"
                        aria-labelledby="heading{{$estudio->id_estudio}}" data-parent="#accordion" style="">
                        <div class="card-body">
                            <h6 class="title">{{$estudio->especialidad}}</h6>
                            <p class="category">{{$estudio->descripcion}}</p>
                        </div>
                    </div>
                    <div>
                        <a href="{{route('estudios')}}/{{$estudio->id_estudio}}" rel="tooltip"
                            class="btn btn-info btn-simple btn-xs" data-original-title="Modificar">
                            <i class="material-icons icon-mode_edit"></i>
                        </a>
                        <a href="{{route('estudios')}}//{{$estudio->id_estudio}}" rel="tooltip"
                            class="btn btn-danger btn-simple btn-xs" data-original-title="Eliminar">
                            <i class="material-icons icon-delete"></i>
                        </a>
                    </div>
                </div>
                @endforeach
                <div class="card-collapse">
                    <div class="card-header" role="tab" id="headingThree">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapseThree3" aria-expanded="false"
                                aria-controls="collapseThree3">
                                Collapsible Group Item #3
                                <i class="material-icons">keyboard_arrow_down</i>
                            </a>
                        </h5>
                    </div>
                    <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree"
                        data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                            squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck
                            quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it
                            squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica,
                            craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur
                            butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth
                            nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="nuevoEstudio" tabindex="-1" role="dialog" aria-labelledby="nuevoEstudio" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post" id="formNuevoEstudio">
                <div class="modal-header">
                    <h4 class="modal-title">Nuevo estudio</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="especialidad" class="bmd-label-floating">Especialidad</label>
                        <input type="text" class="form-control" id="especialidad" name="especialidad">
                    </div>
                    <div class="form-group">
                        <label for="uni" class="bmd-label-floating">Universidad y/o Instituto</label>
                        <input type="text" class="form-control" id="uni" name="universidad">
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio" class="bmd-label-floating">Fecha inicio</label>
                        <input type="text" class="form-control datepicker" id="fecha_inicio" name="fecha_inicio">
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin" class="bmd-label-floating">Fecha fin</label>
                        <input type="text" class="form-control datepicker" id="fecha_fin" name="fecha_fin">
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="bmd-label-floating">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="5"></textarea>
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
<div class="modal fade" id="nuevoEstudio" tabindex="-1" role="dialog" aria-labelledby="nuevoEstudio" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post" id="formNuevoEstudio">
                <div class="modal-header">
                    <h4 class="modal-title">Nuevo estudio</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="especialidad" class="bmd-label-floating">Especialidad</label>
                        <input type="text" class="form-control" id="especialidad" name="especialidad">
                    </div>
                    <div class="form-group">
                        <label for="uni" class="bmd-label-floating">Universidad y/o Instituto</label>
                        <input type="text" class="form-control" id="uni" name="universidad">
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio" class="bmd-label-floating">Fecha inicio</label>
                        <input type="text" class="form-control datepicker" id="fecha_inicio" name="fecha_inicio">
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin" class="bmd-label-floating">Fecha fin</label>
                        <input type="text" class="form-control datepicker" id="fecha_fin" name="fecha_fin">
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="bmd-label-floating">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="5"></textarea>
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
@endif
@endif

@endsection

@section('js')
@parent
<script>
    $(document).ready(function () {
        $('.datepicker').datetimepicker({
            // format:'L',
            format: 'DD/MM/YYYY',
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
        ValidarFormulario("#formNuevoEstudio")
    });
</script>
@endsection