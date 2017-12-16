<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\namesong;
use App\Http\Requests\login;
use App\Http\Requests\lyricRequest;
use App\Http\Requests\updatesinger;
use Illuminate\Support\Facades\Auth;
use App\loginModel;
use App\word;
use Hash;
use App\Http\Requests\exedit;
use App\Http\Requests\changeword;
// use Illuminate\Pagination\Paginator;
use App\songModel;
use App\singerModel;
use App\typeSongModel;
use App\Http\Requests\addsingerRequest;
use App\Http\Requests\addsongRequest;
use App\idWord;
use Session;
use App\listanh;
use App\bta;
use App\comment;
use App\Http\Requests\addexz;
class adminController extends Controller
{
    //
    public function getlogin(){
        if(Auth::check())
        return view('admin.menuchinh')->with('users',Auth::user());
        else
    	return view('admin.login');
    }
    public function postlogin(login $request){
        $username = $request['username'];
        $password = $request['password'];
       if( Auth::attempt(['username' => $username, 'password' => $password]))
       {
            return view('admin.menuchinh')->with('users',Auth::user());
       }    
       else
            return view('admin.login')->with(['loi'=>"Mời đăng nhập lại"]);
    }
    public function index(){
        return view('admin.menuchinh')->with(['users'=>Auth::user()]);
    }
    public function meuchinh()
    {
        if(Auth::check())
            return view('admin.menuchinh')->with(['users'=>
            Auth::user()]);
        else
            return view('admin.login');
        
    }
    public function logout()
    {
        if(Auth::check())
        {
            Auth::logout();
            return view('admin.login');
        }
        else
        return view('admin.login');
    }
    public function music()
    {
        $music = songModel::orderBy('id','DESC')->get();

        return view('admin.music')->with(['music'=>$music]);
    }
    public function musicedit($id){
        $music = songModel::find($id);
       // $typemusic = songModel::find($id)->typeSong();
        $singArray = explode(':',$music->idSinger);
        for($i=0;$i<count($singArray);$i++)
        {
            $singer[$i] = singerModel::find($singArray[$i])->toArray();
        }
        $typemusic =typeSongModel::find($music->idType);
        if(Auth::check())
            return view('admin.editmusic')->with(['music'=>$music,'singer'=>$singer,'typemusic'=>$typemusic]);
        else
            return view('admin.login');
    }
    public function musiceditit($id)
    {
        $music = songModel::find($id);
        return view('admin.editit')->with(['song'=>$music]);
    }
    public function musiceditname($id)
    {
        $music = songModel::find($id);
        return view('admin.editname')->with(['song'=>$music]);
    }
    public function postname(namesong $request,$id)
    {
        $song=songModel::find($id);
        $song -> song = $request -> name;
        $song -> save();
       return redirect()->back()->with('alert','Đã xong');
       
    }
    public function musiceditimage(Request $request,$id)
    {
        $song=songModel::find($id);
        return view('admin.editimage')->with(['song'=>$song]);
    }
    public function postimage(Request $request,$id)
    {
        $song=songModel::find($id);
        $namesong = $song -> song;
        $name = str_replace(' ','',$namesong);
        if($request->hasFile('myfile'))
        {
            $file = $request -> file('myfile');
            $filename = $file -> getClientOriginalName('myfile');
            $exten = $file -> getClientOriginalExtension('myfile');
            $size = $file -> getClientSize('myfile');
            $name = $name.'.'.$exten;
            if($exten == 'jpg' || $exten == 'png')
                {
                  if ($size < 2147483648)
                  {
                    $file->move('public/image/imageMusicCover/',$name);
                    $song -> coverImage = $name;
                    $song ->save();
                    return redirect()->back()->with('success','Up file thành công');
                  }
                  else
                   return redirect()->back()->with('errors','File quá lớn'); 
                }
            else
             return redirect()->back()->with('errors','Sai định dạng file'); 
        }
    }
    public function musicedittype($id)
    {
        $type = typeSongModel::get();
        $song=songModel::find($id);
        return view('admin.edittype')->with(['song'=>$song,'type'=>$type]);
    }
    public function posttype(Request $request, $id)
    {
        $song=songModel::find($id);
        $song -> idType = $request -> type;
        $song -> save();
        return redirect()->back()->with('success','Đã xong');
    }
    public function musiceditlyeng($id)
    {
        $song=songModel::find($id);
        return view('admin.editlyeng')->with(['song'=>$song]);
    }
    public function postlyeng(lyricRequest $request, $id)
    {
        $song=songModel::find($id);
        $song -> lyricEng = $request -> lyric;
        $song -> save();
        return redirect()->back()->with('success','Đã xong');
    }
    public function musiceditlyve($id)
    {
        $song=songModel::find($id);
        return view('admin.editlyve')->with(['song'=>$song]);
    }
    public function postlyve (lyricRequest $request, $id)
    {
        $song=songModel::find($id);
        $song -> lyricVie = $request -> lyric;
        $song -> save();
        return redirect()->back()->with('success','Đã xong');
    }
    public function musiceditvideo($id){
        $song=songModel::find($id);
        return view('admin.editvideo')->with('song',$song);
    }
    public function postvideo(Request $request,$id)
    {
        $song = songModel::find($id);
        if($request->hasFile('myfile'))
        {   
            $file = $request->file('myfile');
            $ex = $file -> getClientOriginalExtension('myfile');
            $ex = strtolower($ex);
            if($ex=='mp4')
            {
              $size = $file -> getClientSize('myfile');
              if($size<1073741824)
              {
                  $name = str_slug($song->song).".".$ex;
                  $file -> move('resources/video/Music/',$name);
                  $song -> MV = $name;
                  $song ->save();
                  return redirect('/admin/music/editit/video/'.$id)->with('success',"Đã Chỉnh Sửa Thành Công");
              }
              else
              return redirect('/admin/music/editit/video/'.$id)->with('errors',"File quá lớn");
            }
            else
            return redirect('/admin/music/editit/video/'.$id)->with('errors',"Chỉ hổ trợ định dạng MP4");
        }
        else
        return redirect('/admin/music/editit/video/'.$id)->with('errors',"Chưa chọn file");
    }
    public function musicedittely($id)
    {
        $song = songModel::find($id);
        $url = "public/subtitle/text/".$song->fileTextLyric;
        $file = file($url);
        return view('admin.edittely')->with(['song'=>$song,'file'=>$file]);
    }
    public function posttely(lyricRequest $request,$id)
    {
        $song = songModel::find($id);
        $file = fopen("public/subtitle/text/".$song->fileTextLyric,"w+");
        fwrite($file,$request -> lyric);
        return redirect('/admin/music/editit/tely/'.$id)->with('success',"Đã Chỉnh Sửa Thành Công");
    }
    public function musiceditsubEn($id)
    {
        $song = songModel::find($id);
        // $url = "public/subtitle/songs/".$song->fileSubVTTEng;
        // $file = file($url);
       return view('admin.editsubEn')->with('song',$song);
    }
    public function postsubEn(Request $request,$id)
    {
        $song = songModel::find($id);
        $name = str_slug($song->song)."Eng.VTT";
        if($request->hasFile('myfile'))
        {
            $file = $request -> file('myfile');
            if(strtolower($file -> getClientOriginalExtension('myfile'))=='vtt')
            {
                if($file->getClientSize('myfile')<10240)
                {
                    $file -> move('public/subtitle/songs/',$name);
                    $song -> fileSubVTTEng = $name;
                    $song -> save();
                    return redirect('/admin/music/editit/subEn/'.$id)->with('success',"Đã Chỉnh Sửa Thành Công");
                }
            }
        }
    }
    public function musiceditsubVie($id)
    {
        $song = songModel::find($id);
        // $url = "public/subtitle/songs/".$song->fileSubVTTEng;
        // $file = file($url);
       return view('admin.editsubVie')->with('song',$song);
    }
    public function postsubVie(Request $request,$id)
    {
        $song = songModel::find($id);
        $name = str_slug($song->song)."VIE.VTT";
        if($request->hasFile('myfile'))
        {
            $file = $request -> file('myfile');
            if(strtolower($file -> getClientOriginalExtension('myfile'))=='vtt')
            {
                if($file->getClientSize('myfile')<10240)
                {
                    $file -> move('public/subtitle/songs/',$name);
                    $song -> fileSubVTTVie = $name;
                    $song -> save();
                    return redirect('/admin/music/editit/subVie/'.$id)->with('success',"Đã Chỉnh Sửa Thành Công");
                }
            }
        }
    }
    public function singer(){
        $singer = singerModel::get();
        return view('admin.singer')->with('singer',$singer);
    }
    public function selectsinger($id)
    {
        $singer = singerModel::find($id);
        return view('admin.selectsinger')->with('singer',$singer);
    }
    public function editsinger($id)
    {
        $singer = singerModel::find($id);
        return view('admin.editsinger')->with('singer',$singer);
    }
    public function posteditsinger(updatesinger $request,$id)
    {
        $singer = singerModel::find($id);
        $name = $request->name;
        $bio = $request ->bio;
        $file = $request -> file('myfile');
        if($request->hasFile('myfile'))
        {
            $ex = strtolower($file -> getClientOriginalExtension('myfile'));
            if($ex == 'jpg'|| $ex == 'png')
            {
                $size = $file -> getClientSize('myfile');
                if($size < 1024000)
                {
                    $singer -> name = $name;
                    $singer -> bio = $bio;
                    $singer -> image = str_slug($name).'.'.$ex;
                    $file -> move("public/image/avatarSinger/",str_slug($name).'.'.$ex);
                    $singer -> save();
                    return view('admin.editsinger')->with(['success'=>'Thành công rồi','singer'=>$singer]);
                }
                else
                 return view('admin.editsinger')->with(['error'=>'File Qúa lớn','singer'=>$singer]);
            }
            else
            return view('admin.editsinger')->with(['error'=>'Sai định dạng','singer'=>$singer]);
            
        }
        else
        return view('admin.editsinger')->with(['error'=>'Chưa có file','singer'=>$singer]);
    }
    public function deletesinger($id)
    {
        $singer = singerModel::get();
        $table = singerModel::where('id',$id)->delete();
        return view('admin.singer')->with(['success'=>'Đã xóa','singer'=>$singer]);;
    }
    public function singeradd(){
        return view('admin.addsinger');
    }
    public function addsinger(addsingerRequest $request){
       $singer = new singerModel;
       $name = $request ->name;
       $bio = $request ->bio;
       $file = $request ->file('myfile');
       if($request->hasFile('myfile'))
       {
           $ex = strtolower($file -> getClientOriginalExtension('myfile'));
           if($ex == 'jpg' || $ex == 'png')
           {
               $size = $file -> getClientSize('myfile');
               if($size<1024000)
               {
                   $ten = str_slug($name).".".$ex;
                   $singer -> name = $name;
                   $singer -> bio = $bio;
                   $singer -> image = $ten;
                   $singer -> save();
                   $file ->move('public/image/avatarSinger/',$ten);
                   return redirect('admin/singer')->with('success','Thành công');
               }
               else
               return redirect()->back()->with('error','File quá lớn');
           }
           else
           return redirect()->back()->with('error','Sai định dạng');
       }
       else
        return redirect()->back()->with('error','Chưa có file');
        
    }
    // public function musicaddsong(){
    //     $singer = singerModel::get();
    //     $type = typeSongModel::get();
    //     return view('admin.musicaddsong')->with(['singer'=>$singer,'type'=>$type]);
    // }

    public function musicaddsong(){
        // session::flush();
        session::forget('casi');
        $singer = singerModel::skip(0)->take(5)->get();
        return view('admin.addsong')->with(['singer'=>$singer]);
    }
    public function getcs(Request $req){
        $casi = $req->casi;  
        if(!session('casi'))
        {
            session::push('casi',$casi);
        }
        else
        {
            $array = session::get('casi');
           if(in_array($casi,$array))
           {
                $key = array_search($casi,$array);
                unset($array[$key]);
                session::forget('casi');
                foreach($array as $array)
                {
                    session::push('casi',$array);
                }
           }
           else
           {
            session::push('casi',$casi);
           }
        }
        $idsinger = implode(':',session::get('casi'));
        session::put('idsinger',$idsinger);
    }
    public function musicaddsong2(){
        if(session('idsinger'))
        {
            return redirect('admin/music/addsong')->with('step',3);
        }
    }
    public function musicaddsong3(addsongRequest $req){
        session::put('lyeng',$req->lyeng);
        session::put('lyvie',$req->lyvie);
        return redirect()->back()->with('step',4);
    }
    public function musicaddsong4(Request $req)
    {
        $file = $req -> file('mv');
        if($req->hasFile('mv'))
        {
            $ex = strtolower($file -> getClientOriginalExtension('mv'));
            if($ex=='mp4')
            {
                $array = explode('.',session::get('cover'));
                session::put('mv',$array[0].'.'.$ex);
                $file -> move('resources/video/Music',$array[0].'.'.$ex);
                return redirect()->back()->with('step',5);
            }
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function getmore(Request $req){
        $dem =  $req->dem;
        echo "<div class='row'>
        <div class='form-group col-md-2'>
        <input type='text' name='time".$dem."' class='form-control' placeholder='Time'>
        </div>
        <div class='form-group col-md-5'>
        <input type='text' name='eng".$dem."' class='form-control' placeholder='Lời anh'>
        </div>
        <div class='form-group col-md-5'>
        <input type='text' name='vie".$dem."' class='form-control' placeholder='Lời Việt'>
        </div>
    </div>";
    session::put('tongcong',$dem);
    }
    public function musicaddsong5(Request $req)
    {
        if(!session('tongcong'))
            $tongcong = 3;
        else 
            $tongcong = session::get('tongcong');
        $array = explode('.',session::get('cover'));
        $filename = $array[0].'.txt';
        session::put('nametext',$filename);
        $myfile = fopen("public/subtitle/text/$filename", "w") or die("Unable to open file!");
        for($i=1;$i<=$tongcong;$i++)
        {
            $time = "time".$i;
            $eng = "eng".$i;
            $vie = "vie".$i;
            $txt = $req-> $time." --> ".$req->$eng." -- ".$req->$vie.PHP_EOL;
            fwrite($myfile, $txt);
        }
        fclose($myfile);
        session::forget('tongcong');
        return redirect()->back()->with('step',6);
    }
    public function musicaddsong6(Request $req)
    {
        if($req->hasFile('srceng') && $req->hasFile('srcvie'))
        {
            $srceng = $req->file('srceng');
            $srcvie = $req->file('srcvie');
            $exeng = strtolower($srceng -> getClientOriginalExtension('srceng'));
            $exvie = strtolower($srcvie -> getClientOriginalExtension('srcvie'));
            if($exeng=='vtt'&&$exvie=='vtt')
            {
                $array = explode('.',session::get('cover'));
                $namesrceng = $array[0].'_eng.vtt';
                $namesrcvie = $array[0].'_vie.vtt';
                $srceng -> move('public/subtitle/songs',$namesrceng);
                $srcvie -> move('public/subtitle/songs',$namesrcvie);
                session::put('srceng', $namesrceng);
                session::put('srcvie',$namesrcvie);
                return redirect()->route('upsong');
            }
        }  
    }
    public function pustst1(Request $req){
       $song = $req->tenbaihat;
       $type = $req->type;
       $name = str_slug($song,'_');
        if($req->hasFile('cover'))
        {
            $file = $req -> cover;
            $ex =strtolower($file -> getClientOriginalExtension('cover'));
            if($ex=='png'||$ex=='jpg')
            {
               if($file -> getClientSize('cover')<1024000)
               {
                  $name = $name.'_'.rand().'.'.$ex;
                  $array = array();
                //   session::forget('addsong');
                //   array_push($array,['song'=>$song,'type'=>$type,'cover'=>$name]);
                //   session::push('addsong',$array);
                    session::put('song',$song);
                    session::put('type',$type);
                    session::put('cover',$name);
                  $file -> move('public/image/imageMusicCover',$name);
                  return redirect()->back()->with('step',2);
               } 
               else
               return redirect()->back()->with('error',"Hình lớn quá");   
            }
            else
            return redirect()->back()->with('error',"Sai định dạng hình");
        }
        else
        return redirect()->back()->with('error',"Thiếu hình");
        
        // $khoa[0][0]['song'];
    }
    public function upsong(){
        $song = new songModel();
        $song -> song = session::get('song');
        $song -> coverImage = session::get('cover');
        $song -> idType = session::get('type');
        $song -> idSinger = session::get('idsinger');
        $song -> lyricEng = session::get('lyeng');
        $song -> lyricVie = session::get('lyvie');
        $song -> MV = session::get('mv');
        $song -> fileTextLyric = session::get('nametext');
        $song -> fileSubVTTEng	= session::get('srceng');
        $song -> fileSubVTTVie = session::get('srcvie');
        $song->save();
        session::flush();
    }
        public function word(){
            $word = word::paginate(8);
            return view('admin.loadword')->with(['word'=>$word]);
        }
        public function changeword($id)
        {
            $word = word::find($id);
            $type = idWord::get();
            return view('admin.changeword')->with(['word'=>$word,'type'=>$type]);
        }
        public function postchangeword(changeword $request,$id)
        {
            $word = word::find($id);
            $word-> idType = $request -> type;
            $word-> word = $request -> word;
            $word-> pronun = $request -> pronun;
            $word-> type = $request -> typeword;
            $word-> mean = $request -> meaning;
            $word-> exEng = $request -> exeng;
            $word-> exVie = $request -> exvie;
            if($request->hasFile('filemp3'))
            {
                $filemp3 = $request ->file('filemp3');
                $ex = strtolower($filemp3 -> getClientOriginalExtension('filemp3'));
                if($ex=='mp3')
                {
                    if($filemp3->getClientSize('filemp3')<1024000)
                    {
                        $name = str_replace(' ','',$request->word).'.'.$ex;
                        $filemp3->move('resources/audio/',$name);
                        $word -> audio = $name;
                    }
                    else
                    return redirect()->back()->with('error','File audio quá lớn');
                }
                else
                return redirect()->back()->with('error','Định dạng sai');
            }
            if($request->hasFile('fileimg'))
            {
                $filemp3 = $request ->file('fileimg');
                $ex = strtolower($filemp3 -> getClientOriginalExtension('fileimg'));
                if($ex=='png'||$ex=='jpg')
                {
                    if($filemp3->getClientSize('fileimg')<1024000)
                    {
                        $name = str_replace(' ','',$request->word).'.'.$ex;
                        $filemp3->move('public/image/imageWord/newWord/',$name);
                        $word -> image = $name;
                    }
                    else
                    return redirect()->back()->with('error','File hình quá lớn');
                }
                else
                return redirect()->back()->with('error','Định dạng sai');
            }
            $word->save();
            return redirect()->back()->with('success','Thành công');
        }
        public function deleteword($id)
        {
            $word = word::find($id)->delete();
            return redirect()->route('word');
        }
        public function addword(){
            $type = idWord::get();
            return view('admin.addword')->with('type',$type);
        }
        public function postaddword(changeword $request)
        {
            if($request->hasFile('filemp3'))
            {
                if($request->hasFile('fileimg'))
                {
                    $filemp3 = $request ->file('filemp3');
                    $fileimg = $request ->file('fileimg');
                    $exmp3 = $filemp3->getClientOriginalExtension('filemp3');
                    $eximg = $fileimg->getClientOriginalExtension('fileimg');
                    if(strtolower($exmp3)=='mp3' && strtolower($eximg)=='jpg'||strtolower($eximg)=='png')
                    {
                        $sizemp3 = $filemp3 -> getClientSize('filemp3');
                        $sizeimg = $fileimg -> getClientSize('fileimg');
                        $namemp3 = str_replace(' ','',$request->word).'.'.$exmp3;
                        $nameimg = str_replace(' ','',$request->word).'.'.$eximg;
                        if($sizemp3<1024000 && $sizeimg <1024000)
                        {
                            $word = new word();
                            $word-> idType = $request -> type;
                            $word-> word = $request -> word;
                            $word-> pronun = $request -> pronun;
                            $word-> type = $request -> typeword;
                            $word-> mean = $request -> meaning;
                            $word-> exEng = $request -> exeng;
                            $word-> exVie = $request -> exvie;
                            $fileimg->move('public/image/imageWord/newWord/',$nameimg);
                            $filemp3->move('resources/audio/',$namemp3);
                            $word -> image = $nameimg;
                            $word -> audio = $namemp3;
                            $word->save();
                            return redirect()->back()->with('success','Thành công');
                        }
                        else
                        return redirect()->back()->with('error','File quá lớn');
                    }
                    else
                    return redirect()->back()->with('error',$eximg);
                }
                else
                return redirect()->back()->with('error','Chưa có file hình');
            }
            else
            return redirect()->back()->with('error','Chưa có file audio');
        }
    public function ex(){
        $list = listanh::all();
        return view('admin.ex')->with('list',$list);
    }
    public function editex($id){
        $list = listanh::find($id);
        return view('admin.exedit')->with('list',$list);
    }
    public function editexpost(exedit $req,$id){
       $ten = $req-> ten;
       $list = listanh::find($id);
       $list -> ten = $ten;
       $list -> save();
       return redirect()->back()->with('success','Đã cập nhật');
    }
    public function addex(){
        return view('admin.addex');
    }
    public function addexpost(exedit $req)
    {
        $list =new listanh;
        $list -> ten = $req->ten;
        $list -> save();
        return redirect()->back()->with('success','Đã  thêm');
    }
    public function addexz(){
        $listanh = listanh::all();
        return view('admin.addexz')->with('listanh',$listanh);
    }
    public function addexzpost(addexz $req)
    {
        $loai = $req ->nhombai;
        $da = $req -> da;
        $db = $req -> db;
        $dc = $req -> dc;
        $dd = $req -> dd;
        $dad = $req -> dad;
        if($req -> hasFile('file')&&$req-> hasFile('fileaudio'))
        {
            $hinh = $req -> file('file');
            $audio = $req -> file('fileaudio');
            $exhinh = strtolower($hinh -> getClientOriginalExtension('file'));
            $exaudio = strtolower($audio -> getClientOriginalExtension('fileaudio'));
            if($exhinh == 'png'||$exhinh == 'jpg'&&$exaudio=='mp3')
            {
                $namehinh = rand().'_'.$dad.'.'.$exhinh;
                $nameaudio = rand().'_'.$dad.'.'.$exaudio;
                $bta = new bta();
                $bta -> idpart = $loai;
                $bta -> hinh = $namehinh;
                $bta -> a = $da;
                $bta -> b = $db;
                $bta -> c = $dc;
                $bta -> d = $dd;
                $bta -> audio = $nameaudio;
                $bta -> dung = $dad;
                $bta -> save();
                $hinh -> move('public/image/imageWord/baitapanh',$namehinh);
                $audio -> move('resources/audio_bta',$nameaudio);
                return redirect()->back()-> with('success','Thêm thành công');
            }
            else
            return redirect()->back()-> with('error','Sai định dạng');
        }
        else
        {
            return redirect()->back()-> with('error','Chưa có file');
        }
    }
    public function comment(){
        $browser = comment::where('status',0)->orderBy('id','DESC')->get();
        $done = comment::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.comment')->with(['browser'=>$browser,'done'=>$done]);
    }
    public function getallow(Request $req)
    {
        $id = $req -> id;
        $comment = comment::find($id);
        $comment -> status = 1;
        $comment -> save(); 
    }
    public function getdelete(Request $req)
    {
        $id = $req -> id;
        $comment = comment::find($id);
        $comment -> status = 2;
        $comment -> save(); 
    }
}
