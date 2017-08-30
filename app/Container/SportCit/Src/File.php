<?php

namespace App\Container\SportCit\Src;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{

    protected $table = 'TBL_files';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_file', 'url_file','type_file',
    ];


    public function filable ()
    {
        //transformarse a (morphTo)
        return $this->morphTo();
    }
}