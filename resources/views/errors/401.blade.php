@extends('errors::minimal')

@section('titulo', __('Error 401'))
@section('img-fondo'){{"'".asset('img/app/registro.jpg')."'"}}
@endsection
@section('code', '401')
@section('message', __('Unauthorized'))