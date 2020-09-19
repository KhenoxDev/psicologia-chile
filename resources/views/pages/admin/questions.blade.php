@extends('adminlte::page')

@section('title', 'Psicología Chile')

@section('content_header')
    <h1>Consultas frecuentes</h1>
@stop

@section('content')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Crear </button>
    <div class="questions-container shadow-sm">
        <table id="questions" class="table table-hover">
            <thead>
                <tr>
                    <th>{{ __('#') }}</th>
                    <th>{{ __('Título') }}</th>
                    <th>{{ __('Respuesta') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                    <tr>
                        <td>{{ $question->id }}</td>
                        <td>{{ $question->title }}</td>
                        <td>{{ $question->answer }}</td>
                        <td>
                            <a href="javascript::void(0)" data-id="{{ $question->id }}" data-toggle="modal"
                                class="editModalBtn"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('admin.delete.questions', $question->id) }}"><i class="fas fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Formulario creación </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.store.questions') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="pregunta">Pregunta</label>
                            <input type="text" class="form-control" id="pregunta" name="pregunta">
                        </div>

                        <div class="form-group">
                            <label for="respuesta">Respuesta</label>
                            <textarea id="respuesta" name="respuesta" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">{{ __('¡Actualiza tu red!') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.update.social') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="id" name="id">
                        <div class="form-group">
                            <label for="pregunta_edit">Pregunta</label>
                            <input type="text" class="form-control" id="pregunta_edit" name="pregunta_edit">
                        </div>
                        <div class="form-group">
                            <label for="respuesta_edit">Respuesta</label>
                            <textarea id="respuesta_edit" name="respuesta_edit" cols="30" rows="10"></textarea>
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
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/sc-2.0.3/datatables.min.css" />
    @toastr_css
@stop

@section('js')
    @jquery
    @toastr_js
    @toastr_render
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/sc-2.0.3/datatables.min.js"
        defer></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>

    <script>
        $(document).ready(function() {
            ClassicEditor
                .create(document.querySelector('#respuesta'))
                .catch(error => {
                    console.error(error);
                });

            var editorData;
            ClassicEditor
                .create(document.querySelector('#respuesta_edit'))
                .then(editor => {
                    editorData = editor
                })
                .catch(error => {
                    console.error(error);
                });

            $('.editModalBtn').click(function() {
                var id = $(this).data('id');
                var url = "{{ route('admin.edit.questions') }}";

                $.ajax({
                    type: 'get',
                    url: url,
                    data: {
                        'id': id
                    },
                    success: function(data) {
                        $('#id').val(data.id);
                        $('#pregunta_edit').val(data.title);
                        editorData.data.set(data.answer);
                        $('#editModal').modal('show');
                    }
                });
            });

            $('#questions').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "language": {
                    "emptyTable": "No hay datos para mostrar",
                    "info": "Mostrando _START_ de _END_ del _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 de 0 de 0 registros",
                    "infoFiltered": "(filtrado de _MAX_ entradas totales)",
                    "lengthMenu": "Mostrar entradas de _MENU_",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar: ",
                    "zeroRecords": "No hay registros",
                    "paginate": {
                        "first": "First",
                        "last": "<i class='far fa-chevron-double-right'></i>",
                        "next": "<i class='fas fa-chevron-right'></i>",
                        "previous": "<i class='fas fa-chevron-left'></i>"
                    },
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                }
            });
        });

    </script>
@stop
