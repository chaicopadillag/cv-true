@extends('errors::minimal')

@section('titulo', __('Error 403'))
@section('img-fondo'){{"'".asset('img/app/registro.jpg')."'"}}
@endsection
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))