@extends('layout.template')

@section('title', 'Psicología Chile')

@section('content')
	<question-component url-api="{{ route('api.questions') }}"></question-component>
@endsection
