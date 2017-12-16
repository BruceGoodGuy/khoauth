<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\listanh;
use App\bta;
use Session;
use App\comment;
class usercontroller extends Controller
{
    //
    public function user(){
    	$user = Auth::user();
    	return view("user.index")->with('user',$user);
    }
    public function logout()
    {
        if(Auth::check())
        {
            Auth::logout();
            return redirect('/');
        }
        else
        return view('home.dangnhap');
    }
    public function toeic(){
    	$list = listanh::all();
    	return view('user.toeic')->with('list',$list);
    }
    public function toeica($i){
    	$bta = bta::where('idpart',$i)->get();
    	$comment = comment::where([
    		['idPlace',1],
    		['idA',$i],
    		['status',1]
    	])->get();
    	if(Auth::check())
    		{
    			$user = Auth::user();
    		}
    	else
    		$user="null";
    	Session::put('idA',$i);
    	return view('user.bta')->with(['bta'=>$bta,'i'=>$i,'comment'=>$comment,'user'=>$user]);
    }
    public function postbta(Request $request, $j)
    {
    	$bta = bta::where('idpart',$j)->get();
    	if (Session::has('dapan'))
			{
				Session::forget('dapan');
			}
    	$count = bta::where('idpart',$j)->count();
    	for($i=1;$i<=$count;$i++)
    	{
    		$a = 'traloi'.$i;
    		$awser = $request -> $a;
    		Session::push('dapan',$awser);
    	}
    	$value = Session::get('dapan');
    	$getdapan = bta::select('dung')->where('idpart',$j)->get();
    	$dapan2 = array();
    	foreach($getdapan as $getdapan)
    	{
    		$dapan2[]= $getdapan -> dung;
    	}
    	$getloi = array();
    	foreach($dapan2 as $key => $dapan2)
    	{
    		if($dapan2 != $value[$key])
    		{
    			$getloi[]=++$key;
    		}
    	}
    	if(count($getloi)==0)
    		$a = -1;
    	else
    	$a = implode(',',$getloi);
    	$comment = comment::where([
    		['idPlace',1],
    		['idA',$j]
    	])->get();

    	return redirect('toeic/a/1')->with(['sai'=>$a,'request'=>$value]);
    }
    public function postcomment(Request $req)
    {
    	if($req->content=='')
    	{
    		echo "Không được bỏ trống";
    	}
    	else
    	{
    		$content = $req->content;
    		$date = time();
    		$date = date('Y-m-d',$date);
    		$user = Auth::user();
    		$user = $user -> username;
    		$comment = new comment();
    		$comment -> idPlace = 1;
    		$comment -> idA = Session::get('idA');
    		$comment -> user = $user;
    		$comment -> content = $content;
    		$comment -> date = $date;
    		$comment -> save();
    		echo "Bình luận của bạn đang được duyệt";
    	}
    }
    public function postcommentms(Request $req){
        if($req->content=='')
        {
            echo "Không được bỏ trống";
        }
        else
        {
            $content = $req->content;
            $date = time();
            $date = date('Y-m-d',$date);
            $user = Auth::user();
            $user = $user -> username;
            $comment = new comment();
            $comment -> idPlace = 2;
            $comment -> idA = Session::get('idmus');
            $comment -> user = $user;
            $comment -> content = $content;
            $comment -> date = $date;
            $comment -> save();
            echo "Bình luận của bạn đang được duyệt";
        }
    }
}
