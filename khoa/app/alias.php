<?php

namespace App;

class khoa{
	public $aliasSong;
	function xuLyAlias ($aliasSong)
	{
			$array = explode('-',$aliasSong);
	    	$lenght = count($array);
	    	$arrayId = $array[$lenght-1];
	    	$arrayId2 = explode('.',$arrayId);
	    	return $arrayId2[0]; 
	}
}
