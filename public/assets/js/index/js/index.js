$(function(){
	$('.ed').val('')
	$('.password').val('')
	$('.shi').click(function(){
		$('.tank').css("display","none")
	})
	var a;
	$(".ed").blur(function(){
		var num=$(".ed").val()
//		var reg1=/^1[0-9]{10}/;
		var reg1=/^1[0-9]{10}|[A-Za-zd0-9]+([-_.][A-Za-zd0-9]+)*@([A-Za-zd0-9]+[-.])+[A-Za-zd0-9]{2,5}$/
		var testNum = num;  
		if(!reg1.test(testNum)) {  
//	     alert("请输入正确的手机号")
		 $('.tank').css("display","block")
	    $('.tan_con').html("请输入正确的手机号")
	     a=0;
		}else{
			a=1;
		}
		
	})
	
	$('.dl').click(function(){
		var phone=$('.ed').val()
		var password=$('.password').val()
		if(a=="1"){
		$.ajax( {  
                type : "POST",  
                url : "/apiweb/userflux/Login",  
                data: {phone:phone,password:password},
                success : function(msg) {
                	console.log(msg)
                	if(msg.code=="200"){
                		location.href="Lliangzu"
                	}else if(msg.code=="-1"){
//              		alert(msg.msg)
					 $('.tank').css("display","block")
	   		 		$('.tan_con').html(msg.msg)
                	}                  
                }  
            });
           }else{
           	 $('.tank').css("display","block")
	    		$('.tan_con').html("请输入正确的手机号")
           }
		console.log({phone,password})
	})
	
	$('.wj').click(function(){
		 location.href="Lwjmm"
	})
	
	$('.return').click(function(){
		 location.href="Index"
	})
	
	$('.chuang').click(function(){
//		alert("1")
		location.href="/index/Regaster"
	})
})