<?php

namespace App\Container\SportCit\Src;

use Illuminate\Database\Eloquent\Model;
use App\Container\SportCit\Players;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return $this->hasMany(Players::class);
    }

    /**
     * Get the organization that owns the category.
     */
    public function organizationCategory()
    {
        return $this->belongsTo(Organization::class);
    }
}
