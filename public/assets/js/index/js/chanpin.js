$(function(){
	$('.table li:first-of-type').addClass("tive")
	$('.table li').hover(function(){
		$(this).addClass("tive").siblings().removeClass("tive")
	})
//	$('#container .nav_cc .bangd').hover(function(){
//		$('.z_nav').css("display","block")
//		
//	})
//	$('.z_nav').mouseleave(function(){
//		$('.z_nav').css("display","none")
//	})
//	$('#container .nav_cc .gywm').hover(function(){
//		$('.z_nav2').css("display","block")
//	})
//	$('.z_nav2').mouseleave(function(){
//		$('.z_nav2').css("display","none")
//	})
//	$('.nav_r .deng').hover(function(){
//		$('.z_nav3').css("display","block")
//		
//	})
//	$('.z_nav3').mouseleave(function(){
//		$('.z_nav3').css("display","none")
//		
//	})
	
	
	$.ajax( {  
		        type : "POST",  
		        url : "/apiweb/News/cp",
		        data:{start:0},
		        success : function(msg) {  
		        			console.log(msg)
		            var str1=''
		            $(msg.data).each(function(j,jj){
		            			str1+='<div class="pic">'
		            				  +	'<div class="pic_l">'
		            				  +		'<img src="'+jj.image+'" />'
		            				  +	'</div>'
		            				  +	'<div class="pic_r">'
		            				  +		'<div class="titl">'+jj.title+'</div>'
		            				  +		'<p class="nei chao">'+jj.desc+'</p>'
		            				  +		'<p class="cha" data-cid="'+jj.id+'">查看详情</p>'
		            				  +	'</div>'
		            				  +	'</div>'
		            })
		            $('.twk').html(str1)
		            $('.cha').on("click",function(){
													var cid=$(this).attr("data-cid")
													location.href="Cpinxq?&cid="+cid;
												})	
		             var count=msg.count;
		        			 var page=msg.page;
		        			 var yeshu=Math.ceil(count/page)
		        			 fenye(yeshu)
					if(yeshu<="1"){
						yeshu=0
						fenye(0)
					}
//		            $('.table li').click(function(){
//		            	$(this).addClass("bianse").siblings().removeClass("bianse")
//		            		var type=$(this).attr("data-id")
//		            		console.log(type)
//		            		$('.yin').html(type)
//		            		$.ajax( {  
//						        type : "POST",  
//						        url : "/apiweb/News/cp",
//						        data:{type:type,start:0},
//						        success : function(msg) {
//						        		var str2=''
//						        		$(msg.data).each(function(j,jj){
//							            			str2+='<div class="pic">'
//							            				  +	'<div class="pic_l">'
//							            				  +		'<img src="'+jj.image+'" />'
//							            				  +	'</div>'
//							            				  +	'<div class="pic_r">'
//							            				  +		'<div class="titl">'+jj.title+'</div>'
//							            				  +		'<p class="nei">'+jj.desc+'</p>'
//							            				  +		'<p class="cha">查看详情</p>'
//							            				  +	'</div>'
//							            				  +	'</div>'
//							            })
//						        			 $('.twk').html(str2)
//						        			 var count=msg.count;
//						        			 var page=msg.page;
//						        			 var yeshu=Math.ceil(count/page)
//						        			 console.log(yeshu)
//						        			 fenye(yeshu)
//						        }
//						  })
//		            	
//		            })
		            
		        }  
    });  
    
    
    
    
    
//  fenye(10)
    function fenye(page1){
    	$('.M-box1').pagination({
                    totalData:page1,
                    showData:1,
                    coping:true,
                    callback:function(api){
           			 var b=api.getCurrent()
//	        			var type=$('.bianse').attr("data-id")
//	        			console.log(type)
				        	$.ajax( {  
						        type : "POST",  
						        url : "/apiweb/News/cp",
						        data:{start:b},
						        success : function(msg) {
						        		var str2=''
						        		$(msg.data).each(function(j,jj){
							            			str2+='<div class="pic">'
							            				  +	'<div class="pic_l">'
							            				  +		'<img src="'+jj.image+'" />'
							            				  +	'</div>'
							            				  +	'<div class="pic_r">'
							            				  +		'<div class="titl">'+jj.title+'</div>'
							            				  +		'<p class="nei">'+jj.desc+'</p>'
							            				  +		'<p class="cha" data-cid="'+jj.id+'">查看详情</p>'
							            				  +	'</div>'
							            				  +	'</div>'
							            })
						        			 $('.twk').html(str2)
						        			 $('.cha').on("click",function(){
													var cid=$(this).attr("data-cid")
													location.href="Cpinxq?&cid="+cid;
												})	
						        }
						  })
	        
	        
	        
	        

   					 }
               });
    }
	 
    
	
})


