$(function(){
	$('.tss').hover(function(){
		$('.z_nav2').css("display","block")
	})
	$('.z_nav2').mouseleave(function(){
//		 stopPropagation()
		$('.z_nav2').css("display","none")
	})
	$('.log').hover(function(){
		$('.z_nav3').css("display","block")
	})
	$('.z_nav3').mouseleave(function(){
		$('.z_nav3').css("display","none")
	})
	//logo
	$('.nav_l img').click(function(){
		location.href="Index"
	})
	$('.gz').click(function(){
		location.href="Ggz"
	})
	$('.gbz').click(function(){
		window.open("Gbz");
	})
	
	$.ajax( {  
                type : "POST",  
                url : "/apiweb/ad/msg/NoRead",  
                success : function(msg) {
                	
                	
                	
                	var nu=msg.data
                console.log(msg.data.length)
                if(nu.length>0){
                	$('.tss').html('<img src="/assets/img/xmtxy/weiduxiaoxi.png" />')
                }else{
					$('.tss').html('<img src="/assets/img/xmtxy/xiaoxi.png" />')
                }
                if(nu.length>2){
                		var n=nu.slice(0,2)
                		
                }else{
                		var n=nu
                }
                	var str=''
                	$(n).each(function(i,ii){
                		console.log(n)
                		str+='<p class="baow tw1">'+ii.title+'</p>'
                	})

                	$('.xxx_con').html(str)
			}
      })
	$('.tss').click(function(){
		location.href="Xxtzz";
	})
	
	$('.shouye').click(function(){
//		alert('1')
		location.href="Ggz";
	})
	$('.wddd').click(function(){
//		alert('2')
		location.href="Wddd";
	})
	$('.xhc').click(function(){
//		alert('2')
		location.href="Xhc";
	})
	$('.scj').click(function(){
//		alert('3')
		location.href="Gscj";
	})
	$('.dclrw').click(function(){
//		alert('4')
		location.href="Gdclrw";
	})
	
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
	$('.xgmm').click(function(){
		location.href="Xgmm"
	})
	$('.zhuye').click(function(){
		location.href="Index"
	})
	

	
	

})
