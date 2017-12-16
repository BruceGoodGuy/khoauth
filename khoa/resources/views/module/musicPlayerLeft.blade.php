<div id="leftPlayer">
   <div id="boxPlayer">
      <video class="video-js-box vim-css" width="650" height="400" controls id="video" poster="{{asset('/')}}public/image/imageMusicCover/{{$song->coverImage}}">
         <source src="{{asset('/')}}resources/video/Music/{{$song->MV}}" type="video/mp4">
         <track label="Eng" kind="subtitles" srclang="English" src="{{asset('/')}}public/subtitle/songs/{{$song->fileSubVTTEng}}" default>
         <track label="Vie" kind="subtitles" srclang="VietNamese" src="{{asset('/')}}public/subtitle/songs/{{$song->fileSubVTTVie}}" >
         <!-- <source src="mov_bbb.ogg" type="video/ogg"> -->
         Your browser does not support HTML5 video.
      </video>
   </div>
   <div id="boxViewPlayer">
      <p>Luợt xem: {{$song -> viewer}}</p>
   </div>
   @for($i=0;$i<sizeof($arraySinger);$i++)
   <div id="boxInfoSinger">
      <div id="avatarSinger">
         <img src="{{asset('/')}}public/image/avatarSinger/{{$arraySinger[$i][0]['image']}}" height="100px" width="200px">
      </div>
      <div id="songAndSinger">
         <h3>{{$arraySinger[$i][0]['name']}}</h3>
         <p>{{$song -> song}}</p>
      </div>
   </div>
   @endfor
   <div id="boxLyric">
      <div id="tabSelect">
         <div id="lyricTab" class="selectEng tab">
            Lời Anh
         </div>
         <div id="lyricTab" class="selectVie tab">
            Lời Việt
         </div>
      </div>
      <div id="boxLyricEng">
         <p>{!!$song -> lyricEng!!}</p>
      </div>
      <div id="boxLyricVie">
         <p>{!!$song -> lyricVie!!}</p>
      </div>
   </div>
   <div class="commentms">
      <h3 style="padding:5px 10px;">Bình luận</h3><div class="alertajax"></div>
               <div class="loadCommnent">
                  <textarea class="commenttext" name="coment"></textarea>
                     @if($user!='null')
                     <input class="dang" id="btnkq" type="button" name="setcm" value="Đăng">
                     @endif
                     @if($user=='null')
                     <input id="btnkq" class="didangnhap" type="button" name="dangnhap" value="Đăng Nhập">
                     <p  style="color: tomato">Bạn phải đăng nhập</p>
                     @endif
                     @foreach($comment as $comment)
                     <div class="headercm">
                           <ul>
                              <li>{{$comment->user}}</li>
                              <li>{{$comment->date}}</li>
                           </ul>
                     </div>
                     <div class="boxcomment">
                        {{$comment -> content}}
                     </div>
                     @endforeach
               </div>
   </div>
</div>