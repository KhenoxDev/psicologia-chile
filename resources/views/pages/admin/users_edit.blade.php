@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
    <form action="{{ route('admin.update.users') }}" method="POST">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" id="id" value="{{ $users->id }}">

        <div class="form-group">
            <label for="rut">Rut</label>
            <input type="text" class="form-control" id="rut" name="rut" value="{{ $users->rut }}">
        </div>

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}">
        </div>

        <div class="form-group">
            <label for="last_name">Apellido</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $users->last_name }}">
        </div>


        <div class="form-group">
            <label for="rol_id">Rol</label>
            <select name="rol_id" id="rol_id" class="form-control">
                <option value="{{ $users->rol_id }}">{{ $users->rol->name }}</option>
                @foreach ($roles as $rol)
                    <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-warning text-white">Actualizar</button>
        <a href="javascript:history.go(-1)" class="btn btn-primary">Volver</a>

    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
