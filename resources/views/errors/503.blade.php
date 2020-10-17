@extends('errors::minimal')

@section('titulo', __('Error 503'))
@section('img-fondo'){{"'".asset('img/app/registro.jpg')."'"}}
@endsection
@section('code', '503')
@section('message', __($exception->getMessage() ?: 'Service Unavailable'))