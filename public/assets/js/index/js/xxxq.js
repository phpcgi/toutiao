$(function(){
	var goodObj=ro();
   	var id=goodObj.gid;
	
	$.ajax( {  
                type : "POST",  
                url : "/apiweb/flux/msg/add",  
                data:{id:id},
                success : function(msg) {
                console.log(msg)
                	var str1='';
//              	$(msg.data).each(function(i,ii){
//              		
//              	}
		}
    })
                		
        $.ajax({
        	 	type : "POST", 
			url:"/apiweb/ad/msg",
			success:function(msg){
				$(msg.data).each(function(i,ii){
					if(ii.id==goodObj.gid){
						pushData(this)
					}
				})
//				$(".meng").delegate(".head","click",function(){
//				window.history.go(-1)
//				})
			}
		})
		
		function pushData(obj){
			var str1="";
			str1+='<p class="head">【系统】'+obj.title+'</p>'
				+ '<div class="kuang">'+obj.content+'</div>'
				
				
			$('#gaikuang').html(str1)
			        		
          }  		
                
		
                		
                		
                		
                		
                		
                		
                		
                		
                		
                		
                		
                		
                		
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
