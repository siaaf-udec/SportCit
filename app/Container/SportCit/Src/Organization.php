<?php

namespace App\Container\SportCit\Src;

use App\Container\Users\Src\User;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Organization extends Model implements AuditableContract
{

    use Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_organization', 'nit', 'address_organization', 'phone_organization', 'fundation', 'club_colors', 'link_organization', 'state_organization',
    ];
    protected $table = 'TBL_Organizations';

    public function user_organization()
    {
        //la organizacion pertenece a un usuario
        return $this->belongsTo(User::class);
    }

    public function files()
    {
        //uno a muchos relacion morfologica
        return $this->morphMany(File::class, 'fileable');
    }
}
