<?php

namespace App\Container\SportCit\Src\Repository;

/*
 * Interfaces
 */

use App\Container\Overall\Src\Repository\ControllerRepository;
use App\Container\SportCit\Src\Interfaces\CategoryPlayerInterface;

/*
 * Modelos
 */

use App\Container\SportCit\Src\CategoryPlayer;

class CategoryPlayerRepository extends ControllerRepository implements CategoryPlayerInterface {

    public function __construct()
    {
        parent::__construct(CategoryPlayer::class);
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
        $model['starting-year'] = $data['starting-year'];
        $model['final-year'] = $data['final-year'];
        $model['state_category'] = $data['state_category'];
        $model['space'] = $data['space'];
        $model->save();

        return $model;

    }
}