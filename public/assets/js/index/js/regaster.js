$(function(){
	//马上登陆
	$('.msdeng').click(function(){
			location.href="/index/Llzdl"
	})
	//返回
	$('.fanhui').click(function(){
		history.go(-1)
	})
	
	var a,b,c,d,f;
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
		c=1;
		$('.tmima1').css("display","none")
		}
		
	})
	//----------链接验证----------------
	$(".link").blur(function(){
		var num=$(".link").val()
		var reg1=/(http|ftp|https):\/\/[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&:/~\+#]*[\w\-\@?^=%&/~\+#])?/;
		var testNum = num;  
		if(!reg1.test(testNum)) {  
		d=0;
	     $('.lianj').css("display","block")
	     
		}else{
		d=1;
		$('.lianj').css("display","none")
		}
		
	})
	//----------手机号验证--------------
	$(".phone").blur(function(){
		var num=$(".phone").val()
		var reg1=/^1[0-9]{10}/;//验证手机号或者邮箱
		var testNum = num;  
		if(!reg1.test(testNum)) {  
		
	     $('.tphone').css("display","block")
	     f=0;
		}else{
		f=1;
		$('.tphone').css("display","none")
		}
		
	})
			$(".phone").keyup(function(){
		var num=$(".phone").val()
		var reg1=/^1[0-9]{10}/;//验证手机号或者邮箱
		var testNum = num;  
		if(!reg1.test(testNum)) {  
		   $('.yzm').css("backgroundColor","#efefef")
		   $('.yzm').css("color","#000")		
		   document.getElementById("nn").disabled = true;
	     $('.tphone').css("display","block")
	     d=0;
		}else{
		d=1;
		$('.tphone').css("display","none")
		document.getElementById("nn").disabled = false;

		   $('.yzm').css("backgroundColor","#dc3932")
		   $('.yzm').css("color","#fff")		   
		}
		
	})
	//-----------展示阳历----------------
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
	
	//---------传图------------------
	$(".zc").click(function() { 
		var username=$('.t_name').val()//用户名
		var link=$('.link').val();//链接
		var is_dg=$("input[name='a']:checked").val();
		var email=$('.youx').val();
		var password=$('.mima1').val();
		var phone=$('.phone').val()
		var pic=$('.chuan').val()
		if(pic==''){
			alert("请传头条号管理后台截图")
//			  $('.ctu').css("display","block")
		}else{
//			$('.ctu').css("display","none")
		}
	})
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
	$('.cbg').click(function(){
		$('.chuan').click();
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
	$('.chuan').change(function(){
		var formo = new FormData(document.getElementById("form1"));
		console.log(formo)
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
	   			
				$(".zc").click(function() {  
					if(a=="1"&&b=="1"&&c=="1"&&d=="1"&&f=="1"&&e=="1"){
					var username=$('.t_name').val()//用户名
					var link=$('.link').val();//链接
					var is_dg=$("input[name='a']:checked").val();
					var email=$('.youx').val();
					var password=$('.mima1').val();
					var phone=$('.phone').val()
					var yzm=$('.yzma').val();
					
					
						$.ajax( {  
			                type : "POST",  
			                url : "/apiweb/userflux/reg",  
			                data: {username:username, link:link,is_dg:is_dg,email:email,password:password,phone:phone,pic:pic,code:yzm},
			                success : function(msg) {
			                	if(msg.code=="-1"){
			                		alert(msg.msg)
			                	}else{
			                		 location.href="Llzdl"
			                	}
			                    console.log(msg)			                   
			                }  
			            });  
					
					
					}else if(a=="1"&&b=="1"&&c=="1"&&d=="1"&&f=="1"&&e=="0"){
						
						alert("您必须同意头条易用户服务协议")
					}else{
						alert("请您填写完整的正确信息")
					}
					console.log({username,link,is_dg,email,password,phone,pic,yzm})
			            
			        })  
        
        
     
     
             }
		});
	})
		
		
})