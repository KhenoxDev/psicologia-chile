@extends('adminlte::page')

@section('title', 'Psicología Chile')

@section('content_header')
    <h1>{{ __('Administración de banner principal') }}</h1>
@stop

@section('content')
    <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">{{ __('Subir banner') }}</button>
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">{{ __('¡Sube tu banner!') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.store.banner') }}" method="POST" class="shadow-sm"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">{{ __('Nombre banner *') }}</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="banner">{{ __('Imagen *') }}</label>
                            <input type="file" class="form-control" name="banner" id="banner" required>
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
    <div class="banners-container shadow-sm">
        @if (count($banners) > 0)
            @foreach ($banners as $banner)
                <div class="banner-card {{ $banner->is_active ? 'active' : '' }}">
                    <iframe width="{{ $banner->is_active ? '200' : '200' }}"
                        height="{{ $banner->is_active ? '300' : '200' }}" src="{{ json_decode($banner->json)->link }}"
                        frameborder="0"></iframe>
                    @if (!$banner->is_active)
                        <a href="{{ route('admin.default.banner', $banner->id) }}" class="btn btn-primary mt-2">Por
                            defecto</a>
                        <a href="{{ route('admin.destroy.banner', $banner->id) }}" class="mt-2 text-sm">Eliminar</a>
                    @endif
                </div>
            @endforeach
        @else
            <span class="no-results">No hay banners cargados</span>
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
