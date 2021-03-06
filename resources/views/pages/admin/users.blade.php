@extends('adminlte::page')

@section('title', 'Psicología Chile')

@section('content_header')
    <h1>{{ __('Administración de usuarios') }}</h1>
@stop

@section('content')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">{{ __('Crear') }}
    </button>
    <div class="user-container shadow-sm">
        <table id="users" class="table table-hover">
            <thead>
                <tr>
                    <th>{{ __('#') }}</th>
                    <th>{{ __('Rut') }}</th>
                    <th>{{ __('Nombre') }}</th>
                    <th>{{ __('Apellido') }}</th>
                    <th>{{ __('Rol') }}</th>
                    <th>{{ __('Descripción') }}</th>
                    <th>{{ __('Estado') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->rut }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->rol->name }}</td>
                        <td>{{ $user->rol->description }}</td>
                        <td>{{ $user->is_active ? 'Activo' : 'Inactivo' }}</td>
                        <td>
                            <a title="Cambiar contraseña" class="passwordBtn" href="javascript::void(0)" data-toggle="modal"
                                data-target="#ModalEditPass" data-id="{{ $user->id }}"><i class="fas fa-key"></i></a>

                            <a title="Editar" href="#" class="editModalBtn" data-toggle="modal" data-id="{{ $user->id }}"><i
                                    class="far fa-edit"></i></a>
                            @if ($user->is_active)
                                <a title="Desactivar" href="{{ route('admin.inactive.users', $user->id) }}"><i
                                        class="fas fa-minus-circle"></i></a>
                            @else
                                <a title="Activar" href="{{ route('admin.active.users', $user->id) }}"><i
                                        class="far fa-check-circle"></i></a>
                            @endif


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('¡Crea un usuario!') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.store.users') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="rut">{{ __('Rut') }}</label>
                            <input type="text" class="rut form-control" id="rut" name="rut">
                        </div>

                        <div class="form-group">
                            <label for="name">{{ __('Nombre') }}</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="form-group">
                            <label for="last_name">{{ __('Apellido') }}</label>
                            <input type="text" class="form-control" id="last_name" name="last_name">
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Contraseña') }}</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="password_confirm">{{ __('Confirmar Contraseña') }}</label>
                            <input type="password" class="form-control" id="password_confirm" name="password_confirm">
                        </div>

                        <div class="form-group">
                            <label for="rol_id">{{ __('Rol') }}</label>
                            <select name="rol_id" id="rol_id" class="form-control">
                                @foreach ($roles as $rol)
                                    <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_active" id="activo" value="1">
                                <label class="form-check-label" for="activo">
                                    {{ __('Activo') }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_active" id="inactivo" value="0"
                                    checked>
                                <label class="form-check-label" for="inactivo">
                                    {{ __('Inactivo') }}
                                </label>
                            </div>
                        </div>




                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cerrar') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="ModalEditPass" tabindex="-1" aria-labelledby="ModalLabelEditPass" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabelEditPass">{{ __('¡Cambia tu contraseña!') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.update_password.users') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="newPassword">{{ __('Nueva contraseña') }}</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword">
                        </div>

                        <div class="form-group">
                            <label for="repeatPassword">{{ __('Repetir contraseña') }}</label>
                            <input type="password" class="form-control" id="repeatPassword" name="repeatPassword">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cerrar') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Guardar') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">{{ __('¡Actualiza tus datos!') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.update.users') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" id="id_edit" name="id_edit">
                        <div class="form-group">
                            <label for="rut_edit">{{ __('Rut') }}</label>
                            <input type="text" class="rut form-control" id="rut_edit" name="rut_edit">
                        </div>

                        <div class="form-group">
                            <label for="name_edit">{{ __('Nombre') }}</label>
                            <input type="text" class="form-control" id="name_edit" name="name_edit">
                        </div>

                        <div class="form-group">
                            <label for="last_name_edit">{{ __('Apellido') }}</label>
                            <input type="text" class="form-control" id="last_name_edit" name="last_name_edit">
                        </div>


                        <div class="form-group">
                            <label for="rol_id_edit">{{ __('Rol') }}</label>
                            <select name="rol_id_edit" id="rol_id_edit" class="form-control">

                            </select>
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
    @toastr_css
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/sc-2.0.3/datatables.min.css" />
@stop
@section('js')
    @jquery
    @toastr_js
    @toastr_render
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/sc-2.0.3/datatables.min.js"
        defer></script>
    <script>
        $(document).ready(function() {
            $(".passwordBtn").click(function() {
                var id = $(this).data("id");
                $("#id").val(id);
            });

            $('#users').DataTable({
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

            $('.editModalBtn').click(function() {
                var id = $(this).data('id');
                var url = "{{ route('admin.edit.users') }}";

                $.ajax({
                    type: 'get',
                    url: url,
                    data: {
                        'id': id
                    },
                    success: function(data) {
                        $('#id_edit').val(data[0].id);
                        $('#rut_edit').val(data[0].rut);
                        $('#name_edit').val(data[0].name);
                        $('#last_name_edit').val(data[0].last_name);
                        $('#rol_id_edit').empty();
                        $.each(data[1], function(i, item) {
                            if (data[0].rol_id == item.id) {
                                $("#rol_id_edit").append("<option value='" +
                                    item.id +
                                    "' selected>" + item.name +
                                    "</option>")

                            } else {
                                $("#rol_id_edit").append("<option value='" +
                                    item.id +
                                    "'>" + item.name + "</option>")
                            }
                        });
                        $('#editModal').modal('show');
                    }
                });
            });

            $(".rut").rut({
                formatOn: 'keyup',
                minimumLength: 8,
            });
        });

    </script>
@stop
