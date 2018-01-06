$(function(){

	var aa=0;

//-------------默认数据-------------
	$.ajax( {  
	                type : "GET",  
	                url : "/apiweb/hot",  
	                success : function(msg) {
	                	console.log(msg)
	                			var str='';
			                	$(msg.data).each(function(i,ii){
			                		str+='<ul class="list_b">'
			                			+  	'<li class="shuj j1">'
			                			+		'<div class="shuj_l">'+(i+1)+'</div>'
			                			+		'<div class="shuj_r">'
			                			+			'<img src="'+ii.image+'"/>'
			                			+		'</div>'
			                			+		'</li>'
			                			+		'<li class="shuj j2 chao">'+ii.a1+'</li>'
        								+		'<li class="shuj j3 chao">'+ii.a3+'</li>'
        								+		'<li class="shuj j4 chao">'+ii.a4+'</li>'
        								+		'<li class="shuj j5 chao">'+ii.a5+'</li>'
        								+		'<li class="shuj j6 chao">'+ii.a6+'</li>'
        								+		'<li class="shuj j7 chao">'+ii.a7+'</li>'
        								+		'<li class="shuj j8 chao">'+ii.a8+'</li>'
        								+		'<li class="shuj j9 chao">'+ii.a9+'</li>'
        								+	'</ul>'
			                	})
							         $('.ttb_con').html(str)
			                			$('.zongye').html(msg.total)
    									$('.meiye').html(msg.page_size)
    									var z_num= $('.zongye').html()
									var ts=$('.meiye').html()
									var page1=parseInt(z_num/ts)
			                			 setpage(page1)
	          }
	})

	//-----------点击周榜月榜--------------
	
	$('.zbang').on("click",function(){
		$(this).addClass('se1').siblings().removeClass('se1')
			var ff=$("input[name='bang']:checked").val();
			var cc=$("input[name='aa1']:checked").val();
			var bb=$("input[name='aa']:checked").val();
			  	console.log({cc,ff,bb})
			$.ajax( {  
                type : "GET",  
                url : "/apiweb/hot",  
                data: {type:cc,time:ff,bang:bb},
                success : function(msg) {
                			var str='';
		                	$(msg.data).each(function(i,ii){
		                		str+='<ul class="list_b">'
		                			+  	'<li class="shuj j1">'
		                			+		'<div class="shuj_l">'+(i+1)+'</div>'
		                			+		'<div class="shuj_r">'
		                			+			'<img src="'+ii.image+'"/>'
		                			+		'</div>'
		                			+		'</li>'
		                			+		'<li class="shuj j2 chao">'+ii.a1+'</li>'
    								+		'<li class="shuj j3 chao">'+ii.a3+'</li>'
    								+		'<li class="shuj j4 chao">'+ii.a4+'</li>'
    								+		'<li class="shuj j5 chao">'+ii.a5+'</li>'
    								+		'<li class="shuj j6 chao">'+ii.a6+'</li>'
    								+		'<li class="shuj j7 chao">'+ii.a7+'</li>'
    								+		'<li class="shuj j8 chao">'+ii.a8+'</li>'
    								+		'<li class="shuj j9 chao">'+ii.a9+'</li>'
		                			+	'</ul>'
		                	})
		                	$('.ttb_con').html(str)
		                	$('.zongye').html(msg.total)
						$('.meiye').html(msg.page_size)
						var z_num= $('.zongye').html()
						var ts=$('.meiye').html()
						var page1=parseInt(z_num/ts)
	                	 	setpage(page1)
                }
       	})
	})
	
	
	//----------点击类别----------------
	
		$('.navn_p li:first-of-type').addClass('bian')
    		$('.navn_p li').on("click",function(){
    			$(this).toggleClass("bian").siblings().removeClass("bian")
    				var bb=$("input[name='aa']:checked").val();
    				var cc=$("input[name='aa1']:checked").val();
    	 			var ff=$("input[name='bang']:checked").val();
    	 			console.log({cc,ff,bb})
    	 			$.ajax( {  
                type : "GET",  
                url : "/apiweb/hot",  
                data: {type:cc,time:ff,bang:bb},
                success : function(msg) {
                			var str='';
		                	$(msg.data).each(function(i,ii){
		                		str+='<ul class="list_b">'
		                			+  	'<li class="shuj j1">'
		                			+		'<div class="shuj_l">'+(i+1)+'</div>'
		                			+		'<div class="shuj_r">'
		                			+			'<img src="'+ii.image+'"/>'
		                			+		'</div>'
		                			+		'</li>'
		                			+		'<li class="shuj j2 chao">'+ii.a1+'</li>'
    								+		'<li class="shuj j3 chao">'+ii.a3+'</li>'
    								+		'<li class="shuj j4 chao">'+ii.a4+'</li>'
    								+		'<li class="shuj j5 chao">'+ii.a5+'</li>'
    								+		'<li class="shuj j6 chao">'+ii.a6+'</li>'
    								+		'<li class="shuj j7 chao">'+ii.a7+'</li>'
    								+		'<li class="shuj j8 chao">'+ii.a8+'</li>'
    								+		'<li class="shuj j9 chao">'+ii.a9+'</li>'
		                			+	'</ul>'
		                	})
		                	$('.ttb_con').html(str)
		                	$('.zongye').html(msg.total)
						$('.meiye').html(msg.page_size)
						var z_num= $('.zongye').html()
						var ts=$('.meiye').html()
						var page1=parseInt(z_num/ts)
	                	 	setpage(page1)
                }
       	})
    		})
	
	
	//----------------循环领域----------------
	
		$.ajax( {  
                type : "GET",  
                url : "/apiweb/Category",  
                success : function(msg) {
	                	var str1=''
	                	$(msg.data).each(function(i,ii){
	                		str1+='<li><p>'+ii.name+'</p><input type="radio" class="leibie1" name="aa1" value="'+ii.name+'" />'
	                			  +   '</li>'
	                	})
	                	$('.navn_r').html(str1)
	                	//---------选类---------------
	                	$('.navn_r li:first-of-type').addClass('bian')
	                	$('.navn_r li').on("click",function(){
	                	 		$(this).toggleClass("bian").siblings().removeClass("bian")
	                	 		var cc=$("input[name='aa1']:checked").val();
	                	 		var ff=$("input[name='bang']:checked").val();
	                	 		var bb=$("input[name='aa']:checked").val();
	                	 		console.log({cc,ff,bb})
	               		 	$.ajax( {  
					                type : "GET",  
					                url : "/apiweb/hot",  
					                data: {type:cc,time:ff,bang:bb},
					                success : function(msg) {
					                			var str='';
							                	$(msg.data).each(function(i,ii){
							                		str+='<ul class="list_b">'
							                			+  	'<li class="shuj j1">'
							                			+		'<div class="shuj_l">'+(i+1)+'</div>'
							                			+		'<div class="shuj_r">'
							                			+			'<img src="'+ii.image+'"/>'
							                			+		'</div>'
							                			+		'</li>'
							                			+		'<li class="shuj j2 chao">'+ii.a1+'</li>'
		                								+		'<li class="shuj j3 chao">'+ii.a3+'</li>'
		                								+		'<li class="shuj j4 chao">'+ii.a4+'</li>'
		                								+		'<li class="shuj j5 chao">'+ii.a5+'</li>'
		                								+		'<li class="shuj j6 chao">'+ii.a6+'</li>'
		                								+		'<li class="shuj j7 chao">'+ii.a7+'</li>'
		                								+		'<li class="shuj j8 chao">'+ii.a8+'</li>'
		                								+		'<li class="shuj j9 chao">'+ii.a9+'</li>'
		                								+	'</ul>'
							                	})
							                			$('.ttb_con').html(str)
							                			$('.zongye').html(msg.total)
	                									$('.meiye').html(msg.page_size)
	                									var z_num= $('.zongye').html()
													var ts=$('.meiye').html()
													var page1=parseInt(z_num/ts)
							                			 setpage(page1)
							                	
					          }
					})
	                                	 
			}); 
					
					
	     }
                
               
})
	                
	              
	       //---------------调用分页-------------         	
	                	
	             function setpage(page){  
 				$('.M-box1').pagination({
                    totalData:page, 
                    showData:1,
                    coping:true,
                    callback:function(api){
                   var bb=$("input[name='aa']:checked").val();
                    var cc=$("input[name='aa1']:checked").val();
	                	 var ff=$("input[name='bang']:checked").val();
                    	var b=api.getCurrent()
                    	alert(b)
                    	
                    	$.ajax( {  
                type : "GET",  
                url : "/apiweb/hot", 
                data:{next:b,type:cc,time:ff,bang:bb},
                success : function(msg) {
                	
	                console.log(msg)
	                	var str='';
	                	$(msg.data).each(function(i,ii){
	                		str+='<ul class="list_b">'
	                			+  	'<li class="shuj j1">'
	                			+		'<div class="shuj_l">'+(i+1+(b-1)*10)+'</div>'
	                			+		'<div class="shuj_r">'
	                			+			'<img src="'+ii.image+'"/>'
	                			+		'</div>'
	                			+		'</li>'
	                			+		'<li class="shuj j2 chao">'+ii.a1+'</li>'
							+		'<li class="shuj j3 chao">'+ii.a3+'</li>'
							+		'<li class="shuj j4 chao">'+ii.a4+'</li>'
							+		'<li class="shuj j5 chao">'+ii.a5+'</li>'
							+		'<li class="shuj j6 chao">'+ii.a6+'</li>'
							+		'<li class="shuj j7 chao">'+ii.a7+'</li>'
							+		'<li class="shuj j8 chao">'+ii.a8+'</li>'
							+		'<li class="shuj j9 chao">'+ii.a9+'</li>'
		                		+	'</ul>'
	                					
	
					
	                	})
                    	
                    		$('.bw_con').html(str)
                    	}
                    	
                   })
                    	
                    	
                    	
                    	
                    	
                    	
                    	
				       

   					 }
                });
	                	
	          }
	                	
	                	
	                	
	                	
	                	
	                	
})