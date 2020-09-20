@extends('adminlte::page')

@section('title', 'Psicología Chile')

@section('content_header')
    <h1>{{ __('Administración de documentos') }}</h1>
@stop

@section('content')
    <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Subir un documento</button>
    <div class="docs-container">
        @if (count($docs) > 0)
            @foreach ($docs as $doc)
                <div class="docs-card shadow-sm">
                    <img width="80" height="80"
                        src="{{ asset('img/extensions/' . pathinfo(public_path($doc->file), PATHINFO_EXTENSION) . '.svg') }}"
                        alt="{{ $doc->name }}">
                    <input type="text" name="copy_{{ $doc->id }}" id="copy_{{ $doc->id }}"
                        value="{{ env('APP_URL') . $doc->file }}" readonly>
                    <a href="javascript:void(0)" class="copy btn btn-primary btn-block btn-sm"
                        data-clipboard-target="#copy_{{ $doc->id }}">{{ __('Obtener enlace') }}</a>
                    <a href="{{ route('admin.download.document', $doc->id) }}"
                        class="btn btn-warning btn-block btn-sm text-white">Descargar</a>
                    <a href="{{ route('admin.destroy.document', $doc->id) }}"
                        class="btn btn-danger btn-block btn-sm">{{ __('Eliminar') }}</a>
                </div>
            @endforeach
        @else
            <span class="no-results">No hay documentos cargados</span>
        @endif
    </div>
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">{{ __('¡Sube tu documento!') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('admin.store.document') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="d-flex" for="documento">{{ __('Documento *') }}</label>
                            <input type="file" name="documento" id="documento" class="form-control" required>
                            <small id="documentoAyuda" class="form-text text-muted">Sólo se admiten archivos tipo: pdf, doc,
                                docx, xls, xlsx, ppt y pptx</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cerrar') }}</button>
                        <button type="submit" class="btn btn-primary">{{ __('Subir documento') }}</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10" defer></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var clipboard = new ClipboardJS('.copy');

            clipboard.on('success', function(e) {
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Enlace copiado!',
                    showConfirmButton: false,
                    timer: 1000
                })
                e.clearSelection();
            });
        });

    </script>
@stop
