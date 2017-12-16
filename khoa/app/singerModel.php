<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class singerModel extends Model
{
    protected $table = "singer";
    protected $fillable	= ['id','name','bio','image'];
    public $timestamps = false;
    public function songModel(){
    	return $this->hasMany("App\songModel");
    }
}
