$(function(){
	$.ajax({
		type:"get",
		url:"/apiweb/ad/Order/task",
		success:function(msg){
			console.log(msg)
			var str='';
			$(msg.data).each(function(i,ii){
				str+='<ul class="ddgl_c2">'
					+		'<li class="tth_c c1">'
					+			'<p class="tth_p chao">'+ii.ntitle+'</p>'
					+		'</li>'
					+		'<li class="tth_c c2">'
					+			'<div class="tth_pic">'
					+				'<img src="'+ii.avatar_url+'" />'
					+			'</div>'
					+			'<p class="tth_picr chao">'+ii.name+'</p>'
					+		'</li>'
					+		'<li class="tth_c c3">'
					+			'<p class="tth_p">'+ii.puttime+'</p>'
					+		'</li>'
					+		'<li class="tth_c c4">'
					if(ii.status=="4"){
						str+='<p class="tth_p">待发布</p>'
					}else{
						str+='<p class="tth_p">待审核</p>'
					}
					str+='</li>'
						+	'<li class="tth_c c5">'
						+		'<p class="tth_p p3 chu" data-cid="'+ii.id+'">处理</p>'
						+	'</li>'
						+	'</ul>'
			})
			$('.dcl_con').html(str)
			$('.chu').on("click",function(){
				var id=$(this).attr("data-cid")
				  
					location.href="Gcl?&id="+id;
				
				console.log(status)
				
			})
			var count=msg.count;
				var page=msg.page;
				var yeshu=Math.ceil(count/page)
				console.log(yeshu)
				fenye1(yeshu)
				
					if(yeshu<="1"){
						yeshu=0
						fenye1(0)
					}
		}
	})
	
//	fenye1(100)
	
	function fenye1(page1){
		$('.M-box1').pagination({
                    totalData:page1,
                    showData:1,
                    coping:true,
                    callback:function(api){
                    	var b=api.getCurrent()
//                  	var type=$('.fenn').attr("data-cid")
//                  	console.log(type)
                  $.ajax({
		type:"get",
		url:"/apiweb/ad/Order/task",
		data:{start:b},
		success:function(msg){
			console.log(msg)
			var str='';
			$(msg.data).each(function(i,ii){
				str+='<ul class="ddgl_c2">'
					+		'<li class="tth_c c1">'
					+			'<p class="tth_p chao">'+ii.ntitle+'</p>'
					+		'</li>'
					+		'<li class="tth_c c2">'
					+			'<div class="tth_pic">'
					+				'<img src="'+ii.avatar_url+'" />'
					+			'</div>'
					+			'<p class="tth_picr chao">'+ii.name+'</p>'
					+		'</li>'
					+		'<li class="tth_c c3">'
					+			'<p class="tth_p">'+ii.puttime+'</p>'
					+		'</li>'
					+		'<li class="tth_c c4">'
					if(ii.status=="1"){
						str+='<p class="tth_p">待上传</p>'
					}else if(ii.status=="2"){
						str+='<p class="tth_p">待修改</p>'
					}else{
						str+='<p class="tth_p">待审核</p>'
					}
					str+='</li>'
						+	'<li class="tth_c c5">'
						+		'<p class="tth_p p3 chu" data-cid="'+ii.id+'">处理</p>' 
						+	'</li>'
						+	'</ul>'
			})
			$('.dcl_con').html(str)
			$('.chu').on("click",function(){
				var id=$(this).attr("data-cid")
				  
					location.href="Gcl?&id="+id;
				
				console.log(status)
				
			})
		}
	})
                    	
                    	
                    }
        })
	}
	
	
	
	
	
})



