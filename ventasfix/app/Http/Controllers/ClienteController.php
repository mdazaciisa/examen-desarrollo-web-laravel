<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        if (request()->wantsJson()) {
            return response()->json($clientes);
        }
        return view('clientes.index', [
            'clientes' => $clientes
        ]);
    }

    public function show($id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            if (request()->wantsJson()) {
                return response()->json($cliente);
            }
            return view('clientes.show', [
                'cliente' => $cliente
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(StoreClienteRequest $request)
    {
        $data = $request->validated();
        $cliente = Cliente::create($data);
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Cliente creado exitosamente'], 201);
        }
        return redirect()->route('clientes.index');
    }

    public function edit($id)
    {
        return view('clientes.edit', [
            'cliente' => Cliente::findOrFail($id)
        ]);
    }

    public function update(UpdateClienteRequest $request, $id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }
        $data = $request->validated();
        $cliente->update($data);
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Cliente actualizado exitosamente'], 200);
        }
        return redirect()->route('clientes.index');
    }

    public function destroy($id)
    {
        try {
            $cliente = Cliente::findOrFail($id);
            $cliente->delete();

            if (request()->wantsJson()) {
                return response()->json(['message' => 'Cliente eliminado'], 200);
            }

            return redirect()->route('clientes.index');
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar cliente'], 500);
        }
    }
}
