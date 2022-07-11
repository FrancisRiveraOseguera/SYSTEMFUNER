<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'empleado_id'=> 'Admin',
            'correo' => 'funeraria@gmail.com',
            'nameUser' => 'Admin',
            'cargo_id' => 'Admin',
            'password' => bcrypt('12345678')
        ])->assignRole('Gerente');;
    }
}


