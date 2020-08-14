@extends('layout.template')

@section('title', 'Psicología Chile')

@section('content')
	<news-detail id-news="{{ $id }}" url-api="{{ route("api.news") }}"></news-detail>
@endsection
