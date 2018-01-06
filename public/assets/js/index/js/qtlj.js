$(function(){
	var goodObj=ro();
   	var id=goodObj.id;
	
	$.ajax({
		type:"get",
		url:"/apiweb/ad/order/infourl",
		data:{extid:id},
		success:function(msg){
			console.log(msg)
			var str=''
			$(msg.data).each(function(i,ii){
				str+='<div class="lijie">'
					+'<p class="qt_shu">|</p>'
					+'<p class="linj">'+ii.url+'</p>'
					+'<p class="tu" data-id="'+ii.id+'">'
					+'<img src="/assets/img/xmtxy/delete.png" />'
					+'</p>'
					+'</div>'
			})
				$('.lianjie').html(str)
			
			
			$('.tu').on('click',function(){
				var did=$(this).attr("data-id")
				$.ajax({
					type:"get",
					url:"/apiweb/ad/order/delurl",
					data:{exturlid:did},
					success:function(msg){
						console.log(msg)
					}
				})
				location.reload()
			})
			
			
			
			
		

		}
});
	$('.tjlj_r').click(function(){
			$('.tjlj_r img').attr("src","/assets/img/xmtxy/save.png")
			var a=$('.tjlj_c').val()
			if(a!==""){
				
				
//				var b =$('.shujuj').html()
//				if(b==""){
//					var c=a;
//				}else{
//					var c=b+','+a;
//				}
				
//				console.log(c)
				$.ajax({
					type:"get",
					url:"/apiweb/ad/order/addurl",
					data:{extid:id,url:a},
					success:function(msg){
						console.log(msg)
						location.reload()
					}
				})
			}else{
				alert("请添加链接")
			}
				
				
//				location.reload()
				
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