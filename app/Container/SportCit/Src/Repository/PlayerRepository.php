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
        $model['weight'] = (isset($data['weight']) || !empty($data['weight'])) ? $data['weight'] : null;
        $model['foot'] = (isset($data['foot']) || !empty($data['foot'])) ? $data['foot'] : null;
        $model['motto'] = (isset($data['motto']) || !empty($data['motto'])) ? $data['motto'] : null;
        $model['state'] = (isset($data['state_player']) || !empty($data['state_player'])) ? $data['state_player'] : null;
        $model['current_club'] = (isset($data['current_club']) || !empty($data['current_club'])) ? $data['current_club'] : null;
        $model['favorite_player'] = (isset($data['favorite_player']) || !empty($data['favorite_player'])) ? $data['favorite_player'] : null;
        $model['strengths'] = (isset($data['strengths']) || !empty($data['strengths'])) ? $data['strengths'] : null;
        $model['weakness'] = (isset($data['weakness']) || !empty($data['weakness'])) ? $data['weakness'] : null;
        $model['training_target'] = (isset($data['training_target']) || !empty($data['training_target'])) ? $data['training_target'] : null;
        $model['other'] = (isset($data['other']) || !empty($data['other'])) ? $data['other'] : null;

        $model['fk_organization_id'] = $data['fk_organization_id'];
        $model['fk_cate_player_id'] = (isset($data['fk_cate_player_id']) || !empty($data['fk_cate_player_id'])) ? $data['fk_cate_player_id'] : null;
        $model['fk_position_id'] = (isset($data['fk_position_id']) || !empty($data['fk_position_id'])) ? $data['fk_position_id'] : null;
        $model['fk_team_id'] = (isset($data['fk_team_id']) || !empty($data['fk_team_id'])) ? $data['fk_team_id'] : null;
        $model['fk_user_id'] = $data['fk_user_id'];
        $model->save();

        return $model;

    }
}