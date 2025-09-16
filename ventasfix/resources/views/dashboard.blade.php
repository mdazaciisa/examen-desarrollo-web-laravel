@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-12 mb-4">
            <h2>Bienvenido, {{ auth()->user()->nombre }} {{ auth()->user()->apellido }}</h2>
            <form method="POST" action="/logout" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-outline-danger btn-sm">Cerrar sesión</button>
            </form>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Usuarios</h5>
                    <p class="display-4 fw-bold mb-0">{{ $usuarios }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Productos</h5>
                    <p class="display-4 fw-bold mb-0">{{ $productos }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Clientes</h5>
                    <p class="display-4 fw-bold mb-0">{{ $clientes }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
