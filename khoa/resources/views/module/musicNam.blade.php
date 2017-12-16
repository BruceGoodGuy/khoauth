<div id="detailsMenu">
				<h3>Giọng nam</h3>
				@foreach($song1 as $song1)
				<div id="boxItemMusic">
					<div id="coverMusic" style="background: url('{{asset('/')}}public/image/imageMusicCover/{{$song1->coverImage}}'); background-size: cover; "></div>
					<div id="contenMusic">
						<h3>{{$song1->song}}</h3>
						<p> {!!strip_tags(str_limit($song1->lyricEng,300,'.....'))!!} <a href="{{asset('/')}}music/song/{!!str_slug($song1->song)!!}-{{$song1->id}}.html">More</a></p>
					</div>
				</div>
				@endforeach
				<div id="moreMusic">
					<a href="{{asset('/')}}music/type/giong-nam-1"><p>Nhiều hơn</p></a>
				</div>
			</div>