@extends('layout')

@section('title', "Página no encontrada")

@section('content')
    <p class="lead">Página no encontrada</p>
    <p>
        <a href="{{ route('users.index') }}">Regresar al listado de usuarios</a>
    </p>
@endsection
