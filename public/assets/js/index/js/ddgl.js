$(function(){
	var goodObj=ro();
   	var tid=goodObj.tid;
   	
   	
   	$.ajax({
    		   url:'/apiweb/flux/order',
		   data:{tid:tid},
     	   type:'POST',  
   	 	   success:function(msg){
   	 	   	console.log(msg)
   	 	   	var str=''
   	 	   	$(msg.data).each(function(i,ii){
   	 	   		str+='<div class="ddgl">'
   	 	   			+	'<div class="ddgl_t">'
   	 	   			+	'<p class="ddgl_l">项目名称：'+ii.title.name+'</p>'
   	 	   			
                		+	'<div class="ddgl_r">'
                		+	'<div class="cha">'
                		+	'<img src="/assets/img/xmtxy/xiangmuxiangqing.png" />'
                		+	'</div>'
                		+	'<p class="xiangq">项目详情</p>'
                		+	'</div>'
                		if(ii.title.status=="1"){
            					str+= '<p class="ddgl_c" data-bid="'+ii.title.id+'"  style="color:#f9c354;">待接单</p>'
            					  
            					
            				}else if(ii.title.status=="2"){
            					str+= '<p class="ddgl_c" data-bid="'+ii.title.id+'" style="color:#f9c354;">待投放</p>'
            				}else{
            					str+= '<p class="ddgl_c" data-bid="'+ii.title.id+'">已完成</p>'
            				}
            				if(ii.title.attachfile!==''){
            					str+='<p class="ddgl_l ddgl_l2 dd">创建时间：'+ii.title.createtime+'</p>'
            					+'<p class="ddgl_c"><a href="'+ii.title.attachfile+'">下载</a></p>'
            				}else{
            					str+='<p class="ddgl_l ddgl_l2 dd">创建时间：'+ii.title.createtime+'</p>'
            					
            				}
            		
            				str+=	'</div>'
            				+	'<div class="sige">'
            				+ '<ul class="ddgl_cc">'
            				+  '<li class="tthn tthn1">头条号名称</li>'
        					+	'<li class="tthn tthn2">计划投放时间</li>'
        					+	'<li class="tthn tthn2">实际投放时间</li>'
        					+	'<li class="tthn tthn3">产品类型</li>'
        					+	'<li class="tthn tthn4">文章标题</li>'
        					+	'<li class="tthn tthn5">文章链接</li>'
        					+	'<li class="tthn tthn6">其他</li>'
        					+	'</ul>'
        					$(ii.content).each(function(j,jj){
        						str+='<ul class="ddgl_c2">'
        							+		'<li class="tth_c">'
        							+		'<div class="tth_pic">'
        							+		'<img src="'+jj.avatar_url+'" />'
        							+		'</div>'
        							+		'<p class="tth_picr chao">'+jj.name+'</p>'
        							+		'</li>'
        							+		'<li class="tth_c c1">'
        							+		'<p class="tth_p ppp">'+jj.puttime+'</p>'
        							+		'</li>'
        							+		'<li class="tth_c c1">'
        							+		'<p class="tth_p ppp">'+jj.newtime+'</p>'
        							+		'</li>'
        							+		'<li class="tth_c c2">'
        							+			'<p class="tth_p p1">'+jj.type+'</p>'
        							+		'</li>'
        							+		'<li class="tth_c c3">'
        							+		'<textarea type="text" class="tth_p p2 p4" data-did="'+jj.id+'">'+jj.title+'</textarea>'
        							+		'<p class="xiu xbiao" >修改</p>'
        							+		'</li>'
        							+		'<li class="tth_c c4">'
        							+		'<textarea type="text" class="tth_p p2 p5"  data-did="'+jj.id+'">'+jj.url+'</textarea>'
        							+		'<p class="xiu xurl">修改</p>'
        							+		'</li>'
        							+		'<li class="tth_c c5">'
                					+		'<p class="qi" data-qid="'+jj.id+'">其它链接</p>'
                					+		'</li>'
                					+		'</ul>'
        					})
        					str+='</div>'
        						+	'</div>'
        						
        						
//      						+'<div class="ddgl">'
//              				+   	'<div class="ddgl_t2">'
//              							
//              				+			'<p class="ddgl_l3">创建时间：'+ii.createtime+'</p>'
//              				+			'<p class="ddgl_l3 se">投放时间：'+ii.time+'</p>'
//              				+		'</div>'
//              				
//              				+'</div>'
        						
        						
        						
        						
        						
        					$('.wai').html(str)
        					var count=msg.count;
        					var page=msg.page;
        					var yeshu=Math.ceil(count/page)
        					console.log(yeshu)
        					
        					fenye1(yeshu)
        					
        					$('.ddgl_r').on("click",function(){
			
					$(this).parent().parent().find(".sige").toggleClass("zhan")
		
					})
        					
        					$('.qi').on("click",function(){
//      						alert("1")
                						var id=$(this).attr("data-qid")
                						location.href="Lqtlj?&id="+id;
                					})
        					$('.p4').change(function(){
        								var a=$(this).val()
					        					$('.p4').on("blur",function(){
					        						console.log(a) 
					        							var title=a
					        							var cid=$(this).attr("data-did")
					                						console.log({cid,title})
					              						$.ajax({
														        url:'/apiweb/flux/order/orderedit',
														         type:'GET', 
														         data:{id:cid,title:title},
														        success:function(msg){
														        	console.log(msg)
														        
														        }
													})
					                			})
       					})
        					$('.p5').change(function(){
        								var b=$(this).val()
					        					$('.p5').on("blur",function(){
					        							var url=b
					        							var cid=$(this).attr("data-did")
					                						console.log({cid,url})
					              						$.ajax({
														        url:'/apiweb/flux/order/orderedit',
														         type:'GET', 
														         data:{id:cid,url:url},
														        success:function(msg){
														        	console.log(msg)
														        
														        }
													})
					                			})
        					
        					
        					
        					})
        					
        					
   	 	   	})
   	 	   	
   	 	   }
   	 	  
   	})
   	

   	
   	
// 	fenye1(100)
   	
   	function fenye1(page1){
		$('.M-box1').pagination({
                    totalData:page1,
                    showData:1,
                    coping:true,
                    callback:function(api){
                    	var b=api.getCurrent()
//                  	var type=$('.fenn').attr("data-cid")
//                  	console.log(type)
var goodObj=ro();
   	var tid=goodObj.tid;
                  $.ajax({
    		   url:'/apiweb/flux/order',
		   data:{tid:tid,start:b},
     	   type:'POST',  
   	 	   success:function(msg){
   	 	   	console.log(msg)
   	 	   	var str=''
   	 	   	$(msg.data).each(function(i,ii){
   	 	   		str+='<div class="ddgl">'
   	 	   			+	'<div class="ddgl_t">'
   	 	   			+	'<p class="ddgl_l">项目名称：'+ii.title.name+'</p>'
   	 	   			
                		+	'<div class="ddgl_r">'
                		+	'<div class="cha">'
                		+	'<img src="/assets/img/xmtxy/xiangmuxiangqing.png" />'
                		+	'</div>'
                		+	'<p class="xiangq">项目详情</p>'
                		+	'</div>'
                		
                		if(ii.title.status=="1"){
            					str+= '<p class="ddgl_c" data-bid="'+ii.title.id+'"  style="color:#f9c354;">待接单</p>'
            					  
            					
            				}else if(ii.title.status=="2"){
            					str+= '<p class="ddgl_c" data-bid="'+ii.title.id+'" style="color:#f9c354;">待投放</p>'
            				}else{
            					str+= '<p class="ddgl_c" data-bid="'+ii.title.id+'">已完成</p>'
            				}
            				
            				if(ii.title.attachfile!==''){
            					str+='<p class="ddgl_l ddgl_l2 dd">创建时间：'+ii.title.createtime+'</p>'
            					+'<p class="ddgl_c"><a href="'+ii.title.attachfile+'">下载</a></p>'
            				}else{
            					str+='<p class="ddgl_l ddgl_l2 dd">创建时间：'+ii.title.createtime+'</p>'
            					
            				}
            			
            				str+='</div>'
            				+	'<div class="sige">'
            				+ '<ul class="ddgl_cc">'
            				+  '<li class="tthn tthn1">头条号名称</li>'
        					+	'<li class="tthn tthn2">计划投放时间</li>'
        					+	'<li class="tthn tthn2">实际投放时间</li>'
        					+	'<li class="tthn tthn3">产品类型</li>'
        					+	'<li class="tthn tthn4">文章标题</li>'
        					+	'<li class="tthn tthn5">文章链接</li>'
        					+	'<li class="tthn tthn6">其他</li>'
        					+	'</ul>'
        					$(ii.content).each(function(j,jj){
        						str+='<ul class="ddgl_c2">'
        							+		'<li class="tth_c">'
        							+		'<div class="tth_pic">'
        							+		'<img src="'+jj.avatar_url+'" />'
        							+		'</div>'
        							+		'<p class="tth_picr">'+jj.name+'</p>'
        							+		'</li>'
        							+		'<li class="tth_c c1">'
        							+		'<p class="tth_p">'+jj.puttime+'</p>'
        							+		'</li>'
        							+		'<li class="tth_c c1">'
        							+		'<p class="tth_p">'+jj.newtime+'</p>'
        							+		'</li>'
        							+		'<li class="tth_c c2">'
        							+			'<p class="tth_p p1">'+jj.type+'</p>'
        							+		'</li>'
        							+		'<li class="tth_c c3">'
        							+		'<textarea type="text" class="tth_p p2 p4  data-did="'+jj.id+'"">'+jj.title+'</textarea>'
        							+		'<p class="xiu xbiao">修改</p>'
        							+		'</li>'
        							+		'<li class="tth_c c4">'
        							+		'<textarea type="text" class="tth_p p2 p5"   data-did="'+jj.id+'">'+jj.url+'</textarea>'
        							+		'<p class="xiu xurl">修改</p>'
        							+		'</li>'
        							+		'<li class="tth_c c5">'
                					+		'<p class="qi" data-qid="'+jj.id+'">其它链接</p>'
                					+		'</li>'
                					+		'</ul>'
        					})
        					str+='</div>'
        						+	'</div>'
        						
        						
//      						+'<div class="ddgl">'
//              				+   	'<div class="ddgl_t2">'
//              							
//              				+			'<p class="ddgl_l3">创建时间：'+ii.createtime+'</p>'
//              				+			'<p class="ddgl_l3 se">投放时间：'+ii.time+'</p>'
//              				+		'</div>'
//              				
//              				+'</div>'
        						
        						
        						
        						
        						
        					$('.wai').html(str)
        					
        					$('.ddgl_r').on("click",function(){
			
					$(this).parent().parent().find(".sige").toggleClass("zhan")
		
					})
        					
        					$('.qi').on("click",function(){
        						alert("1")
                						var id=$(this).attr("data-qid")
                						location.href="Lqtlj?&id="+id;
                					})
        					$('.p4').change(function(){
        								var a=$(this).val()
					        					$('.p4').on("blur",function(){
					        						console.log(a) 
					        							var title=a
					        							var cid=$(this).attr("data-did")
					                						console.log({cid,title})
					              						$.ajax({
														        url:'/apiweb/flux/order/orderedit',
														         type:'GET', 
														         data:{id:cid,title:title},
														        success:function(msg){
														        	console.log(msg)
														        
														        }
													})
					                			})
       					})
        					$('.p5').change(function(){
        								var b=$(this).val()
					        					$('.p5').on("blur",function(){
					        							var url=b
					        							var cid=$(this).attr("data-did")
					                						console.log({cid,url})
					              						$.ajax({
														        url:'/apiweb/flux/order/orderedit',
														         type:'GET', 
														         data:{id:cid,url:url},
														        success:function(msg){
														        	console.log(msg)
														        
														        }
													})
					                			})
        					
        					
        					
        					})
        					
        					
   	 	   	})
   	 	   	
   	 	   }
   	 	  
   	})
                    	
                    	
                    }
        })
	}
   	  	
   	function ro(){
			var qs=location.href.split("?")[1];
			var arr=qs.split("&");
			var obj={};
			for (var i=0;i<arr.length;i++) {
				var _arr=arr[i].split("=");
				obj[_arr[0]]=_arr[1];
			}
			return obj;
		}
})
