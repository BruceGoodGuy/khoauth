
			<div id="detailsMenu">
				<h3>Song ca</h3>
				@foreach($song3 as $song3)
				<div id="boxItemMusic">
					<div id="coverMusic" style="background: url('{{asset('/')}}public/image/imageMusicCover/{{$song3->coverImage}}'); background-size: cover; "></div>
					<div id="contenMusic">
						<h3>{{$song3->song}}</h3>
						<p> {!!strip_tags(str_limit($song3->lyricEng,300,'.....'))!!} <a href="{{asset('/')}}music/song/{!!str_slug($song3->song)!!}-{{$song3->id}}.html">More</a></p>
					</div>
				</div>
				@endforeach
				<div id="moreMusic">
					<a href="{{asset('/')}}music/type/song-ca-3"><p>Nhiều hơn</p></a>
				</div>
			</div>