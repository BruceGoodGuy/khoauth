<div id="detailsMenu">
				<h3>Giọng nữ</h3>
				@foreach($song2 as $song2)
				<div id="boxItemMusic">
					<div id="coverMusic" style="background: url('{{asset('/')}}public/image/imageMusicCover/{{$song2->coverImage}}'); background-size: cover; "></div>
					<div id="contenMusic">
						<h3>{{$song2->song}}</h3>
						<p> {!!strip_tags(str_limit($song2->lyricEng,300,'.....'))!!} <a href="{{asset('/')}}music/song/{!!str_slug($song2->song)!!}-{{$song2->id}}.html">More</a></p>
					</div>
				</div>
				@endforeach
				<div id="moreMusic">
					<a href="{{asset('/')}}music/type/giong-nu-2"><p>Nhiều hơn</p></a>
				</div>
			</div>