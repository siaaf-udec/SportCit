<?php

use Illuminate\Database\Seeder;

use App\Container\Permissions\Src\Interfaces\ModuleInterface;

/*
 * Modelos
 */
use App\Container\SportCit\Src\Position;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positicions = [
            ['name' => 'Portero'],
            ['name' => 'Defensa Central'],
            ['name' => 'Lateral Izquierdo'],
            ['name' => 'Lateral Derecho'],
            ['name' => 'Pivote Defensivo'],
            ['name' => 'Mediapunta'],
            ['name' => 'Centrocampista Izquierdo'],
            ['name' => 'Centrocampista Derecho'],
            ['name' => 'Central Ofensivo'],
            ['name' => 'Extremo Izquierdo'],
            ['name' => 'Extremo Derecho'],
            ['name' => 'Segundo Delantero'],
            ['name' => 'Delantero Centro'],
        ];

        foreach ($positicions as $positicion) {
            $temp = new Position;
            $temp->name = $positicion['name'];
            $temp->save();
        }
    }
}
