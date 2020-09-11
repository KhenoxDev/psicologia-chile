@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
     <form action="{{ route('admin.update.questions') }}" method="POST">
		@csrf
		@method('PUT')

		<input type="hidden" name="id" id="id" value="{{ $questions->id }}">

		<div class="form-group">
			<label for="pregunta">Pregunta</label>
			<input type="text" class="form-control" id="pregunta" name="pregunta" value="{{ $questions->title }}">
		</div>

		<div class="form-group">
			<label for="respuesta">Respuesta</label>
			<textarea id="editor" name="respuesta" cols="30" rows="10">{{ $questions->answer }}</textarea>
		</div>


		<button type="submit" class="btn btn-warning text-white">Actualizar</button>
		<a href="javascript:history.go(-1)" class="btn btn-primary">Volver</a>

	  </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
  <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
   </script>
@stop
