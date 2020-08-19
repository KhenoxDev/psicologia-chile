@extends('layout.template', ['toLinks' => $toLinks ?? ''])

@section('title', 'Psicología Chile')

@section('content')
	<home-component img-background="{{ asset('img/banner/terapiaonline.jpg') }}"></home-component>
@endsection
