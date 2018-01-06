$(function(){
	//---------收藏---------------
	
	$(".shouc").on("click",function(){
		  $(this).toggleClass( "on1_check" );
	})
	
	
			
			
	
	$.ajax( {  
            type : "POST",  
            url : "/apiweb/ad/Order/orderuser",  
            data: {uid:13},
            success : function(msg) {
            	console.log(msg)
            	var str='';
            	$(msg.data).each(function(i,ii){
            		str+='<ul class="ggc_t2">'
            			+   '<li class="g1">'
            			+	 	'<div class="g_xuan on_check" data-gid="'+ii.id+'">'
            			+			'<input class="one" type="checkbox" checked="checked" value="'+ii.id+'" name="cb1">'
            			+		'</div>'
            			+	 '</li>'
            			+	 '<li class="g2" data-gid="'+ii.tid+'">'
            			+		'<img class="touu" src="'+ii.avatar_url+'" />'
            			+		'<p class="g_r chao">'+ii.name+'</p>'
            			+	 '</li>'
            			+	 '<li class="g3">'+ii.A4+'</li>'
            			+	 '<li class="g4">'+ii.R+'</li>'
            			+	 '<li class="g5">'+ii.worth+'</li>'
            			+	 '<li class="g6">'+ii.cost+'</li>'
            				+		'<li class="g8">'
                				if(ii.is_coll=="1"){
                				str+=		'<div class="shouc on1_check" data-cid="'+ii.tid+'">'
                					+		'<input class="one" type="checkbox" name="cb1">'
               				}else{
               				str+=		'<div class="shouc" data-cid="'+ii.tid+'">'
                					+		'<input class="one" type="checkbox" name="cb1">'
               				}
                				
                				str+=		'</li>'
            			+		'<li class="g8 g9" data-cid="'+ii.id+'">'
                		+		'<img src="/assets/img/xmtxy/delete.png" />'
            			+	 '</li>'
            			+	 '</ul>'
            	})
            	$('.xhc_con').html(str)
            	xiangqing()
            	//---------对号切换颜色---------
            		$(".g_xuan").on("click",function(){
  					 $(this).toggleClass( "on_check" );
				})
            	//---------选择----------------
			$('.xia').on("click",function(){
//				alert("1")
				var chk_value=''
				var chkvalue;
				$('input[name="cb1"]:checked').each(function(){ 
						chk_value+=','+$(this).val()
						chkvalue=chk_value.substr(1,chk_value.length)
					})
					console.log(chkvalue)
					
					
					location.href="Gbianj?classid="+chkvalue;
			})
			
			//----------删除-----------------
			
			$(".g9").on("click",function(){
				$('.tank').css("display","block")
						  var b=$(this).attr("data-cid")
						  $('.shi').click(function(){
					$('.tank').css("display","none")
						$.ajax( {  
	                				type : "POST",  
	                				url : "/apiweb/ad/Order/orderextdel",  
	                				data: {id:b},
	               				 success : function(msg) {
	               				 	console.log(msg)
	               				 }
	               			})

					location.reload()
				})
				$('.fou').click(function(){
					$('.tank').css("display","none")
				})
						  
						  
						  
						  
						 
//						  	$.ajax( {  
//	                				type : "POST",  
//	                				url : "/apiweb/ad/Order/orderextdel",  
//	                				data: {id:b},
//	               				 success : function(msg) {
//	               				 	console.log(msg)
//	               				 }
//	               			})
//						  location.reload()
							
					})
			
	//------详情-------------
	function xiangqing(){
		$('.g2').on("click",function(){
			var c=$(this).attr("data-gid")
			location.href="Ttxq?id="+c;
		})
	}
			
			
	//------收藏---------------		
	$(".shouc").on("click",function(){
						  $(this).toggleClass( "on1_check" );
						  var b=$(this).attr("data-cid")
						  if($(this).hasClass("on1_check")){
						  	$.ajax( {  
	                				type : "POST",  
	                				url : "/apiweb/ad/Collector",  
	                				data: {id:b},
	               				 success : function(msg) {
	               				 	console.log(msg)
	               				 }
	               			})
						  	
						  }else{
						  	$.ajax( {  
	                				type : "GET",  
	                				url : "/apiweb/ad/Collector/del",  
	                				data: {id:b},
	               				 success : function(msg) {
	               				 	console.log(msg)
	               				 }
	               			})
						  }
							
					})

			
			
            }
   })
})

















