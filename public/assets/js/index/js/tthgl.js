$(function(){
	
	
	
	//获取tid循环左侧选项
	$.ajax( {  
            type : "POST",  
            url : "/apiweb/flux/info/tid",  
            success : function(msg) {
            	console.log(msg)
            	var str='';
            	$(msg.data).each(function(i,ii){
				
				str+='<ul class="ddgl_c2">'
					+		'<li class="tth_c c1">'
					+			'<p class="tth_p">'+ii.username+'</p>'
					+		'</li>'
					+		'<li class="tth_c c2">'
					+			'<p class="tth_p chao">'+ii.link+'</p>'
					+		'</li>'
					+		'<li class="tth_c c3">'
					if(ii.is_dg=="1"){
						str+='<p class="tth_p">支持</p>'
					}else{
						str+='<p class="tth_p">不支持</p>'
					}
					str+=	'</li>'
					+	'<li class="tth_c c5">'
					if(ii.status=="0"){
						str+='<p class="tth_p p2" data-cid="'+ii.id+'">未审核</p>'
					}else if(ii.status=="1"){
						str+='<p class="tth_p p3" data-cid="'+ii.id+'">解除绑定</p>'
					}else{
						str+='<p class="tth_p p2" data-cid="'+ii.id+'">审核不通过</p>'
					}
					str+=	'</li>'
					+	'</ul>'
			})
            	$('.tt_con').html(str)
            	
            	$('.tth_p').click(function(){
			var id=$(this).attr("data-cid")
			var ji=$(this).html();
			if(ji=="解除绑定"){
				$('.ze').css("display","block")
			}
			
				
			$('.que').click(function(){
				console.log(id)
				$('.ze').css("display","none")
					$.ajax( {  
					            type : "POST",  
					            url : "/apiweb/flux/info/delinfoext", 
					            data:{id:id},
					            success : function(msg) {
					            	 location.reload()
					          
					           }
			          })
				
				})
			$('.q2').click(function(){
				 $('.ze').css("display","none")
			})
				
				
			})
			
            	
            	
            	
            	
            }
    })
	
	
	
	
	
	
})