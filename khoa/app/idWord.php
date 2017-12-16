<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class idWord extends Model
{
    //
    protected $table = "typeWord";
    public $timestamp = false;
    public function word(){
    	return $this->hasMany("App\word");
    }
}
