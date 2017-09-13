<?php

namespace App\Container\SportCit\Src;

use App\Container\SportCit\Src\organization;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Team extends Model implements AuditableContract
{

    use Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'season', 'city',
    ];
    protected $table = 'TBL_Teams';

    public function organizationTeam()
    {
        return $this->belongsTo(Organization::class, 'id');
    }

    public function playerTeam()
    {
        return $this->hasMany(Player::class, 'fk_team_id');
    }

    public function getNumPlayersTeamAttribute()
    {
        return count($this->playerTeam);
    }
}
