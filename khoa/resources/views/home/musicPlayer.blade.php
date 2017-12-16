@extends("template.indexTemplate")
@section("content")
@foreach($song as $song)
<header>
   <div class="cover coverMusic">
   </div>
   <p>MUSIC/nam/{{$song -> song}}</p>
</header>
<div id="coverAll">
   <div id="iContain">
      <div id="containPlayer">
         @include("module.musicPlayerLeft")
         @include("module.musicPlayerRight")			
      </div>
   </div>
</div>
@endforeach
<div id="menuBar">
			<div id="containSelector">
				<a href="{{asset('/')}}"><div class="buttonMenu" id="buttonMusic"><i class="material-icons">home</i> Home</div> </a>
				<a href="{{asset('/')}}music"><div class="buttonMenu" id="buttonMusic"><i class="material-icons">library_music</i> Music</div> </a>
				<a href="{{asset('/')}}music/type/giong-nam-1"><div class="buttonMenu" id="buttonVideo"><i class="material-icons">video_library</i> Nam</div> </a>
				<a href="{{asset('/')}}music/type/giong-nu-2"><div class="buttonMenu" id="buttonLesson"><i class="material-icons">chrome_reader_mode</i> Nữ</div> </a>
				<a href="{{asset('/')}}music/type/song-ca-3"><div class="buttonMenu" id="buttonVideo"><i class="material-icons">video_library</i> Song ca</div> </a>
				<div class="buttonMenu"><i class="material-icons" id="closeNow">close</i></div>
			</div>
</div>
<script>
   $(document).ready(function(){
      $('.didangnhap').click(function(){
         location.href="{{asset('/')}}dangnhap";
      });
      $('.dang').click(function(){
				$.ajax({
					url:"{{route('postcommentms')}}",
					type:"get",
					datatype:"html",
					data:{
						content: $('.commenttext').val(),
					}	
				}).done(function(ketqua) {
                $('.alertajax').html(ketqua);
            });
				$('.commenttext').val('');
			});
   });
</script>
@endsection