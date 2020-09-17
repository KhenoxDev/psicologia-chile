@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administración de redes sociales</h1>
@stop

@section('content')
    <button class="btn btn-primary" data-toggle="modal"
        data-target="#createModal">{{ __('Crear nueva red social') }}</button>
    <div class="social-container">
        @if (count($socials) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ __('Tipo') }}</th>
                        <th>{{ __('Link') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($socials as $social)
                        <tr>
                            <td>{{ $social->type->name }}</td>
                            <td>{{ $social->link }}</td>
                            <td>
                                <a href="#" class="editModalBtn" data-toggle="modal" data-id="{{ $social->id }}"><i
                                        class="far fa-edit"></i></a>
                                <a href="{{ route('admin.destroy.social', $social->id) }}"><i class="fas fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <span class="no-results">No hay datos para mostrar</span>
        @endif
    </div>
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">{{ __('¡Crea tus redes!') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.store.social') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="social">{{ __('Link de Red social *') }}</label>
                            <input type="text" class="form-control" name="social" id="social" placeholder="https://"
                                required>
                        </div>
                        <div class="form-group w-100">
                            <label for="tipo">{{ __('¿Qué red social es? *') }}</label>
                            <select name="tipo" id="tipo" class="form-control" required>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
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
                            <label for="social">{{ __('Link de Red social *') }}</label>
                            <input type="text" class="form-control" name="social" id="socialEdit" placeholder="https://"
                                required>
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
@stop

@section('js')
    @jquery
    @toastr_js
    @toastr_render
    <script>
        $(document).ready(function() {
            $('.editModalBtn').click(function() {
                var id = $(this).data('id');
                var url = "{{ route('admin.edit.social') }}";

                $.ajax({
                    type: 'get',
                    url: url,
                    data: {
                        'id': id
                    },
                    success: function(data) {
                        $('#id').val(data.id);
                        $('#socialEdit').val(data.link);
                        $('#editModal').modal('show');
                    }
                });
            });
        });

    </script>
@stop
