<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class likeitem extends Model
{
    //
    protected $table = 'likeitem';
    protected $fillable = ['iduser','type','iditem'];
}
