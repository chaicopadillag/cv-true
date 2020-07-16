@extends('plantilla')
@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-rose card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">
                        people_alt
                    </i>
                </div>
                <h4 class="card-title">Usuarios</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-shopping">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Foto</th>
                                <th class="th-description">Nombre</th>
                                <th class="th-description">Correo</th>
                                <th class="text-left">Dirección</th>
                                <th class="text-left">Télefono</th>
                                <th class="text-left">Pais</th>
                                <th class="text-left">Edad</th>
                                <th>Estado civil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>
                                    <div class="">
                                        <img class="rounded-circle" width="60"
                                            src="{{($user->foto!=null) ? url('/').'/'.$user->foto : url('/').'/img/usuarios/default.png'}}"
                                            alt="{{$user->name}} {{$user->apellidos}}">
                                    </div>
                                </td>
                                <td class="td-name">
                                    <a href="#">{{$user->name}} {{$user->apellidos}}</a>
                                    <br />
                                    <small>{{$user->especialidad}}</small>
                                </td>
                                <td>
                                    {{$user->email}}
                                </td>
                                <td>
                                    {{$user->direccion}}
                                </td>
                                <td>
                                    {{$user->telefono}}
                                </td>
                                <td>
                                    {{$user->pais}}
                                </td>
                                <td>
                                    <small>&euro;</small>{{$user->edad}}
                                </td>
                                <td>
                                    {{$user->estado_civil}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection