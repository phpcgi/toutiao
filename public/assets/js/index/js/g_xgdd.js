$(function(){
	
	var goodObj=ro();
   	var ids=goodObj.classid;
	var xid=goodObj.fid;
	
	$.ajax({
		url:'/apiweb/ad/order/info',
		data:{id:xid},
		type:'GET',
		success:function(msg){
			console.log(msg)
			$('.xname').val(msg.data.title)
			$('.starttime').val(msg.data.time)
			$('.endtime').val(msg.data.endtime)
			$('.miaoshu').val(msg.data.desc)
			$('.xian').html(msg.data.attachfile)
		}
	})
	
	
	$('.tij').click(function(){
						var xname=$('.xname').val();
						var starttime=$('.starttime').val();
						var endtime=$('.endtime').val();
						var miaoshu=$('.miaoshu').val()
						var ids=$('.xian').html()
//						console.log({xname,starttime,endtime,miaoshu,file,ids})
						$.ajax( {  
			                type : "POST",  
			                url : "/apiweb/ad/Order/update",  
			                data: {name:xname,time:starttime,endtime:endtime,desc:miaoshu,id:xid,attachfile:ids},
			                success : function(msg) {  
			                    console.log(msg)
			                }  
			            });  
						
						
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
        		console.log(data.name)
        		var file=data.name;
        		$('.tij').click(function(){
						var xname=$('.xname').val();
						var starttime=$('.starttime').val();
						var endtime=$('.endtime').val();
						var miaoshu=$('.miaoshu').val()
						console.log({xname,starttime,endtime,miaoshu,file,ids})
						$.ajax( {  
			                type : "POST",  
			                url : "/apiweb/ad/Order/update",  
			                data: {name:xname,time:starttime,endtime:endtime,desc:miaoshu,id:xid,attachfile:file},
			                success : function(msg) {  
			                    console.log(msg)
			                    if(msg.code=="200"){
									 location.href="Wddd"
								}
			                

			                }  
			            });  
						
						
			})
        }
      })
	})
	
	
	
//	$('.chuan1').change(function(){
//		var formp = new FormData(document.getElementById("form1"));
//		$.ajax({
//		        url:'/index/ajax/upload',
//		//    data: $("#form1").serialize() ,
//				data:formp,
//		         type:'POST', 
//		          cache: false,  
//		          contentType: false,  
//		          processData: false,  
//		       	 success:function(data){
//		      	   console.log(data.name); 
//		  			var pic=data.name;
//					$('.tij').click(function(){
//						var xname=$('.xname').val();
//						var starttime=$('.starttime').val();
//						var endtime=$('.endtime').val();
//						var miaoshu=$('.miaoshu').val()
//						console.log({xname,starttime,endtime,miaoshu,pic,ids})
//					})
//	
//			}
//		
//		})
//	
//	})

	$('.cbg').click(function(){
//	alert("1")
	$('.chuan').click();
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
