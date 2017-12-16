	@extends("template.indexTemplate")
	@section('content')
	@include("module.headerWord")
	<div id="coverAll">
		<div id="iContain">
			<div id="leftWord">
				<p>Bài tập TOEIC</p>
				<div class="containSlide">
					<div class="showResult">
						<h3>Hết</h3>
						<p>Bạn đã trả lời đúng <span style="color:red" class="numRight"></span> câu</p>
						<div class="butonPlayagain">Chơi lại</div>
					</div> 
					@foreach($word as $key => $word)
					<div class="boxItemWord" position="{{$key}}" answer="{{$word['word']}}">
						<div style="background: url('{{asset('/')}}public/image/imageWord/newWord/{{$word['image']}}'); background-size: cover;" class="imgDetailWord">
							<div class="showWordDetail">
								<h3>{{$word['mean']}}</h3>
								<h3 class="yourChoose"></h3>
							</div>
						</div>
						<div class="controlWord controlWordPractice">
							<i class="material-icons clear">clear</i>
							<i class="material-icons restore">restore</i>
							<a onclick="this.firstChild.play()"><audio src="{{asset('/')}}/resources/audio/{{$word['audio']}}"></audio><i class="material-icons">play_circle_filled</i></a>
							<i class="material-icons done">done</i>
						</div>
						<div class="selectBox">
							@foreach($word['shuffle'] as $key2 => $word2)
								<span class="boxKeyWord" click = '0'>{{$word2}}</span>
							@endforeach
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div id="rightWord">
				<div class="scoreBoard">
					<p class="posQuestion">Câu số: <span class="numberQues">1</span>/<span class="total"></span></p>
					<p>Số câu đúng: <span class="numRight">0</span><p>
					<p>Số câu sai: <span class="numwrongA">0</span><p>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			var click='';
			var wrong=0;
			var right=0;
			var answer = '';
			var choose=1;
			var total = 0;
			var end = false;
			var pos;
			function resetAnswer()
			{
				$('.boxItemWord').each(function(){
					if($(this).is(':visible'))
					{
						 pos = $(this).attr('position');
						 answer = ($(this).attr('answer'));
						 return answer;
					}

				});
			}

			function getRight(right){
				$('.numRight').html(right);
			}
			function getWrong(wrong){
				$('.numwrongA').html(wrong);
			}
			function nextSlide(pos,total){
				if(pos < total-1)
				{
					$('.boxItemWord').hide();
					$('.boxItemWord').eq(++pos).fadeIn();
				}
				else
				{
					$('.showResult').fadeIn();
					$('.selectBox').hide();
					getRight(right);
				}
			}
			function resetClick()
			{
				click='';
				$('.yourChoose').html(click);

			}
			$('.boxItemWord').each(function(){
				total++;
			});
			$('.total').html(total);

			$('.boxKeyWord').click(function(){
				if($(this).attr('click')==0)
				{
					$(this).attr('click','1');
					click+=$(this).html();
					$(this).css({
						background: '#7F7F7F',
						cursor: 'not-allowed'
					});
					$('.yourChoose').html(click);
				}
			});
			$('.done').click(function(){
				resetAnswer();
				if(click.length == answer.length)
				{
					if(click == answer)
					{
						right++;
						getRight(right);

					}
					else
					{
						wrong++;
						getWrong(wrong);
					}

					resetAnswer();
					resetClick();
					nextSlide(pos,total);
				}
				else
				{
					alert("Chưa chọn hết");
				}
			});


			// restore click
			$('.restore').click(function(){
				$('.boxKeyWord').css({
					background: 'red',
					cursor: 'pointer'
				});
				$('.boxKeyWord').attr('click','0');
				resetClick();
			});

			// X click

			$('.clear').click(function(){
				wrong++;
				getWrong(wrong);
				resetAnswer();
				resetClick();
				nextSlide(pos,total);
			});
			$('.butonPlayagain').click(function(){
				location.reload();
			});
		});
	</script>
	@endsection