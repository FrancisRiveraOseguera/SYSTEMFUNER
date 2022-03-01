<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombres'=>$this->faker->firstName,
            'apellidos'=>$this->faker->lastName,
            'identidad'=> $this->faker->numerify('0###')
                .$this->faker->numberBetween(1922,2004)
                .$this->faker->unique()->numerify('#####'),
            'fecha_de_nacimiento'=>$this->faker->dateTimeBetween('-100 years', '-18 years'),
            'direccion'=>$this->faker->randomElement(array ('Colonia La Concepción', 'Colonia Nueva Esperanza',
                'Barrio Abajo', 'Barrio El Centro', 'Barrio El Carmelo', 'Colonia Las Colinas', 'Colonia El Paisaje')),
            'telefono'=>$this->faker->numerify('8#######'),
            'ocupacion'=>$this->faker->randomElement(array ('Catedrático', 'Ingeniero', 'Albañil', 'Arquitecto', 'Mecánico',
                'Médico', 'Estudiante', 'Gerente', 'Administrador de empresas', 'Asistente', 'Comerciante', 'Jubilado',
                'Estilista', 'Padre de familia')),
        ];
    }
}
