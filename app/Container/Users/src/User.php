<?php

namespace App\Container\Users\Src;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;

/*
 * Modelos
 * */

use App\Container\SportCit\Src\Player;
use App\Container\SportCit\Src\Organization;

class User extends Authenticatable
{
    /**
     * The database connection used by the model.
     *
     * @var string
     */
    //protected $connection = 'developer';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    use Notifiable, SoftDeletes;

    /**
     * Informamos a la clase EntrustUserTrait que usara restore
     */
    use EntrustUserTrait {
        EntrustUserTrait::restore insteadof SoftDeletes;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'birthday', 'email', 'password',
        'identity_type', 'identity_no', 'identity_expe_place', 'identity_expe_date',
        'address', 'gender', 'phone', 'state', 'website'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function files()
    {
        //uno a muchos relacion morfologica
        return $this->morphMany(File::class, 'fileable');
    }

    public function organizations()
    {
        //un usuario tiene muchas organizaciones
        return $this->hasMany(Organization::class, 'fk_user_id');
    }

    /**
     * Get the player record associated with the user.
     */
    public function player()
    {
        return $this->hasOne(Player::class, 'fk_user_id');
    }
}
