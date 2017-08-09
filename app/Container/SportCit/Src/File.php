<?php

namespace App\Container\SportCit\Src;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_file', 'url_file',
    ];

    protected $table = 'TBL_files';

    public function fileable ()
    {
        //transformarse a (morphTo)
        return $this->morphTo();
    }
}