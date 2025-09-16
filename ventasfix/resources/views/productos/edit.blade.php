@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header"><h5>Editar Producto</h5></div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-danger">{{ $errors->first() }}</div>
                @endif
                <form method="POST" action="{{ route('productos.update', $producto) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="sku" class="form-label">SKU</label>
                        <input type="text" class="form-control" id="sku" name="sku" value="{{ old('sku', $producto->sku) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion_corta" class="form-label">Descripción corta</label>
                        <input type="text" class="form-control" id="descripcion_corta" name="descripcion_corta" value="{{ old('descripcion_corta', $producto->descripcion_corta) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion_larga" class="form-label">Descripción larga</label>
                        <textarea class="form-control" id="descripcion_larga" name="descripcion_larga" rows="3" required>{{ old('descripcion_larga', $producto->descripcion_larga) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="precio_neto" class="form-label">Precio neto</label>
                        <input type="number" class="form-control" id="precio_neto" name="precio_neto" value="{{ old('precio_neto', $producto->precio_neto) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="precio_venta" class="form-label">Precio venta (19%)</label>
                        <input type="number" class="form-control" id="precio_venta" name="precio_venta" value="{{ old('precio_venta', $producto->precio_venta) }}" readonly>
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
                        <label for="stock_actual" class="form-label">Stock actual</label>
                        <input type="number" class="form-control" id="stock_actual" name="stock_actual" value="{{ old('stock_actual', $producto->stock_actual) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock_minimo" class="form-label">Stock mínimo</label>
                        <input type="number" class="form-control" id="stock_minimo" name="stock_minimo" value="{{ old('stock_minimo', $producto->stock_minimo) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock_bajo" class="form-label">Stock bajo</label>
                        <input type="number" class="form-control" id="stock_bajo" name="stock_bajo" value="{{ old('stock_bajo', $producto->stock_bajo) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="stock_alto" class="form-label">Stock alto</label>
                        <input type="number" class="form-control" id="stock_alto" name="stock_alto" value="{{ old('stock_alto', $producto->stock_alto) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="imagen_nombre" class="form-label">Nombre de la imagen</label>
                        <input type="text" class="form-control" id="imagen_nombre" name="imagen_nombre" value="{{ old('imagen_nombre', basename($producto->imagen_url)) }}" required>
                        <div class="form-text">Solo el nombre, por ejemplo: <b>producto1.jpg</b></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
