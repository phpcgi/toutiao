$(function(){
		
	var goodObj=ro();
   	var tid=goodObj.tid;
   	//----------------------循环详情-------------------------
   	$.ajax({
        		  url:'/apiweb/flux/info',
			  data:{tid:tid},
         	  type:'POST',  
       	 	  success:function(msg){
       	 		console.log(msg.data)
       	 		var str=''
       	 		str+='<img src="'+msg.data.seximg+'" />'
				$('.tuz1').html(str)
				var str2=''
       	 		str2+='<img src="'+msg.data.ageimg+'" />'
				$('.tuz2').html(str2)
				var str3=''
       	 		str3+='<img src="'+msg.data.regionimg+'" />'
				$('.tuz3').html(str3)
				var str4=''
       	 		str4+='<img src="'+msg.data.appimg+'" />'
				$('.tuz4').html(str4)
				 	
       	 	  var sd=msg.data.id;
     	console.log(sd)
	
	//-------------------性别比例------------------------
	$('.chuan1').change(function(){
		var formo = new FormData(document.getElementById("form1"));
		//请求图片
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
				     data:{seximg:pic,id:sd},
        			     type:'POST',  
       	 			 success:function(data){
       	 			 console.log(data)
       	 			 			//取回图片详情
						       	 $.ajax({
						        		  url:'/apiweb/flux/info',
									  data:{tid:tid},
						         	  type:'POST',  
						       	 	  success:function(msg){
						       	 	  	var str=''
						       	 		console.log(msg.data)
						       	 		str+='<img src="'+msg.data.seximg+'" />'
										$('.tuz1').html(str)
						       	 	
						       	 	
						       	 	
						       	 	  }
						       	 })
       	 	
       			 	}
      		})
  			
  			
  			
  		}
       	 
      })
	})
	//--------------------年龄分布-------------------------
	$('.chuan2').change(function(){
		var formo = new FormData(document.getElementById("form2"));
		//请求图片
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
				     data:{ageimg:pic,id:sd},
        			     type:'POST',  
       	 			 success:function(data){
       	 			 console.log(data)
       	 			 			//取回图片详情
						       	 $.ajax({
						        		  url:'/apiweb/flux/info',
									  data:{tid:tid},
						         	  type:'POST',  
						       	 	  success:function(msg){
						       	 	  	var str=''
						       	 		console.log(msg.data)
						       	 		str+='<img src="'+msg.data.ageimg+'" />'
										$('.tuz2').html(str)
						       	 	
						       	 	
						       	 	
						       	 	  }
						       	 })
       	 	
       			 	}
      		})
  			
  			
  			
  		}
       	 
      })
	})
	
	//-------------------地域分布-------------------------------
	$('.chuan3').change(function(){
		var formo = new FormData(document.getElementById("form3"));
		//请求图片
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
				     data:{regionimg:pic,id:sd},
        			     type:'POST',  
       	 			 success:function(data){
       	 			 console.log(data)
       	 			 			//取回图片详情
						       	 $.ajax({
						        		  url:'/apiweb/flux/info',
									  data:{tid:tid},
						         	  type:'POST',  
						       	 	  success:function(msg){
						       	 	  	var str=''
						       	 		console.log(msg.data)
						       	 		str+='<img src="'+msg.data.regionimg+'" />'
										$('.tuz3').html(str)
						       	 	
						       	 	
						       	 	
						       	 	  }
						       	 })
       	 	
       			 	}
      		})
  			
  			
  			
  		}
       	 
      })
	})
	
	//-----------------------终端分布-----------------------
	$('.chuan4').change(function(){
		var formo = new FormData(document.getElementById("form4"));
		//请求图片
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
				     data:{appimg:pic,id:sd},
        			     type:'POST',  
       	 			 success:function(data){
       	 			 console.log(data)
       	 			 			//取回图片详情
						       	 $.ajax({
						        		  url:'/apiweb/flux/info',
									  data:{tid:tid},
						         	  type:'POST',  
						       	 	  success:function(msg){
						       	 	  	var str=''
						       	 		console.log(msg.data)
						       	 		str+='<img src="'+msg.data.appimg+'" />'
										$('.tuz4').html(str)
						       	 	
						       	 	
						       	 	
						       	 	  }
						       	 })
       	 	
       			 	}
      		})
  			
  			
  			
  		}
       	 
      })
	})
	
	
	
	
	
	 }
	 })
	
	//-----------------切换示例--------------
	$('.shili1').click(function(){
		var str=''
		str+='<img src="/assets/img/xmtxy/u661.png" />'
		$('.fensib').html(str)
	})
	$('.shili2').click(function(){
		var str=''
		str+='<img src="/assets/img/xmtxy/u663.png" />'
		$('.fensib').html(str)
	})
	$('.shili3').click(function(){
		var str=''
		str+='<img src="/assets/img/xmtxy/u665.png" />'
		$('.fensib').html(str)
	})
	$('.shili4').click(function(){
		var str=''
		str+='<img src="/assets/img/xmtxy/u667.png" />'
		$('.fensib').html(str)
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
