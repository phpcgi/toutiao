$(function(){
	$('.deng').hover(function(){
		$('.z_nav2').css("display","block")
	})
	$('.z_nav2').mouseleave(function(){
		$('.z_nav2').css("display","none")
	})
	$('.zhu').hover(function(){
		$('.z_nav3').css("display","block")
	})
	$('.z_nav3').mouseleave(function(){
		$('.z_nav3').css("display","none")
	})
	//logo
	$('.nav_l img').click(function(){
		location.href="Index"
	})

	$('.tuichu').click(function(){
//		alert("1")
			$.ajax( {  
		                type : "GET",  
		                url : "/apiweb/userad/Loginout",  
		                success : function(msg) {
		                		console.log(msg)
		                		location.reload();
		                }
		     })
	})
	
	$('.zhuye').click(function(){
		location.href="Index"
	})
	$('.xgmm').click(function(){
		location.href="Lxgmm"
	})
//	$('.zhuye').click(function(){
//		location.href="Lliangzu"
//	})
})