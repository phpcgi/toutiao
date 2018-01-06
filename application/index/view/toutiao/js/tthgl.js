$(function(){
	$('.tth_p').click(function(){
		
		var ji=$(this).html();
		
		if(ji=="解除绑定"){
			$('.ze').css("display","block")
		}
		
	})
	$('.que').click(function(){
		$('.ze').css("display","none")
	})
})