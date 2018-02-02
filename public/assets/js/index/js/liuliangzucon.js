$(function(){
	//默认tid
	$.ajax( {  
            type : "POST",  
            url : "/apiweb/flux/info/info",  
            success : function(msg) {
            		console.log(msg.data)
            		var str="";
            			str+='<div class="tj">'
            				+	'<a href="Zhoushuju?&tid='+msg.data.tid+'" class="zsj">'
            				+	'<p class="zsjj yanse">周数据</p>'
            				+	'</a>'
            				+	'<a href="Yshuju?&tid='+msg.data.tid+'" class="zsj">'
            				+		'<p class="zsjj">月数据</p>'
            				+	'</a>'
            				+	'</div>'
            				+	'<div class="sjtj">'
            				+	'<div class="zhe">'
            				+	'<img src="/assets/img/xmtxy/xinxitijiao.png" />'
            				+	'</div>'
            				+	'<p class="shuju">信息提交</p>'
            				+	'</div>'
            				+	'<a href="Gkuang?&tid='+msg.data.tid+'" class="zsj">'
            				+	'<p class="zsjj">概况</p>'
            				+	'</a>'
            				+	'<a href="Fensi?&tid='+msg.data.tid+'" class="zsj">'
            				+		'<p class="zsjj">粉丝画像</p>'
            				+	'</a>'
            				+	'<a href="Qxian?&tid='+msg.data.tid+'" class="zsj">'
            				+		'<p class="zsjj">权限及功能</p>'
            				+	'</a>'
            				+	'<a href="Dpingtai?&tid='+msg.data.tid+'" class="zsj">'
            				+		'<p class="zsjj">多平台</p>'
            				+	'</a>'
            				+	'<a href="Tthgl?&tid='+msg.data.tid+'" class="zsj">'
            				+	'<div class="sjtj oio">'
            				+		'<div class="zhe">'
            				+			'<img src="/assets/img/xmtxy/toutiaohaoguanli-icon.png" />'
            				+		'</div>'
            				+		'<p class="shuju">头条号管理</p>'
            				+	'</div>'
            				+	'</a>'
						+	'<div style="height: 1px;width: 100%;background: #fff;float: left;margin-top: 20px;"></div>'
						+	'<div class="tth">'
						+		'<p class="tthw">订单</p>'
						+	'</div>'
						+	'<div class="sjtj">'
						+		'<div class="zhe">'
						+			'<img src="/assets/img/xmtxy/dingdan.png" />'
						+		'</div>'
						+		'<a href="Ddgl?&tid='+msg.data.tid+'" class="zsj1">'
						+		'<p class="shuju">订单管理</p>'
						+		'</a>'
						+	'</div>'
						+	'<div class="sjtj">'
						+		'<div class="zhe">'
						+			'<img src="/assets/img/xmtxy/daichulirenwu-.png" />'
						+		'</div>'
						+		'<a href="Dclrw?&tid='+msg.data.tid+'" class="zsj1">'
						+		'<p class="shuju">待处理任务</p>'
						+		'</a>'
						+		'</div>'
						
						
						
						
						
            			   $('.zsjs').html(str)
            			   $('.zhu').html(msg.data.name)
            			   
            			   var link ='Zhoushuju?&tid='+msg.data.tid;
                			$('.con_r').attr('src', link);
               			 var href = window.location.href;
               			 window.location.href = href.substr(0, href.indexOf('#')) + '#' + link;
            			   
            			    $(".zsj").on("click",function(){
            			   	$(this).find(".zsjj").addClass("yanse")
            			   	$(this).find(".shuju").addClass("yanse")
            			   	$(this).siblings().find(".zsjj").removeClass("yanse")
            			   	$(this).siblings().find(".shuju").removeClass("yanse")
            			   	$(this).parent().siblings().find(".zsjj").removeClass("yanse")
            			   	$(this).parent().siblings().find(".shuju").removeClass("yanse")
		                var link = $(this).attr('href');
		                $('.con_r').attr('src', link);
		                var href = window.location.href;
		                window.location.href = href.substr(0, href.indexOf('#')) + '#' + link;
		                return false;
		           	   });
		           	   $(".zsj1").on("click",function(){
		           	   	$(this).find(".shuju").addClass("yanse")
		           	   	$(this).parent().siblings().find(".shuju").removeClass("yanse")
		           	   	$(this).parent().siblings().find(".zsjj").removeClass("yanse")
               			   var link = $(this).attr('href');
              			   $('.con_r').attr('src', link);
                				var href = window.location.href;
                				window.location.href = href.substr(0, href.indexOf('#')) + '#' + link;
                				return false;
           			   });
            		
            }
   })
	
	//获取tid循环左侧选项
	$.ajax( {  
            type : "POST",  
            url : "/apiweb/flux/info/tid",  
            success : function(msg) {
            		console.log(msg)
            		var str=''
            		$(msg.data).each(function(i,ii){
            			str+='<p class="name1 jiu" data-id="'+ii.kol_id+'" data-cid="'+ii.id+'">'+ii.username+'</p>'
            		})
            		$('.ll5').html(str)
            		$('.jiu').on("click",function(){
            		
            			event.stopPropagation()
            			var tid=$(this).attr("data-id")
            			var id=$(this).attr("data-cid")
            			$('.l4').css("display","none")
					$('.l3').css("display","block")
					var ttid=$(this).html()
					$('.zhu').html(ttid)
            			var str="";
            			str+='<div class="tj">'
            				+	'<a href="Zhoushuju?&tid='+tid+'" class="zsj">'
            				+	'<p class="zsjj">周数据</p>'
            				+	'</a>'
            				+	'<a href="Yshuju?&tid='+tid+'" class="zsj">'
            				+		'<p class="zsjj">月数据</p>'
            				+	'</a>'
            				+	'</div>'
            				+	'<div class="sjtj">'
            				+	'<div class="zhe">'
            				+	'<img src="/assets/img/xmtxy/xinxitijiao.png" />'
            				+	'</div>'
            				+	'<p class="shuju">信息提交</p>'
            				+	'</div>'
            				+	'<a href="Gkuang?&tid='+tid+'" class="zsj">'
            				+	'<p class="zsjj">概况</p>'
            				+	'</a>'
            				+	'<a href="Fensi?&tid='+tid+'" class="zsj">'
            				+		'<p class="zsjj">粉丝画像</p>'
            				+	'</a>'
            				+	'<a href="Qxian?&tid='+tid+'" class="zsj">'
            				+		'<p class="zsjj">权限及功能</p>'
            				+	'</a>'
            				+	'<a href="Dpingtai?&tid='+tid+'" class="zsj">'
            				+		'<p class="zsjj">多平台</p>'
            				+	'</a>'
            				+	'<a href="Tthgl?&tid='+tid+'" class="zsj">'
            				+	'<div class="sjtj oio">'
            				+		'<div class="zhe">'
            				+			'<img src="/assets/img/xmtxy/toutiaohaoguanli-icon.png" />'
            				+		'</div>'
            				+		'<p class="shuju">头条号管理</p>'
            				+	'</div>'
            				+	'</a>'
						+	'<div style="height: 1px;width: 100%;background: #fff;float: left;margin-top: 20px;"></div>'
						+	'<div class="tth">'
						+		'<p class="tthw">订单</p>'
						+	'</div>'
						+	'<div class="sjtj">'
						+		'<div class="zhe">'
						+			'<img src="/assets/img/xmtxy/dingdan.png" />'
						+		'</div>'
						+		'<a href="Ddgl?&tid='+tid+'" class="zsj1">'
						+		'<p class="shuju">订单管理</p>'
						+		'</a>'
						+	'</div>'
						+	'<div class="sjtj">'
						+		'<div class="zhe">'
						+			'<img src="/assets/img/xmtxy/daichulirenwu-.png" />'
						+		'</div>'
						+		'<a href="Dclrw?&tid='+tid+'" class="zsj1">'
						+		'<p class="shuju">待处理任务</p>'
						+		'</a>'
						+		'</div>'
						
						
						
						
						
            			   $('.zsjs').html(str)
            			   //跳转传tid
            			   var link ='Zhoushuju?&tid='+tid;
                			$('.con_r').attr('src', link);
               			 var href = window.location.href;
               			 window.location.href = href.substr(0, href.indexOf('#')) + '#' + link;
            			   
            			   $(".zsj").on("click",function(){
            			   $(this).find(".zsjj").addClass("yanse")
            			   	$(this).find(".shuju").addClass("yanse")
            			   	$(this).siblings().find(".zsjj").removeClass("yanse")
            			   	$(this).siblings().find(".shuju").removeClass("yanse")
            			   	$(this).parent().siblings().find(".zsjj").removeClass("yanse")
            			   	$(this).parent().siblings().find(".shuju").removeClass("yanse")
		                var link = $(this).attr('href');
		                $('.con_r').attr('src', link);
		                var href = window.location.href;
		                window.location.href = href.substr(0, href.indexOf('#')) + '#' + link;
		                return false;
		           	   });
		           	   $(".zsj1").on("click",function(){
		           	   	 	$(this).find(".shuju").addClass("yanse")
		           	   	$(this).parent().siblings().find(".shuju").removeClass("yanse")
		           	   	$(this).parent().siblings().find(".zsjj").removeClass("yanse")
               			   var link = $(this).attr('href');
              			   $('.con_r').attr('src', link);
                				var href = window.location.href;
                				window.location.href = href.substr(0, href.indexOf('#')) + '#' + link;
                				return false;
           			   });
		           	   
		           	   
		           	   
            			
            		})
            		 
            }
  })
	
	
	
	//-----------------循环未读消息------------------
	
	
	
	
	$.ajax( {  
                type : "POST",  
                url : "/apiweb/flux/msg/NoRead",  
                success : function(msg) {              	
                		var nu=msg.data
                		console.log(msg.data)
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
		
})
