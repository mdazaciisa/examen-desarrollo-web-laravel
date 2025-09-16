@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">Productos</h4>
        <a href="{{ route('productos.create') }}" class="btn btn-primary">Agregar Producto</a>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>SKU</th>
                        <th>Nombre</th>
                        <th>Precio Neto</th>
                        <th>Precio Venta</th>
                        <th>Stock</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->id }}</td>
                        <td>{{ $producto->sku }}</td>
                        <td>{{ $producto->nombre }}</td>
                        <td>${{ number_format($producto->precio_neto, 0, ',', '.') }}</td>
                        <td>${{ number_format($producto->precio_venta, 0, ',', '.') }}</td>
                        <td>{{ $producto->stock_actual }}</td>
                        <td>
                            <a href="{{ route('productos.show', $producto) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
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
