@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Consultas frecuentes</h1>
@stop

@section('content')
    <table class="table table-light">
		<thead class="thead-light">
			<tr>
				<th>th1</th>
				<th>th2</th>
				<th>th3</th>
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
