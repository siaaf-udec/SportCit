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
        'favorite_club', 'height', 'weight', 'foot','motto', 'state',
        'current_club', 'favorite_player', 'strengths',
        'weakness', 'training_target', 'other',
        'fk_user_id', 'fk_organization_id', 'fk_cate_player_id',
        'fk_team_id', 'fk_position_id'
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

    public function team()
    {
        return $this->belongsTo(Team::class, 'fk_team_id');
    }

    public function category()
    {
        return $this->belongsTo(CategoryPlayer::class, 'fk_cate_player_id');
    }

}
