<div id="boxContainItemMusic">
   @foreach($song as $key => $song)
         <div id="chipsMusicItem" @if( $key % 4 != 0) style="margin-left:38px" @endif>
            <div id="coverMusicItem">
               <div id="imageCoverMusicItem" style="background: url('{{asset('/')}}public/image/imageMusicCover/{{$song->coverImage}}'); background-size: cover; ">
                  <p>
                     {{$song -> $song}}
                  </p>
               </div>
               <div id="contentMusicInfo">
                  <div id="shortLyric">
                     <p>{{strip_tags(str_limit($song -> lyricEng,100))}}
                     </p>
                  </div>
                  <div id="playMuiscArea">
                     <p><a href="{{asset('/')}}music/song/{!!str_slug($song->song)!!}-{{$song->id}}.html">Xem Thêm</a></p>
                  </div>
               </div>
            </div>
         </div>
   @endforeach
      </div>
