$(function(){
	var goodObj=ro();
   	var id=goodObj.id;
	
	$.ajax({
		type:"get",
		url:"/apiweb/ad/Order/getorderext",
		data:{id:id},
		success:function(msg){
		console.log(msg.data[0].url_other)
		str=msg.data[0].url_other;
		$('.shujuj').html(str)
		var strs= new Array(); //定义一数组 
			strs=str.split("{@@@}"); //字符分割 
			var str2="";
		for (i=0;i<strs.length ;i++ ) 
		{ 
			str2+='<div class="lijie">'
				+		'<p class="qt_shu">|</p>'
				+	'<p class="linj">'+strs[i]+'</p>'
				+	'</div>'
			} 
			$('.lianjie').html(str2)
		}
});
	$('.tjlj_r').click(function(){
			$('.tjlj_r img').attr("src","/assets/img/xmtxy/save.png")
			var a=$('.tjlj_c').val()
			if(a!==""){
				var str3=''
				str3+='<div class="lijie">'
					+		'<p class="qt_shu">|</p>'
					+	'<p class="linj">'+a+'</p>'
					+	'</div>'
				$('.lianjie').append(str3)
				
				var b =$('.shujuj').html()
				if(b==""){
					var c=a;
				}else{
					var c=b+','+a;
				}
				
				console.log(c)
				$.ajax({
					type:"get",
					url:"/apiweb/ad/Order/urlotheredit",
					data:{id:id,url:c},
					success:function(msg){
						console.log(msg)
					}
				})
			}else{
				alert("请添加链接")
			}
				
				
				location.reload()
				
			})
	
	
	$('.tjlj_c').focus(function(){
		$('.tjlj_r img').attr("src","/assets/img/xmtxy/add.png")
	})
	//返回我的订单
	$('.return').click(function(){
//		alert("1")
		history.go(-1)
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