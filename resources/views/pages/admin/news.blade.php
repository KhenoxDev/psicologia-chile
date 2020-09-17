@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administrador de Noticias</h1>
@stop

@section('content')

    <div class="news-container shadow-sm">
        <form action="" method="POST">
            @csrf

            <div class="form-group">
                <label for="title">{{ __('Título') }}</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="author">{{ __('Autor') }}</label>
                <input type="text" class="form-control" id="author" name="author">
            </div>

            <div class="form-group">
                <label for="author_image">{{ __('Imagen autor') }}</label>
                <input type="file" class="form-control" id="author_image" name="author_image">
            </div>

            <label for="content">{{ __('Contenido') }}</label>
            <div class="form-group">
                <textarea name="content" id="editor" cols="100" rows="20"></textarea>
            </div>

            <div class="form-group">
                <label for="image">{{ __('Imagen') }}</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_posted" id="activo" value="1">
                    <label class="form-check-label" for="activo">
                        {{ __('Activo') }}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="is_posted" id="inactivo" value="0" checked>
                    <label class="form-check-label" for="inactivo">
                        {{ __('Inactivo') }}
                    </label>
                </div>
            </div>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>


        </form>
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

    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });

    </script>

@stop
