<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'identidad'=> $this->faker->numerify('0###')
                .$this->faker->numberBetween(1962,2004)
                .$this->faker->unique()->numerify('#####'),
            'nombres'=>$this->faker->firstName,
            'apellidos'=>$this->faker->lastName,
            'genero'=>$this->faker->randomElement(array ('Masculino','Femenino')),
            'fecha_ingreso'=>$this->faker->dateTimeBetween('-20 years', '-1 years'),
            'cargo_id'=>$this->faker-> numberBetween(1, 2),
            'fecha_de_nacimiento'=>$this->faker->dateTimeBetween('-60 years', '-18 years'),
            'direccion'=>$this->faker->randomElement(array ('Colonia La Concepción', 'Colonia Nueva Esperanza',
            'Barrio San Antonio','Colonia El Zarzal', 'Barrio La Reforma',
            'Barrio Abajo', 'Barrio El Centro', 'Barrio El Carmelo', 'Colonia Las Colinas')),
            'telefono'=>$this->faker->numerify('8#######'),
            'contacto_de_emergencia'=>$this->faker->numerify('9#######'),
        ];
    }
}
