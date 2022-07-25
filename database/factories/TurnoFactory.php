<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TurnoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->randomElement(array('Matutino')),
            'horario_entrada'=>$this->faker->randomElement(array('07:00', '15:00')),
            'horario_salida'=>$this->faker->randomElement(array('21:00', '07:00', '23:55'))
        ];
    }
}
