@extends('adminlte::page')

@section('title', 'Psicología Chile')

@section('content_header')
    <h1>Cursos</h1>
@stop

@section('content')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">Crear </button>
    <div class="courses-container shadow-sm">
        <table id="questions" class="table table-hover">
            <thead>
                <tr>
                    <th>{{ __('#') }}</th>
                    <th>{{ __('Nombre') }}</th>
                    <th>{{ __('Slug') }}</th>
                    <th>{{ __('Descripción') }}</th>
                    <th>{{ __('Documento') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->id }}</td>
                        <td>{{ $course->name }}</td>
                        <td>{{ $course->slug }}</td>
                        <td>{!! $course->description !!}</td>
                        <td> <a href="{{ asset($course->doc) }}" target="_blank">Ver documento</a></td>
                        <td style="width: 20%">
                            <div class="d-flex flex-wrap flex-row justify-content-end">
                                <a title="Editar" href="{{ route('admin.edit.courses', $course->id) }}"
                                    class="btn btn-sm ml-2 mr-2 text-white btn-info">Editar</a>
                                @if ($course->is_active)
                                    <a href="{{ route('admin.inactive.courses', $course->id) }}"
                                        class="btn btn-sm ml-2 mr-2 text-white btn-danger">Desactivar</a>
                                @else
                                    <a href="{{ route('admin.active.courses', $course->id) }}"
                                        class="btn btn-sm ml-2 mr-2 text-white btn-success">Activar</a>
                                @endif
                            </div>
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
                <form action="{{ route('admin.store.courses') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">{{ __('Nombre *') }}</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">{{ __('Descripción *') }}</label>
                            <textarea id="descripcion" name="descripcion" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="d-flex" for="documento">{{ __('Documento *') }}</label>
                            <input type="file" name="documento" id="documento" class="form-control" required>
                            <small id="documentoAyuda" class="form-text text-muted">Sólo se admiten archivos tipo: pdf, doc,
                                docx, xls, xlsx, ppt y pptx</small>
                        </div>

                        <div class="form-group">
                            <label for="imagen">{{ __('Imagen *') }}</label>
                            <input type="file" class="form-control" id="imagen" name="imagen">
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
                .create(document.querySelector('#descripcion'))
                .catch(error => {
                    console.error(error);
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
