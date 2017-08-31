<?php

namespace App\Container\SportCit\Src\Repository;

/*
 * Interfaces
 */

use App\Container\Overall\Src\Repository\ControllerRepository;
use App\Container\SportCit\Src\Interfaces\TeamInterface;


/*
 * Modelos
 */

use App\Container\SportCit\Src\Team;

class TeamRepository extends ControllerRepository implements TeamInterface{

    public function __construct()
    {
        parent::__construct(Team::class);
    }

    /**
     * @param $model
     * @param $data
     */
    protected  function process($model, $data)
    {
        $model['name'] = $data['name_team'];
        $model['season'] = $data['season'];
        $model['city'] = $data['city'];
        $model->save();

        return $model;

    }
}