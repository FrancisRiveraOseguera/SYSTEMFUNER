<?php

namespace Database\Seeders;
use App\Models\Servicio;
use App\Models\Cargo;
use App\Models\Empleado;
use App\Models\Inventario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call([
            ClienteSeeder::class,
            EmpleadoSeeder::class,
            ServicioSeeder::class,
            CargoSeeder::class,
            PermisosSeeder::class,
            RoleSeeder::class,
            UsuarioSeeder::class,
            RoleHasPermissionSeeder::class,

        ]);
    }
}
