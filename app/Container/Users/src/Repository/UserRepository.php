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
        $user['identity_type'] = (isset($data['identity_type']) || !empty($data['identity_type'])) ? $data['identity_type'] : null;
        $user['identity_no'] = (isset($data['identity_no']) || !empty($data['identity_no'])) ? $data['identity_type'] : null;
        $user['name'] = $data['name'];
        $user['lastname'] = $data['lastname'];
        $user['birthday'] = (isset($data['birthday']) || !empty($data['birthday'])) ? $data['birthday'] : null;
        $user['phone'] = (isset($data['phone']) || !empty($data['phone'])) ? $data['phone'] : null;
        $user['website'] = (isset($data['website']) || !empty($data['website'])) ? $data['website'] : null;
        $user['email'] = $data['email'];
        $user['password'] = bcrypt($data['password']);
        $user->save();
        return $user;
    }
}