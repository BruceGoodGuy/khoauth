<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\singerModel;

use App\songModel;

use App\Http\Requests\login;

use App\alias;

use App\videoModel;

use App\Http\Controllers\File;
use App\likeitem;
use App\word;
use Illuminate\Support\Facades\Auth;
use App\idWord;
use Hash;
use App\loginModel;
use App\comment;
use App\Http\Requests\dangki;
use Session;

class homeController extends Controller
{
    //
	function indexPage(){
		$i=0;
		$song = songModel::limit(4)->orderBy("id","desc")->get();
		$idword = idWord::limit(4)->get();
    	return view("home.index")->with(['song'=>$song,'i'=>$i,'idword'=>$idword]);
    }
    function musicPage(){
    	$song1 = songModel::where('idType',1)->limit(5)->get();
    	$song2 = songModel::where('idType',2)->limit(5)->get();
    	$song3 = songModel::where('idType',3)->limit(5)->get();
    	return view("home.music")->with(['song3'=>$song3,'song2'=>$song2,"song1"=>$song1]);
    }


    function detailMusicPage($aliasSong)
    {
    	// xử lý đường link được get
    	$array = explode('-',$aliasSong);
	    $lenght = count($array);
	    $arrayId = $array[$lenght-1];
	    $arrayId2 = explode('.',$arrayId);
	    $id = $arrayId2[0]; 
	    // hết

	    // get File txt từ database
	    $fileTxT = songModel::where('id',$id)->select("fileTextLyric","viewer")->get();
	    foreach($fileTxT as $fileTxT)
	    {
	    	$hihi = $fileTxT -> fileTextLyric;
	    	$viewer = $fileTxT -> viewer;
	    }
	    // hết

	    // mở file và tách ra nội dung
		$myfile = fopen("public/subtitle/text/$hihi", "r") or die("Unable to open file!");
		if ($myfile) {
		$text = array();
		$chu = array();
		$i=0;
		$j=0;
		while(!feof($myfile)) {
		  $text[$i]= fgets($myfile);
		  $i++;
		}
		fclose($myfile);
		for($i=0;$i<sizeof($text);$i++)
		{
			$khoa = $text[$i];		
			$chu[$j]=explode("-->", $khoa);
			$j++;
		}
		$size = sizeof($chu);
		$lyric = array();
		for($i=0; $i<$size;$i++)
		{
			$lyric[$i] = explode('--', $chu[$i][1]);
		}
		}
		// hết
		// bai hat chung ca si
		$song1 = songModel::where("id",$id)->first();
		$idSinger =  $song1 -> idSinger;
		$songRel = songModel::where("idSinger",$idSinger)->limit(5)->get();
		$singerArray = explode(":", $idSinger);
		$arraySinger = array();
		for($i = 0 ;$i<sizeof($singerArray);$i++)
		{
			$idS = $singerArray[$i];
			$arraySinger[$i] = singerModel::where('id',$idS)->get()->toArray();
		}
		$viewer++;
		$update = songModel::where("id",$id)->update(["viewer"=>$viewer]);
		$songHot = songModel::select("singer.id as khoa","song.song","song.id","singer.name")->join("singer","singer.id","=","song.idSinger")->orderBy("viewer","DESC")->limit(5)->get();
		$song = songModel::join('singer','song.idSinger','=','singer.id')->where('song.id',$id)->get();

		$comment = comment::where([
			['idPlace',2],
			['idA',$id],
			['status',1]
		])->get();
		session::put('idmus',$id);
		if(Auth::check())
    		{
				$user = Auth::user();
				$item = likeitem::where('iditem',$id)->get();
				if(count($item)>0)
				{
					$like = true;
				}
				else
					$like = false;
    		}
		else
		{
			$user="null";
			$like = false;
		}

		return view("home.musicPlayer")->with(['like'=>$like,'song'=>$song,'text'=>$chu,'size'=>$size,'realLyric'=>$lyric,"songRel"=>$songRel,"arraySinger"=>$arraySinger,"songHot"=>$songHot,'comment'=>$comment,'user'=>$user]);
	    }
	    function typeMusicPage($aliasGiong)
	    {
	    	$aliasArray = explode("-", $aliasGiong);
	    	$id=$aliasArray[sizeof($aliasArray)-1];
	    	if($id!=4)
	    	{
	    		$Onesong = songModel::where("idType",$id)->orderBy("id","desc")->skip(0)->take(1)->get();
		    	$song2 = songModel::where("idType",$id)->orderBy("id","desc")->get();
		    	$total = 0;
		    	foreach($song2 as $song2)
		    	{
		    		$total++;
		    	}
		    	$song = songModel::where([["idType",$id],["id",'!=',$total]])->orderBy("id","desc")->get();
	    	}
	    	else
	    	{
	    		$Onesong = songModel::orderBy("id","desc")->skip(0)->take(1)->get();
	    		$song2 = songModel::orderBy("id","desc")->get();
		    	$total = 0;
		    	foreach($song2 as $song2)
		    	{
		    		$total++;
		    	}
		    	$song = songModel::where([["id",'!=',$total]])->orderBy("id","desc")->get();
	    	}
	    	return view("home.musicType")->with(['Onesong'=>$Onesong,'song'=>$song]);
	    }
	    function videoPage(){
	    	return view("home.videoPage");
	    }
	    function typeVideo($alias)
	    {
	    	return view("home.videoType");
	    }
	    function detailVideo($alias)
	    {
	    		// xử lý đường link được get
	    	$array = explode('-',$alias);
		    $lenght = count($array);
		    $arrayId = $array[$lenght-1];
		    $arrayId2 = explode('.',$arrayId);
		    $id = $arrayId2[0]; 
		    // hết
		    $video = videoModel::where("id",$id)->get();
		    $origin = videoModel::find($id);
		    $originVideo =$origin->idOriginVideo;
		    $videoMore = videoModel::where("idOriginVideo",$originVideo)->get(); 

		    // xu ly File txt
		    // get File txt từ database
		    $fileTxT = videoModel::where('id',$id)->get();
		    foreach($fileTxT as $fileTxT)
		    {
		    	$hihi = $fileTxT -> fileSub;
		    	$viewer = $fileTxT -> luotXem;
		    }
		    // hết

		    // mở file và tách ra nội dung
		    $myfile = fopen("public/subtitle/videoText/$hihi", "r") or die("Unable to open file!");
			$text = array();
			$chu = array();
			$i=0;
			$j=0;
			while(!feof($myfile)) {
			  $text[$i]= fgets($myfile);
			  $i++;
			}
			fclose($myfile);
			for($i=0;$i<sizeof($text);$i++)
			{
				$khoa = $text[$i];		
				$chu[$j]=explode("-->", $khoa);
				$j++;
			}
			$size = sizeof($chu);
			$lyric = array();
			for($i=0; $i<$size;$i++)
			{
				$lyric[$i] = explode('--', $chu[$i][1]);
			}
			// hết

		    return view("home.videoPlayer")->with(["video"=>$video,"videoMore"=>$videoMore,"subtitle"=>$lyric,'text'=>$chu]);
	    }
	    function wordPage(){
	    	$typeWord = idWord::orderBy('id')->get();
	    	return view("home.word")->with(['typeWord'=>$typeWord]);
	    }
	    function detailWord($id)
	    {
	    	$array = explode('-',$id);
		    $arrayId = array_pop($array);
		    $arrayId2 = explode('.',$arrayId);
		    $id = array_shift($arrayId2); 
		   if(Auth::check())
		   {
			$user = 'khoa';
		   }
		   else
		   {
			   $user = null;
		   }
		   $comment = comment::where([
			   ['idPlace',3],
			   ['idA',$id],
			   ['status',1]
		   ])->get();
		   $word = word::where('idType',$id)->get();
		   return view('home.wordDetail')->with(['word'=>$word,'word2'=>$word,'id'=>$id,'user'=>$user,'comment'=>$comment]);
	    }
	    function practiceWord($id)
	    {
	    	$array = explode('-',$id);
		    $arrayId = array_pop($array);
		    $arrayId2 = explode('.',$arrayId);
		    $id = array_shift($arrayId2); 
		   	$array = array();
		   	$arrayGame = array();
		   	$word = word::where('idType',$id)->get();
		   	foreach($word as $key => $value)
		   	{
		   		$array[$key]['id']=$value->id;
		   		$array[$key]['word']=str_replace(' ','',$value->word);
		   		$array[$key]['pronun']=$value->pronun;
		   		$array[$key]['mean']=$value->mean;
		   		$array[$key]['image']=$value->image;
		   		$array[$key]['audio']=$value->audio;
		   		$array[$key]['shuffle']=str_split(str_shuffle(str_replace(' ','',$value->word)));
		   	}
		   	shuffle($array);
	    	return view("home.wordPractice")->with(['word'=>$array,'id'=>$id]);
		}
		function sendcmm(Request $request)
		{
			$time = date('Y-m-d');
			if(Auth::check())
			{
				$user = Auth::user();
				$id = $request->id;
				$comment = new comment();
				$comment -> idPlace = 3;
				$comment -> idA = $id;
				$comment -> user = $user->username;
				$comment -> content = $request->content;
				$comment -> date = $time;
				$comment -> status = 0;
				$comment -> save();
				echo "Bình luận của bạn đang được kiểm duyệt";

			}
		}
		function dangnhap(){
			if(Auth::check())
			{
				if(Auth::user()->power==1)
				return redirect('/admin'); 
				else
				return redirect('/user');
			}
			else
			return view('home.dangnhap');
		}
		function postdangnhap(login $request){
			$username = $request -> username;
			$password = $request -> password;
			if(Auth::attempt(['username'=>$username,'password'=>$password]))
				{
					if(Auth::user()->power==1)
					return redirect('/admin'); 
					else
					return redirect('/user');
				}
			else
				return redirect()->back()->with('error','Lỗi đăng nhập');
		}
		function dangki(){
			return view('home.dangki');
		}
		function postdangki(dangki $request){
			$username = $request->username;
			$password = $request->password;
			$repassword =$request->repassword;
			$email = $request->email;
			if($password==$repassword)
			{
				$user = new loginModel();
				$user -> username = $username;
				$user -> password =  hash::make($password);
				$user -> email = $email;
				$user -> power = 0;
				$user -> save();
				return redirect('dangnhap')->with('success','Đăng kí thành công');
			}
			else
				return redirect()-> back()->with('error','Mật khẩu không trùng khớp');
		}
		function vippractice($alias){
			$array = explode('-',$alias);
		    $lenght = count($array);
		    $arrayId = $array[$lenght-1];
		    $arrayId2 = explode('.',$arrayId);
			$id = $arrayId2[0];
			$word = word::where('idType',$id)->get();
			$array = array();
			$array2 = array();
			foreach($word as $key => $value)
			{
				$array[$key]['id']=$value->id;
				$array[$key]['word']=str_replace(' ','',$value->word);
				$array[$key]['pronun']=$value->pronun;
				$array[$key]['type']=$value->type;
				$array[$key]['mean']=$value->mean;
				$array[$key]['exEng']=$value->exEng;
				$array[$key]['exVie']=$value->exVie;
				$array[$key]['image']=$value->image;
				$array[$key]['audio']=$value->audio;
				$count = strlen($value->word);
				$rand = rand(1,$count-2); 
				$newword = $value->word;
				$arrayx = array();
				for ($j=0;$j<=$rand;$j++)
				{
					rand: $randkey = rand(0,$count-1);
					if(in_array($randkey,$arrayx))
					{
						goto rand;
					}
					else
					{
						$newword[$randkey]= "_";
					}
				}
				$arrayk = array();
				$arrayk = str_split($newword);
				$array[$key]['hidden']=$arrayk;
				$arraya = str_split(str_replace(' ','',$value->word));
				$khoa = array_diff($arraya,$arrayk);
				$huy = implode('',$khoa);
				$array[$key]['hihi']=$huy; 
			}	
			// echo "<pre>",
			// print_r($array);
			// echo "</pre>";
			return view('home.vippractice')->with(['array'=>$array]);
		}
}
