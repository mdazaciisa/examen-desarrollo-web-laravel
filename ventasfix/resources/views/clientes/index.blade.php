@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Clientes</h4>
        <a href="{{ route('clientes.create') }}" class="btn btn-primary">Agregar Cliente</a>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>RUT Empresa</th>
                        <th>Razón Social</th>
                        <th>Rubro</th>
                        <th>Contacto</th>
                        <th>Email Contacto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->rut_empresa }}</td>
                        <td>{{ $cliente->razon_social }}</td>
                        <td>{{ $cliente->rubro }}</td>
                        <td>{{ $cliente->nombre_contacto }}</td>
                        <td>{{ $cliente->email_contacto }}</td>
                        <td>
                            <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar cliente?')">Eliminar</button>
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
