$(function(){
	
	$.ajax( {  
                type : "POST",  
                url : "/apiweb/ad/Collector/getlist",  
                success : function(msg) {
                console.log(msg)
                	var str='';
                	$(msg.data).each(function(i,ii){
                			console.log(ii)
                			str+='<ul class="ggc_t2">'
                				+		'<li class="g1">'
                				+			'<div class="gwc" data-gid="'+ii.DataMonthid+'">'
                				+			'<input class="one" type="checkbox" name="cb1">'
                				+		'</li>'
                				+		'<li class="g2">'
                				+			'<img class="touu" src="'+ii.avatar_url+'" />'
                				+			'<p class="g_r chao">'+ii.name+'</p>'
                				+		'</li>'
                				+		'<li class="g3">'+ii.A4+'</li>'
                				+		'<li class="g4">'+ii.R+'</li>'
                				+		'<li class="g5">'+ii.worth+'</li>'
                				+		'<li class="g6">'+ii.cost+'</li>'
                				+		'<li class="g7" data-tid="'+ii.tid+'">'
                				+		'<img src="/assets/img/xmtxy/chakanxiangqing.png" />'
                				+		'</li>'
                				+		'<li class="g8" data-cid="'+ii.tid+'">'
                				+		'<img src="/assets/img/xmtxy/delete.png" />'
                				
                				+	'</li>'
                				+	'</ul>'
        })
                	$('.scj_con').html(str)
	            	var count=msg.count;
				var page=msg.page;
				var yeshu=Math.ceil(count/page)
				fenye(yeshu)
				if(yeshu<="1"){
					yeshu=0
					fenye(0)
				}
            	 	//--购物车--
              		gouwuche()
              	//---删除---
					shanchu()
	          	//--跳详情--
          		    tiaoxiangqing()
             }
   })
	
	function fenye(page1){
		$('.M-box1').pagination({
                    totalData:page1,
                    showData:1,
                    coping:true,
                    callback:function(api){
                    	var b=api.getCurrent()
           			   	$.ajax( {  
				                type : "GET",  
				                url : "/apiweb/ad/Collector/getlist",  
				               data: {start:b},
				                success : function(msg) {
				                		console.log(msg)
								                	var str='';
								                	$(msg.data).each(function(i,ii){
								                			console.log(ii)
								                			str+='<ul class="ggc_t2">'
								                				+		'<li class="g1">'
								                				+			'<div class="gwc" data-gid="'+ii.DataMonthid+'">'
								                				+			'<input class="one" type="checkbox" name="cb1">'
								                				+		'</li>'
								                				+		'<li class="g2">'
								                				+			'<img class="touu" src="'+ii.avatar_url+'" />'
								                				+			'<p class="g_r chao">'+ii.name+'</p>'
								                				+		'</li>'
								                				+		'<li class="g3">'+ii.A4+'</li>'
								                				+		'<li class="g4">'+ii.R+'</li>'
								                				+		'<li class="g5">'+ii.worth+'</li>'
								                				+		'<li class="g6">'+ii.cost+'</li>'
								                				+		'<li class="g7" data-tid="'+ii.tid+'">'
								                				+		'<img src="/assets/img/xmtxy/chakanxiangqing.png" />'
								                				+		'</li>'
								                				+		'<li class="g8" data-cid="'+ii.tid+'">'
								                				+		'<img src="/assets/img/xmtxy/delete.png" />'
								                				
								                				+	'</li>'
								                				+	'</ul>'
								
								                				
								                	})
								                	$('.scj_con').html(str)
								                	var count=msg.count;
								                		var page=msg.page;
								                		var yeshu=count/page
								                		console.log({count,page,yeshu})
								                		
								                		
								                	 	//---------购物车-------------
								                  		gouwuche()
								                  	//---------删除---------------
														shanchu()
														
								
								                	//-------------跳详情----------------
								                tiaoxiangqing()
				                	
				                }
		                })
                    }
         })
		
		
		
		
	}
	
	
	
	
	//----------删除-----------
		function shanchu(){
			$(".g8").on("click",function(){
				$('.tank').css("display","block")
						  var b=$(this).attr("data-cid")
						 
						   $('.shi').click(function(){
					$('.tank').css("display","none")
						$.ajax( {  
	                				type : "POST",  
	                				url : "/apiweb/ad/Collector/del",  
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
//	                				url : "/apiweb/ad/Collector/del",  
//	                				data: {id:b},
//	               				 success : function(msg) {
//	               				 	console.log(msg)
//	               				 }
//	               			})
//						  location.reload()
							
					})
		}
	//------------购物车-----------
	function gouwuche(){
		$(".g1").delegate(".gwc","click",function(){
						$(this).toggleClass( "on2_check" );
						var b=$(this).attr("data-gid")
						$.ajax( {  
                				type : "POST",  
                				url : "/apiweb/ad/Order/orderextadd",  
                				data: {id:b},
               				 success : function(msg) {
               				 	console.log(msg)
               				 }
               			})
							
					})
	}
	//------------跳详情----------
	function tiaoxiangqing(){
		$('.g7').on("click",function(){
						var c=$(this).attr("data-tid")
						location.href="Ttxq?id="+c;
				})
	}
	
	
	 
})



