@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Administración de vídeo principal') }}</h1>
@stop

@section('content')
    <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">{{ __('Subir vídeo') }}</button>
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">{{ __('¡Sube tu vídeo!') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.store.video') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="video">{{ __('Enlace de youtube *') }}</label>
                            <input type="text" class="form-control" name="video" id="video"
                                placeholder="https://www.youtube.com/embed/2GCfa-CC-j8" required>
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
    <div class="videos-container">
        @if (count($videos) > 0)
            @foreach ($videos as $video)
                <div class="video-card {{ $video->is_active ? 'active' : '' }}">
                    <iframe width="{{ $video->is_active ? '250' : '200' }}" height="{{ $video->is_active ? '250' : '200' }}"
                        src="{{ json_decode($video->json)->link }}" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
                    @if (!$video->is_active)
                        <a href="{{ route('admin.default.video', $video->id) }}" class="btn btn-primary mt-2">Por
                            defecto</a>
                        <a href="{{ route('admin.destroy.video', $video->id) }}" class="mt-2 text-sm">Eliminar</a>
                    @endif
                </div>
            @endforeach
        @else
            <span class="no-results">No hay vídeos cargados</span>
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
