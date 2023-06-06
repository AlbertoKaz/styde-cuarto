@extends('layout')

@section('title', "Usuario $user->id")

@section('content')
    <h3>Usuario #{{ $user->id }}</h3>
    <p class="lead">Nombre del usuario: {{ $user->name }}</p>
    <p class="lead">Correo electrónico: {{ $user->email }}</p>
    <p>
        <a href="{{ route('users.index') }}">Regresar al listado de usuarios</a>
    </p>
@endsection
