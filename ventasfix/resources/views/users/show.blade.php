@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header"><h5>Detalle de Usuario</h5></div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">ID</dt>
                    <dd class="col-sm-8">{{ $user->id }}</dd>
                    <dt class="col-sm-4">RUT</dt>
                    <dd class="col-sm-8">{{ $user->rut }}</dd>
                    <dt class="col-sm-4">Nombre</dt>
                    <dd class="col-sm-8">{{ $user->nombre }}</dd>
                    <dt class="col-sm-4">Apellido</dt>
                    <dd class="col-sm-8">{{ $user->apellido }}</dd>
                    <dt class="col-sm-4">Email</dt>
                    <dd class="col-sm-8">{{ $user->email }}</dd>
                </dl>
                <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection
