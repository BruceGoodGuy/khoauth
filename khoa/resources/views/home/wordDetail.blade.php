	@extends("template.indexTemplate")
	@section('content')
	@include("module.headerWord")
	<div id="coverAll">
		<div id="iContain">
			<div id="leftWord">
				<p>TOEIC WORDS</p>
				<div class="containSlide">
					@foreach($word as $key => $word)
					<div class="boxItemWord" position="{{$key}}">
						<div style="background: url('{{asset('/')}}public/image/imageWord/newWord/{{$word->image}}'); background-size: cover;" class="imgDetailWord">
							<div class="showWordDetail">
								<h3>{{$word->word}} {{$word->type}} /{{$word->pronun}}/</h3>
								<h3>{{$word->mean}}</h3>
							</div>
						</div>
						<div class="controlWord controlWordPlay">
							<i class="material-icons prevNow">skip_previous</i>
							<a onclick="this.firstChild.play()"><audio src="{{asset('/')}}/resources/audio/{{$word->audio}}"></audio><i class="material-icons">play_circle_filled</i></a>
							<i class="material-icons nextNow">skip_next</i>
						</div>
					</div>
					@endforeach
				</div>
				<div class="menuExercise">
					<a href="{{asset('/')}}word/practice/toeic-word-{{$id}}.html"><div class="buttonPractice">Luyện Tập</div></a>
					<a href="{{asset('/')}}word/vippractice/toeic-word-{{$id}}.html"><div class="buttonPractice">Luyện Tập Nâng Cao</div></a>
				</div>
				@foreach($word2 as $key => $word2)
					<div class="boxWordRealative">
						<div style="background: url('{{asset('/')}}public/image/imageWord/newWord/{{$word2->image}}');background-size: cover; " class="imgWordRel"></div>
						<h3>{{ucfirst(strtolower($word2->word))}} {{$word2->type}} : {{$word2->mean}}</h3>
						<a onclick="this.firstChild.play()"><audio src="{{asset('/')}}/resources/audio/{{$word2->audio}}"></audio><i class="material-icons">play_circle_filled</i> </a>/{{str_replace('/','',$word2->pronun)}}/
						<h4>Ex: {{$word2->exEng}}</h4>
						<h4>{{$word2->exVie}}</h4>
					</div>
				@endforeach
			</div>
			<div id="rightWord">
				<p>Bình luận: </p>
				<div class="blword">
					<div class="loadCommnent">
                  <textarea class="commenttext" name="coment"></textarea>
				  <p class="result"></p>
                     @if($user!='null')
                     <input class="dang" id="btnkq" type="button" name="setcm" value="Đăng">
                     @endif
                     @if($user=='null')
                     <input id="btnkq" class="didangnhap" type="button" name="dangnhap" value="Đăng Nhập">
                     <p  style="color: tomato">Bạn phải đăng nhập</p>
                     @endif
                     @foreach($comment as $comment)
                     <div class="headercm">
                           <ul>
                              <li>{{$comment->user}}</li>
                              <li>{{$comment->date}}</li>
                           </ul>
                     </div>
                     <div class="boxcomment">
                        {{$comment -> content}}
                     </div>
                     @endforeach
               </div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$('.dang').click(function(){
				var comment = $('.commenttext').val();
				$('.commenttext').val('');
				$.ajax({
					url:'{{route('sendcmm')}}',
					datatype:'html',
					type:'get',
					data:{
						content:comment,
						id:{{$id}}
					}
					
				}).done(function(data){
					$('.result').html(data)
				});
			});
		});
	</script>
	<div id="menuBar">
			<div id="containSelector">
				<a href="{{asset('/')}}"><div class="buttonMenu" id="buttonMusic"><i class="material-icons">home</i> Home</div> </a>
				<a href="{{asset('/')}}music"><div class="buttonMenu" id="buttonMusic"><i class="material-icons">library_music</i> Music</div> </a>
				<a href="{{asset('/')}}word"><div class="buttonMenu" id="buttonVideo"><i class="material-icons">video_library</i> word</div> </a>
				<div class="buttonMenu"><i class="material-icons" id="closeNow">close</i></div>
			</div>
</div>
	@endsection