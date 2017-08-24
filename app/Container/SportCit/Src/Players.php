<?php

namespace App\Container\SportCit\Src;

use Illuminate\Database\Eloquent\Model;

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
     * Get the category that owns the comment.
     */
    public function category()
    {
        return $this->belongsTo('App\Container\SportCit\CategoryUser');
    }

}
