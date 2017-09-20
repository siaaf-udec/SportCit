<?php

namespace App\Container\SportCit\Src;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{

    protected $table = 'TBL_Positions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];


}