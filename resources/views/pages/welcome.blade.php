@extends('layout.template', ['toLinks' => $toLinks ?? ''])

@section('title', 'Psicología Chile')

@section('content')
    <home-component img-background="{{ asset('img/banner/terapiaonline_2.jpg') }}" app-url="{{ env('APP_URL') }}">
    </home-component>
@endsection
