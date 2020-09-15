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
                        <a href="{{ route('admin.edit.users', $user->id) }}" type="button"
							><i class="far fa-edit"></i></a>

							 {{--  <a href="{{ route('admin.delete.questions', $question->id) }}"
                            class="btn btn-danger delete-confirm">Eliminar</a>  --}}
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
                            <label for="id_rol">Rol</label>
							 <select name="id_rol" id="id_rol" class="form-control">
								 <option value="#">Seleccione</option>
								<option value="1">Administrador</option>
								<option value="2">Operador</option>
								<option value="3">Editor</option>
							</select>
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
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            console.log(url);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    window.location.href = url;
                }
            });
        });

    </script>
@stop
