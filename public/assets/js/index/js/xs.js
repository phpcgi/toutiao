$(function(){
	$('.cc5 img').hover(function(){
		$('.tishik_k').css('display','block')
	})

	$('.tishik_k').mouseleave(function(){
		event.stopPropagation();
		$('.tishik_k').css('display','none')
	})
	$('.cc6 img').hover(function(){
		$('.tishik_k2').css('display','block')
	})

	$('.tishik_k2').mouseleave(function(){
		event.stopPropagation();
		$('.tishik_k2').css('display','none') 
	})
	//------------------参数获取------------------------
	function canshu(){
		var cc=$("input[name='bb']:checked").val();
    			//----高到低----
    			var dd=$("input[name='cc']:checked").val();
    			//-----搜索-----
    			var name=$('.zh').val()
			//-----类别-----
			var chk_value=''
			var type;
			$('input[name="aa1"]:checked').each(function(){ 
				chk_value+=','+$(this).val()
				type=chk_value.substr(1,chk_value.length)
			})
			//----阅读量----
			var b=$('.zd1').val()
			var s=$('.zg1').val()
			var readnum;
			if(b!=''&&s!=''){
				readnum=b+"_"+s;
			}else{
				readnum=''
			}
			//----价格-----
			var jb=$('.zdd').val()
			var js=$('.zg2').val()
			var cost;
			if(jb!=""&&js!=""){
				cost=jb+"_"+js;
			}else{
				cost='';
			}
			//----对象----
			var obj={};
			obj.name=name;
			obj.cost=cost;
			obj.type=type;
			obj.readnum=readnum;
			obj.is_dg=cc;
			obj.sort=dd;
			return obj;
	}
		var ss=canshu()
		//-------------------------默认数据---------------------------	
			$.ajax( {  
		                type : "GET",  
		                url : "/apiweb/ad/xs",  
		                data: ss,
		                success : function(msg) {
				                	var str2=str(msg.data)
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
	   	//--------单选按钮-----------
		$(".danx").on("click",function(){
		    $(this).toggleClass( "on_check" ).siblings().removeClass('on_check');
		})
		//---------筛选---------------
		$('.s2').click(function(){
			 $('.lei').css("display","block")
		})
		//-------------点击搜索-------------------
		$('.sous').click(function(){
			var ss1=canshu()
			$.ajax( {  
	                type : "GET",  
	                url : "/apiweb/ad/search",  
	                data:ss1,
	                success : function(msg) {
						//-------字符串------
						var str1=str(msg.data)
	                		$('.co_n').html(str1)
	                		$('.zongye').html(msg.count) 
	                    	//--------购物车-----
	                  	gouwuche()
	                  	//---------收藏------
						shoucang()
						//---------详情-------
						xiangqing()
						//---------分页--------
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
	//-------------------循环类---------------------
	$.ajax( {  
                type : "GET",  
                url : "/apiweb/Category",  
                success : function(msg) {
	                	var str1=''
	                	$(msg.data).each(function(i,ii){
	                		str1+='<li><p>'+ii.name+'</p><input type="checkbox" class="leibie1" name="aa1" value="'+ii.name+'" />'
	                			  +   '</li>'
	                	})
	                	$('.fen').html(str1)
	//------------------筛选下的类------------------
					$('.fen li').on("click",function(){
							$(this).toggleClass("bian")
							event.stopPropagation(); 
					}); 
					$('.fen').on("mouseleave",function(){
					})
					$('.lei').click(function(){
							var ss2=canshu()
							$('.lei').css("display","none")
							$.ajax( {  
					                type : "GET",  
					                url : "/apiweb/ad/search",  
					                data: ss2,
					                success : function(msg) {
					                	var str3=str(msg.data)
					                	$('.co_n').html(str3)
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
             }
       })
	//-----------最低数值-最高数值----------------
		$('.zg1').change(function(){
			var ss3=canshu()
				$.ajax( {  
		                type : "GET",  
		                url : "/apiweb/ad/search",  
		                data: ss3,
		                success : function(msg) {
		                		var str4=str(msg.data)
				                	$('.co_n').html(str4)
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
		//----------------价格------------------
		$('.zg2').change(function(){
			var ss4=canshu()
				$.ajax( {  
		                type : "GET",  
		                url : "/apiweb/ad/search",  
		                data:ss4,
		                success : function(msg) {
		                		var str5=str(msg.data)
				                	$('.co_n').html(str5)
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
//-----------------撰稿-------------------
	var cc;
	$('.zhuang').click(function(){
		var ss5=canshu()
		$.ajax( {  
               type : "GET",  
               url : "/apiweb/ad/search",  
               data: ss5,
               success : function(msg) {
                		var str6=str(msg.data)
		                	$('.co_n').html(str6)
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
    //-----------从高到低的排序方式---------------
      $('.paixf').click(function(){
    			var ss6=canshu()
			$.ajax( {  
	                type : "GET",  
	                url : "/apiweb/ad/search",  
	                data: ss6,
	                success : function(msg) {
	                	var str7=str(msg.data)
			                	$('.co_n').html(str7)
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
    //---------------分页--------------------
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
		//			console.log(chkvalue)阅读量
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
			        	$.ajax( {  
				                type : "GET",  
				                url : "/apiweb/ad/search",  
				               data: {name:name,cost:cost,type:type,readnum:readnum,is_dg:cc,sort:dd,start:b},
				                success : function(msg) {
				                		var str8=str(msg.data)
						                	$('.co_n').html(str8)
						                	$('.zongye').html(msg.count) 
						                	gouwuche()
						                	shoucang()
						                	xiangqing()
				                }
				    })
 				}
          });
    }
	 //---------购物车-------------
	function gouwuche(){
		$(".g1").delegate(".gwc","click",function(){
					$(this).toggleClass( "on2_check" );
					 var b=$(this).attr("data-gid")
				     if($(this).hasClass("on2_check")){
						$.ajax( {  
		        				type : "POST",  
		        				url : "/apiweb/ad/Order/orderextadd",  
		        				data: {id:b},
		       				 success : function(msg) {
		       				 }
		       			})
					}else{
						$.ajax( {  
		            				type : "GET",  
		            				url : "/apiweb/ad/Order/nobuy",  
		            				data: {id:b},
		           				 success : function(msg) {
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
	
//----------------收藏------------------
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
//------------拼接字符串-------------------
	function str(data){
		var str = "";
	    $(data).each(function(i,ii){
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
	            +		'<p class="g_r chao"><div id="'+ii.tid+'"></div><a href="http://47.92.49.244/api/linktid/linktid?tid='+ii.tid+'" target="_blank">'+ii.name+'</a></p>'
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
		return str;
	}
})



