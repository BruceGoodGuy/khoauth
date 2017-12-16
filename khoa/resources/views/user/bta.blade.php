	@extends("template.indexTemplate")
	@section('content')
	@include("module.headerIndex")
	<div id="coverAll">
		<div id="containBox">
			<div class="containboxtest">
				<h3>Bài tập part {{$i}}</h3>
				@if(session('sai'))
					<div class="thongbao">
					@if((session('sai')!=-1))
						Bạn đã trả lời sai ở câu: {{session('sai')}}
					@endif
					@if((session('sai')==-1))
						Bạn đã trả lời đúng hết
					@endif
					</div>
				@endif
				<form action="{{asset('/')}}bta/{{$i}}" method="post">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
				@foreach($bta as $key => $value)
				<div class="containboxqu">
					<h3>Câu {{++$key}} </h3>
					<div class="imgbta">
						<img title="{{$value->hinh}}" src="{{asset('/')}}public/image/imageWord/baitapanh/{{$value->hinh}}">
					</div>
					<div class="anwserbta">
						<audio autobuffer controls>
							<source src="{{asset('/')}}resources/audio_bta/{{$value->audio}}">
							<object type="audio/x-wav" data="{{asset('/')}}resources/audio_bta/{{$value->audio}}" width="290" height="45">
								<param name="src" value="/media/audio.wav">
								<param name="autoplay" value="false">
								<param name="autoStart" value="0">
								<p><a href="/media/audio.wav">Download this audio file.</a></p>
							</object>
						</audio>
						<div class="checkaswer">
							<div class="form-check">
							<input type="radio" name="traloi{{$key}}" value="1">
							<label for="input">A</label>
							<div class="da">{{$value->a}}</div>
							</div>
							<div class="form-check">
							<input type="radio" name="traloi{{$key}}" value="2">
							<label for="input">B</label>
							<div class="da">{{$value->b}}</div>
							</div>
							<div class="form-check">
							<input  type="radio" name="traloi{{$key}}" value="3">
							<label for="input">C</label>
							<div class="da">{{$value->c}}</div>
							</div>
							<div class="form-check">
							<input  type="radio" name="traloi{{$key}}" value="4">
							<label for="input">D</label>
							<div class="da">{{$value->d}}</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				<div class="containButton">
					<button id="btnkq" type="button">Xem đáp án</button>
					<button id="btnkq" type="submit">kiểm tra</button>
				</div>
			</form>
				<div class="comment">
					<h3>Bình luận</h3><div class="alertajax"></div>
					<div class="loadCommnent">
						<!-- <form action="{{route('postcomment')}}" method="post"> -->
							<textarea class="commenttext" name="coment"></textarea>
							@if($user!='null')
							<input class="dang" id="btnkq" type="button" name="setcm" value="Đăng">
							@endif
							@if($user=='null')
							<input id="btnkq" class="didangnhap" type="button" name="dangnhap" value="Đăng Nhập">
							<p  style="color: tomato">Bạn phải đăng nhập</p>
							@endif
						<!-- </form> -->
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
			$("#btnkq").click(function(){
				$('.da').fadeToggle();
			});
			$('.didangnhap').click(function(){
				location.href="{{asset('/')}}dangnhap";
			});
			$('.dang').click(function(){
				$.ajax({
					url:"{{route('postcomment')}}",
					type:"get",
					datatype:"html",
					data:{
						content: $('.commenttext').val(),
					}	
				}).done(function(ketqua) {
                $('.alertajax').html(ketqua);
            });
				$('.commenttext').val('');
			});
		});
	</script>
	@endsection