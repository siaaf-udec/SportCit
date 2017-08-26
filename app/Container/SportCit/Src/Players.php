<?php

namespace App\Container\SportCit\Src;

use Illuminate\Database\Eloquent\Model;
use App\Container\SportCit\CategoryUser;
use App\Container\Users\User;

class Players extends Model
{

    protected $table = 'TBL_Players';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * Get the category that owns the player.
     */
    public function category()
    {
        return $this->belongsTo(CategoryUser::class);
    }

    /**
     * Get the user that owns the player.
     */
    public function userPlayer()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the Organization that owns the player.
     */
    public function organizationPlayer()
    {
        return $this->belongsTo(Organization::class);
    }
}
