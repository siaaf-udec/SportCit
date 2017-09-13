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

class CategoryPlayerRepository extends ControllerRepository implements CategoryPlayerInterface
{

    public function __construct()
    {
        parent::__construct(CategoryPlayer::class);
    }

    /**
     * @param $model
     * @param $data
     * @return mixed
     */
    protected function process($model, $data)
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