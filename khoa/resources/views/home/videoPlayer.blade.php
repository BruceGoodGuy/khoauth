	@extends("template.indexTemplate")
	@section('content')
	@include("module.headerVideoPlayer")
	@foreach($video as $video)
	<div id="coverAll">
		<div id="iContain">
			<div id="videoContainPlayer">
				  <video width="1000" height="450" controls poster="{{asset('/')}}/public/image/imageVideoCover/{{$video ->coverImage}}">
				  		<source src="{{asset('/')}}resources/video/Video/movie/{{$video -> nameVideo}}" type="video/mp4">
				  		<track label="Vie" kind="subtitles" srclang="Vietnamese" src="{{asset('/')}}public/subtitle/video/{{$video -> srcVie}}" default>
				  		<track label="Eng" kind="subtitles" srclang="English" src="{{asset('/')}}public/subtitle/video/{{$video -> srcEng}}" default>
				  		<track label="All" kind="subtitles" srclang="All" src="{{asset('/')}}public/subtitle/video/{{$video -> srcAll}}" default>
				  </video>
			</div>
			<div id="boxTap">
				<h3>Các tập:</h3>
				@foreach($videoMore as $videoMore)
					<a href="{{asset('/')}}video/{{str_slug($videoMore -> name)}}-tap-{{$videoMore -> currentTap}}-{{$videoMore -> id}}.html">
						<div id="boxTapReal">
							<p>{{$videoMore -> currentTap}}</p>
						</div>
					</a>
				@endforeach
			</div>
			<div id="infoVideoSub">
					<div id="SubVideo">Lời Anh</div>
					<div id="SubVideo">Lời Việt</div>
			</div>
			<div id="videoContainSub">
				@for($i=0;$i<sizeof($subtitle);$i++)
				<div time="{{$text[$i][0]}}" id="subVideoBox">
					<div id="subVideo">
						<p> {{$subtitle[$i][0]}} </p>
					</div>
					<div id="subVideo">
						<p>{{$subtitle[$i][1]}}</p>
					</div>
				</div>
				@endfor
			</div>
			<div id="relatedVideo">
				<h3>Có thể bạn thích</h3>
				<div id="videoNew">
					<div id="chipsMusicItem">
			            <div id="coverMusicItem">
			               <div id="imageCoverMusicItem" style="background: url('{{asset('/')}}public/image/imageVideoCover/gangstersquadposter.jpg'); background-size: cover; ">
			                  <p>
			                     Khoa
			                  </p>
			                  <div id="iLikeIt"><i class="material-icons">star_border</i></div>
			               </div>
			               <div id="contentMusicInfo">
			                  <div id="shortLyric">
			                     <p>helloe
			                     </p>
			                  </div>
			                  <div id="playMuiscArea">
			                     <p><a href="{{asset('/')}}video/{{str_slug('video')}}-1.html">Xem Thêm</a></p>
			                  </div>
			               </div>
			            </div>
         			</div>
			</div>
			</div>

		</div>
	</div>
	@endforeach
	@endsection