@extends('layout')

@section('title', "Crear usuario")

@section('content')
    <div class="card">
        <h4 class="card-header">Actualizar usuario</h4>
        <div class="card-body">
        @slot('header', 'Editar usuario')

        @include('shared._errors')

        <form method="post" action="{{ url("usuarios/{$user->id}") }}">
            @method('PUT')
            @include('users._fields')

            <div class="form-group mt-4">
                <button type="submit" class="btn btn-primary">Actualizar usuario</button>
                <a href="{{ route('users.index') }}" class="btn btn-link">Regresar al listado de usuarios</a>
            </div>
        </form>
    </div>
@endsection
