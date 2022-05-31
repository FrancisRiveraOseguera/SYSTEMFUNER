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
            'cargo'=>$this->faker-> randomElement(array ('Vendedor', 'Cobrador')),
            'sueldo'=>$this->faker-> numberBetween(10000, 15000),
        ];
    }
}
