<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class songModel extends Model
{
    protected $table = "song";
    protected $fillable	= ['id','song','coverImage','idType','idSinger','lyricEng','lyricVie','MV','fileTextLyric','fileSubVTT','viewer'];
    public $timestamps = false;
    public function typeSong(){
    	return $this -> belongsTo('App\typeSongModel','id','idType');
    }
}
