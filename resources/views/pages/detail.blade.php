@extends('layout.template')

@section('title', 'Psicología Chile')

@section('content')
	<detail-component code-professional="{{ $id }}"></detail-component>
@endsection
