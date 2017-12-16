	@extends("template.indexTemplate")
	@section('content')
	@include("module.headerMusic")
	<div id="coverAll">
		<div id="iContain">
			@include("module.musicChips")
			@include("module.musicFeature")
			@include("module.musicNam")
			@include("module.musicNu")
			@include("module.musicSongCa")
		</div>
	</div>
	<div id="menuBar">
			<div id="containSelector">
				<a href="{{asset('/')}}"><div class="buttonMenu" id="buttonMusic"><i class="material-icons">home</i> Home</div> </a>
				<a href="{{asset('/')}}music"><div class="buttonMenu" id="buttonMusic"><i class="material-icons">library_music</i> Music</div> </a>
				<a href="{{asset('/')}}word"><div class="buttonMenu" id="buttonVideo"><i class="material-icons">video_library</i> Word</div> </a>
				<a href="{{asset('/')}}toeic"><div class="buttonMenu" id="buttonLesson"><i class="material-icons">chrome_reader_mode</i> Lesson</div> </a>
				<div class="buttonMenu"><i class="material-icons" id="closeNow">close</i></div>
			</div>
	</div>
	@endsection