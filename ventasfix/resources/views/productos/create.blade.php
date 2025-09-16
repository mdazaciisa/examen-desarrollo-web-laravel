@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header"><h5>Agregar Producto</h5></div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
                <form method="POST" action="{{ route('productos.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="sku" class="form-label">SKU</label>
                        <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion_corta" class="form-label">Descripción corta</label>
                        <input type="text" class="form-control" id="descripcion_corta" name="descripcion_corta" value="{{ old('descripcion_corta') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion_larga" class="form-label">Descripción larga</label>
                        <textarea class="form-control" id="descripcion_larga" name="descripcion_larga" required>{{ old('descripcion_larga') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="imagen_nombre" class="form-label">Nombre de la imagen</label>
                        <input type="text" class="form-control" id="imagen_nombre" name="imagen_nombre" value="{{ old('imagen_nombre') }}" required>
                        <div class="form-text">Solo el nombre, por ejemplo: <b>producto1.jpg</b></div>
                    </div>
                    <div class="mb-3">
                        <label for="precio_neto" class="form-label">Precio Neto</label>
                        <input type="number" class="form-control" id="precio_neto" name="precio_neto" value="{{ old('precio_neto') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="precio_venta" class="form-label">Precio Venta (19%)</label>
                        <input type="number" class="form-control" id="precio_venta" name="precio_venta" value="{{ old('precio_venta') }}" readonly>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            function updatePrecioVenta() {
                                const neto = parseFloat(document.getElementById('precio_neto').value);
                                if (!isNaN(neto)) {
                                    document.getElementById('precio_venta').value = Math.round(neto * 1.19);
                                } else {
                                    document.getElementById('precio_venta').value = '';
                                }
                            }
                            document.getElementById('precio_neto').addEventListener('input', updatePrecioVenta);
                            updatePrecioVenta();
                        });
                    </script>
                    <div class="mb-3">
                        <label for="stock_actual" class="form-label">Stock Actual</label>
                        <input type="number" class="form-control" id="stock_actual" name="stock_actual" value="{{ old('stock_actual') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock_minimo" class="form-label">Stock Mínimo</label>
                        <input type="number" class="form-control" id="stock_minimo" name="stock_minimo" value="{{ old('stock_minimo') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock_bajo" class="form-label">Stock Bajo</label>
                        <input type="number" class="form-control" id="stock_bajo" name="stock_bajo" value="{{ old('stock_bajo') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock_alto" class="form-label">Stock Alto</label>
                        <input type="number" class="form-control" id="stock_alto" name="stock_alto" value="{{ old('stock_alto') }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
