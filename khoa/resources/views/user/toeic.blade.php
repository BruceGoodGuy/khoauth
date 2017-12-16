	@extends("template.indexTemplate")
	@section('content')
	@include("module.headerIndex")
	<div id="coverAll">
		<div id="containBox">
			<div class="containboxtest">
				<div class="intro">
					<p>Danh sách các bài tập</p>
				</div>
				<div id="showanh" class="boxitem">
					<p>Bài tập Hình Ảnh</p>
				</div>
				<div class="listitem">
					<ul>
						@foreach($list as $list)
						<li><a href="{{asset('/')}}toeic/a/{{$list->id}}">{{$list->ten}}</a></li>
						@endforeach
					</ul>
				</div>
				<div class="boxitem">
					<p>Bài tập </p>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$('#showanh').click(function(){
				$('.listitem').slideToggle();
			});
		});
	</script>
	@include("module.indexMenuBar")
	@endsection