$(function(){
	var a,b,c,d;
	$(".youx").blur(function(){
		var num=$(".youx").val()
//		var reg1=/[a-zA-Z0-9]{1,10}@[a-zA-Z0-9]{1,5}\.[a-zA-Z0-9]{1,5}/;
		var reg1=/^[A-Za-zd0-9]+([-_.][A-Za-zd0-9]+)*@([A-Za-zd0-9]+[-.])+[A-Za-zd0-9]{2,5}$/;  
		var testNum = num;  
		if(!reg1.test(testNum)) {  
			$('.you').css("display","block")
			a=0;
	     
		}else{
			$('.you').css("display","none")
			a=1;
		
		}
		
	})
	
	//----------密码相同验证----------------
	$(".mima2").blur(function(){
		var n1=$('.mima1').val()
		var n2=$('.mima2').val()
		if(n2!=n1){
			$('.tmima').css("display","block")
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
		
	     $('.tmima1').css("display","block")
	     	c=0;
		}else{
		
		$('.tmima1').css("display","none")
		c=1;
		}
		
	})
	
	//----------手机号验证--------------
	$(".phone").blur(function(){
		var num=$(".phone").val()
		var reg1=/^1[0-9]{10}/;//验证手机号或者邮箱
		var testNum = num;  
		if(!reg1.test(testNum)) {  
		
	     $('.tphone').css("display","block")
	     d=0;
		}else{
		d=1;
		$('.tphone').css("display","none")
		}
		
	})
	//-----------同意协议---------------
	var o=true;
	var e=0;
	$('.xz').click(function(){
		$('.xz').toggleClass('xuanze')
		if(o){
			e="1"
			
		}else{
			e="0"
			alert("您必须同意头条易用户服务协议")
		}
		o=!o;
	})
	//-----------展示样历----------------
	$('.yl1').click(function(){
		$('.ze1').css("display","block")
	})
	//-----------遮罩层消失--------------
	$('.ze1').click(function(){
		$('.ze1').css("display","none")
	})
	$('.yl2').click(function(){
		$('.ze2').css("display","block")
	})
	$('.ze2').click(function(){
		$('.ze2').css("display","none")
	})
	
	$('.yzm').click(function(){
	   				var phone=$('.phone').val()
//	   				alert(phone)
	   				$.ajax( {  
			                type : "POST",  
			                url : "/apiweb/userflux/Verify",  
			                data: {phone:phone},
			                success : function(msg) {  
			                    console.log(msg)
			                    
			                }  
			            });  
	   	})
	
	$('.zc').click(function(){
		if(a=="1"&&b=="1"&&c=="1"&&d=="1"&&e=="1"){
			var username=$('.username').val();
			var url=$('.wangz').val();
			var email=$('.youx').val();
			var password=$('.mima1').val();
			var phone=$('.phone').val();
			var yzm=$('.yzma').val();
			
			$.ajax( {  
                type : "POST",  
                url : "/apiweb/userad/reg",  
                data: {username:username, url:url,email:email,password:password,phone:phone,code:yzm},
                success : function(msg) {
                	
                	if(msg.code=="-1"){
			                		alert(msg.msg)
			      	}else{
                	
                		location.href="Ggzdl"
                }
                   
                }  
            });
			
		}else if(a=="1"&&b=="1"&&c=="1"&&d=="1"&&e=="0"){
			
			alert("您必须同意头条易用户服务协议")
		}else{
			alert("请您填写完整的正确信息")
		}
		
		
		console.log({username,url,email,password,phone})
		
	
	})
	//马上登陆
	$('.msdeng').click(function(){
		location.href="/index/Ggzdl"
	})
	//返回首页
	$('.fanhui').click(function(){
		history.go(-1)
	})



})