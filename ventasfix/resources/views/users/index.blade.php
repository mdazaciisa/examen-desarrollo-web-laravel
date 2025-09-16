@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Usuarios</h4>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Agregar Usuario</a>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RUT</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->rut }}</td>
                        <td>{{ $user->nombre }}</td>
                        <td>{{ $user->apellido }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('users.show', $user) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar usuario?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
