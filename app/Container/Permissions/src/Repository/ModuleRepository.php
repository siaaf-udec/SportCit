<?php

namespace App\Container\Permissions\Src\Repository;


/*
 * Interfaces
 */
use App\Container\Overall\Src\Repository\ControllerRepository;
use App\Container\Permissions\Src\Interfaces\ModuleInterface;

/*
 * Modelos
 */
use App\Container\Permissions\Src\Module;

class ModuleRepository extends ControllerRepository implements ModuleInterface
{
    public function __construct()
    {
        parent::__construct(Module::class);
    }

    protected function process($role, $data)
    {
        $role['name'] = $data['name'];
        $role->save();
        return $role;
    }
}