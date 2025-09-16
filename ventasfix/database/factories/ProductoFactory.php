<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    protected $model = Producto::class;

    public function definition(): array
    {
        $nombre = $this->faker->words(2, true);
        $sku = strtoupper($this->faker->unique()->bothify('PROD###'));
        return [
            'sku' => $sku,
            'nombre' => ucfirst($nombre),
            'descripcion_corta' => $this->faker->sentence(3),
            'descripcion_larga' => $this->faker->paragraph(2),
            'imagen_url' => '/assets/img/products/' . $sku . '.jpg',
            'precio_neto' => $this->faker->numberBetween(10000, 500000),
            'precio_venta' => function (array $attrs) {
                return (int)($attrs['precio_neto'] * 1.19);
            },
            'stock_actual' => $this->faker->numberBetween(0, 100),
            'stock_minimo' => $this->faker->numberBetween(1, 10),
            'stock_bajo' => $this->faker->numberBetween(5, 20),
            'stock_alto' => $this->faker->numberBetween(30, 200),
        ];
    }
}
