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
        'name', 'description', 'gender', 'starting-year', 'final-year', 'state_category', 'space'
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
        return $this->hasMany('App\Container\SportCit\Players');
    }

}
