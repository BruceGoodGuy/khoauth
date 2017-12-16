	@extends("template.indexTemplate")
	@section('content')
	@include("module.headerMusicType")
<div id="coverAll">
   <div id="iContain">
    	@include("module.musicFeature")
      	@include("module.musicTypeFeatureSong")
      	@include("module.musicTypeBoxMusic");
   </div>
</div>
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
		$("#showFeature").css("margin-top","50px");
	});
</script>
	@endsection