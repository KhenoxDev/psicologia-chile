@extends('adminlte::page')

@section('title', 'Psicología Chile')

@section('content_header')
    <h1>{{ __('Administración de textos en Nuestra Empresa') }}</h1>
@stop

@section('content')
    <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">{{ __('Nuevo registro') }}</button>
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">{{ __('¡Sube tu información!') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.store.business') }}" class="shadow-sm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group w-100">
                            <label for="seccion">{{ __('Sección *') }}</label>
                            <select name="seccion" id="seccion" class="form-control">
                                <option value="Misión">Misión</option>
                                <option value="Visión">Visión</option>
                                <option value="Valores">Valores</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="texto">{{ __('Texto *') }}</label>
                            <textarea id="texto" name="texto" cols="30" rows="50"></textarea>
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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">{{ __('¡Actualiza tu información!') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.update.business') }}" class="shadow-sm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="textoEdit">{{ __('Texto *') }}</label>
                            <textarea id="textoEdit" name="texto" cols="30" rows="50"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cerrar') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Actualizar') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="business-container shadow-sm">
        @if (count($business) > 0)
            @foreach ($business as $bus)
                <div class="card">
                    <div class="card-header">
                        <h3>{{ json_decode($bus->json)->section }}</h3>
                    </div>
                    <div class="card-body">
                        {!! json_decode($bus->json)->text !!}
                    </div>
                    <div class="card-footer">
                        <a href="javascript::void(0)" data-toggle="modal" data-id="{{ $bus->id }}"
                            class="editModalBtn btn btn-warning">Editar</a>
                        <a href="{{ route('admin.destroy.business', $bus->id) }}" class="btn btn-danger">Eliminar</a>
                    </div>
                </div>
            @endforeach
        @else
            <span class="no-results">No hay datos para mostrar</span>
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
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#texto'))
            .catch(error => {
                console.error(error);
            });

    </script>
    <script>
        var editorData;
        ClassicEditor
            .create(document.querySelector('#textoEdit'))
            .then(editor => {
                editorData = editor
            })
            .catch(error => {
                console.error(error);
            });
        $(document).ready(function() {
            $('.editModalBtn').click(function() {
                var id = $(this).data('id');
                var url = "{{ route('admin.edit.business') }}";

                $.ajax({
                    type: 'get',
                    url: url,
                    data: {
                        'id': id
                    },
                    success: function(data) {
                        var json = JSON.parse(data.json);
                        $('#id').val(data.id);
                        editorData.data.set(json.text);
                        $('#editModal').modal('show');
                    }
                });
            });
        });

    </script>
@stop
