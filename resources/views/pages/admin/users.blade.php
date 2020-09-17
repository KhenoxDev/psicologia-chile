@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Crear </button>
    <br><br>
    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Rol</th>
                <th>Descripción</th>
                <th>Estado</th>
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
                        <a title="Cambiar contraseña" class="passwordBtn" href="javascript::void(0)"
                            data-id="{{ $user->id }}"><i class="fas fa-key" data-toggle="modal"
                                data-target="#ModalEditPass"></i></a>

                        <a title="Editar" href="#" class="editModalBtn" data-toggle="modal" data-id="{{ $user->id }}"><i
                                class="far fa-edit"></i></a>

                        @if ($user->is_active)
                            <a title="Activar" href="{{ route('admin.inactive.users', $user->id) }}"><i
                                    class="fas fa-minus-circle"></i></a>
                        @else
                            <a title="Desactivar" href="{{ route('admin.active.users', $user->id) }}"><i
                                    class="far fa-check-circle"></i></a>
                        @endif


                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formulario creación </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.store.users') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="rut">Rut</label>
                            <input type="text" class="form-control" id="rut" name="rut">
                        </div>

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Apellido</label>
                            <input type="text" class="form-control" id="last_name" name="last_name">
                        </div>

                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="rol_id">Rol</label>
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
                                    Activo
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="is_active" id="inactivo" value="0"
                                    checked>
                                <label class="form-check-label" for="inactivo">
                                    Inactivo
                                </label>
                            </div>
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

    {{-- Modal editar password --}}

    <div class="modal fade" id="ModalEditPass" tabindex="-1" aria-labelledby="ModalLabelEditPass" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabelEditPass">Formulario creación </h5>
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
                            <label for="newPassword">Nueva contraseña</label>
                            <input type="password" class="form-control" id="newPassword" name="newPassword">
                        </div>

                        <div class="form-group">
                            <label for="repeatPassword">Repetir contraseña</label>
                            <input type="password" class="form-control" id="repeatPassword" name="repeatPassword">
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

    {{-- Modal editar usuario --}}

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">{{ __('Actualizar datos') }}</h5>
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
                            <label for="rut_edit">Rut</label>
                            <input type="text" class="form-control" id="rut_edit" name="rut_edit">
                        </div>

                        <div class="form-group">
                            <label for="name_edit">Nombre</label>
                            <input type="text" class="form-control" id="name_edit" name="name_edit">
                        </div>

                        <div class="form-group">
                            <label for="last_name_edit">Apellido</label>
                            <input type="text" class="form-control" id="last_name_edit" name="last_name_edit">
                        </div>


                        <div class="form-group">
                            <label for="rol_id_edit">Rol</label>
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
@stop

@section('js')
    @jquery
    @toastr_js
    @toastr_render

    <script>
        $(document).ready(function() {

            $(".passwordBtn").click(function() {
                var id = $(this).data("id");
                $("#id").val(id);
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
                        console.log(data[0].id);
                        $('#id_edit').val(data[0].id);
                        $('#rut_edit').val(data[0].rut);
                        $('#name_edit').val(data[0].name);
                        $('#last_name_edit').val(data[0].last_name);
                        $('#rol_id_edit').empty();
                        $.each(data[1], function(i, item) {
                            if (data[0].rol_id == item.id) {
                                $("#rol_id_edit").append("<option value='" + item.id +
                                    "' selected>" + item.name + "</option>")

                            } else {
                                $("#rol_id_edit").append("<option value='" + item.id +
                                    "'>" + item.name + "</option>")
                            }
                        });
                        $('#editModal').modal('show');
                    }
                });
            });
        });

    </script>
@stop
