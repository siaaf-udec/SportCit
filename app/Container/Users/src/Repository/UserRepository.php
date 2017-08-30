<?php

namespace App\Container\Users\Src\Repository;


/*
 * Interfaces
 */
use App\Container\Overall\Src\Repository\ControllerRepository;
use App\Container\Users\Src\Interfaces\UserInterface;


/*
 * Facades
 */
use Illuminate\Support\Facades\App;

/*
 * Modelos
 */
use App\Container\Users\Src\User;

class UserRepository extends ControllerRepository implements UserInterface
{
    public function __construct()
    {
        parent::__construct(User::class);
    }

    protected function process($user, $data)
    {
        $user['identity_type'] = $data['identity_type'];
        $user['identity_no'] = $data['identity_no'];
        $user['name'] = $data['name'];
        $user['lastname'] = $data['lastname'];
        $user['birthday'] = $data['birthday'];
        $user['phone'] = $data['phone'];
        $user['website'] = $data['website'];
        $user['email'] = $data['email'];
        $user['password'] = bcrypt($data['password']);
        $user->save();
        return $user;
    }
}