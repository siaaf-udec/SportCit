<?php

namespace App\Container\SportCit\Src\Repository;

/*
 * Interfaces
 */

use App\Container\Overall\Src\Repository\ControllerRepository;
use App\Container\SportCit\Src\Interfaces\SportPlaceInterface;


/*
 * Modelos
 */

use App\Container\SportCit\Src\SportPlace;

class SportPlaceRepository extends ControllerRepository implements SportPlaceInterface
{

    public function __construct()
    {
        parent::__construct(SportPlace::class);
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
        $model['state'] = $data['state'];
        $model['latitude'] = $data['latitude'];
        $model['longitude'] = $data['longitude'];
        $model->save();

        return $model;

    }
}