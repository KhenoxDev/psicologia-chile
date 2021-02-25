@extends('adminlte::page')

@section('title', 'Psicología Chile')

@section('content_header')
    <h1>Asignar Psicólogos a Convenios</h1>
@stop

@section('content')
<div class="card">
	<form action="{{ route('admin.store.psch') }}" method="POST">
		@csrf
		<div class="modal-body">
			<input type="hidden" id="agreement_id" name="agreement_id" value="{{ $id }}">
			<div id="staff" class="form-group staff-list">
				@foreach ($newPsch as $item)
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" id="{{ $item['index'] }}" name="psch[]" value="{{ $item['index'] }}" {{ $item['checked'] ? 'checked' : '' }}>
								<label class="form-check-label" for="{{ $item['index'] }}">{{ $item['nombreCompleto']}}</label>
						</div>
					@endforeach
			</div>
		</div>
		<div class="modal-footer">
			<a href="{{ route('admin.agreements') }}" class="btn btn-secondary">Volver</a>
			<button type="submit" class="btn btn-primary">Guardar</button>
		</div>
	</form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @toastr_css
@stop
@section('js')
    @jquery
    @toastr_js
    @toastr_render
@stop

