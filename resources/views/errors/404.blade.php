@extends('errors::minimal')

@section('titulo', __('Error 404'))
@section('img-fondo'){{"'".asset('img/app/registro.jpg')."'"}}
@endsection
@section('code', '404')
@section('message', __('Página no encontrado'))