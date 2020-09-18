@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Administrador de Noticias') }}</h1>
@stop

@section('content')
    @include('pages.admin.news.author')
    <div class="news-container shadow-sm">
        <h3>Crea tu noticia acá.</h3>
        <form action="{{ route('admin.store.news') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">{{ __('Título *') }}</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="author">{{ __('Autor *') }}</label>
                <select class="form-control" name="author" id="author">
                    @if (count($authors) > 0)
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    @else
                        <option value="0" disabled selected>{{ __('No hay autores registrados') }}</option>
                    @endif
                </select>
            </div>

            <label for="content">{{ __('Contenido *') }}</label>
            <div class="form-group">
                <textarea name="content" id="editor" cols="100" rows="20"></textarea>
            </div>

            <div class="form-group">
                <label for="image">{{ __('Imagen *') }}</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <hr>
            <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>


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
