<div id="boxMenu" class="videoHere">
				<p class="titleHere">Từ Vựng</p>
				<div class="leftHere">
					<div class="imgLeft">
						<img height="300px" width="500px" src="{{asset('/')}}/public/image/home/learnVocabulary.bmp" alt="Học Từ Vựng">
					</div>
					<div class="titleBehindImg bgGreen">
						<p class="contentLeft">Học Từ Vựng</p>
					</div>
				</div>
				<div class="rightHere">
					<p class="tutDS">Danh sách</p>
					@foreach($idword as $key => $value)
					<a href="{{asset('/')}}word/type/{{str_slug($value->typeEng)}}-{{$value->id}}.html">
					<div class="boxItemMin">
						<p class="setNumber">Number {{++$key}}</p>
						<p class="setTitle">{{$value->typeEng}} - {{$value->typeVie}}</p>
					</div>
					</a>
					@endforeach
					<a href="{{asset('/')}}word"><div class="btnMore bgGreen">More</div></a>
				</div>
			</div>