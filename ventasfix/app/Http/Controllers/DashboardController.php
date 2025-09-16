<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Producto;
use App\Models\Cliente;

class DashboardController extends Controller
{
    public function index()
    {
        $usuarios = User::count();
        $productos = Producto::count();
        $clientes = Cliente::count();
        return view('dashboard', compact('usuarios', 'productos', 'clientes'));
    }
}
