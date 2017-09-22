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
        $user['name'] = $data['name'];
        $user['lastname'] = $data['lastname'];
        $user['birthday'] = (isset($data['birthday']) || !empty($data['birthday'])) ? $data['birthday'] : null;
        $user['identity_type'] = (isset($data['identity_type']) || !empty($data['identity_type'])) ? $data['identity_type'] : null;
        $user['identity_no'] = (isset($data['identity_no']) || !empty($data['identity_no'])) ? $data['identity_no'] : null;
        $user['identity_expe_place'] = (isset($data['identity_expe_place']) || !empty($data['identity_expe_place'])) ? $data['identity_expe_place'] : null;
        $user['identity_expe_date'] = (isset($data['identity_expe_date']) || !empty($data['identity_expe_date'])) ? $data['identity_expe_date'] : null;
        $user['eps'] = (isset($data['eps']) || !empty($data['eps'])) ? $data['eps'] : null;
        $user['rh'] = (isset($data['rh']) || !empty($data['rh'])) ? $data['rh'] : null;
        $user['address'] = (isset($data['address']) || !empty($data['address'])) ? $data['address'] : null;
        $user['gender'] = (isset($data['gender']) || !empty($data['gender'])) ? $data['gender'] : null;
        $user['phone'] = (isset($data['phone']) || !empty($data['phone'])) ? $data['phone'] : null;
        $user['email'] = $data['email'];
        $user['rh'] = (isset($data['rh']) || !empty($data['rh'])) ? $data['rh'] : null;
        $user['password'] = bcrypt($data['password']);
        $user['state'] = (isset($data['state']) || !empty($data['state'])) ? $data['state'] : null;
        $user['website'] = (isset($data['website']) || !empty($data['website'])) ? $data['website'] : null;

        $user['cities_id'] = (!isset($data['cities_id']) || empty($data['cities_id'])) ? $data['cities_id'] : 1 ;
        $user['countries_id'] =(!isset($data['countries_id']) || empty($data['countries_id'])) ? $data['countries_id'] : 1 ;
        $user['regions_id'] = (!isset($data['regions_id']) || empty($data['regions_id'])) ? $data['regions_id'] : 1 ;

        $user->save();
        return $user;
    }
}