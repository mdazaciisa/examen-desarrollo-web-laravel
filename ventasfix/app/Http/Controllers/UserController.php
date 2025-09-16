<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        if (request()->wantsJson()) {
            return response()->json($users);
        }
        return view('users.index', [
            'users' => $users
        ]);
    }

    public function show($id)
    {
        //se agrega un try-catch
        try {
            $user = User::findOrFail($id);
            if (request()->wantsJson()) {
                return response()->json($user);
            }
            return view('users.show', [
                'user' => $user
            ]);
        } catch (ModelNotFoundException $e) {
            if (request()->wantsJson()) {
                return response()->json(['error' => 'usuario no encontrado'], 404);
            }
            return redirect()->route('users.index')->withErrors('Usuario no encontrado.');
        }
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        if ($request->wantsJson()) {
            return response()->json(['message' => 'Usuario creado exitosamente'], 201);
        }
        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente');
    }

    public function edit($id)
    {
        return view('users.edit', [
            'user' => User::findOrFail($id)
        ]);
    }

    public function update(StoreUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validated();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        if (request()->wantsJson()) {
            return response()->json(['message' => 'Usuario actualizado exitosamente'], 200);
        }
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            if (request()->wantsJson()) {
                return response()->json(['message' => 'Usuario eliminado'], 200);
            }
            return redirect()->route('users.index');
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar usuario'], 500);
        }
    }
}
