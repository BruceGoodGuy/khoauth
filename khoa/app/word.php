<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class word extends Model
{
    //
    protected $table = "word";
    public $timestamps = false;
    public function typeWord(){
    	return $this -> belongsTo("App\idWord");
    }
}
