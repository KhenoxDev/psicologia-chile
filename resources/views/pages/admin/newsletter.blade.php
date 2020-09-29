@extends('adminlte::page')

@section('title', 'Psicología Chile')

@section('content_header')
    <h1>News Letter</h1>
@stop

@section('content')
    <div class="newsletter-container shadow-sm">
        <table id="newsletter" class="table table-hover">
            <thead>
                <tr>
                    <th>{{ __('#') }}</th>
                    <th>{{ __('Nombre') }}</th>
					<th>{{ __('Correo') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($newsletters as $newsletter)
                    <tr>
                        <td>{{ $newsletter->id }}</td>
                        <td>{{ $newsletter->name == null ? 'no aplica':$newsletter->name }}</td>
						<td>{{ $newsletter->email }}</td>
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

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
@stop

@section('js')
    @jquery
    @toastr_js
    @toastr_render
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.22/r-2.2.6/sc-2.0.3/datatables.min.js"
		defer></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js" defer></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" defer></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" defer></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js" defer></script>

    <script>
        $(document).ready(function() {

            $('#newsletter').DataTable({
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
				},

				dom: 'Bfrtip',
				buttons: [
					'excelHtml5',
				]

			});

        });

    </script>
@stop
