@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Noticias sin publicar</h1>
@stop

@section('content')
    caca
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
