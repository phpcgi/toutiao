$(function(){
	$('#container .nav_cc .bangd').hover(function(){
		$('.z_nav').css("display","block")
		
	})
	$('.z_nav').mouseleave(function(){
		$('.z_nav').css("display","none")
	})
	$('#container .nav_cc .gywm').hover(function(){
		$('.z_nav2').css("display","block")
	})
	$('.z_nav2').mouseleave(function(){
		$('.z_nav2').css("display","none")
	})
	$('.nav_r .deng').hover(function(){
		$('.z_nav3').css("display","block")
		
	})
	$('.z_nav3').mouseleave(function(){
		$('.z_nav3').css("display","none")
		
	})
	
	
	
	$('.accordion li').hover(function(){
		$(this).find('.intro').hide();
		$(this).find('.sds').show();
		$(this).stop(true).animate({
			width: 900
		}).siblings().stop(true).animate({
			width: 100
		});
	},function(){
		$(this).find('.intro').show();
		$(this).find('.sds').hide();
		$('.accordion li').stop(true).animate({
			width: 300
		});
	});
$('.rt_c:odd').css("background","red")
$('.rt_c:odd .rtc_t .rtc_r .head').css("color","#FFFFFF")
$('.rt_c:odd .rtc_t .rtc_r .bottom').css("color","#211E1E")
$('.rt_c:odd .rtc_b .jies').css("color","#FFFFFF")
$('.rt_c:odd .rtc_b .hz').css("color","#211E1E")
$('.movie .movie_b:odd').css("margin-right","0")

})
