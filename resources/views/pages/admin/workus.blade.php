@extends('adminlte::page')

@section('title', 'Psicología Chile')

@section('content_header')
    <h1>Trabaja con nosotros</h1>
@stop

@section('content')
    <div class="workus-container shadow-sm">
        <table id="workus" class="table table-hover">
            <thead>
                <tr>
                    <th>{{ __('#') }}</th>
                    <th>{{ __('Nombre') }}</th>
					<th>{{ __('Correo') }}</th>
					<th>{{ __('Teléfono') }}</th>
					<th>{{ __('País') }}</th>
					<th>{{ __('Ciudad') }}</th>
					<th>{{ __('CV') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($works as $work)
                    <tr>
                        <td>{{ $work->id }}</td>
                        <td>{{ $work->name }}</td>
						<td>{{ $work->mail }}</td>
						<td>{{ $work->phone }}</td>
						<td>{{ $work->country }}</td>
						<td>{{ $work->city }}</td>
						<td> <a href="{{ asset($work->cv) }}" target="_blank">Descargar documento</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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

    <script>
        $(document).ready(function() {

            $('#workus').DataTable({
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
