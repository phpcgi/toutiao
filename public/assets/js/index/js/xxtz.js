$(function(){
	
	$.ajax( {  
                type : "POST",  
                url : "/apiweb/flux/msg",  
                success : function(msg) {
                console.log(msg)
                	var str1='';
                	$(msg.data).each(function(i,ii){
                		str1+='<li data-gid="'+ii.id+'">'
                			+	'<div class="ling">'
                			if(ii.status=="1"){
                				str1+='<img src="/assets/img/xmtxy/tongzhi-yidu.png" />'
                			}else{
                				str1+='<img src="/assets/img/xmtxy/tongzhi-weidu-.png" />'
                			}
                		str1+='</div>'
                			+	'<div class="xx_con">'
                			+	'<p class="xxc">【系统】'+ii.title+'</p>'
                			+	'</div>'
                			+	'<div class="xx_r">'
                			var a=aa(ii.createtime)
                			str1+=		'<p class="time">'+a+'</p>'
                			+	'</div>'
                			+	'</li>'
                	})
                	
                	$('.xx_list').html(str1)
                	
                	$('.xx_list li').on("click",function(){
//		$(this).find('.xxc').css("color","#888888")
//		$(this).find('img').attr("src","img/xmtxy/tongzhi-yidu.png")
		var gid=$(this).attr("data-gid")
		location.href="Xxxq?gid="+gid;
	})
                	
			}
      })
	
	//时间转换
	function aa(now){
		var timestamp3 = now;
		var newDate = new Date();
		newDate.setTime(timestamp3 * 1000);
		return newDate.toLocaleDateString()
	}
	
	//时间转换 
function   formatDate(now)   {
    var   now= new Date(now);     
    var   year=now.getFullYear();     
    var   month=now.getMonth()+1;     
    var   date=now.getDate();     
    var   hour=now.getHours();
    var   minute=now.getMinutes();     
    var   second=now.getSeconds();
//  return   year+"年"+fixZero(month,2)+"月"+fixZero(date,2)+"日"+fixZero(hour,2)+":"+fixZero(minute,2)+":"+fixZero(second,2);
    return   year+"年"+fixZero(month,2)+"月"+fixZero(date,2)+"日"; 
}  
//时间如果为单位数补0 
function fixZero(num,length){     
    var str=""+num;
    var len=str.length;     var s="";
    for(var i=length;i-->len;){         
        s+="0";
    }
    return s+str;
}
	
	
	
})