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
            'name'=>$this->faker->randomElement(array('Matutino', 'Vespertino', 'Nocturno')),
            'horario_entrada'=>$this->faker->randomElement(array('07:00', '15:00', '21:00', '12:00', '00:00')),
            'horario_salida'=>$this->faker->randomElement(array('15:00', '21:00', '07:00', '08:00', '23:55'))
        ];
    }
}
