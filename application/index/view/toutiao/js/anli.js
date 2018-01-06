$(function(){
	$('.table li:first-of-type').addClass("tive")
	$('.table li').hover(function(){
		$(this).addClass("tive").siblings().removeClass("tive")
	})
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
	
})