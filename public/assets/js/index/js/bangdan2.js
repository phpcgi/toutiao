 $(function(){
	
	$.ajax( {  
                type : "GET",  
                url : "/apiweb/Articles",  
                success : function(msg) {
	                console.log(msg)
	                	var str='';
	                	$(msg.data).each(function(i,ii){
	                		str+='<ul class="list_b">'
	                			+  	'<li class="shuj j1">'
	                			+		'<div class="shuj_l">'+(i+1)+'</div>'
//	                			+		'<div class="shuj_r">'
//	                			+			'<img src="'+ii.image+'"/>'
//	                			+		'</div>'
	                			+		'</li>'
//	                			+		'<li class="shuj j2 chao">'+ii.infotitle+'</li>'
	                			+		'<li class="shuj j3 chao"><a href="'+ii.url+'" target="_blank">'+ii.title+'</a></li>'
	                			+		'<li class="shuj j4">'+ii.read_num+'</li>'
	                			var a=(ii.post_time).substr(0,10)
	                			
	                			str+=		'<li class="shuj j4">'+a+'</li>'
	                			+	'</ul>'
	                					
	
					
	                	})
	                	$('.bw_con').html(str)
	                	$('.zongye').html(msg.total)
	                	$('.meiye').html(msg.page_size)
	                	
	              
	               
	                 var z_num= $('.zongye').html()
					var ts=$('.meiye').html()
					var page1=parseInt(z_num/ts)
					
	              setpage(page1)
	             function setpage(page){  
 				$('.M-box1').pagination({
                    totalData:page, 
                    showData:1,
                    coping:true,
                    callback:function(api){
                   
                    
                    	var b=api.getCurrent()
//                  	alert(b)
                    	
                    	$.ajax( {  
                type : "GET",  
                url : "/apiweb/Articles", 
                data:{next:b},
                success : function(msg) {
	                console.log(msg)
	                	var str='';
	                	$(msg.data).each(function(i,ii){
	                		str+='<ul class="list_b">'
	                			+  	'<li class="shuj j1">'
	                			+		'<div class="shuj_l">'+(i+1+(b-1)*10)+'</div>'
//	                			+		'<div class="shuj_r">'
//	                			+			'<img src="'+ii.image+'"/>'
//	                			+		'</div>'
	                			+		'</li>'
//	                			+		'<li class="shuj j2 chao">'+ii.infotitle+'</li>'
	                			+		'<li class="shuj j3 chao">'+ii.title+'</li>'
	                			+		'<li class="shuj j4">'+ii.read_num+'</li>'
	                			var a=(ii.post_time).substr(0,10)
	                			
	                			str+='<li class="shuj j4">'+a+'</li>'
	                				+	'</ul>'
	                					
	
					
	                	})
                    	
                    		$('.bw_con').html(str)
                    	}
                    	
                   })
                    	
                    	
                    	
                    	
                    	
                    	
                    	
				       

   					 }
                });
	                	
	          }       	
	                	
	                	
	                	
	                	
	                	
	                	
	                	
                }
   })          	
	


	
	
	
})
