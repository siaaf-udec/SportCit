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
        $user['type_document'] = $data['type_document'];
        $user['number_document'] = $data['number_document'];
        $user['name_user'] = $data['name_user'];
        $user['lastname_user'] = $data['lastname_user'];
        $user['birthday'] = $data['birthday'];
        $user['phone_user'] = $data['phone_user'];
        $user['website'] = $data['website'];
        $user['email'] = $data['email'];
        $user['password'] = bcrypt($data['password']);
        $user->save();
        return $user;
    }
}