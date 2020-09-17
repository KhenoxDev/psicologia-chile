@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ __('Noticias publicadas') }}</h1>
@stop

@section('content')
    <div class="news-container">
        <table id="news" class="table table-hover">
            <thead>
                <tr>
                    <th>{{ __('#') }}</th>
                    <th>{{ __('Título') }}</th>
                    <th>{{ __('Autor') }}</th>
                    <th>{{ __('Imagen autor') }}</th>
                    <th>{{ __('Contenido') }}</th>
                    <th>{{ __('Imagen principal') }}</th>
                    <th>{{ __('Publicado el') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $new)
                    <tr>
                        <td>{{ $new->id }}</td>
                        <td>{{ $new->title }}</td>
                        <td>{{ $new->author }}</td>
                        <td><img width="50" height="50" class="img-responsive" src="{{ asset($new->author_image) }}"
                                alt="{{ $new->author }}"></td>
                        <td>
                            <div class="limit-height">
                                {!! $new->content !!}
                            </div>
                        </td>
                        <td><img width="200" height="100" class="img-responsive" src="{{ asset($new->image) }}"
                                alt="{{ $new->title }}"></td>
                        <td>{{ date('d-m-Y', strtotime($new->posted_on)) }}</td>
                        <td>
                            @if ($new->is_posted)
                                <a href="" title="Quitar noticia"><i class="fas fa-eye-slash"></i></a>
                            @else
                                <a href="" title="Publicar noticia"><i class="fas fa-eye"></i></a>
                            @endif
                            <a href="" title="Modificar noticia"><i class="fas fa-edit"></i></a>
                            <a href="" title="Eliminar noticia"><i class="fas fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('css')
    @toastr_css
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/datatables/css/dataTables.bootstrap4.min.css') }}">
@stop

@section('js')
    @jquery
    @toastr_js
    @toastr_render
    <script src="{{ asset('vendor/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}" defer></script>
    <script>
        $(document).ready(function() {
            $('#news').DataTable({
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
