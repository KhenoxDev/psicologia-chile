@extends('layout.template')

@section('title', 'Psicología Chile')

@section('content')
	<professional-component filter-opt="{{ isset($filter) ? $filter : '' }}" name-opt="{{ isset($name) ? $name : '' }}"></professional-component>
@endsection
