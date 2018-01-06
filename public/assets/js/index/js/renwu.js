$(function(){
	var goodObj=ro();
   	var tid=goodObj.tid;
   	$.ajax({
    		   url:'/apiweb/flux/order/orders',
		   data:{tid:tid},
     	   type:'POST',  
   	 	   success:function(msg){
		   	 	   	console.log(msg)
		   	 	   	var str=''
		   	 	   	$(msg.data).each(function(i,ii){
		   	 	   		str+='<ul class="ddgl_c2">'
		   	 	   			+		'<li class="tth_c c1">'
		   	 	   			+			'<p class="tth_p">'+ii.title+'</p>'
		   	 	   			+		'</li>'
		   	 	   			+		'<li class="tth_c c2">'
		   	 	   			+			'<div class="tth_pic">'
		   	 	   			+				'<img src="'+ii.avatar_url+'" />'
		   	 	   			+			'</div>'
		   	 	   			+			'<p class="tth_picr">'+ii.name+'</p>'
		   	 	   			+		'</li>'
		   	 	   			+		'<li class="tth_c c3">'
		   	 	   			+			'<p class="tth_p">'+ii.puttime+'</p>'
		   	 	   			+		'</li>'
		   	 	   			+		'<li class="tth_c c4">'
		   	 	   			if(ii.status=="1"){
		   	 	   				str+='<p class="tth_p">待上传</p>'
		   	 	   			}else if(ii.status=="2"){
		   	 	   				str+='<p class="tth_p">待修改</p>'
		   	 	   			}else if(ii.status=="3"){
		   	 	   				str+='<p class="tth_p">待审核</p>'
		   	 	   			}else if(ii.status=="7"){
		   	 	   				str+='<p class="tth_p">待审核</p>'
		   	 	   			}else if(ii.status=="4"){
		   	 	   				str+='<p class="tth_p">待发布</p>'
		   	 	   			}
		   	 	   			
		   	 	   			str+='</li>'
		   	 	   				+		'<li class="tth_c c5">'
		   	 	   				+			'<p class="tth_p p3 chuli"  data-id="'+ii.id+'" data-fid="'+ii.attachfile+'"    data-cid="'+ii.status+'" data-bid="'+ii.desc+'">处理</p>'
		   	 	   				+	'</li>'
		   	 	   				+	'</ul>'
		   	 	   	})
		   	 	   	$('.renwu_con').html(str)
		   	 	   
		   	 	   	$('.chuli').on("click",function(){
		   	 	   		var desc=$(this).attr("data-bid")
		   	 	   		var a=$(this).attr("data-cid")
		   	 	   		var b=$(this).attr("data-id")
		   	 	   		var c=$(this).attr("data-fid") 
		   	 	   		if(c==""){
		   	 	   			$('.xiazai').css("display","none")
		   	 	   		}else{
		   	 	   			$('.xiazai').css("display","block")
		   	 	   		}
		   	 	   		var strr='<a href="'+c+'">下载</a>'
		   	 	   		console.log(a)
		   	 	   		if(a==1||a==7||a==3||a==2){
		   	 	   			$('#gaikuang2').css({"display":"block","position":"absolute","top":"0"})
		   	 	   			$('.sd').val(desc)
		   	 	   			$('.dianji').html(strr)
		   	 	   			var desc=$('.sd').val()
		   	 	   				$('.cbg').click(function(){
		   	 	   					$('.chuan').click()
		   	 	   				})
		   	 	   			$('.tij1').click(function(){
		   	 	   				alert('请上传文件')
		   	 	   			})
		   	 	   			$('.chuan').change(function(){
		   	 	   				$('.tij').css("display","block")
		   	 	   				$('.tij1').css("display","none")
							var formo = new FormData(document.getElementById("form1")); 
							$.ajax({
								        url:'/index/ajax/upload',
								//    data: $("#form1").serialize() ,
										data:formo,
								         type:'POST', 
								         cache: false,  
								         contentType: false,  
								         processData: false,  
								        	success:function(data){
										         console.log(data.name); 
										  		var pic=data.name;
//										  		var jie=data.name.substr((data.name.length-3))
//									        		console.log(jie)
//									        		console.log(data.name)
//									        		
//									        		 if(jie=='zip'||jie=='rar'){  

										  		
										  		console.log(b)
										  		//不填写描述提交
										  		$('.tij').on("click",function(){
										  			var desc=$('.sd').val()
													  			$.ajax({
															    		   url:'/apiweb/flux/order/updatefile',
																	   data:{id:b,file:pic,desc:desc},
															     	   type:'POST',  
															   	 	   success:function(msg){
															   	 	   		console.log(msg)
															   	 	   }
															      })
													  			$('#gaikuang2').css({"display":"none"})
													  			location.reload()
												 })
										  		//填写描述提交
										  		$('.sd').change(function(){
											  			var desc=$(this).val()
											  			$('.tij').on("click",function(){
											  					$.ajax({
																    		   url:'/apiweb/flux/order/updatefile',
																		   data:{id:b,file:pic,desc:desc},
																     	   type:'POST',  
																   	 	   success:function(msg){
																   	 	   		console.log(msg)
																   	 	   }
																  })
											  					$('#gaikuang2').css({"display":"none"})
											  					location.reload()
											  			})
										  		})
										  		
										  		
//										  		}else{
//										  			alert('请填写正确的文件格式')
//
//										  		}
										  		
										  		
										
								  		
								  		}
					      	})
		   	 	   			
		   	 	   		})	
//		   	 	   		}else if(a==2){ 
//		   	 	   			
//		   	 	   			$('#gaikuang2').css({"display":"block","position":"absolute","top":"0"})
//		   	 	   			var desc=$('.sd').val()
//		   	 	   				$('.cbg').click(function(){
//		   	 	   					$('.chuan').click()
//		   	 	   				})
//		   	 	   			$('.chuan').change(function(){
//							var formo = new FormData(document.getElementById("form1"));
//							$.ajax({
//								        url:'/index/ajax/upload',
//								//    data: $("#form1").serialize() ,
//										data:formo,
//								         type:'POST', 
//								         cache: false,  
//								         contentType: false,  
//								         processData: false,  
//								        	success:function(data){
//										         console.log(data.name); 
//										  		var pic=data.name;
//										  		console.log(b)
//										  		//不填写描述提交
//										  		$('.tij').on("click",function(){
//													  			$.ajax({
//															    		   url:'/apiweb/flux/order/updatefile',
//																	   data:{id:b,file:pic},
//															     	   type:'POST',  
//															   	 	   success:function(msg){
//															   	 	   		console.log(msg)
//															   	 	   }
//															      })
//													  			$('#gaikuang2').css({"display":"none"})
//													  			location.reload()
//												 })
//										  		//填写描述提交
//										  		$('.sd').change(function(){
//											  			var desc=$(this).val()
//											  			$('.tij').on("click",function(){
//											  					$.ajax({
//																    		   url:'/apiweb/flux/order/updatefile',
//																		   data:{id:b,file:pic,desc:desc},
//																     	   type:'POST',  
//																   	 	   success:function(msg){
//																   	 	   		console.log(msg)
//																   	 	   }
//																  })
//											  					$('#gaikuang2').css({"display":"none"})
//											  					location.reload()
//											  			})
//										  		})
//										
//								  		
//								  		}
//					      	})
//		   	 	   			
//		   	 	   		})	
		   	 	   			
//		   	 	   			$('#gaikuang1').css({"display":"block","position":"absolute","top":"0"})
//		   	 		   	 	   			
//		   	 	   			$('.tij').on("click",function(){
//		   	 	   				var title=$('.btt').val()
//		   	 	   				var url=$('.ltt').val()
//		   	 	   				$.ajax({
//							    		   url:'/apiweb/flux/order/orderedit',
//									   data:{id:b,title:title,url:url},
//							     	   type:'POST',  
//							   	 	   success:function(msg){
//							   	 	   		console.log(msg)
//							   	 	   		
//							   	 	   }
//								})
//		   	 	   				$('#gaikuang1').css({"display":"none"})
//		   	 	   				
//		   	 	   			})
		   	 	   			
		   	 	   			
		   	 	   		}else if(a==4){
		   	 	   			$('#gaikuang1').css({"display":"block","position":"absolute","top":"0"})
		   	 	   			
		   	 	   			
		   	 	   			$('.tij').on("click",function(){
		   	 	   				var title=$('.btt').val()
		   	 	   				var url=$('.ltt').val()
		   	 	   				$.ajax({
							    		   url:'/apiweb/flux/order/orderedit',
									   data:{id:b,title:title,url:url},
							     	   type:'POST',  
							   	 	   success:function(msg){
							   	 	   		console.log(msg)
							   	 	   }
								})
		   	 	   				$('#gaikuang1').css({"display":"none"})
		   	 	   			})
		   	 	   		}
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
