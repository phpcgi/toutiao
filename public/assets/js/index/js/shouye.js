$(function(){
	
	
	
	
	
	$('#container .nav_cc .bangd').hover(function(){
		$('.z_nav').css("display","block")
		
	})

	$('.z_nav').mouseleave(function(){
		$('.z_nav').css("display","none")
	})
//	$('#container .nav_cc .gywm').hover(function(){
//		$('.z_nav2').css("display","block")
//	})
//	$('.z_nav2').mouseleave(function(){
//		$('.z_nav2').css("display","none")
//	})
	//关于我们
//	$('#container .nav_cc .gywm').hover(function(){
//		$('.z_nav2').css("display","block")
//	})
//	$('.z_nav2').mouseleave(function(){
//		$('.z_nav2').css("display","none")
//	})
	//登陆默认隐藏注册
	if($('.deng').html()!=="登录"){

			$('.zhu').css("display","none")
			$('.shu1').css("display","none")
		}
	//用户名划过
	$('.nav_r .deng').hover(function(){
		if($('.deng').html()=="登录"){
			$('.z_nav3').css("display","block")
		}else{
			$('.z_nav5').css("display","block");
			$('.zhu').css("display","none")
			$('.shu1').css("display","none")
		}
		
		
	})
	//手表离开
	$('.z_nav3').mouseleave(function(){
		$('.z_nav3').css("display","none")
		
	})
	//注册划过
	$('.nav_r .zhu').hover(function(){
		$('.z_nav4').css("display","block")
		
	})
	$('.z_nav4').mouseleave(function(){
		$('.z_nav4').css("display","none")
		
	})
	$('.z_nav5').mouseleave(function(){
		$('.z_nav5').css("display","none")
		
	})
	//判断进哪
	$('.ggz').click(function(){
			$.ajax( {  
		                type : "GET",  
		                url : "/apiweb/info",  
		                success : function(msg) {
		                		if(msg.data.kol!==""){
		                			location.href="/index/Lliangzu"
		                		}else{
		                			location.href="/index/Ggz"
		                		}
		                }
		     })
		})
	//进入流量组
	$('.llz').click(function(){
		location.href="/index/Lliangzu"
	})
	//广告组登陆
	$('.ggzdl').click(function(){
		location.href="/index/Ggzdl"
	})
	//主页
	$('.zhuye').click(function(){
		location.href="Index"
	})
	//流量组登陆
	$('.llzdl').click(function(){
		location.href="/index/Llzdl"
	})
	//广告组注册
		$('.ggzzc').click(function(){
	location.href="/index/Regaster"
		
	})
	//流量组注册
	$('.llzzc').click(function(){
		
		location.href="/index/Ggzzc"
	})
	//头条榜
	$('.ttb').click(function(){
		location.href="/index/Ttb"
	})
	//爆文榜
	$('.bwb').click(function(){
		location.href="/index/Bwb"
	})
	//新媒体学院
	$('.xmtxy').click(function(){
		location.href="/index/Xmtxy"
	})
	//产品
	$('.chanpin').click(function(){
		location.href="/index/Cpin"
	})
	//关于我们 
	$('.gywm').click(function(){
		location.href="/index/Aboutme"
	})
	//案例
	$('.anl').click(function(){
		location.href="/index/Anli"
	})
	//logo
	$('.nav_l img').click(function(){
		location.href="/index"
	})
	//退出登陆
	$('.tuichu').click(function(){
//		alert("1")
			$.ajax( {  
		                type : "GET",  
		                url : "/apiweb/userad/Loginout",  
		                success : function(msg) {
		                		location.reload();
		                }
		     })
	})
	$('.hz').click(function(){
		location.href="/index/Ggzdl"
	})



	$('.accordion li:first-of-type').find('.intro').hide()
	$('.accordion li:first-of-type').find('.sds').show();
	$('.accordion li:first-of-type').stop(true).animate({
			width: 900
		}).siblings().stop(true).animate({
			width: 100
		});
	
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
$('.rt_c:odd').css("background","#F85959")
$('.rt_c:odd .rtc_t .rtc_r .head').css("color","#FFFFFF")
$('.rt_c:odd .rtc_t .rtc_r .bottom').css("color","#211E1E")
$('.rt_c:odd .rtc_b .jies').css("color","#FFFFFF")
$('.rt_c:odd .rtc_b .hz').css("color","#211E1E")
$('.movie .movie_b:odd').css("margin-right","0")

})
