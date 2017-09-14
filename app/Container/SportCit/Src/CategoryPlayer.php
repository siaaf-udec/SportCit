<?php

namespace App\Container\SportCit\Src;

use Illuminate\Database\Eloquent\Model;

class CategoryPlayer extends Model
{

    protected $table = 'TBL_Category_Player';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'gender', 'starting_year', 'final_year', 'state_category', 'space'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * Get the players for the blog post.
     */
    public function players()
    {
        return $this->hasMany(Player::class, 'fk_cate_player_id');
    }

    /**
     * Get the organization that owns the category.
     */
    public function organization()
    {
        return $this->belongsTo(Organization::class, 'fk_organization_id');
    }
}
