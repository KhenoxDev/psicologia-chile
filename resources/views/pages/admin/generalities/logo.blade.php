@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Modificar logo</h1>
@stop

@section('content')
    <form method="POST" action="{{ route('admin.logo') }}" class="form-inline" enctype="multipart/form-data">
        @csrf
        <input type="file" name="logo" id="logo" class="form-control mr-2">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@stop

@section('css')
    @toastr_css
@stop

@section('js')
    @jquery
    @toastr_js
    @toastr_render
@stop
