$(function(){
	

	$(".ed").blur(function(){
		var num=$(".ed").val()
		var reg1=/^1[0-9]{10}|[a-zA-Z0-9]{1,10}@[a-zA-Z0-9]{1,5}\.[a-zA-Z0-9]{1,5}/;//验证手机号或者邮箱
		var testNum = num;  
		if(!reg1.test(testNum)) {  
	     alert("请输入正确的手机号或者邮箱")
		}
		
	})
})