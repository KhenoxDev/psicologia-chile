@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Administración de métodos de pagos') }}</h1>
@stop

@section('content')
    <button class="btn btn-primary" data-toggle="modal"
        data-target="#createModal">{{ __('Crear nuevo método de pago') }}</button>
    <div class="payment-container">
        @if (count($payments) > 0)
            <table class="table w-100">
                <thead>
                    <tr>
                        <th>{{ __('Método de pago') }}</th>
                        <th>{{ __('Imagen') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $pay)
                        <tr>
                            <td>{{ $pay->name }}</td>
                            <td><img src="{{ $pay->image }}" alt="{{ $pay->name }}"></td>
                            <td>
                                <a href="{{ route('admin.destroy.pay', $pay->id) }}"><i class="fas fa-times"></i></a>
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
                    <h5 class="modal-title" id="createModalLabel">{{ __('¡Crea tus métodos de pago!') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.store.pay') }}" method="POST" class="shadow-sm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">{{ __('Método de pago *') }}</label>
                            <input type="text" class="form-control" name="nombre" id="nombre" required>
                        </div>
                        <div class="form-group w-100">
                            <label class="d-flex" for="metodo">{{ __('Imagen *') }} <i
                                    class="fas fa-exclamation ml-auto text-warning" data-toggle="tooltip"
                                    data-placement="right"
                                    title="Tipos: png, jpg, jpeg y svg | Dimensiones recomendadas: 200 x 60"></i></label>
                            <input type="file" name="metodo" id="metodo" class="form-control" required>
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
@stop

@section('css')
    @toastr_css
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@stop

@section('js')
    @jquery
    @toastr_js
    @toastr_render
@stop
