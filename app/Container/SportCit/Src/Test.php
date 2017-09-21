<?php

namespace App\Container\SportCit\Src;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Test extends Model implements AuditableContract
{

    use Auditable;

//protected $table = 'TBL_Tes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    /*protected $fillable = [
    'id', 'name', 'season', 'city',
    ];*/
}
