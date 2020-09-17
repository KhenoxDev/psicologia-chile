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
                            <a href="">Publicar</a>
                            <a href="">Editar</a>
                            <a href="">Eliminar</a>
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
@stop

@section('js')
    @jquery
    @toastr_js
    @toastr_render
@stop
