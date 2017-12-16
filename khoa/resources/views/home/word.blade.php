	@extends("template.indexTemplate")
	@section('content')
	@include("module.headerWord")
	<div id="coverAll">
		<div id="iContain">
			<div id="leftWord">
				<p>Từ vựng TOEIC</p>
				@foreach($typeWord as $key =>$typeWord)
					<div class="boxTypeWord">
						<div id="imgTypeWord" style="background: url('{!!asset('/')!!}public/image/home/{{$typeWord->typeImg}}'); background-size: cover; "></div>
						<div id="infoTypeWord">
							<a href="{{asset('/')}}word/type/{{str_slug(strtolower($typeWord->typeEng))}}-{{$typeWord->id}}.html"><h3>{{++$key}} - WORDS TOEIC - {{$typeWord->typeEng}}</h3></a>
							<p>Từ vựng TOEIC - Chủ đề {{$typeWord->typeVie}}</p>
							<p>Số từ: 20</p>
						</div>
					</div>
				@endforeach
			</div>
			<div id="rightWord">
				<div id="itroword">
					<p>Học từ vựng</p>
					<p>Thông qua những bài tập dạng click chọn sẽ giúp bạn tập trung và dễ thuộc hơn</p>
				</div>
			</div>
		</div>
	</div>
	<div id="menuBar">
			<div id="containSelector">
				<a href="{{asset('/')}}music">
					<div class="buttonMenu" id="buttonMusic"><i class="material-icons">library_music</i> Music</div> 
				</a>
				<a href="{{asset('/')}}video">
					<div class="buttonMenu" id="buttonVideo"><i class="material-icons">video_library</i> Video</div> 
				</a>
				<a href="{{asset('/')}}word">
					<div class="buttonMenu" id="buttonLesson"><i class="material-icons">chrome_reader_mode</i> Lesson</div> 
				</a>
				<div class="buttonMenu"><i class="material-icons" id="closeNow">close</i></div>
			</div>
	</div>
	@endsection