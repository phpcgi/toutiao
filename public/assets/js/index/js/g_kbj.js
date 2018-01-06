$(function(){

	
	
	
	
	
	
	
	var goodObj=ro();
   	var ids=goodObj.classid;

	$('.tij').click(function(){
						var xname=$('.xname').val();
						var starttime=$('.starttime').val();
						var endtime=$('.endtime').val();
						var miaoshu=$('.miaoshu').val()
						
						if(xname!=''&&starttime!=''&&endtime!=''){
							$.ajax( {  
				                type : "POST",  
				                url : "/apiweb/ad/Order/orderadd",  
				                data: {title:xname,ids:ids,time:starttime,endtime:endtime,desc:miaoshu},
				                success : function(msg) {  
				                    console.log(msg)
				                   	location.href="Wddd";
				                }  
				           	 });  
						}else{
							alert("请输入完整信息")
						}
						
		})
	
	
	var tuz='';
	
	$('.chuan').change(function(){
//		$('.tu_con').html('')
		$('.tij1').css('display','block')
		$('.tij').css('display','none')
		var formo = new FormData(document.getElementById("form1"));
		
		var files = document.getElementById("inpu").files;
//		console.log(.files.name)
		$.ajax({
        url:'/index/ajax/upload',
//    data: $("#form1").serialize() ,
		data:formo,
         type:'POST', 
          cache: false,  
          contentType: false,  
          processData: false,  
        success:function(data){
        	var jie=data.name.substr((data.name.length-3))
        		console.log(jie)
        		console.log(data.name)
        		
//      		 if(jie=='zip'||jie=='rar'){  

        		
        		var file=data.name;

        		$('.tij1').click(function(){
        				
						var xname=$('.xname').val();
						var starttime=$('.starttime').val();
						var endtime=$('.endtime').val();
						var miaoshu=$('.miaoshu').val()
//						console.log({xname,starttime,endtime,miaoshu,file,b})
						if(xname!=''&&starttime!=''&&endtime!=''){
							$.ajax( {  
				                type : "POST",  
				                url : "/apiweb/ad/Order/orderadd",  
				                data: {title:xname,ids:ids,time:starttime,endtime:endtime,desc:miaoshu,file:file},
				                success : function(msg) {  
				                    console.log(msg)
				                   	location.href="Wddd";
				                }  
				           	 });  
				         }else{
				         	alert("请输入完整信息")
				         }
						
						
					})
        		
        		
//      		}else{
//      			alert('请上传正确的文件格式')
//      			$('.tij1').click(function(){
//      				alert('请上传正确的文件格式')
//      			})
//      		}
        		
        		
        		
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

//多图片
//      		alert()
//      		console.log($('.chuan').val().substr(12))
//      		 tuz=tuz+','+file;
//      		 var htt=''
//      		 htt+='<div class="twk">'
//      		 	  +  '<div class="tu_cc"></div>'
//      		 	  + '<input class="tuxuan" value="'+file+'" type="checkbox" />'
//      		 	  + '</div>'
//      		 
//   		$('.tu_con').append(htt)
        		 
        		 
//     		 var b=tuz.substr(1);
//	       		console.log(b)
//      		$('.tuzhan').html(b)