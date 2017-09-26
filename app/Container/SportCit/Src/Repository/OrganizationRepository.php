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

class OrganizationRepository extends ControllerRepository implements OrganizationInterface
{

    public function __construct()
    {
        parent::__construct(Organization::class);
    }

    /**
     * @param $model
     * @param $data
     * @return mixed
     */
    protected function process($model, $data)
    {
        $model['name_organization'] = $data['name_organization'];
        $model['nit'] = $data['nit'];
        $model['city'] = $data['city'];
        $model['address_organization'] = $data['address_organization'];
        $model['phone_organization'] = $data['phone_organization'];
        $model['fundation'] = $data['fundation'];
        $model['club_colors'] = $data['club_colors'];
        $model['link_organization'] = $data['name_organization'];
        $model->save();

        return $model;

    }
}