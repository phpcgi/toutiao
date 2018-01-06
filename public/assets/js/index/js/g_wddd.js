$(function(){
	$.ajax({
        url:'/apiweb/ad/Order',
         type:'GET', 
        success:function(msg){
        	console.log(msg)
        	   	var str='';
                	$(msg.data).each(function(i,ii){ 
                		console.log(ii)
//              			console.log(ii.content[i].id)
                			str+='<div class="ddgl">'
                				+   	'<div class="ddgl_t">'
                				+			'<p class="ddgl_l">项目名称：'+ii.title+'</p>'
//              				+			'<p class="ddgl_l ddgl_l2">创建时间：'+ii.createtime+'</p>'
//              				+			'<p class="ddgl_l ddgl_l2 dd">投放时间：'+ii.time+'</p>'
                				+			'<div class="ddgl_r">'
                				+				'<div class="cha">'
                				+						'<img src="/assets/img/xmtxy/xiangmuxiangqing.png" />'
                				+				'</div>'
                				+				'<p class="xiangq">查看子项</p>'
                				+			 '</div>'
                				
                			
                				if(ii.status=="1"){
                					str+='<p class="ddgl_c k1 qxxm" data-gid="'+ii.id+'">取消项目</p>'
                						+   '<p class="ddgl_c k1 xgdd" data-cid="'+ii.id+'">修改订单</p>'
                						+	 '<p class="ddgl_c k2" data-bid="'+ii.id+'">待接单</p>'
                				}else if(ii.status=="2"){
                					str+='<p class="ddgl_c k1 " data-gid="'+ii.id+'" style="color:#666">取消项目</p>'
                						+   '<p class="ddgl_c k1 " data-cid="'+ii.id+'"  style="color:#666">修改订单</p>'
                					    +  '<p class="ddgl_c k2" data-bid="'+ii.id+'">待投放</p>'
                				}else{
                					str+='<p class="ddgl_c k1 " data-gid="'+ii.id+'" style="color:#666">取消项目</p>'
                						+   '<p class="ddgl_c k1 " data-cid="'+ii.id+'"  style="color:#666">修改订单</p>'
                					    +   '<p class="ddgl_c k2" data-bid="'+ii.id+'" style="color:#04975a">已完成</p>'
                				}
                				
                					if(ii.attachfile!==""){
                						str+='<p class="ddgl_l ddgl_l2 dd">投放时间：'+ii.time+'</p>'
                						+'<p class="ddgl_c"><a href="'+ii.attachfile+'">下载</a></p>'
                					}else{
                						str+='<p class="ddgl_l ddgl_l2 dd">投放时间：'+ii.time+'</p>'
                					}
                					
                					str+='</div>'
                					+	'<div class="sige">'
                					+	'<ul class="ddgl_cc">'
                					+  '<li class="tthn tthn1">头条号名称</li>'
                					+	'<li class="tthn tthn2">实际投放时间</li>'
                					+	'<li class="tthn tthn3">产品类型</li>'
                					+	'<li class="tthn tthn4">文章标题</li>'
                					+	'<li class="tthn tthn5">文章链接</li>'
                					+	'<li class="tthn tthn6">其他</li>'
                					+	'<li class="tthn tthn7">删除</li>'
                					+	'</ul>'
                					
                					
                					$(ii.content).each(function(j,jj){
                						str+='<ul class="ddgl_c2">'
                							+	 	'<li class="tth_c">'
                							+		'<div class="tth_pic">'
                							+		'<img src="'+jj.avatar_url+'" />'
                							+		'</div>'
                							+		'<p class="tth_picr chao">'+jj.name+'</p>'
                							+		'</li>'
                							+		'<li class="tth_c c1">'
                							+		'<p class="tth_p shit shiti">'+jj.puttime+'</p>'
                							+		'</li>'
                							+		'<li class="tth_c c2">'
                							+		'<p class="tth_p p1">'+jj.type+'</p>'
                							+		'</li>'
                							+		'<li class="tth_c c3">'
                							+		'<div type="text" class="tth_p p2 chao">'+jj.title+'</div>'
                							+		'</li>'
                							+		'<li class="tth_c c4">'
                							+		'<div type="text" class="tth_p p2 chao1"><a href="'+jj.url+'" target="_blank">'+jj.url+'</a></div>'
//              							+		'<div type="text" class="tth_p p2 chao1"><a href="Xieyi" target="_blank">asdfasdfadsafasdfdasfasfasfasfasfssdfdasfasfsafadsfsasfsadfasdfsadfasfasfdsaf</a></div>'
                							+		'</li>'
                							+		'<li class="tth_c c5">'
                							+		'<p class="qi chao" data-qid="'+jj.id+'">其它链接</p>'
                							+		'</li>'
                							if(ii.status=="1"){
                								str+='<li class="tth_c c6 dele" data-sid="'+jj.id+'">'
                									+		'<img src="/assets/img/xmtxy/delete.png" />'
                									+		'</li>'
                							}else{
                								str+=''
                							}
                							
                							str+='</ul>'
                					})
                					
                					str+='</div>'
                						+	'</div>'
                						
                						
                						
                						
                						
//              				+'<div class="ddgl">'
//              				+   	'<div class="ddgl_t2">'
//              							
//              				+			'<p class="ddgl_l3">创建时间：'+ii.createtime+'</p>'
//              				+			'<p class="ddgl_l3 se">投放时间：'+ii.time+'</p>'
//              				+		'</div>'
//              				
//              				+'</div>'
                						
                						
                						
                						
                						
                					$('#gaikuang').html(str) 
                					
                					$('.qi').on("click",function(){
                						var id=$(this).attr("data-qid")
                						location.href="Gqtlj?&id="+id;
                					})
                					
                					var count=msg.count;
                					var page=msg.page;
                					var yeshu=Math.ceil(count/page)
								fenye1(yeshu)
								if(yeshu<="1"){
									yeshu=0
									fenye1(0)
								}
                				
                					
                					
                					//删除子项
                					zixiang()
                					//删除项目
                					
                					xiangmu()
                					//修改订单
                					xiudd()
                					//详情
                					xiangqing()
                					//展开
                					zhankai()
				})
        	
        }
   })
	
	
	
		$('.table li').click(function(){
			$('#gaikuang').html("") 
			$(this).addClass("fenn").siblings().removeClass("fenn")
			var type=$(this).attr("data-cid")
			$.ajax({
        url:'/apiweb/ad/Order',
         type:'GET', 
         data:{type:type},
        success:function(msg){
        	console.log(msg)
        	   	var str1='';
                	$(msg.data).each(function(i,ii){ 
                		console.log(ii)
//              			console.log(ii.content[i].id)
                			str1+='<div class="ddgl">'
                				+   	'<div class="ddgl_t">'
                				+			'<p class="ddgl_l">项目名称：'+ii.title+'</p>'
//              				+			'<p class="ddgl_l ddgl_l2">创建时间：'+ii.createtime+'</p>'
//              				+			'<p class="ddgl_l ddgl_l2">投放时间：'+ii.time+'</p>'
                				+			'<div class="ddgl_r">'
                				+				'<div class="cha">'
                				+						'<img src="/assets/img/xmtxy/xiangmuxiangqing.png" />'
                				+				'</div>'
                				+				'<p class="xiangq">查看子项</p>'
                				+			 '</div>'
//              				+'<p class="ddgl_c"><a href="'+ii.attachfile+'">下载</a></p>'
                				if(ii.status=="1"){
                					str1+='<p class="ddgl_c k1 qxxm" data-gid="'+ii.id+'">取消项目</p>'
                						+   '<p class="ddgl_c k1 xgdd" data-cid="'+ii.id+'">修改订单</p>'
                						+	 '<p class="ddgl_c k2" data-bid="'+ii.id+'">待接单</p>'
                				}else if(ii.status=="2"){
                					str1+='<p class="ddgl_c k1 " data-gid="'+ii.id+'" style="color:#666">取消项目</p>'
                						+   '<p class="ddgl_c k1 " data-cid="'+ii.id+'"  style="color:#666">修改订单</p>'
                					    +    '<p class="ddgl_c k2" data-bid="'+ii.id+'">待投放</p>'
                				}else{
                					str1+='<p class="ddgl_c k1 " data-gid="'+ii.id+'" style="color:#666">取消项目</p>'
                						+   '<p class="ddgl_c k1 " data-cid="'+ii.id+'"  style="color:#666">修改订单</p>'
                					     +  '<p class="ddgl_c k2" data-bid="'+ii.id+'" style="color:#04975a">已完成</p>'
                				}
                				if(ii.attachfile!==""){
                						str1+='<p class="ddgl_l ddgl_l2 dd">投放时间：'+ii.time+'</p>'
                						+'<p class="ddgl_c"><a href="'+ii.attachfile+'">下载</a></p>'
                					}else{
                						str1+='<p class="ddgl_l ddgl_l2 dd">投放时间：'+ii.time+'</p>'
                					}
                					str1+=	'</div>'
                					+	'<div class="sige">'
                					+	'<ul class="ddgl_cc">'
                					+  '<li class="tthn tthn1">头条号名称</li>'
                					+	'<li class="tthn tthn2">实际投放时间</li>'
                					+	'<li class="tthn tthn3">产品类型</li>'
                					+	'<li class="tthn tthn4">文章标题</li>'
                					+	'<li class="tthn tthn5">文章链接</li>'
                					+	'<li class="tthn tthn6">其他</li>'
                					+	'<li class="tthn tthn7">删除</li>'
                					+	'</ul>'
                					
                					
                					$(ii.content).each(function(j,jj){
                						str1+='<ul class="ddgl_c2">'
                							+	 	'<li class="tth_c">'
                							+		'<div class="tth_pic">'
                							+		'<img src="'+jj.avatar_url+'" />'
                							+		'</div>'
                							+		'<p class="tth_picr chao">'+jj.name+'</p>'
                							+		'</li>'
                							+		'<li class="tth_c c1">'
                							+		'<p class="tth_p shit">'+jj.puttime+'</p>'
                							+		'</li>'
                							+		'<li class="tth_c c2">'
                							+		'<p class="tth_p p1">'+jj.type+'</p>'
                							+		'</li>'
                							+		'<li class="tth_c c3">'
                							+		'<div type="text" class="tth_p p2 chao">'+jj.title+'</div>'
                							+		'</li>'
                							+		'<li class="tth_c c4">'
                								+		'<div type="text" class="tth_p p2 chao1"><a href="'+jj.url+'" target="_blank">'+jj.url+'</a></div>'
                							+		'</li>'
                							+		'<li class="tth_c c5">'
                							+		'<p class="qi chao" data-qid="'+jj.id+'">其它链接</p>'
                							+		'</li>'
                							if(ii.status=="1"){
                								str1+='<li class="tth_c c6 dele" data-sid="'+jj.id+'">'
                									+		'<img src="/assets/img/xmtxy/delete.png" />'
                									+		'</li>'
                							}else{
                								str1+=''
                							}
                							
                							str1+='</ul>'
                					})
                					
                					str1+='</div>'
                						+	'</div>'
                					$('#gaikuang').html(str1) 
                					
                					$('.qi').on("click",function(){
                						var id=$(this).attr("data-qid")
                						location.href="Gqtlj?&id="+id;
                					})
                					
                					var count=msg.count;
                					var page=msg.page;
                					var yeshu=Math.ceil(count/page)
								fenye1(yeshu)
								if(yeshu<="1"){
									yeshu=0
									fenye1(0)
								}
								
//              					var count=msg.count;
//              					var page=msg.page;
//              					var yeshu=Math.ceil(count/page)
//								fenye1(yeshu)
//								if(yeshu<="1"){
//									yeshu=0
//									fenye1(0)
//								}
                				
                					
                					
                					//删除子项
                					zixiang()
                					//删除项目
                					
                					xiangmu()
                					//修改订单
                					xiudd()
                					//详情
                					xiangqing()
                					//展开
                					zhankai()
				})
        	
        }
   })

				
	})
	
	
	
	
	
	
	
	
	function fenye1(page1){
		$('.M-box1').pagination({
                    totalData:page1,
                    showData:1,
                    coping:true,
                    callback:function(api){
                    	var b=api.getCurrent()
                    	var type=$('.fenn').attr("data-cid")
                    	console.log(type)
                    	$.ajax({
					        url:'/apiweb/ad/Order',
					         type:'GET', 
					         data:{start:b,type:type},
					         success:function(msg){
					        	 console.log(msg.data)
					        	   	var str1='';
					                	$(msg.data).each(function(i,ii){ 
					                		console.log(ii)
					//              			console.log(ii.content[i].id)
					                			str1+='<div class="ddgl">'
					                				+   	'<div class="ddgl_t">'
					                				+			'<p class="ddgl_l">项目名称：'+ii.title+'</p>'
//					                				+			'<p class="ddgl_l ddgl_l2">创建时间：'+ii.createtime+'</p>'
//					                				+			'<p class="ddgl_l ddgl_l2">投放时间：'+ii.time+'</p>'
					                				+			'<div class="ddgl_r">'
					                				+				'<div class="cha">'
					                				+						'<img src="/assets/img/xmtxy/xiangmuxiangqing.png" />'
					                				+				'</div>'
					                				+				'<p class="xiangq">项目详情</p>'
					                				+			 '</div>'
//					                				+'<p class="ddgl_c"><a href="'+ii.attachfile+'">下载</a></p>'
					                				if(ii.status=="1"){
					                					str1+='<p class="ddgl_c k1 qxxm" data-gid="'+ii.id+'">取消项目</p>'
					                						+   '<p class="ddgl_c k1 xgdd" data-cid="'+ii.id+'">修改订单</p>'
					                						+	 '<p class="ddgl_c k2" data-bid="'+ii.id+'">待接单</p>'
					                				}else if(ii.status=="2"){
					                					str1+='<p class="ddgl_c k1 " data-gid="'+ii.id+'" style="color:#666">取消项目</p>'
                											+   '<p class="ddgl_c k1 " data-cid="'+ii.id+'"  style="color:#666">修改订单</p>'
					                					     +  '<p class="ddgl_c k2" data-bid="'+ii.id+'">待投放</p>'
					                				}else{
					                					str1+='<p class="ddgl_c k1 " data-gid="'+ii.id+'" style="color:#666">取消项目</p>'
                											+   '<p class="ddgl_c k1 " data-cid="'+ii.id+'"  style="color:#666">修改订单</p>'
					                					    +   '<p class="ddgl_c k2" data-bid="'+ii.id+'" style="color:#04975a">已完成</p>'
					                				}
					                				if(ii.attachfile!==""){
					                						str1+='<p class="ddgl_l ddgl_l2 dd">投放时间：'+ii.time+'</p>'
					                						+'<p class="ddgl_c"><a href="'+ii.attachfile+'">下载</a></p>'
					                					}else{
					                						str1+='<p class="ddgl_l ddgl_l2 dd">投放时间：'+ii.time+'</p>'
					                					}
					                					str1+=	'</div>'
					                					+	'<div class="sige">'
					                					+	'<ul class="ddgl_cc">'
					                					+  '<li class="tthn tthn1">头条号名称</li>'
					                					+	'<li class="tthn tthn2">实际投放时间</li>'
					                					+	'<li class="tthn tthn3">产品类型</li>'
					                					+	'<li class="tthn tthn4">文章标题</li>'
					                					+	'<li class="tthn tthn5">文章链接</li>'
					                					+	'<li class="tthn tthn6">其他</li>'
					                					+	'<li class="tthn tthn7">删除</li>'
					                					+	'</ul>'
					                					
					                					
					                					$(ii.content).each(function(j,jj){
					                						str1+='<ul class="ddgl_c2">'
					                							+	 	'<li class="tth_c">'
					                							+		'<div class="tth_pic">'
					                							+		'<img src="'+jj.avatar_url+'" />'
					                							+		'</div>'
					                							+		'<p class="tth_picr chao">'+jj.name+'</p>'
					                							+		'</li>'
					                							+		'<li class="tth_c c1">'
					                							+		'<p class="tth_p shit">'+jj.puttime+'</p>'
					                							+		'</li>'
					                							+		'<li class="tth_c c2">'
					                							+		'<p class="tth_p p1">'+jj.type+'</p>'
					                							+		'</li>'
					                							+		'<li class="tth_c c3">'
					                							+		'<div type="text" class="tth_p p2 chao">'+jj.title+'</div>'
					                							+		'</li>'
					                							+		'<li class="tth_c c4">'
					                							+		'<div type="text" class="tth_p p2 chao1"><a href="'+jj.url+'" target="_blank">'+jj.url+'</a></div>'
					                							+		'</li>'
					                							+		'<li class="tth_c c5">'
					                							+		'<p class="qi chao" data-qid="'+jj.id+'">其它链接</p>'
					                							+		'</li>'
					                						if(ii.status=="1"){
					                								str1+='<li class="tth_c c6 dele" data-sid="'+jj.id+'">'
					                									+		'<img src="/assets/img/xmtxy/delete.png" />'
					                									+		'</li>'
					                							}else{
					                								str1+=''
					                							}
					                							
					                							str1+='</ul>'
					                					})
					                					
					                					str1+='</div>'
					                						+	'</div>'
					                					$('#gaikuang').html(str1)
					                					//删除子项
					                					zixiang()
					                					//删除项目
					                					xiangmu()
					                					
					                					//修改订单
					                					xiudd()
					                					//详情
					                					xiangqing()
					                					//展开
					                					zhankai()
									})
					        	
					        }
					   })
                    	
                    	
                    }
                   
        })
		
	}
	
	//------删除子项-----
	function zixiang(){
		$('.dele').on("click",function(){
			$('.tank').css("display","block")
				var cid=$(this).attr("data-sid")
				$('.shi').click(function(){
					$('.tank').css("display","none")
					$.ajax({
					        url:'/apiweb/ad/Order/orderextdel',
					         type:'GET', 
					         data:{id:cid},
					         success:function(msg){
					        	 console.log(msg)
					        
					         }
						})
					location.reload()
				})
				$('.fou').click(function(){
					$('.tank').css("display","none")
				})

				
//				$.ajax({
//			        url:'/apiweb/ad/Order/orderextdel',
//			         type:'GET', 
//			         data:{id:cid},
//			         success:function(msg){
//			        	 console.log(msg)
//			        
//			         }
//				})
//					location.reload()
		})
	}
	
	//------删除项目--------
	function xiangmu(){
		
		$('.qxxm').on("click",function(){
			$('.tank').css("display","block")
				var gid=$(this).attr("data-gid")
				
				$('.shi').click(function(){
					$('.tank').css("display","none")
					$.ajax({
				        url:'/apiweb/ad/Order/orderdel',
				        type:'GET', 
				        data:{id:gid},
					        success:function(msg){
					        	console.log(msg)
					        
					        }
				     })
					location.reload()
				})
				$('.fou').click(function(){
					$('.tank').css("display","none")
				})
				
//				$.ajax({
//			        url:'/apiweb/ad/Order/orderdel',
//			        type:'GET', 
//			        data:{id:gid},
//				        success:function(msg){
//				        	console.log(msg)
//				        
//				        }
//			     })
//					location.reload()
		})
	}
	//-------修改订单--------
	function xiudd(){
		$('.xgdd').on("click",function(){
				var fid=$(this).attr("data-cid")
				location.href="Gxgdd?&fid="+fid;
		})
	}
	//----------详情--------
	function xiangqing(){
		$('.ddgl_r').click(function(){
			$(this).parent().parent().find()
		})
	}
	//----------	展开---------
	function zhankai(){
		$('.ddgl_r').on("click",function(){
//			alert("1")
			
			$(this).parent().parent().find(".sige").toggleClass("zhan")
		
		})
	}
	
	
})
