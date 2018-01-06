$(function(){
	$('#container .nav_cc .bangd').hover(function(){
		$('.z_nav').css("display","block")
		
	})
//	$('.z_nav').mouseleave(function(){
//		$('.z_nav').css("display","none")
//	})
//	$('#container .nav_cc .gywm').hover(function(){
//		$('.z_nav2').css("display","block")
//	})
//	$('.z_nav2').mouseleave(function(){
//		$('.z_nav2').css("display","none")
//	})
	$('.gconl_b li').click(function(){
//		alert('1')
		$(this).addClass('ctive').siblings().removeClass('ctive')
		$('.gcon_r').eq( $(this).index() ).addClass('active').siblings().removeClass('active');
//		$(this).siblings().css({"background":"","color":"#222123"})
	})
	
})