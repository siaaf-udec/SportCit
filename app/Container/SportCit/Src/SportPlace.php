<?php

namespace App\Container\SportCit\Src;

use Illuminate\Database\Eloquent\Model;

class SportPlace extends Model
{

    protected $table = 'TBL_Sport_Places';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'state', 'latitude', 'longitude'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    /**
     * Get the organization that owns the sport-place.
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class, 'fk_organization_id');
    }
}
