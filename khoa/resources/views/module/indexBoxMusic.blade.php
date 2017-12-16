<div id="boxMenu">
				<p class="titleHere">Nhạc</p>
				<div class="leftHere">
					<div class="imgLeft">
						<img height="300px" width="500px" src="{{asset('/')}}/public/image/home/listenMusic.jpg" alt="NgheNhac">
					</div>
					<div class="titleBehindImg bgPink">
						<p class="contentLeft">Học tiếng Anh qua bài hát</p>
					</div>
				</div>
				<div class="rightHere">
					<p class="tutDS">Danh sách</p>
					@foreach($song as $song)
					<a href="{{asset('/')}}music/song/{{str_slug($song->song)}}-{{$song->id}}.html">
						<div class="boxItemMin">
							<p class="setNumber">Number {{++$i}}</p>
							<p class="setTitle">{{$song -> song}}</p>
						</div>
					</a>
					@endforeach
					<a href="{{asset('/')}}music">
					<div class="btnMore bgPink">More</div>
					</a>
				</div>
</div>