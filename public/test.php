<script type="text/javascript"> 
(function($){
    var goTo = $(".article");
    var guide = $(".sideGuide");
    var guideLi = $(".sideGuide li");
    var curBg = $(".sideGuide .curBg");
    var index=0;
    var direct=0; 
    //设置宽高
    var resetFun = function(){ goTo.each(function(){  $(this).height( $(window).height() ),  $(this).width( $(window).width()+20 ) }); }
    resetFun();
    //屏幕滚动
    var goToFun = function(){ 
         direct=0; 
        if(index<0){  index=guideLi.size()-1 }
        if(index>=guideLi.size()){ index=0 }
        curBg.stop().animate({ left:curBg.width()*index },300,"swing");
        $("html,body").stop().animate({ scrollLeft:( ($(window).width()+20) *index ) },300,"swing",function(){ direct=0;  });
        guideLi.removeClass("on").eq(index).addClass("on");
    }
    guideLi.each(function(i){
        $(this).hover( function(){ index=guideLi.index( $(this) ); goToFun(); },function(){} );
    });
    $(window).resize(function(){ resetFun() });
    /* 滚轮事件 */ 
    var scrollFunc=function(e){ 
        e=e || window.event; 
        if(e.wheelDelta){ direct+= (-e.wheelDelta/120); }else if(e.detail){ direct+=e.detail/3 ; } 
        if( direct>=8 ){ goToFun( index++ ) }
        if( direct<=-8 ){ goToFun( index-- ) }
    } 
    if( document.addEventListener){ document.addEventListener('DOMMouseScroll',scrollFunc,false); }
     window.onmousewheel=document.onmousewheel=scrollFunc; 
})(jQuery);
</script>