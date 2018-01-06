$(function(){
	$('.shi').click(function(){
		$('.tank').css("display","none")
	})
	//----------密码相同验证----------------
	$(".mima2").blur(function(){
		var n1=$('.mima1').val()
		var n2=$('.mima2').val()
		if(n2!=n1){
//			$('.tmima').css("display","block")
			 $('.tank').css("display","block")
	    		$('.tan_con').html("请确保两次密码输入相同")
//			alert("请确保两次密码相同")
			b=0;
		}else{
			$('.tmima').css("display","none")
			b=1;
		}
	})
	//---------新密码验证------------------
	
	$(".mima1").blur(function(){
		var num=$(".mima1").val()
		var reg1=/^[0-9A-Za-z]{6,}$/;//验证手机号或者邮箱
		var testNum = num;  
		if(!reg1.test(testNum)) {  
		
//	     $('.tmima1').css("display","block")
//		alert("密码应不少于六位")
		 $('.tank').css("display","block")
	    $('.tan_con').html("密码应不少于六位")
	     c=0;
		}else{
		c=1;
		$('.tmima1').css("display","none")
		}
		
	})
	$('.denglu').click(function(){
			
		var phone=$('.mima1').val()
		var phone1=$('.mima2').val()
		if(phone==""||phone1==""){
			$('.tank').css("display","block")
		    $('.tan_con').html("请填写完整的正确信息")
		}else{
			if(b=="1"&&c=="1"){
			$.ajax({
			type:"get",
			url:"/apiweb/userad/pwd",
			data:{password:phone},
			success:function(msg){
				console.log(msg)
					history.go(-1)
			}
		});
		}else{
			$('.tank').css("display","block")
		    $('.tan_con').html("请填写正确信息")
		}
		}
	
	
	})
	
	
	
})
///apiweb/userad/pwd?password=123123&phone=12312312312