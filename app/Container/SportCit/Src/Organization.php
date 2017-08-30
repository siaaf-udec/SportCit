<?php

namespace App\Container\SportCit\Src;

use App\Container\Users\Src\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Organization extends Model implements AuditableContract
{

    use Auditable, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name_organization', 'nit', 'address_organization', 'phone_organization', 'fundation', 'club_colors', 'link_organization', 'state_organization',
    ];
    protected $table = 'TBL_Organizations';

    public function user_organization()
    {
        //la organizacion pertenece a un usuario
        return $this->belongsTo(User::class,'fk_user_id');
    }

    public function files()
    {
        //uno a muchos relacion morfologica
        return $this->morphMany(File::class, 'fileable');
    }

    public function playersOrganization()
    {
        return $this->hasMany(Players::class, 'fk_organization_id');
    }

    public function categoryOrganization()
    {
        return $this->hasMany(CategoryPlayer::class, 'fk_organization_id');
    }

    public function getNumCategoryOrganizationAttribute()
    {
        return count($this->categoryOrganization);
    }

    public function getNumPlayersOrganizationAttribute()
    {
        return count($this->playersOrganization);
    }
}
