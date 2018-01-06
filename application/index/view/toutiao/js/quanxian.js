$(function(){
//	var a=true;
//	$('.pingtai').delegate('.g_xuan',"click",function(){
//		if(a){
//		$(this).css("background","yellow")
//		}else{
//			$(this).css("background","pink")
//		}
//	a=!a;
//	})
	
	$(".g_xuan").on("click",function(){
//  $(this).hasClass("on_check")? $(this).removeClass("on_check"):$(this).addClass("on_check");
   //或者这么写
   $(this).toggleClass( "on_check" );
})
	

})