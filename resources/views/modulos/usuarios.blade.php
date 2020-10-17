@extends('plantilla')
@section('titulo','Usuarios')
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
                                <th class="text-center">Correo</th>
                                <th class="text-center">Dirección</th>
                                <th class="text-center">Télefono</th>
                                <th class="text-center">Pais</th>
                                <th class="text-center">Edad</th>
                                <th class="text-center">Estado civil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>
                                    <div class="">
                                        <img class="rounded-circle" width="60"
                                            src="{{($user->foto!=null) ? asset($user->foto): asset('img/usuarios/default.png')}}"
                                            alt="{{$user->name}} {{$user->apellidos}}">
                                    </div>
                                </td>
                                <td class="td-name">
                                    <a href="#">{{$user->name}} {{$user->apellidos}}</a>
                                    <br />
                                    <small>{{$user->especialidad}}</small>
                                </td>
                                <td class="text-center">
                                    {{$user->email}}
                                </td>
                                <td class="text-center">
                                    {{$user->direccion}}
                                </td>
                                <td class="text-center">
                                    {{$user->telefono}}
                                </td>
                                <td class="text-center">
                                    {{$user->pais}}
                                </td>
                                <td class="text-center">
                                    {{$user->edad}}
                                </td>
                                <td class="text-center">
                                    {{$user->estado_civil}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$usuarios->links()}}
            </div>
        </div>
    </div>
</div>
@endsection