<div id="rightPlayer">
   <div id="boxSub">
      @for($i=0;$i<$size;$i++)
      <div class="onLine" line="{{$i}}" time="{{$text[$i][0]}}" id="subLine">
         <h4>{{$realLyric[$i][0]}}</h4>
         <p>{{$realLyric[$i][1]}}</p>
      </div>
      @endfor
   </div>
   <div id="relateSong">
      <h3>{{$song->name}}</h3>
      @foreach($songRel as $songRel)
      <a href="{{asset('/')}}music/song/{{str_slug($songRel->song)}}-{{$songRel->id}}.html">
         <div id="boxSmallSong">
            <h4>{{$songRel -> song }}</h4>
            <p> {{$song->name}} </p>
         </div>
      </a>
      @endforeach
   </div>
   <div id="relateSong">
      <h3>Nghe nhiều</h3>
      @foreach($songHot as $songHot)
      <a href="{{asset('/')}}music/song/{{str_slug($songHot->song)}}-{{$songHot->id}}.html">
         <div id="boxSmallSong">
            <h4>{{$songHot -> song}}</h4>
            <p>{{$songHot -> name}}</p>
         </div>
      </a>
      @endforeach
   </div>
</div>
<script>
   var vid = document.getElementById("video");
   vid.ontimeupdate = function() {myFunction()};
function myFunction() {
    // Display the current position of the video in a p element with id="demo"
    var a = vid.currentTime;
    $('.onLine').each(function(){
        var cutime = $(this).attr('time');
        if(cutime<=a)
        {
            $(".onLine").css("background","white");
   			$(this).css({
   				background: '#E1E2E1',
   			});
            $(".onLine").removeClass('curent');
   			$(this).addClass('curent');
        }
        else
        {
            
        }
    });
}
   $(".onLine").click(function(){
   	var clickTime = $(this).attr("time");
   	var vid = document.getElementById("video");
   	vid.currentTime= clickTime;
   });
   // $('html, body').animate({
   //     scrollTop: ($('.curent').offset())
   // },50);
   // $(document).ready(function () {
   //    // Handler for .ready() called.
   //    $('html, body').animate({
   //        scrollTop: $('.curent').offset().top
   //    }, 'slow');
   // });
</script>