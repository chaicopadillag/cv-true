@extends('errors::minimal')

@section('titulo', __('Error 500'))
@section('img-fondo'){{"'".asset('img/app/registro.jpg')."'"}}
@endsection
@section('code', '500')
@section('message', __('Server Error'))