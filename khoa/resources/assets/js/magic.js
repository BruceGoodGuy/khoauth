$(document).ready(function() {
	$("#closeNow").click(function() {
			$("#menuBar").slideUp(500);
			$("#containFloatMenu").css({
				bottom: "10px",
			});
	});
});
$(document).ready(function() {
	var i=0;
		$(".iaddMore").click(function(){
			i++;
			if(i!=0){
				$(".imusicNote").css({
					display: 'block',
					bottom: '55px'
				});
				$(".ivideoCam").css({
					display: 'block',
					bottom: '110px'
				});
				$(".ibookmark").css({
					display: 'block',
					bottom: '165px'
				});
				$(".login").css({
					display: 'block',
					bottom: '220px'
				});
				i=-1;
			}
			if (i==0)
			{
				$(".imusicNote").css({
					// display: 'none',
					bottom: '0px'
				});
				$(".ivideoCam").css({
					// display: 'none',
					bottom: '0px'
				});
				$(".ibookmark").css({
					// display: 'none',
					bottom: '0px'
				});
				$(".login").css({
					display: 'block',
					bottom: '0px'
				});
			}
	});
});
$(document).ready(function(){
	$(".selectVie").click(function(){
		$("#boxLyricEng").css({
			display: 'none',
		});
		$(".tab").css('background',"#efefef");
		$(this).css({
			background: 'white',
		});
		$("#boxLyricVie").fadeIn();
	});
	$(".selectEng").click(function(){
		$("#boxLyricVie").css({
			display: 'none',
		});
		$(".tab").css('background',"#efefef");
		$(this).css({
			background: 'white',
		});
		$("#boxLyricEng").fadeIn();
	});
});
$(document).ready(function(){
	var total = -1;
	$('.boxItemWord').each(function(){
		total++;
		var pos = $(this).attr('position');
		if(pos!=0)
		{
			$(this).css("display","none");
		}
	});
	var click =1;
	$(".nextNow").click(function(){
		click++;
		if(click>total)
		{
			click = 0;
		}
		$('.boxItemWord').hide();
			$('.boxItemWord').each(function(){
			var pos = $(this).attr('position');
			if(pos==click)
			{
				$(this).fadeIn();
			}
		});
	});
	$(".prevNow").click(function(){
		--click;
		console.log(click);
		if(click<=0)
		{
			click = total;
		}
		$('.boxItemWord').hide();
			$('.boxItemWord').each(function(){
			var pos = $(this).attr('position');
			if(pos==click)
			{
				$(this).fadeIn();
			}
		});
	});
});

