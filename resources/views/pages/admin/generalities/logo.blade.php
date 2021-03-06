@extends('adminlte::page')

@section('title', 'Psicología Chile')

@section('content_header')
    <h1>Administración de logos</h1>
@stop

@section('content')
    <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Subir logo</button>
    <div class="logos-container shadow-sm">
        @if (count($logos) > 0)
            @foreach ($logos as $logo)
                <div class="logo-card {{ $logo->is_active ? 'active' : '' }}">
                    <img src="{{ asset($logo->file_path) }}" alt="{{ $logo->name }}">
                    <hr>
                    @if (!$logo->is_active)
                        <a class="btn btn-primary" href="{{ route('admin.default.logo', $logo->id) }}">Por defecto</a>
                    @else
                        <a class="btn btn-warning" href="{{ route('admin.down.logo', $logo->id) }}">Dar de baja</a>
                    @endif
                    <a href="{{ route('admin.destroy.logo', $logo->id) }}" class="mt-2 text-sm">Eliminar</a>
                </div>
            @endforeach
        @else
            <span class="no-results">No hay logos cargados</span>
        @endif
    </div>
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">{{ __('¡Sube tu logo!') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.store.logo') }}" class="shadow-sm"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group w-100">
                            <label for="name">{{ __('Nombre del archivo *') }}</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label class="d-flex" for="logo">{{ __('Logo *') }}</label>
                            <input type="file" name="logo" id="logo" class="form-control" required>
                            <small id="logoAyuda" class="form-text text-muted">Tipos: png, jpg, jpeg y svg <br> Dimensiones
                                recomendadas: 220 x 48</small>
                            <small class="form-text text-muted">Recuerde procesar su imagen <a href="https://tinypng.com/"
                                    target="_blank">aquí</a> para reducir su peso.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cerrar') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Subir imagen') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    @toastr_css
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@stop

@section('js')
    @jquery
    @toastr_js
    @toastr_render
@stop
