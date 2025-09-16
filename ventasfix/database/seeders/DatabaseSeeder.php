<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Producto;
use App\Models\Cliente;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Usuario admin
        User::create([
            'rut' => '12345678-9',
            'nombre' => 'Admin',
            'apellido' => 'Principal',
            'email' => 'admin.principal@ventasfix.cl',
            'password' => Hash::make('admin1234'),
        ]);
        User::factory()->count(4)->create();

        // Productos
        Producto::create([
            'sku' => 'PROD001',
            'nombre' => 'Notebook Lenovo',
            'descripcion_corta' => 'Notebook 15"',
            'descripcion_larga' => 'Notebook Lenovo 15 pulgadas, 8GB RAM, 256GB SSD.',
            'imagen_url' => '/assets/img/products/notebook-lenovo.jpg',
            'precio_neto' => 400000,
            'precio_venta' => 476000,
            'stock_actual' => 20,
            'stock_minimo' => 5,
            'stock_bajo' => 8,
            'stock_alto' => 50,
        ]);
        Producto::factory()->count(9)->create();

        // Clientes
        Cliente::create([
            'rut_empresa' => '76543210-1',
            'rubro' => 'Tecnología',
            'razon_social' => 'Tech Solutions SPA',
            'telefono' => '+56912345678',
            'direccion' => 'Av. Providencia 1234, Santiago',
            'nombre_contacto' => 'Juan Pérez',
            'email_contacto' => 'juan.perez@techspa.cl',
        ]);
        Cliente::factory()->count(9)->create();
    }
}
