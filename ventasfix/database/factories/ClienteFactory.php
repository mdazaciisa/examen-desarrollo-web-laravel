<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition(): array
    {
        $rut_empresa = $this->faker->unique()->numerify('########-#');
        return [
            'rut_empresa' => $rut_empresa,
            'rubro' => $this->faker->randomElement(['Tecnología', 'Comercio', 'Servicios', 'Salud', 'Educación']),
            'razon_social' => $this->faker->company(),
            'telefono' => '+569' . $this->faker->numberBetween(10000000, 99999999),
            'direccion' => $this->faker->address(),
            'nombre_contacto' => $this->faker->name(),
            'email_contacto' => $this->faker->unique()->safeEmail(),
        ];
    }
}
