<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SourcesModel extends Model
{
    //
    protected $table = 'sources';
    const CNN = 1;
    const BBC = 3;
    const ESPN = 4;
    const SUPERSPORT = 5; 
    const ENCA = 6;
    const ZALEBS = 8;
}
