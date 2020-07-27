@extends('errors::minimal')

@section('titulo', __('Error 419'))
@section('img-fondo'){{"'".asset('img/app/registro.jpg')."'"}}
@endsection
@section('code', '419')
@section('message', __('Page Expired'))