<?php

use Illuminate\Database\Seeder;
use App\Container\Permissions\src\Role;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=> 'superadmin',
            'display_name' => 'Administrador'
        ]);
        Role::create([
            'name'=> 'admin',
            'display_name' => 'Representante'
        ]);
    }
}
