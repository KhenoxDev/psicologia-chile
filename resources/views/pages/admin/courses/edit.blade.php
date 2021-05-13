@extends('adminlte::page')

@section('title', 'Psicología Chile')

@section('content_header')
    <h1>Editar curso: {{ $course->name }}</h1>
@stop

@section('content')
    <div class="card p-4">
        <form action="{{ route('admin.update.courses') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <input type="hidden" name="id" value="{{ $course->id }}">
            <div class="form-group">
                <label for="nombre">{{ __('Nombre *') }}</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $course->name }}" required>
            </div>

            <div class="form-group">
                <label for="descripcion">{{ __('Descripción *') }}</label>
                <textarea id="descripcion" name="descripcion" cols="30" rows="10">{{ $course->description }}</textarea>
            </div>

            <div class="form-group">
                <label class="d-flex" for="documento">{{ __('Documento') }}</label>
                <input type="file" name="documento" id="documento" class="form-control">
                <small id="documentoAyuda" class="form-text text-muted">Sólo se admiten archivos tipo: pdf, doc,
                    docx, xls, xlsx, ppt y pptx</small>
                <a href="{{ $course->doc }}" target="_blank">Ver documento</a>
            </div>

            <div class="form-group">
                <label for="imagen">{{ __('Imagen') }}</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
                <div class="pt-2 d-flex flex-column">
                    <img src="{{ asset($course->image) }}" alt="{{ $course->slug }}" width="20%" height="20%"
                        class="img-thumbnail">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('admin.courses') }}" class="btn btn-secondary">Volver</a>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#descripcion'))
                .catch(error => {
                    console.error(error);
                });
        });

    </script>
@stop
