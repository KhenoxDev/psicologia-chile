@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
     <form action="{{--  {{ route('admin.update.questions') }}  --}}" method="POST">
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


		<button type="submit" class="btn btn-warning text-white">Actualizar</button>
		<a href="javascript:history.go(-1)" class="btn btn-primary">Volver</a>

	  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

