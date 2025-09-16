@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header"><h5>Detalle de Cliente</h5></div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">ID</dt>
                    <dd class="col-sm-8">{{ $cliente->id }}</dd>
                    <dt class="col-sm-4">RUT Empresa</dt>
                    <dd class="col-sm-8">{{ $cliente->rut_empresa }}</dd>
                    <dt class="col-sm-4">Rubro</dt>
                    <dd class="col-sm-8">{{ $cliente->rubro }}</dd>
                    <dt class="col-sm-4">Razón Social</dt>
                    <dd class="col-sm-8">{{ $cliente->razon_social }}</dd>
                    <dt class="col-sm-4">Teléfono</dt>
                    <dd class="col-sm-8">{{ $cliente->telefono }}</dd>
                    <dt class="col-sm-4">Dirección</dt>
                    <dd class="col-sm-8">{{ $cliente->direccion }}</dd>
                    <dt class="col-sm-4">Nombre Contacto</dt>
                    <dd class="col-sm-8">{{ $cliente->nombre_contacto }}</dd>
                    <dt class="col-sm-4">Email Contacto</dt>
                    <dd class="col-sm-8">{{ $cliente->email_contacto }}</dd>
                </dl>
                <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection
