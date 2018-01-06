$(function(){
		
	var goodObj=ro();
   	var tid=goodObj.tid;
   	//循环详情
   	$.ajax({
        		  url:'/apiweb/flux/info',
			  data:{tid:tid},
         	  type:'POST',  
       	 	  success:function(msg){
       	 		console.log(msg.data.id)
       	 		var str=''
       	 		str+='<img src="'+msg.data.overview+'" />'
							$('.tuz').html(str)
						       	 	
     	var sd=msg.data.id;
     	console.log(sd)
	
	//给服务七上传图片
	$('.chuan').change(function(){
		var formo = new FormData(document.getElementById("form1"));
		$.ajax({
        url:'/index/ajax/upload',
		data:formo,
         type:'POST', 
          cache: false,  
          contentType: false,  
          processData: false,  
       	 success:function(data){
              console.log(data.name); 
  			var pic=data.name;
  			//请求修改图片
  			$.ajax({
       			     url:'/apiweb/flux/info/update',
				     data:{overview:pic,id:sd},
        			     type:'POST',  
       	 			 success:function(data){
       	 			 console.log(data)
       	 			 			//取回图片详情
						       	 $.ajax({
						        		  url:'/apiweb/flux/info',
									  data:{tid:tid},
						         	  type:'POST',  
						       	 	  success:function(msg){
						       	 	  	var str='';
						       	 		console.log(msg.data)
						       	 		str+='<img src="'+msg.data.overview+'" />'
										$('.tuz').html(str)
						       	 	
						       	 	
						       	 	
						       	 	  }
						       	 })
       	 	
       			 	}
      		})
  			
  			
  			
  		}
       	 
      })
	})
	
	  	 	  }
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
