<?php

namespace App\Container\SportCit\Src\Repository;

/*
 * Interfaces
 */

use App\Container\Overall\Src\Repository\ControllerRepository;
use App\Container\SportCit\Src\Interfaces\TestInterface;


/*
 * Modelos
 */

use App\Container\SportCit\Src\Test;

class TestRepository extends ControllerRepository implements TestInterface
{

    public function __construct()
    {
        parent::__construct(Test::class);
    }

    /**
     * @param $model
     * @param $data
     * @return mixed
     */
    protected function process($model, $data)
    {
       /* $model['name'] = $data['name_team'];
        $model['season'] = $data['season'];
        $model['city'] = $data['city'];
        $model->save();

        return $model;*/

    }
}