@extends('layout')

@section('title', 'Usuarios')

@section('content')
    <div class="d-flex justify-content-between align-items-end mb-3">
        <h1 class="pb-1">{{ $title }}</h1>
        <p>
            <a href="{{ route('users.create') }}" class="btn btn-dark">Nuevo usuario</a>
        </p>
    </div>
    @includeWhen(isset($states), 'users._filters')

    @if ($users->isNotEmpty())
        <div class="table-responsive-lg">
            <table class="table table-sm">
                <thead class="thead-dark">
                <tr>
                    <th scope="col"># <span class="bi bi-arrow-down-short"></span><span class="bi bi-arrow-up-short"></span></th>
                    <th scope="col" class="sort-desc">Nombre <span class="bi bi-arrow-down-short"></span><span class="bi bi-arrow-up-short"></span></th>
                    <th scope="col">Correo <span class="bi bi-arrow-down-short"></span><span class="bi bi-arrow-up-short"></span></th>
                    <th scope="col">Fechas <span class="bi bi-arrow-down-short"></span><span class="bi bi-arrow-up-short"></span></th>
                    <th scope="col" class="text-right th-actions">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @each('users._row', $users, 'user')
                </tbody>
            </table>

            {{ $users->links() }}
            <p>Viendo página {{ $users->currentPage() }} de {{ $users->lastPage() }}</p>
        </div>
    @else
        <p>No hay usuarios registrados.</p>
    @endif
@endsection

@section('sidebar')
    @parent
@endsection
