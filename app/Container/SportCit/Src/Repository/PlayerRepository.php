<?php

namespace App\Container\SportCit\Src\Repository;

/*
 * Interfaces
 */

use App\Container\Overall\Src\Repository\ControllerRepository;
use App\Container\SportCit\Src\Interfaces\PlayerInterface;

/*
 * Modelos
 */

use App\Container\SportCit\Src\Player;

class PlayerRepository extends ControllerRepository implements PlayerInterface {

    public function __construct()
    {
        parent::__construct(Player::class);
    }

    /**
     * @param $model
     * @param $data
     */
    protected  function process($model, $data)
    {
        $model['name'] = $data['name'];
        $model['description'] = $data['description'];
        $model['gender'] = $data['gender'];
        $model['starting_year'] = $data['starting_year'];
        $model['final_year'] = $data['final_year'];
        $model['state_category'] = $data['state_category'];
        $model['space'] = $data['space'];
        $model['fk_organization_id'] = $data['fk_organization_id'];
        $model->save();

        return $model;

    }
}