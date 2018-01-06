$(function(){
	
	
	
	
	
	var cc=$("input[name='bb']:checked").val();
    			//高到低
    			var dd=$("input[name='cc']:checked").val();
    			//搜索
    			var name=$('.zh').val()
			//类别
			var chk_value=''
			var type;
			$('input[name="aa1"]:checked').each(function(){ 
				chk_value+=','+$(this).val()
				type=chk_value.substr(1,chk_value.length)
			})
			//阅读量
			
			var b=$('.zd1').val()
			var s=$('.zg1').val()
			var readnum;
			if(b!=''&&s!=''){
				readnum=b+"_"+s;
			}else{
				readnum=''
			}
			
			//价格
			var jb=$('.zdd').val()
			var js=$('.zg2').val()
			var cost;
			if(jb!=""&&jb!=""){
				cost=jb+"_"+js;
			}else{
				cost='';
			}
			
			$.ajax( {  
		                type : "GET",  
		                url : "/apiweb/ad/search",  
		                data: {name:name,cost:cost,type:type,readnum:readnum,is_dg:cc,sort:dd},
		                success : function(msg) {
//		                		console.log(msg)
				                	var str2='';
				                	$(msg.data).each(function(i,ii){
//				                			console.log(ii)
				                			str2+='<ul class="ggc_t2">'
				                				+  	'<li class="g1">'
				                				if(ii.is_buy=="1"){
					                				str2+='<div class="gwc on2_check" data-gid="'+ii.id+'">'
					                				+		'<input class="one" type="checkbox" name="cb1">'
					                				}else{
					                				str2+='<div class="gwc" data-gid="'+ii.id+'">'
					                				+		'<input class="one" type="checkbox" name="cb1">'
					                				}
				                				str2+=		'</li>'
				                				+		'<li class="g2">'
				                				+		'<img class="touu" src="'+ii.avatar_url+'" />'
				                				+		'<p class="g_r chao">'+ii.name+'</p>'
				                				+		'</li>'
				                				+		'<li class="g3">'+ii.A4+'</li>'
				                				+		'<li class="g4">'+ii.R+'</li>'
				                				+		'<li class="g5">'+ii.worth+'</li>'
				                				+		'<li class="g6">'+ii.cost+'</li>'
				                				+		'<li class="g7" data-tid="'+ii.tid+'">'
				                				+		'<img src="/assets/img/xmtxy/chakanxiangqing.png" />'
				                				+		'</li>'
				                				+		'<li class="g8">'
				                				if(ii.is_coll=="1"){
				                				str2+=		'<div class="shouc on1_check" data-cid="'+ii.tid+'">'
				                					+		'<input class="one" type="checkbox" name="cb1">'
				               				}else{
				               				str2+=		'<div class="shouc" data-cid="'+ii.tid+'">'
				                					+		'<input class="one" type="checkbox" name="cb1">'
				               				}
				                				
				                				str2+=		'</li>'
				                				+		'</ul>'
				                	})
				                	$('.co_n').html(str2)
				                	$('.zongye').html(msg.count) 
				                	gouwuche()
				                	shoucang()
				                	xiangqing()
				                	
				                	console.log(msg.count)
				                	console.log(msg.page)
				                	var zong=msg.count;
				                	var meiye=msg.page;
//				                	var yeshu=zong/meiye
//				                	fenye(yeshu)
				                	var yeshu=Math.ceil(zong/meiye)
								fenye(yeshu)
								if(yeshu<="1"){
									yeshu=0
									fenye(0)
								}
		                }
		      	})
    
	
	
	
	
	
	
	
	
	
	
	
	
	//--------单选按钮-----------
	
	$(".danx").on("click",function(){
		//  $(this).hasClass("on_check")? $(this).removeClass("on_check"):$(this).addClass("on_check");
	    //或者这么写
	    $(this).toggleClass( "on_check" ).siblings().removeClass('on_check');
	})
	//---------筛选---------------
	
	$('.s2').click(function(){
		 $('.lei').css("display","block")
	})
	
//	$(".shouc").on("click",function(){
//		$(this).toggleClass( "on1_check" );
//	})
	
//--------------------------------------------点击搜索----------------------------------------------------
	
	
	$('.sous').click(function(){
			//撰稿
			var cc=$("input[name='bb']:checked").val();
			//高到低
    			var dd=$("input[name='cc']:checked").val();
			//搜索
			var name=$('.zh').val()
			//类别
			var chk_value=''
			var type;
			$('input[name="aa1"]:checked').each(function(){ 
				chk_value+=','+$(this).val()
				type=chk_value.substr(1,chk_value.length)
			})

			//阅读量
			var b=$('.zd1').val()
			var s=$('.zg1').val()
			var readnum;
			if(b!=''&&s!=''){
				readnum=b+"_"+s;
			}else{
				readnum=''
			}
			//价格
			var jb=$('.zdd').val()
			var js=$('.zg2').val()
			var cost;
			if(jb!=""&&jb!=""){
				cost=jb+"_"+js;
			}else{
				cost='';
			}
		$.ajax( {  
                type : "GET",  
                url : "/apiweb/ad/search",  
                data: {name:name,cost:cost,type:type,readnum:readnum,is_dg:cc,sort:dd},
                success : function(msg) {
//              	console.log(msg.count)
                	var str='';
                	$(msg.data).each(function(i,ii){
                			console.log(ii)
                			str+='<ul class="ggc_t2">'
                				+  	'<li class="g1">'
                				if(ii.is_buy=="1"){
                				str+='<div class="gwc on2_check" data-gid="'+ii.id+'">'
                				+		'<input class="one" type="checkbox" name="cb1">'
                				}else{
                				str+='<div class="gwc" data-gid="'+ii.id+'">'
                				+		'<input class="one" type="checkbox" name="cb1">'
                				}
                				
                				str+=		'</li>'
                				+		'<li class="g2">'
                				+		'<img class="touu" src="'+ii.avatar_url+'" />'
                				+		'<p class="g_r chao">'+ii.name+'</p>'
                				+		'</li>'
                				+		'<li class="g3">'+ii.A4+'</li>'
                				+		'<li class="g4">'+ii.R+'</li>'
                				+		'<li class="g5">'+ii.worth+'</li>'
                				+		'<li class="g6">'+ii.cost+'</li>'
                				+		'<li class="g7" data-tid="'+ii.tid+'">'
                				+		'<img src="/assets/img/xmtxy/chakanxiangqing.png" />'
                				+		'</li>'
                				+		'<li class="g8">'
                				if(ii.is_coll=="1"){
                				str+=		'<div class="shouc on1_check" data-cid="'+ii.tid+'">'
                					+		'<input class="one" type="checkbox" name="cb1">'
               				}else{
               				str+=		'<div class="shouc" data-cid="'+ii.tid+'">'
                					+		'<input class="one" type="checkbox" name="cb1">'
               				}
                				
                				str+='</li>'
                					+	'</ul>'
                	})
                	$('.co_n').html(str)
                	$('.zongye').html(msg.count) 
                    	//---------购物车-------------
                  	gouwuche()
                  	//---------收藏---------------
	
					shoucang()
					//---------详情--------------
					xiangqing()
					 	var zong=msg.count;
				       	var meiye=msg.page;
				        	var yeshu=Math.ceil(zong/meiye)
								fenye(yeshu)
								if(yeshu<="1"){
									yeshu=0
									fenye(0)
								}
                }  
            });
	})
	
	
	//-------------------------------------------循环类--------------------------------------------
	$.ajax( {  
                type : "GET",  
                url : "/apiweb/Category",  
                success : function(msg) {
//              	console.log(msg)
	                	var str1=''
	                	$(msg.data).each(function(i,ii){
	                		str1+='<li><p>'+ii.name+'</p><input type="checkbox" class="leibie1" name="aa1" value="'+ii.name+'" />'

	                			  +   '</li>'
	                		
	                	})
	                	$('.fen').html(str1)
	//------------------------------------------筛选下的类---------------------------------------
					
					$('.fen li').on("click",function(){
							$(this).toggleClass("bian")
							event.stopPropagation(); 
					}); 
					$('.fen').on("mouseleave",function(){
//		$('.fen').css("display","none")
//		alert("1")
	})
					$('.lei').click(function(){
							//撰稿
							var cc=$("input[name='bb']:checked").val();
							//高到低
    							var dd=$("input[name='cc']:checked").val();
							//搜索
							var name=$('.zh').val()
							//类别
							var chk_value=''
							var type;
							$('input[name="aa1"]:checked').each(function(){ 
								chk_value+=','+$(this).val();
								type=chk_value.substr(1,chk_value.length)
							})
							//阅读量
							var b=$('.zd1').val()
							var s=$('.zg1').val()
							var readnum;
							if(b!=''&&s!=''){
								readnum=b+"_"+s;
							}else{
								readnum=''
							}
							//价格
							var jb=$('.zdd').val()
							var js=$('.zg2').val()
							var cost;
							if(jb!=""&&jb!=""){
								cost=jb+"_"+js;
							}else{
								cost='';
							}
							$('.lei').css("display","none")
							$.ajax( {  
					                type : "GET",  
					                url : "/apiweb/ad/search",  
					                data: {name:name,cost:cost,type:type,readnum:readnum,is_dg:cc,sort:dd},
					                success : function(msg) {
							                	var str2='';
							                	$(msg.data).each(function(i,ii){
//							                			console.log(ii)
							                			str2+='<ul class="ggc_t2">'
							                				+  	'<li class="g1">'
							                				if(ii.is_buy=="1"){
								                				str2+='<div class="gwc on2_check" data-gid="'+ii.id+'">'
								                				+		'<input class="one" type="checkbox" name="cb1">'
								                				}else{
								                				str2+='<div class="gwc" data-gid="'+ii.id+'">'
								                				+		'<input class="one" type="checkbox" name="cb1">'
								                				}
							                				str2+=		'</li>'
							                				+		'<li class="g2">'
							                				+		'<img class="touu" src="'+ii.avatar_url+'" />'
							                				+		'<p class="g_r chao">'+ii.name+'</p>'
							                				+		'</li>'
							                				+		'<li class="g3">'+ii.A4+'</li>'
							                				+		'<li class="g4">'+ii.R+'</li>'
							                				+		'<li class="g5">'+ii.worth+'</li>'
							                				+		'<li class="g6">'+ii.cost+'</li>'
							                				+		'<li class="g7" data-tid="'+ii.tid+'">'
							                				+		'<img src="/assets/img/xmtxy/chakanxiangqing.png" />'
							                				+		'</li>'
							                				+		'<li class="g8">'
							                				if(ii.is_coll=="1"){
							                				str2+=		'<div class="shouc on1_check" data-cid="'+ii.tid+'">'
							                					+		'<input class="one" type="checkbox" name="cb1">'
							               				}else{
							               				str2+=		'<div class="shouc" data-cid="'+ii.tid+'">'
							                					+		'<input class="one" type="checkbox" name="cb1">'
							               				}
							                				
							                				str2+=		'</li>'
							                				+		'</ul>'
							                	})
							                	$('.co_n').html(str2)
							                	$('.zongye').html(msg.count) 
							                	//---------购物车-------------
							                	gouwuche()
							                	//----------收藏--------------
							                	shoucang()
							                	//----------详情--------------
							                	xiangqing()
							                	var zong=msg.count;
				                				var meiye=msg.page;
				                				 	var yeshu=Math.ceil(zong/meiye)
												fenye(yeshu)
												if(yeshu<="1"){
													yeshu=0
													fenye(0)
												}
					                }
					      	})
						
					})
				
				

				
				
				
              }
       })
	
	//---------------------------------------------最低数值-最高数值----------------------------------------
		
		$('.zg1').change(function(){
			//撰稿
			var cc=$("input[name='bb']:checked").val();
			//高到低
    			var dd=$("input[name='cc']:checked").val();
			//搜索
			var name=$('.zh').val()
			//类别
			var chk_value=''
			var type;
			$('input[name="aa1"]:checked').each(function(){ 
				chk_value+=','+$(this).val()
				type=chk_value.substr(1,chk_value.length)
			})
			//阅读量
			var b=$('.zd1').val()
			var s=$('.zg1').val()
			var readnum;
			if(b!=''&&s!=''){
				readnum=b+"_"+s;
			}else{
				readnum=''
			}
			//价格
			var jb=$('.zdd').val()
			var js=$('.zg2').val()
			var cost;
			if(jb!=""&&jb!=""){
				cost=jb+"_"+js;
			}else{
				cost='';
			}

				$.ajax( {  
		                type : "GET",  
		                url : "/apiweb/ad/search",  
		                data: {name:name,cost:cost,type:type,readnum:readnum,is_dg:cc,sort:dd},
		                success : function(msg) {
//		                		console.log(msg)
				                	var str2='';
				                	$(msg.data).each(function(i,ii){
//				                			console.log(ii)
				                			str2+='<ul class="ggc_t2">'
				                				+  	'<li class="g1">'
				                				if(ii.is_buy=="1"){
					                				str2+='<div class="gwc on2_check" data-gid="'+ii.id+'">'
					                				+		'<input class="one" type="checkbox" name="cb1">'
					                				}else{
					                				str2+='<div class="gwc" data-gid="'+ii.id+'">'
					                				+		'<input class="one" type="checkbox" name="cb1">'
					                				}
				                				str2+=		'</li>'
				                				+		'<li class="g2">'
				                				+		'<img class="touu" src="'+ii.avatar_url+'" />'
				                				+		'<p class="g_r chao">'+ii.name+'</p>'
				                				+		'</li>'
				                				+		'<li class="g3">'+ii.A4+'</li>'
				                				+		'<li class="g4">'+ii.R+'</li>'
				                				+		'<li class="g5">'+ii.worth+'</li>'
				                				+		'<li class="g6">'+ii.cost+'</li>'
				                				+		'<li class="g7" data-tid="'+ii.tid+'">'
				                				+		'<img src="/assets/img/xmtxy/chakanxiangqing.png" />'
				                				+		'</li>'
				                				+		'<li class="g8">'
				                				if(ii.is_coll=="1"){
				                				str2+=		'<div class="shouc on1_check" data-cid="'+ii.tid+'">'
				                					+		'<input class="one" type="checkbox" name="cb1">'
				               				}else{
				               				str2+=		'<div class="shouc" data-cid="'+ii.tid+'">'
				                					+		'<input class="one" type="checkbox" name="cb1">'
				               				}
				                				
				                				str2+=		'</li>'
				                	})
				                	$('.co_n').html(str2)
				                	$('.zongye').html(msg.count) 
				                	gouwuche()
				                	shoucang()
				                xiangqing()
				                 var zong=msg.count;
				                	var meiye=msg.page;
				                	 var yeshu=Math.ceil(zong/meiye)
								fenye(yeshu)
								if(yeshu<="1"){
									yeshu=0
									fenye(0)
								}
		                }
		      	})
				
			
			
			
		})
		
		
		
		//-------------------------------------------价格-----------------------------------------------------
		
		$('.zg2').change(function(){
			//撰稿
			var cc=$("input[name='bb']:checked").val();
			//高到低
    			var dd=$("input[name='cc']:checked").val();
			//搜索
			var name=$('.zh').val()
			//类别
			var chk_value=''
			var type;
			$('input[name="aa1"]:checked').each(function(){ 
				chk_value+=','+$(this).val()
				type=chk_value.substr(1,chk_value.length)
			})
			
			//阅读量
			var b=$('.zd1').val()
			var s=$('.zg1').val()
			var readnum;
			if(b!=''&&s!=''){
				readnum=b+"_"+s;
			}else{
				readnum=''
			}
			
			//价格
			var jb=$('.zdd').val()
			var js=$('.zg2').val()
			var cost;
			if(jb!=""&&jb!=""){
				cost=jb+"_"+js;
			}else{
				cost='';
			}
			
				$.ajax( {  
		                type : "GET",  
		                url : "/apiweb/ad/search",  
		                 data: {name:name,cost:cost,type:type,readnum:readnum,is_dg:cc,sort:dd},
		                success : function(msg) {
//		                		console.log(msg)
				                	var str2='';
				                	$(msg.data).each(function(i,ii){
//				                			console.log(ii)
				                			str2+='<ul class="ggc_t2">'
				                				+  	'<li class="g1">'
				                				if(ii.is_buy=="1"){
					                				str2+='<div class="gwc on2_check" data-gid="'+ii.id+'">'
					                				+		'<input class="one" type="checkbox" name="cb1">'
					                				}else{
					                				str2+='<div class="gwc" data-gid="'+ii.id+'">'
					                				+		'<input class="one" type="checkbox" name="cb1">'
					                				}
				                				str2+=		'</li>'
				                				+		'<li class="g2">'
				                				+		'<img class="touu" src="'+ii.avatar_url+'" />'
				                				+		'<p class="g_r chao">'+ii.name+'</p>'
				                				+		'</li>'
				                				+		'<li class="g3">'+ii.A4+'</li>'
				                				+		'<li class="g4">'+ii.R+'</li>'
				                				+		'<li class="g5">'+ii.worth+'</li>'
				                				+		'<li class="g6">'+ii.cost+'</li>'
				                				+		'<li class="g7" data-tid="'+ii.tid+'">'
				                				+		'<img src="/assets/img/xmtxy/chakanxiangqing.png" />'
				                				+		'</li>'
				                				+		'<li class="g8">'
				                				if(ii.is_coll=="1"){
				                				str2+=		'<div class="shouc on1_check" data-cid="'+ii.tid+'">'
				                					+		'<input class="one" type="checkbox" name="cb1">'
				               				}else{
				               				str2+=		'<div class="shouc" data-cid="'+ii.tid+'">'
				                					+		'<input class="one" type="checkbox" name="cb1">'
				               				}
				                				
				                				str2+=		'</li>'
				                				+		'</ul>'
				                	})
				                	$('.co_n').html(str2)
				                	$('.zongye').html(msg.count) 
				                	gouwuche()
				                	shoucang()
				                	xiangqing()
				                	 var zong=msg.count;
				                	var meiye=msg.page;
				                	 	var yeshu=Math.ceil(zong/meiye)
								fenye(yeshu)
								if(yeshu<="1"){
									yeshu=0
									fenye(0)
								}
		                }
		      	})
				
			
			
			
		})
		
		
		
		
//-------------------------------------------------撰稿----------------------------------------------

	var cc;
	$('.zhuang').click(function(){
			//撰稿
			cc=$("input[name='bb']:checked").val();
			//高到低
    			var dd=$("input[name='cc']:checked").val();
			//搜索
			var name=$('.zh').val()
			//类别
			var chk_value=''
			var type;
			$('input[name="aa1"]:checked').each(function(){ 
				chk_value+=','+$(this).val()
				type=chk_value.substr(1,chk_value.length)
			})
			
			//阅读量
			var b=$('.zd1').val()
			var s=$('.zg1').val()
			var readnum;
			if(b!=''&&s!=''){
				readnum=b+"_"+s;
			}else{
				readnum=''
			}
			
			//价格
			var jb=$('.zdd').val()
			var js=$('.zg2').val()
			var cost;
			if(jb!=""&&jb!=""){
				cost=jb+"_"+js;
			}else{
				cost='';
			}
			
			$.ajax( {  
		                type : "GET",  
		                url : "/apiweb/ad/search",  
		               data: {name:name,cost:cost,type:type,readnum:readnum,is_dg:cc,sort:dd},
		                success : function(msg) {
//		                		console.log(msg)
				                	var str2='';
				                	$(msg.data).each(function(i,ii){
//				                			console.log(ii)
				                			str2+='<ul class="ggc_t2">'
				                				+  	'<li class="g1">'
				                				if(ii.is_buy=="1"){
					                				str2+='<div class="gwc on2_check" data-gid="'+ii.id+'">'
					                				+		'<input class="one" type="checkbox" name="cb1">'
					                				}else{
					                				str2+='<div class="gwc" data-gid="'+ii.id+'">'
					                				+		'<input class="one" type="checkbox" name="cb1">'
					                				}
				                				str2+=		'</li>'
				                				+		'<li class="g2">'
				                				+		'<img class="touu" src="'+ii.avatar_url+'" />'
				                				+		'<p class="g_r chao">'+ii.name+'</p>'
				                				+		'</li>'
				                				+		'<li class="g3">'+ii.A4+'</li>'
				                				+		'<li class="g4">'+ii.R+'</li>'
				                				+		'<li class="g5">'+ii.worth+'</li>'
				                				+		'<li class="g6">'+ii.cost+'</li>'
				                				+		'<li class="g7" data-tid="'+ii.tid+'">'
				                				+		'<img src="/assets/img/xmtxy/chakanxiangqing.png" />'
				                				+		'</li>'
				                				+		'<li class="g8">'
				                				if(ii.is_coll=="1"){
				                				str2+=		'<div class="shouc on1_check" data-cid="'+ii.tid+'">'
				                					+		'<input class="one" type="checkbox" name="cb1">'
				               				}else{
				               				str2+=		'<div class="shouc" data-cid="'+ii.tid+'">'
				                					+		'<input class="one" type="checkbox" name="cb1">'
				               				}
				                				
				                				str2+=		'</li>'
				                				+		'</ul>'
				                	})
				                	$('.co_n').html(str2)
				                	$('.zongye').html(msg.count) 
				                	gouwuche()
				                	shoucang()
				                	xiangqing()
				                	 var zong=msg.count;
				                	var meiye=msg.page;
				                	 	var yeshu=Math.ceil(zong/meiye)
								fenye(yeshu)
								if(yeshu<="1"){
									yeshu=0
									fenye(0)
								}
		                }
		      	})
			
			
	})
		
	
    //------------------------------------------------从高到低的排序方式----------------------------------------------
    
    $('.paixf').click(function(){
    			//撰稿
    			var cc=$("input[name='bb']:checked").val();
    			//高到低
    			var dd=$("input[name='cc']:checked").val();
    			//搜索
    			var name=$('.zh').val()
			//类别
			var chk_value=''
			var type;
			$('input[name="aa1"]:checked').each(function(){ 
				chk_value+=','+$(this).val()
				type=chk_value.substr(1,chk_value.length)
			})
			//阅读量
			
			var b=$('.zd1').val()
			var s=$('.zg1').val()
			var readnum;
			if(b!=''&&s!=''){
				readnum=b+"_"+s;
			}else{
				readnum=''
			}
			
			//价格
			var jb=$('.zdd').val()
			var js=$('.zg2').val()
			var cost;
			if(jb!=""&&jb!=""){
				cost=jb+"_"+js;
			}else{
				cost='';
			}
			
			$.ajax( {  
		                type : "GET",  
		                url : "/apiweb/ad/search",  
		                data: {name:name,cost:cost,type:type,readnum:readnum,is_dg:cc,sort:dd},
		                success : function(msg) {
//		                		console.log(msg)
				                	var str2='';
				                	$(msg.data).each(function(i,ii){
//				                			console.log(ii)
				                			str2+='<ul class="ggc_t2">'
				                				+  	'<li class="g1">'
				                				if(ii.is_buy=="1"){
					                				str2+='<div class="gwc on2_check" data-gid="'+ii.id+'">'
					                				+		'<input class="one" type="checkbox" name="cb1">'
					                				}else{
					                				str2+='<div class="gwc" data-gid="'+ii.id+'">'
					                				+		'<input class="one" type="checkbox" name="cb1">'
					                				}
				                				str2+=		'</li>'
				                				+		'<li class="g2">'
				                				+		'<img class="touu" src="'+ii.avatar_url+'" />'
				                				+		'<p class="g_r chao">'+ii.name+'</p>'
				                				+		'</li>'
				                				+		'<li class="g3">'+ii.A4+'</li>'
				                				+		'<li class="g4">'+ii.R+'</li>'
				                				+		'<li class="g5">'+ii.worth+'</li>'
				                				+		'<li class="g6">'+ii.cost+'</li>'
				                				+		'<li class="g7" data-tid="'+ii.tid+'">'
				                				+		'<img src="/assets/img/xmtxy/chakanxiangqing.png" />'
				                				+		'</li>'
				                				+		'<li class="g8">'
				                				if(ii.is_coll=="1"){
				                				str2+=		'<div class="shouc on1_check" data-cid="'+ii.tid+'">'
				                					+		'<input class="one" type="checkbox" name="cb1">'
				               				}else{
				               				str2+=		'<div class="shouc" data-cid="'+ii.tid+'">'
				                					+		'<input class="one" type="checkbox" name="cb1">'
				               				}
				                				
				                				str2+=		'</li>'
				                				+		'</ul>'
				                	})
				                	$('.co_n').html(str2)
				                	$('.zongye').html(msg.count) 
				                	gouwuche()
				                	shoucang()
				                	xiangqing()
				                	
//				                	console.log(msg.count)
//				                	console.log(msg.page)
				                	var zong=msg.count;
				                	var meiye=msg.page;
				                 	var yeshu=Math.ceil(zong/meiye)
								fenye(yeshu)
								if(yeshu<="1"){
									yeshu=0
									fenye(0)
								}
		                }
		      	})
    
    })
    
    
    //--------------------------------------分页---------------------------------------------------
    			
    function fenye(page1){
    	$('.M-box1').pagination({
                    totalData:page1,
                    showData:1,
                    coping:true,
                    callback:function(api){
             //撰稿
    			var cc=$("input[name='bb']:checked").val();
    			//高到低
    			var dd=$("input[name='cc']:checked").val();
    			//搜索
    			var name=$('.zh').val()
			//类别
			var chk_value=''
			var type;
			$('input[name="aa1"]:checked').each(function(){ 
				chk_value+=','+$(this).val()
				type=chk_value.substr(1,chk_value.length)
			})
//			console.log(chkvalue)
			//阅读量
			
			var b=$('.zd1').val()
			var s=$('.zg1').val()
			var readnum;
			if(b!=''&&s!=''){
				readnum=b+"_"+s;
			}else{
				readnum=''
			}
			
			//价格
			var jb=$('.zdd').val()
			var js=$('.zg2').val()
			var cost;
			if(jb!=""&&jb!=""){
				cost=jb+"_"+js;
			}else{
				cost='';
			}
             var b=api.getCurrent()
//            alert(b)
//            console.log({name,b,zy})
	        
	        	$.ajax( {  
		                type : "GET",  
		                url : "/apiweb/ad/search",  
		               data: {name:name,cost:cost,type:type,readnum:readnum,is_dg:cc,sort:dd,start:b},
		                success : function(msg) {
		                	var str4='';
				                	$(msg.data).each(function(i,ii){
//				                			console.log(ii)
				                			str4+='<ul class="ggc_t2">'
				                				+  	'<li class="g1">'
				                				if(ii.is_buy=="1"){
					                				str4+='<div class="gwc on2_check" data-gid="'+ii.id+'">'
					                				+		'<input class="one" type="checkbox" name="cb1">'
					                				}else{
					                				str4+='<div class="gwc" data-gid="'+ii.id+'">'
					                				+		'<input class="one" type="checkbox" name="cb1">'
					                				}
				                				str4+=	'</li>'
				                				+		'<li class="g2">'
				                				+		'<img class="touu" src="'+ii.avatar_url+'" />'
				                				+		'<p class="g_r chao">'+ii.name+'</p>'
				                				+		'</li>'
				                				+		'<li class="g3">'+ii.A4+'</li>'
				                				+		'<li class="g4">'+ii.R+'</li>'
				                				+		'<li class="g5">'+ii.worth+'</li>'
				                				+		'<li class="g6">'+ii.cost+'</li>'
				                				+		'<li class="g7" data-tid="'+ii.tid+'">'
				                				+		'<img src="/assets/img/xmtxy/chakanxiangqing.png" />'
				                				+		'</li>'
				                				+		'<li class="g8">'
				                				if(ii.is_coll=="1"){
				                				str4+=		'<div class="shouc on1_check" data-cid="'+ii.tid+'">'
				                					+		'<input class="one" type="checkbox" name="cb1">'
				               				}else{
				               				str4+=		'<div class="shouc" data-cid="'+ii.tid+'">'
				                					+		'<input class="one" type="checkbox" name="cb1">'
				               				}
				                				
				                				str4+=		'</li>'
				                				+		'</ul>'
				                	})
				                	$('.co_n').html(str4)
				                	$('.zongye').html(msg.count) 
				                	gouwuche()
				                	shoucang()
				                	xiangqing()
		                }
		           })
	        
	        
	        
	        

   					 }
               });
    }
	 



function gouwuche(){
		//---------购物车-------------
         $(".g1").delegate(".gwc","click",function(){
						$(this).toggleClass( "on2_check" );
						var b=$(this).attr("data-gid")
						 if($(this).hasClass("on2_check")){
						$.ajax( {  
                				type : "POST",  
                				url : "/apiweb/ad/Order/orderextadd",  
                				data: {id:b},
               				 success : function(msg) {
//             				 	console.log(msg)
               				 }
               			})
					}else{
						$.ajax( {  
	                				type : "GET",  
	                				url : "/apiweb/ad/Order/nobuy",  
	                				data: {id:b},
	               				 success : function(msg) {
//	               				 	console.log(msg)
	               				 }
	               			})
					}
							
			})
    	
                  	
}
	
//----------------跳详情------------------
function xiangqing(){
	$('.g7').on("click",function(){
		var c=$(this).attr("data-tid")
		location.href="Ttxq?id="+c;
	})
}
	
//----------------收藏------------------------
function shoucang(){
	$(".shouc").on("click",function(){
						  $(this).toggleClass( "on1_check" );
						  var b=$(this).attr("data-cid")
						  if($(this).hasClass("on1_check")){
						  	$.ajax( {  
	                				type : "POST",  
	                				url : "/apiweb/ad/Collector",  
	                				data: {id:b},
	               				 success : function(msg) {
//	               				 	console.log(msg)
	               				 }
	               			})
						  	
						  }else{
						  	$.ajax( {  
	                				type : "GET",  
	                				url : "/apiweb/ad/Collector/del",  
	                				data: {id:b},
	               				 success : function(msg) {
//	               				 	console.log(msg)
	               				 }
	               			})
						  }
							
					})
}
	
	
})



