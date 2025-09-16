@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header"><h5>Agregar Usuario</h5></div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="rut" class="form-label">RUT</label>
                        <input type="text" class="form-control" id="rut" name="rut" value="{{ old('rut') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required placeholder="nombre.apellido@ventasfix.cl" readonly>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            function updateEmail() {
                                const nombre = document.getElementById('nombre').value.trim().toLowerCase();
                                const apellido = document.getElementById('apellido').value.trim().toLowerCase();
                                if(nombre && apellido) {
                                    document.getElementById('email').value = nombre + '.' + apellido + '@ventasfix.cl';
                                } else {
                                    document.getElementById('email').value = '';
                                }
                            }
                            document.getElementById('nombre').addEventListener('input', updateEmail);
                            document.getElementById('apellido').addEventListener('input', updateEmail);
                        });
                    </script>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
