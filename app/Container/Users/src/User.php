<?php

namespace App\Container\Users\Src;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Container\SportCit\Src\Organization;
use App\Container\SportCit\Src\File;

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
        'name', 'email', 'password',
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
        return $this->hasMany(Organization::class,'fk_user_id');
    }
}
