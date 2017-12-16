@foreach($Onesong as $Onesong)
<div id="boxFeatureMusic">
         <div id="boxCoverFeatureMusic" style="background: url('{{asset('/')}}public/image/imageMusicCover/{{$Onesong->coverImage}}'); background-size: cover; ">
         </div>
         <div id="boxFeatureMusicInfo">
            <h3>{{$Onesong -> song}}</h3>
            <p>{!!strip_tags(str_limit($Onesong->lyricEng,500,'.....'))!!}
            </p>
            <a href="{{asset('/')}}music/song/{!!str_slug($Onesong->song)!!}-{{$Onesong->id}}.html">
            <div id="buttonPlayMusic">
               <p>Play</p>
            </div>
            </a>
         </div>
      </div>
   @endforeach