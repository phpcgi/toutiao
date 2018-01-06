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
//	$('.nav_r .deng').hover(function(){
//		$('.z_nav3').css("display","block")
//		
//	})
//	$('.z_nav3').mouseleave(function(){
//		$('.z_nav3').css("display","none")
//		
//	})

//var timestamp3 = 1504664821;
//var newDate = new Date();
//newDate.setTime(timestamp3 * 1000);
//console.log(newDate.toLocaleDateString());
	
	$.ajax( {  
                type : "GET",  
                url : "/apiweb/news/xmt",  
                data:{start:0},
                success : function(msg) {
                		var str='';
                		console.log(msg)
                		$(msg.data).each(function(i,ii){
                			str+='<li class="xinwen">'
                				+		'<div class="xw_l">'
                				+			'<img src="/assets/img/xmtxy/news-biao.png" />'
                				+		'</div>'
                				+		'<div class="xw_c">'
                				+			'<a href="'+ii.url+'" target="_blank"><p class="xw_p chao" data-id="'+ii.id+'">'+ii.title+'</p></a>'
                				+		'</div>'
                				+		'<div class="xw_r">'
                				
                				var timestamp3 = ii.createtime;
                				var newDate = new Date();
//              				newDate.setTime(timestamp3 * 1000);
//              				newDate.toLocaleDateString()
                				str+='<p class="time">'+getLocalTime(timestamp3)+'</p>'
                				+		'</div>'
                				+		'</li>'
                		})
                		$('.newslist_t').html(str)
                		
//              		$('.xw_p').click(function(){
//              			var cid=$(this).attr("data-id")
//              			var url=$(this).attr("data-cid")
//						location.href=url;               		
//              		})
                		
                		
                		var count=msg.count;
                		var page=msg.page;
                		var yeshu=Math.ceil(count/page)
                		
                			
								fenye(yeshu)
								if(yeshu<="1"){
									yeshu=0
									fenye(0)
								}
                }
		    })
	
	function fenye(page1){
		 $('.M-box1').pagination({
                    totalData:page1,
                    showData:1,
                    coping:true,
                    callback:function(api){
                    	var b=api.getCurrent()
//                  	alert(b)  
				      $.ajax( {  
                type : "GET",  
                url : "/apiweb/news/xmt",  
                data:{start:b},
                success : function(msg) {
                		var str='';
                		console.log(msg)
//              		console.log(timestamp3)
                		$(msg.data).each(function(i,ii){
                			str+='<li class="xinwen">'
                				+		'<div class="xw_l">'
                				+			'<img src="/assets/img/xmtxy/news-biao.png" />'
                				+		'</div>'
                				+		'<div class="xw_c">'
                				+			'<a href="'+ii.url+'" target="_blank"><p class="xw_p chao" data-id="'+ii.id+'">'+ii.title+'</p></a>'
                				+		'</div>'
                				+		'<div class="xw_r">'
                				
                				var timestamp3 =ii.createtime;
                				var newDate = new Date();
                				
                				str+='<p class="time">'+getLocalTime(timestamp3)+'</p>'
                				+		'</div>'
                				+		'</li>'
                		})
                		$('.newslist_t').html(str)
                	
                }
		    })

   					 }
                });
	}
	
	function getLocalTime(nS) {  
 return new Date(parseInt(nS) * 1000).toLocaleDateString().replace(/:\d{1,2}$/,' ');  
}
	
	
//	var timestamp3 = 1403058804;
//	var newDate = new Date();
//					
//	console.log(newDate.toLocaleDateString());
	
	
	

})