@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
	<h1>Consultas frecuentes</h1>
@stop

@section('content')
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Crear </button>
<br><br>
    <table class="table table-light">
		<thead class="thead-light">
			<tr>
				<th>Id</th>
				<th>Title</th>
				<th>Answer</th>
				<th>Editar</th>
				<th>Eliminar</th>
			</tr>
		</thead>
		<tbody>
			@foreach($questions as $question)
			<tr>
				<td>{{ $question->id }}</td>
				<td>{{ $question->title }}</td>
				<td>{{ $question->answer }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulario creación </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">

		<div class="form-group">
			<label for="pregunta">Pregunta</label>
			<input type="text" class="form-control" id="pregunta" name="pregunta">
		</div>

		<div class="form-group">
			<label for="respuesta">Respuesta</label>
			<div id="editor">

			</div>
		</div>

		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>

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
