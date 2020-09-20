@extends('adminlte::page')

@section('title', 'Psicología Chile')

@section('content_header')
    <h1>{{ __('Administración Políticas de Privacidad') }}</h1>
@stop

@section('content')

    @if (count($privacies) == 0)
        <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Crear política</button>

        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">{{ __('Crear Política de Privacidad') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="{{ route('admin.store.privacy') }}">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="content">{{ __('Contenido *') }}</label>
                                <textarea name="content" id="editor" cols="100" rows="20"></textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cerrar') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('Subir política') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @endif

    @if (count($privacies) > 0)
        <div class="privacy-container">
            <form action="{{ route('admin.update.privacy') }}" method="POST">
                @csrf
                @method('put')

                <input type="hidden" name="id_edit" id="id_edit" value="{{ $privacies[0]->id }}">

                <div class="form-group">
                    <label for="contentEdit">{{ __('Editar contenido') }}</label>
                    <textarea name="contentEdit" id="editorEdit" cols="100"
                        rows="40">{{ $privacies[0]->content }}</textarea>
                </div>
                <hr>
                <button type="submit" class="btn btn-primary">{{ _('Actualizar') }}</button>
            </form>
        </div>
    @endif

@stop

@section('css')
    @toastr_css
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@stop

@section('js')
    @jquery
    @toastr_js
    @toastr_render

    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editorEdit'))
            .catch(error => {
                console.error(error);
            });

    </script>

@stop
