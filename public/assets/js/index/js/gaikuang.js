$(function(){
	var goodObj=ro();
   	var tid=goodObj.tid;
	//循环详情
   	$.ajax({
        		  url:'/apiweb/flux/info/kind?type=2',
         	  type:'POST',  
         	  data:{tid:tid},
       	 	  success:function(msg){
       	 	  	console.log(msg)
       	 	  	var str=''
       	 			$(msg.data).each(function(i,ii){
       	 				str+='<li class="pingtai">'
       	 						if(ii.is_select=="1"){
								    str+='<div class="g_xuan on_check"><input class="one" value="'+ii.name+'" checked="checked"  type="checkbox" name="cb1"></div>'
								    }else{
							       	 str+='<div class="g_xuan"><input class="one" value="'+ii.name+'"  type="checkbox" name="cb1"></div>'
								    }
       	 					str+='<p class="g_xiang">'+ii.name+'</p>'
							 	+	'</li>'
       	 			})
       	 			$('.g_ping').html(str)
       	 			
       	 			
		       	 		$(".g_xuan").on("click",function(){
				   				$(this).toggleClass( "on_check" );
				   				var chk_value=''
								var chkvalue;
								$('input[name="cb1"]:checked').each(function(){ 
										chk_value+=','+$(this).val()
										chkvalue=chk_value.substr(1,chk_value.length)
								}) 
								
							})	
							$(".g_ti").on("click",function(){
								var chk_value=''
								var chkvalue;
								$('input[name="cb1"]:checked').each(function(){ 
										chk_value+=','+$(this).val()
										chkvalue=chk_value.substr(1,chk_value.length)
								})
//								var num=$('.shuz').val()
									$.ajax({
							        		   url:'/apiweb/flux/info',
										   data:{tid:tid},
							         	   type:'POST',  
							       	 	   success:function(msg){
							       	 	   console.log(msg)
							       	 	   var sd=msg.data.id;
     									   console.log(sd)
													$.ajax({
											        		  url:'/apiweb/flux/info/update',
											         	  type:'POST',  
											         	  data:{id:sd,from:chkvalue},
											       	 	  success:function(msg){
											       	 	  	if(msg.code=="200"){
											       	 	  		alert("提交成功")
											       	 	  	}
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