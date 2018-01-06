$(function(){
	
	//----------邮箱验证-----------
	$(".you").blur(function(){
		var num=$(".you").val()
		var reg1=/[a-zA-Z0-9]{1,10}@[a-zA-Z0-9]{1,5}\.[a-zA-Z0-9]{1,5}/;//验证手机号或者邮箱
		var testNum = num;  
		if(!reg1.test(testNum)) {  
			$('.youx').css("display","block")
		$(this).siblings(".dc").find("img").attr("src","img/denglu/cuo-.png")
	     $(this).siblings(".dc").css("display","block")
	     
		}else{
			$('.youx').css("display","none")
			$(this).siblings(".dc").find("img").attr("src","img/denglu/dui.png")
	     $(this).siblings(".dc").css("display","block")
		}
		
	})
	
	//----------手机号验证--------------
	$(".tian1").blur(function(){
		var num=$(".tian1").val()
		var reg1=/^1[0-9]{10}/;//验证手机号或者邮箱
		var testNum = num;  
		if(!reg1.test(testNum)) {  
		
	     $('.tishi').css("display","block")
	     
		}else{
		
		$('.tishi').css("display","none")
		}
		
	})
	//----------密码相同验证----------------
	$(".mima2").blur(function(){
		var n1=$('.mima1').val()
		var n2=$('mima2').val()
		if(n2!=n1){
			$('.tmima').css("display","block")
		}else{
			$('.tmima').css("display","none")
		}
	})
	//---------新密码验证------------------
	
	$(".mima1").blur(function(){
		var num=$(".mima1").val()
		var reg1=/^[0-9A-Za-z]{6,}$/;//验证手机号或者邮箱
		var testNum = num;  
		if(!reg1.test(testNum)) {  
		
	     $('.tmima1').css("display","block")
	     
		}else{
		
		$('.tmima1').css("display","none")
		}
		
	})
})

//^1[0-9]{10}|