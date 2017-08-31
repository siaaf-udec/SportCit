<?php

namespace App\Container\SportCit\Src;

use Illuminate\Database\Eloquent\Model;

/*
 * Modelos
 * */
use App\Container\Users\Src\User;

class Player extends Model
{

    protected $table = 'TBL_Players';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'favorite_club', 'height', 'weight', 'position', 'motto',
        'current_position', 'current_club', 'strengths',
        'favorite_player', 'weakness', 'training_target', 'other',
        'eps'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * Get the player record associated with the user.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user_id');
    }

    /**
     * Get the player record associated with the user.
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class, 'fk_organization_id');
    }


}
