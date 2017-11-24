<?php

namespace App\Container\SportCit\Src;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/*
 * Modelos
 * */

use App\Container\Users\Src\User;

class Organization extends Model implements AuditableContract
{

    use Auditable, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name_organization', 'nit','city', 'address_organization', 'phone_organization', 'fundation', 'club_colors', 'link_organization', 'state_organization',
    ];
    protected $table = 'TBL_Organizations';

    public function user()
    {
        //la organizacion pertenece a un usuario
        return $this->belongsTo(User::class, 'fk_user_id');
    }

    public function files()
    {
        //uno a muchos relacion morfologica
        return $this->morphMany(File::class, 'fileable');
    }

    public function players()
    {
        return $this->hasMany(Player::class, 'fk_organization_id');
    }

    public function categories()
    {
        return $this->hasMany(CategoryPlayer::class, 'fk_organization_id');
    }

    public function teams()
    {
        return $this->hasMany(Team::class, 'fk_org_id');
    }

    public function sportPlaces()
    {
        return $this->hasMany(SportPlace::class, 'fk_organization_id');
    }

    public function getNumCategoriesAttribute()
    {
        return count($this->categories);
    }

    public function getNumPlayersAttribute()
    {
        return count($this->players);
    }

    public function getNumTeamsAttribute()
    {
        return count($this->teams);
    }

    public function getNumSportPlacesAttribute()
    {
        return count($this->sportPlaces);
    }
}
