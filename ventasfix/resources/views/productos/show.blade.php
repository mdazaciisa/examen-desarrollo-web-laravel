@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header"><h5>Detalle de Producto</h5></div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">SKU</dt>
                    <dd class="col-sm-8">{{ $producto->sku }}</dd>
                    <dt class="col-sm-4">Nombre</dt>
                    <dd class="col-sm-8">{{ $producto->nombre }}</dd>
                    <dt class="col-sm-4">Descripción corta</dt>
                    <dd class="col-sm-8">{{ $producto->descripcion_corta }}</dd>
                    <dt class="col-sm-4">Descripción larga</dt>
                    <dd class="col-sm-8">{{ $producto->descripcion_larga }}</dd>
                    <dt class="col-sm-4">Precio neto</dt>
                    <dd class="col-sm-8">${{ number_format($producto->precio_neto, 0, ',', '.') }}</dd>
                    <dt class="col-sm-4">Precio venta</dt>
                    <dd class="col-sm-8">${{ number_format($producto->precio_venta, 0, ',', '.') }}</dd>
                    <dt class="col-sm-4">Stock actual</dt>
                    <dd class="col-sm-8">{{ $producto->stock_actual }}</dd>
                    <dt class="col-sm-4">Stock mínimo</dt>
                    <dd class="col-sm-8">{{ $producto->stock_minimo }}</dd>
                    <dt class="col-sm-4">Stock bajo</dt>
                    <dd class="col-sm-8">{{ $producto->stock_bajo }}</dd>
                    <dt class="col-sm-4">Stock alto</dt>
                    <dd class="col-sm-8">{{ $producto->stock_alto }}</dd>
                    <dt class="col-sm-4">Imagen</dt>
                    <dd class="col-sm-8">
                        @if($producto->imagen_url)
                            <img src="{{ asset($producto->imagen_url) }}" alt="Imagen producto" style="max-width:150px;">
                        @else
                            <span class="text-muted">Sin imagen</span>
                        @endif
                    </dd>
                </dl>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection
