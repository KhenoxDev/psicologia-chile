@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tablero</h1>
@stop

@section('content')
    <p>Acá se modifica el vídeo principal</p>
@stop

@section('css')
    @toastr_css
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    @jquery
    @toastr_js
    @toastr_render
@stop
