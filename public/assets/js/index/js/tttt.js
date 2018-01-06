$(function(){
//	$('.bct1').click(function(){
//		location.href="tttt.html"
//	})
//	$('.bc').click(function(){
//		location.href="tthgl.html"
//	})


$('.yangli2').click(function(){
		$('.ze1').css("display","block")
	})
	//-----------遮罩层消失--------------
	$('.ze1').click(function(){
		$('.ze1').css("display","none")
	})
	$('.yangli1').click(function(){
		$('.ze2').css("display","block")
	})
	$('.ze2').click(function(){
		$('.ze2').css("display","none")
	})


	$(".bct1").click(function() { 
		var username=$('.username').val()//用户名
		var link=$('.link').val();//链接
		var is_dg=$("input[name='zhuan']:checked").val();
		var pic=$('.chuan').val()
		if(pic==''||link==""||is_dg==""||username==""){
			alert("请填写完整信息")
		}
	})

$(".bc").click(function() { 
		var username=$('.username').val()//用户名
		var link=$('.link').val();//链接
		var is_dg=$("input[name='zhuan']:checked").val();
		var pic=$('.chuan').val()
		if(pic==''||link==""||is_dg==""||username==""){
			alert("请填写完整信息")
		}
	})
	
	$('.cbg').click(function(){
//	alert("1")
	$('.chuan').click();
})
	$('.chuan').change(function(){
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
  		$('.bct1').click(function(){
  			location.href="Tttt"
  		var username=$('.username').val()
		var link=$('.link').val()
		var is_dg=$("input[name='zhuan']:checked").val();
				$.ajax( {  
                		type : "GET",  
                		url : "/apiweb/flux/info/addinfoext",  
               		 data: {username:username,link:link,is_dg:is_dg,pic:pic},
               		 success : function(msg) {
                			console.log(msg)
                		}
 				 })
				
		})	
		
		
		$('.bc').click(function(){
  			location.href="Tthgl"
  		var username=$('.username').val()
		var link=$('.link').val()
		var is_dg=$("input[name='zhuan']:checked").val();
				$.ajax( {  
                		type : "GET",  
                		url : "/apiweb/flux/info/addinfoext",  
               		 data: {username:username,link:link,is_dg:is_dg,pic:pic},
               		 success : function(msg) {
                			console.log(msg)
                		}
 				 })
				
		})	
		
        }
      })
	})
	

	
	
	
})