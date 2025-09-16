@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header"><h5>Editar Cliente</h5></div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
                <form method="POST" action="{{ route('clientes.update', $cliente) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="rut_empresa" class="form-label">RUT Empresa</label>
                        <input type="text" class="form-control" id="rut_empresa" name="rut_empresa" value="{{ old('rut_empresa', $cliente->rut_empresa) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="rubro" class="form-label">Rubro</label>
                        <input type="text" class="form-control" id="rubro" name="rubro" value="{{ old('rubro', $cliente->rubro) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="razon_social" class="form-label">Razón Social</label>
                        <input type="text" class="form-control" id="razon_social" name="razon_social" value="{{ old('razon_social', $cliente->razon_social) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $cliente->telefono) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $cliente->direccion) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre_contacto" class="form-label">Nombre Contacto</label>
                        <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" value="{{ old('nombre_contacto', $cliente->nombre_contacto) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email_contacto" class="form-label">Email Contacto</label>
                        <input type="email" class="form-control" id="email_contacto" name="email_contacto" value="{{ old('email_contacto', $cliente->email_contacto) }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
