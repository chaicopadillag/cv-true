@extends('errors::minimal')

@section('titulo', __('Error 429'))
@section('img-fondo'){{"'".asset('img/app/registro.jpg')."'"}}
@endsection
@section('code', '429')
@section('message', __('Too Many Requests'))