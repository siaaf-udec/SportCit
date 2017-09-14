<?php

namespace App\Container\SportCit\Src;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Team extends Model implements AuditableContract
{

    use Auditable;

    protected $table = 'TBL_Teams';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'season', 'city',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'fk_org_id');
    }

    public function players()
    {
        return $this->hasMany(Player::class, 'fk_team_id');
    }

    public function getNumPlayersAttribute()
    {
        return count($this->players);
    }
}
