$(function(){
	$('.table li:first-of-type').addClass("tive")
	$('.table li').hover(function(){
		$(this).addClass("tive").siblings().removeClass("tive")
	})


var goodObj=ro();
 var id=goodObj.cid;
   	
console.log(id)   	

//	$.ajax( {  
//		        type : "POST",  
//		        url : "/apiweb/News/info",
//		        data:{id:id},
//		        success : function(msg) { 
//		        	console.log(msg)
//		       		var str=''
//		       		$(msg.data).each(function(i,ii){
//		       			str+='<div class="picc">'
//		       				+		'<img src="'+ii.image+'" />'
//		       				+		'<span>'+(i+1)+'</span>'
//		       				+	'</div>'
//		       		})
//		       		$('.zhan').html(str)
//		       		var str1=msg.data[0].title;
//		       		console.log(str1)
//		       		$('.bt').html(str1)
//		        }
//	})

	$('.title').click(function(){
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