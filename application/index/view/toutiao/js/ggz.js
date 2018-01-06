$(function(){

	//--------单选按钮-----------
	
	$(".danx").on("click",function(){
		//  $(this).hasClass("on_check")? $(this).removeClass("on_check"):$(this).addClass("on_check");
	    //或者这么写
	    $(this).toggleClass( "on_check" ).siblings().removeClass('on_check');
	})
	//---------筛选---------------
	
	$('.s2').click(function(){
		 $('.lei').css("display","block")
	})
	//---------收藏---------------
	
	$(".shouc").on("click",function(){
		  $(this).toggleClass( "on1_check" );
	})
	//---------购物车-------------
	
	$(".gwc").on("click",function(){
		$(this).toggleClass( "on2_check" );
	})
	//---------筛选下的类---------
		
	$('.fen li').on("click",function(){
		 $(this).toggleClass("bian")
	})
	//---------点击搜索------------
	
	var name=$('.zh').val()
	$('.ss').click(function(){
		alert("1")
	})
})