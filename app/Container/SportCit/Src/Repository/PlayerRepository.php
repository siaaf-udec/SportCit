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

class PlayerRepository extends ControllerRepository implements PlayerInterface
{

    public function __construct()
    {
        parent::__construct(Player::class);
    }

    /**
     * @param $model
     * @param $data
     * @return mixed
     */
    protected function process($model, $data)
    {
        $model['favorite_club'] = (isset($data['favorite_club']) || !empty($data['favorite_club'])) ? $data['favorite_club'] : null;
        $model['height'] = (isset($data['height']) || !empty($data['height'])) ? $data['height'] : null;
        $model['fk_organization_id'] = $data['fk_organization_id'];
        $model['fk_user_id'] = $data['fk_user_id'];
        $model->save();

        return $model;

    }
}