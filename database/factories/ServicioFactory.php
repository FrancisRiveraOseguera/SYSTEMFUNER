<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServicioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tipo'=>$this->faker->unique()->randomElement(array ('Jardín', 'Faraón', 'Romano','Ejecutivo','Presidente especial',
                    'Europeo de Lujo', 'Colombiano', 'Italiano Especial', 'Súper Colombiano','Súper de Lujo','Económico')),
            'categoria'=>$this->faker->randomElement(array ('Adultos', 'Juvenil', 'Infantil')),
            'precio'=>$this->faker->numberBetween(13000.00,200000.00),
            'cuota'=>$this->faker->numberBetween(200.00,999),
            'prima'=>$this->faker->numberBetween(1000,10000),
            'detalles'=>$this->faker->text,

        ];
    }
}
