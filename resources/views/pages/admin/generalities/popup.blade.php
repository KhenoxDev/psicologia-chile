@extends('adminlte::page')

@section('title', 'Psicología Chile')

@section('content_header')
    <h1>{{ __('Administración de pop up informátivo') }}</h1>
@stop

@section('content')
    <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">{{ __('Subir pop up') }}</button>
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">{{ __('¡Sube tu pop up!') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.store.popup') }}" method="POST" class="shadow-sm"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">{{ __('Nombre pop up *') }}</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="popup">{{ __('Imagen *') }}</label>
                            <input type="file" class="form-control" name="popup" id="popup" required>
                            <small class="form-text text-muted">Recuerde procesar su imagen <a href="https://tinypng.com/"
                                    target="_blank">aquí</a> para reducir su peso.</small>
                        </div>
                        <div class="form-group">
                            <label for="url">{{ __('Url') }}</label>
                            <input type="text" class="form-control" name="url" id="url">
                            <small class="form-text text-muted">Si no es necesario que redireccione, dejar en blanco.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cerrar') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Crear') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="popups-container shadow-sm">
        @if (count($popups) > 0)
            @foreach ($popups as $popup)
                <div class="popup-card {{ $popup->is_active ? 'active' : '' }}">
                    <iframe width="200" height="200" src="{{ $popup->element }}" frameborder="0"></iframe>
                    @if (!$popup->is_active)
                        <a href="{{ route('admin.default.popup', $popup->id) }}" class="btn btn-primary mt-2">Por
                            defecto</a>
                    @else
                        <a href="{{ route('admin.unset.popup', $popup->id) }}" class="btn btn-warning mt-2">Dar de
                            baja</a>
                    @endif
                    <a href="{{ route('admin.destroy.popup', $popup->id) }}" class="mt-2 text-sm">Eliminar</a>
                </div>
            @endforeach
        @else
            <span class="no-results">No hay pop ups cargados</span>
        @endif
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
