<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CargoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cargo'=>$this->faker->unique()-> randomElement(array ('Vendedor', 'Cobrador', 'Auxiliar de contabilidad', 'Chofer')),
            'sueldo'=>$this->faker-> numberBetween(7000, 25000),
            'detalles_cargo'=>$this->faker->text
        ];
    }
}
