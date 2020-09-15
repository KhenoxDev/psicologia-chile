@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Modificar logo</h1>
@stop

@section('content')
    <div class="w-100 d-flex justify-content-center">
        <form method="POST" action="{{ route('admin.store.logo') }}" class="form-inline" enctype="multipart/form-data">
            @csrf
            <input type="file" name="logo" id="logo" class="form-control mr-2">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <div>
    </div>
@stop

@section('css')
    @toastr_css
@stop

@section('js')
    @jquery
    @toastr_js
    @toastr_render
@stop
