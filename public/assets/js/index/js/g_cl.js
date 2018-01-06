$(function(){
	$('.shi').click(function(){
		$('.tank').css("display","none")
	})
	var goodObj=ro();
 var id=goodObj.id;
	$.ajax( {  
                type : "GET",  
                url : "/apiweb/ad/order/getext",  
                data:{id:id},
                success : function(msg) {
                		console.log(msg)
                		var str='';
                		$(msg.data).each(function(i,ii){
                			str+='<div class="wen_k">'
                				+		'<div class="wtu">'
                				+		'<img src="/assets/img/xmtxy/wendang.png" />'
                				+		'</div>'
                				+		'<p class="wen_n">'+ii.name+'</p>'
                				+		'<p class="wen_n n1"></p>'
                				+		'<div class="wen_n n2">'
                				+			'<a download="'+ii.attachfile+'" href="'+ii.attachfile+'">下载</a>'
                				+		'</div>'
//              				+		'<p class="wen_n n3">'+ii.size+'</p>'
                				+		'</div>'
                				
                		})
                		$('.gcl_con').html(str)
                		
                		$('textarea').val(msg.data.desc)
                }
    })
       //通过
      $('.xing').click(function(){
      	 $('.tank').css("display","block")
	    $('.tan_con').html("审核通过")
      	var desc=$('textarea').val()
      	$.ajax( {  
                type : "GET",  
                url : "/apiweb/ad/order/updateext",  
                data:{id:id,status:4,desc:desc},
                success : function(msg) {
                		console.log(msg)
                }
       })
      	$('.shi').click(function(){
      		location.href="Gdclrw";
      	})
      	
      })
      //不通过
       $('.bxing').click(function(){
       	var desc=$('textarea').val()
       	$('.tank').css("display","block")
	    $('.tan_con').html("审核未通过")
      	$.ajax( {  
                type : "GET",  
                url : "/apiweb/ad/order/updateext",  
                data:{id:id,status:3,desc:desc},
                success : function(msg) { 
                		console.log(msg)
                }
       })
      	$('.shi').click(function(){
      		location.href="Gdclrw";
      	})
      	
      })
       //通过变色
       $('.sf div').click(function(){
       		$(this).addClass("hong").siblings().removeClass("hong")
       })
                	
       //返回待处理任务
       $('#return').click(function(){
       		history.go(-1)
       })
                	
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
			
