<?php

use Illuminate\Database\Seeder;

 /*
 *Model
 */
use App\Container\SportCit\Src\Test;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
    */
    public function run()
    {
        Test::create([
            'name'=> 'Cooper',
            'variables' => 'edad,genero,tiempo,distancia',
            'style' => '{"edad":{"icon":"fa fa-user"},
                        "genero":{"icon":"fa fa-user"},
                        "tiempo":{"icon":"fa fa-user"},
                        "distancia":{"icon":"fa fa-user"}}'
        ]);
    }
}
