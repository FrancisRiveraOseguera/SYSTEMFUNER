<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InventarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'servicio_id'=>$this->faker->unique()->randomDigit(array(1,2,3,4,5,6,7,8,9)),
            'empleado_id'=>$this->faker-> numberBetween(1, 10),
            'cantidad_aIngresar'=>$this->faker->numerify('0'),
            'fecha_ingreso'=>$this->faker->dateTimeBetween('-5 months', '-1 months'),

        ];
    }
}
