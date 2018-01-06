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
	$('.navn_r li').click(function(){
		$(this).css({"background":"red","color":"#fff","border-radius":"4px"})
		$(this).siblings().css({"background":"","color":"#222123"})
	})
	
	$('.bang li').click(function(){
		$(this).css({"background":"#f85959","color":"#fff"})
		$(this).siblings().css({"background":"#fff","color":"#211123"})
	})
})