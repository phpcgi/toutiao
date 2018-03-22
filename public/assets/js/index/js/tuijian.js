
		//-------------------------默认数据---------------------------	
function lei0(){
	alert("点击");
	document.getElementById('lei0').value="idsnfsadlfjasdgiosdjfasdf";
			$.ajax( {  
		                type : "GET",  
		                url : "/apiweb/ad/xs",  
		                data: ss,
		                success : function(msg) {
				                	var str2=str(msg.data)
				                	$('.co_n').html(str2)
				                	$('.zongye').html(msg.count) 
				                	gouwuche()
				                	shoucang()
				                	xiangqing()
				                	var zong=msg.count;
				                	var meiye=msg.page;
				                	var yeshu=Math.ceil(zong/meiye)
								fenye(yeshu)
								if(yeshu<="1"){
									yeshu=0
									fenye(0)
								}
		                }
		      	})
		      	
}
//------------拼接字符串-------------------
	function str(data){
		var str = "";
	    $(data).each(function(i,ii){
	        console.log(ii)
	        str+='<ul class="ggc_t2">'
	            +  	'<li class="g1">'
	        if(ii.is_buy=="1"){
	            str+='<div class="gwc on2_check" data-gid="'+ii.id+'">'
	                +		'<input class="one" type="checkbox" name="cb1">'
	        }else{
	            str+='<div class="gwc" data-gid="'+ii.id+'">'
	                +		'<input class="one" type="checkbox" name="cb1">'
	        }
	        
	        str+=		'</li>'
	            +		'<li class="g2">'
	            +		'<img class="touu" src="'+ii.avatar_url+'" />'
	            +		'<p class="g_r chao"><div id="'+ii.tid+'"></div><a href="http://47.92.49.244/api/linktid/linktid?tid='+ii.tid+'" target="_blank">'+ii.name+'</a></p>'
	            +		'</li>'
	            +		'<li class="g3">'+ii.A4+'</li>'
	            +		'<li class="g4">'+ii.R+'</li>'
	            +		'<li class="g5">'+ii.worth+'</li>'
	            +		'<li class="g6">'+ii.cost+'</li>'
	            +		'<li class="g7" data-tid="'+ii.tid+'">'
	            +		'<img src="/assets/img/xmtxy/chakanxiangqing.png" />'
	            +		'</li>'
	            +		'<li class="g8">'
	        if(ii.is_coll=="1"){
	            str+=		'<div class="shouc on1_check" data-cid="'+ii.tid+'">'
	                +		'<input class="one" type="checkbox" name="cb1">'
	        }else{
	            str+=		'<div class="shouc" data-cid="'+ii.tid+'">'
	                +		'<input class="one" type="checkbox" name="cb1">'
	        }
	        str+='</li>'
	            +	'</ul>'
	    })
		return str;
	}



