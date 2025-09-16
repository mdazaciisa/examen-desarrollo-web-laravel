<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log; //ELIMINAR AL FINAL

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        if (request()->wantsJson()) {
            return response()->json($productos);
        }
        return view('productos.index', [
            'productos' => $productos
        ]);
    }

    public function show($id)
    {
        //se agrega un try-catch
        try {
            $producto = Producto::findOrFail($id);
            if (request()->wantsJson()) {
                return response()->json($producto);
            }
            return view('productos.show', [
                'producto' => $producto
            ]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            if (request()->wantsJson()) {
                return response()->json(['error' => 'producto no encontrado'], 404);
            }
            return redirect()->route('productos.index')->withErrors('Producto no encontrado.');
        }
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sku' => 'required|unique:productos,sku',
            'nombre' => 'required',
            'descripcion_corta' => 'required',
            'descripcion_larga' => 'required',
            'imagen_nombre' => 'required|string|max:255',
            'precio_neto' => 'required|numeric',
            'stock_actual' => 'required|integer',
            'stock_minimo' => 'required|integer',
            'stock_bajo' => 'required|integer',
            'stock_alto' => 'required|integer',
        ], [
            'sku.required' => 'El sku es obligatorio',
            'sku.unique' => 'El sku ya existe',
            'nombre.required' => 'El nombre es obligatorio',
            'descripcion_corta.required' => 'La descripción corta es obligatoria',
            'descripcion_larga.required' => 'La descripción larga es obligatoria',
            'imagen_nombre.required' => 'El nombre de la imagen es obligatorio',
            'imagen_nombre.string' => 'El nombre de la imagen debe ser un texto',
            'imagen_nombre.max' => 'El nombre de la imagen no debe superar los 255 caracteres',
            'precio_neto.required' => 'El precio neto es obligatorio',
            'precio_neto.numeric' => 'El precio neto debe ser un número',
            'stock_actual.required' => 'El stock actual es obligatorio',
            'stock_actual.integer' => 'El stock actual debe ser un número entero',
            'stock_minimo.required' => 'El stock mínimo es obligatorio',
            'stock_minimo.integer' => 'El stock mínimo debe ser un número entero',
            'stock_bajo.required' => 'El stock bajo es obligatorio',
            'stock_bajo.integer' => 'El stock bajo debe ser un número entero',
            'stock_alto.required' => 'El stock alto es obligatorio',
            'stock_alto.integer' => 'El stock alto debe ser un número entero',
        ]);
        $data['imagen_url'] = '/assets/img/products/' . ltrim($data['imagen_nombre'], '/');
        unset($data['imagen_nombre']);
        $data['precio_venta'] = round($data['precio_neto'] * 1.19);
        $producto = Producto::create($data);
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Producto creado exitosamente'], 201);
        }
        return redirect()->route('productos.index');
    }

    public function edit($id)
    {
        //se agrega un try/catch
        try {
            return view('productos.edit', ['producto' => Producto::findOrFail($id)]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('productos.index')->withErrors('Producto no encontrado.');
        }
    }

    public function update(Request $request, $id)
    {
        //se agrega try/catch
        try {
            Log::info('Update request data:', $request->all());
            $producto = Producto::findOrFail($id);

            $data = $request->validate([
                'sku' => 'required|unique:productos,sku,' . $id,
                'nombre' => 'required',
                'descripcion_corta' => 'required',
                'descripcion_larga' => 'required',
                'imagen_nombre' => 'required|string|max:255',
                // validar que sean números positivos
                'precio_neto' => 'required|numeric|min:0',
                'stock_actual' => 'required|integer|min:0',
                'stock_minimo' => 'required|integer|min:0',
                'stock_bajo' => 'required|integer|min:0',
                'stock_alto' => 'required|integer|min:0',
            ]);
            $data['imagen_url'] = '/assets/img/products/' . ltrim($data['imagen_nombre'], '/');
            unset($data['imagen_nombre']);
            $data['precio_venta'] = round($data['precio_neto'] * 1.19);
            $producto->update($data);
            Log::info('Producto actualizado:', $producto->toArray()); //ELIMINAR DESPUÉS
            if (request()->wantsJson()) {
                return response()->json(['message' => 'Producto actualizado exitosamente'], 200);
            }
            return redirect()->route('productos.index');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            Log::error('Producto no encontrado: ' . $e->getMessage()); //ELIMINAR DESPUÉS
            if (request()->wantsJson()) {
                return response()->json(['error' => 'Producto no encontrado'], 404);
            }
            return redirect()->route('productos.index')
                ->withErrors('Producto no encontrado.');
        }
    }


    public function destroy($id)
    {
        try {
            $producto = Producto::findOrFail($id);
            $producto->delete();

            if (request()->wantsJson()) {
                return response()->json(['message' => 'Producto eliminado'], 200);
            }
            return redirect()->route('productos.index');
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error inesperado'], 500);
        }
    }
}
