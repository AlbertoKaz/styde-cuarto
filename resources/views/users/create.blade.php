@extends('layout')

@section('title', "Crear usuario")

@section('content')
    <div class="card">
        <h4 class="card-header">Crear usuario</h4>
        <div class="card-body">

            @include('shared._errors')

            <form method="post" action="{{ url('usuarios/crear') }}" class="needs-validation novalidate">
                @include('users._fields')


                <div class="form-group mt-4">
                    <button class="w-50 btn btn-primary" type="submit">Crear usuario</button>
                    <a href="{{ route('users.index') }}" class="btn btn-link">Regresar al listado de usuarios</a>
                </div>
            </form>
        </div>
    </div>
@endsection
