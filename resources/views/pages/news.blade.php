@extends('layout.template')

@section('title', 'Psicología Chile')

@section('content')
    <news-component url-api="{{ route('api.news') }}" url-author="{{ route('api.authors') }}"></news-component>
@endsection
