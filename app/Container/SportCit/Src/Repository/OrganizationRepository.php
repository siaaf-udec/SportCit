<?php

namespace App\Container\SportCit\Src\Repository;

/*
 * Interfaces
 */

use App\Container\Overall\Src\Repository\ControllerRepository;
use App\Container\SportCit\Src\Interfaces\OrganizationInterface;

/*
 * Modelos
 */

use App\Container\SportCit\Src\Organization;

class OrganizationRepository extends ControllerRepository implements OrganizationInterface{

    public function __construct()
    {
        parent::__construct(Organization::class);
    }

    /**
     * @param $model
     * @param $data
     */
    protected  function process($model, $data)
    {
        $model['name_organization'] = $data['name'];
        $model['nit'] = $data['nit'];
        $model['address_organization'] = $data['address'];
        $model['phone_organization'] = $data['phone'];
        $model['fundation'] = $data['fundation'];
        $model['club_colors'] = $data['club_colors'];
        $model['link_organization'] = $data['name'];
        $model->save();

        return $model;

    }
}