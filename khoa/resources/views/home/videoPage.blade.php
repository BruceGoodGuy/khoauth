	@extends("template.indexTemplate")
	@section('content')
	@include("module.headerVideo")
	<div id="coverAll">
		<div id="iContain">
			<div id="placeSearch"></div>
			@include("module.videoSlide")
			@include("module.videoTypeTab")
		</div>
	</div>
	<script>
		var total=0;
		$(document).ready(function() {
			var i=1;
			$(".slideVideo").each(function(){
				total++;
			});
			total2 = total-1;
			setInterval(function(){
				$(".slideVideo").each(function(){
					if($(this).attr("pos")==i)
					{
						$(".slideVideo").hide();
						$(this).fadeIn();
					}
				});
				$(".infoVideoBanner").each(function(){
					if($(this).attr("pos")==i)
					{
						$(".infoVideoBanner").hide();
						$(this).fadeIn();
					}
				});
			if(i>=total2)
			{
				i=0;
			}
			else
			{
				i++;
			}
			},5000);
			$(".button").click(function() {
				$(".button").css("background","white");
				$(this).css({
					background:  '#EFEFEF',
				});
				if($(this).attr("menu")=="movieTab"){
					$(".tabType").hide();
					$(".movieTab").fadeIn();
				};
				if($(this).attr("menu")=="programTab"){
					$(".tabType").hide();
					$(".programTab").fadeIn();
				};
			});
		});
	</script>
@endsection