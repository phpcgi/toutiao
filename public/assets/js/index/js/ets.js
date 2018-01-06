
var goodObj=ro();
   	var id=goodObj.id;
// 	alert(id)
//----------------------循环头部----------------------

 $.ajax({
         type : "post",
         url : "/apiweb/ad/info",    //请求发送到TestServlet处
         data : {id:id},
         success : function(result) {
         	console.log(result)
         	var str2='';
         	str2+='<div class="g_xqcl">'
         		  +	'<img src="'+result.data.info.avatar_url+'" />'
         		  +	'</div>'
         		  +	'<div class="g_xqcr">'
         		  +		'<p class="top">'+result.data.info.name+'</p>'
         		  +		'<p class="bottom">'+result.data.Word.description+'</p>'
         		  +	'</div>'
         	$('.ttxq_t').html(str2)
         	$('.fens').html(result.data.info.sum_fans_count)//粉丝量
         	var yud=parseInt(result.data.info.R)
         	$('.yuedu').html(yud)//平均阅读量
         	console.log(result.data.info.genre)
         	var leib=result.data.info.genre
         	var str5=''
				  for(var key in leib){
                  	str5+='<p class="num1">'+key+'</p>'
				  }
			$('.leib').html(str5)
			$('.num1:first-of-type').css("font-size","19px")
//-------------------相似账号推荐----------------------

         	var nu=result.data.similarity;
         	console.log(nu)
         	if(nu.length>4){
         		var n=nu.slice(0,4)
         	}else{
         		var n=nu;
         	}
         	
         	console.log(n)
         	var str4=''
			$(n).each(function(i,ii){
         		str4+='<li>'
         			+	'<div class="tu2">'
         			+	'<img src="'+ii.avatar+'" />'
         			+	'</div>'
         			+	'<p class="name2">'+ii.nickname+'</p>'
         			+	'</li>'
			})
         	$('.tuijian').html(str4)
         	
  //---------------------------------词云-----------------------------------
  		var cy=result.data.Word.word_cloud
  		console.log(result.data.Word.word_cloud)
  		var word_array=[]
  		  for(var key in cy){
  		  	
  		  	  word_array.push({text: key, weight: cy[key]})
  		  	

              }
  		

 
      $(function() {
        // When DOM is ready, select the container element and call the jQCloud method, passing the array of words as the first argument.
        $("#example").jQCloud(word_array);
      });
         	
         	
         	
         	
         }
 })
 
 //--------------------------------按月按年-------------------------------------
 	
  
	
//--------------------------------	切换--------------------------------------
var contentItem = $('.content-item');
$('.shouq').click(function(){
		$(this).addClass('active')
	$(this).siblings().removeClass('active');
	
		contentItem.eq( $(this).index() ).addClass('ctive').siblings().removeClass('ctive');
	})

   var type;
   $('.yue').css("display","none")
	$('.ayue1').click(function(){
//		$(this).addClass( "jctive" ).siblings().removeClass("jctive");
//		var b=$(this).html() 
			$('.ayue1').addClass( "jctive" )
			$('.ayue2').removeClass("jctive");
			$('.yue').css("display","block")
			$('.zhou').css("display","none")
			$('.yue1').css("display","block")
			$('.zhou1').css("display","none")
			$('.yue2').css("display","block")
			$('.zhou2').css("display","none")
			$('.yue3').css("display","block")
			$('.zhou3').css("display","none")
			$('.yue4').css("display","block")
			$('.zhou4').css("display","none")
		
})
	$('.ayue2').click(function(){
			$('.ayue2').addClass( "jctive" )
			$('.ayue1').removeClass("jctive");
			$('.yue').css("display","none")
			$('.zhou').css("display","block")
			$('.yue1').css("display","none")
			$('.zhou1').css("display","block")
			$('.yue2').css("display","none")
			$('.zhou2').css("display","block")
			$('.yue3').css("display","none")
			$('.zhou3').css("display","block")
			$('.yue4').css("display","none")
			$('.zhou4').css("display","block")
	})


//----------------------------------折线图------------------------------------


var line = echarts.init(document.getElementById('line'));
line.setOption({
    color:["#32d2c9"],
    title: {
        x: 'left',
        text: '趋势图',
        textStyle: {
            fontSize: '18',
            color: '#4c4c4c',
            fontWeight: 'bolder'
        }
    },
    tooltip: {
        trigger: 'axis' 
    },
    toolbox: {
        show: true,
        feature: {
            dataZoom: {
                yAxisIndex: 'none'
            },
            dataView: {readOnly: false},
            magicType: {type: ['line', 'bar']}
        }
    },
    xAxis:  {
        type: 'category',
        boundaryGap: false,
        data: ['周一','周二','周三','周四','周五','周六','周日'],
        axisLabel: {
            interval:0
        }
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'成绩',
            type:'line',
            data:[23, 42, 18, 45, 48, 49,100]
//          markLine: {data: [{type: 'average', name: '平均值'}]} 
        }
    ]
}) ;
line.showLoading();    //数据加载完之前先显示一段简单的loading动画
         
         var names=[];    //类别数组（实际用来盛放X轴坐标值）
         var nums=[];    //销量数组（实际用来盛放Y坐标值）
         
      
	
         
         $.ajax({
         type : "post",
         async : true,            //异步请求（同步请求将会锁住浏览器，用户其他操作必须等待请求完成才可以执行）
         url : "/apiweb/ad/info/chart",    //请求发送到TestServlet处
         data : {id:id,type:1},
         dataType : "json",        //返回数据形式为json
         success : function(result) {
         	var a=result.data.chuanbo
         	console.log(a)
             //请求成功时执行该函数内容，result即为服务器返回的json对象
             if (result) {
//                  for(var i=0;i<a.length;i++){       
//                     names.push(a[i].name);//挨个取出类别并填入类别数组
//                   }
                  for(var key in a){
                  	names.push(key)
                  	var b;
                  	if(a[key]==null){
                  		b="0"
                  		
                  	}else{
                  		b=a[key]
                  	}
//                	alert(b)
                  	nums.push(b)
                  	
//                	console.log(b.length)
//                	console.log(names[names.length-1])
//  					names=names[names.length-1]
					}
//                  for(var i=0;i<a.length;i++){       
//                      nums.push(a[i].num);    //挨个取出销量并填入销量数组
//                    }
                    line.hideLoading();    //隐藏加载动画
                    line.setOption({        //加载数据图表
								xAxis: {
                            data: names
                        },
                        series: [{
                            // 根据名字对应到相应的系列
                            name: '',
                            data: nums
                        }]
                    });
                    
             }
         
        },
        error : function(errorMsg) {
             //请求失败时执行该函数
         alert("图表请求数据失败!");
         line.hideLoading();
         }
    })
         
         
         //按周
         var linee = echarts.init(document.getElementById('linee'));
linee.setOption({
    color:["#32d2c9"],
    title: {
        x: 'left',
        text: '趋势图',
        textStyle: {
            fontSize: '18',
            color: '#4c4c4c',
            fontWeight: 'bolder'
        }
    },
    tooltip: {
        trigger: 'axis' 
    },
    toolbox: {
        show: true,
        feature: {
            dataZoom: {
                yAxisIndex: 'none'
            },
            dataView: {readOnly: false},
            magicType: {type: ['line', 'bar']}
        }
    },
    xAxis:  {
        type: 'category',
        boundaryGap: false,
        data: ['周一','周二','周三','周四','周五','周六','周日'],
        axisLabel: {
            interval:0
        }
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'成绩',
            type:'line',
            data:[23, 42, 18, 45, 48, 49,100]
//          markLine: {data: [{type: 'average', name: '平均值'}]} 
        }
    ]
}) ;
linee.showLoading();    //数据加载完之前先显示一段简单的loading动画
         
         var namese=[];    //类别数组（实际用来盛放X轴坐标值）
         var numse=[];    //销量数组（实际用来盛放Y坐标值）
         
      
	
         
         $.ajax({
         type : "post",
         async : true,            //异步请求（同步请求将会锁住浏览器，用户其他操作必须等待请求完成才可以执行）
         url : "/apiweb/ad/info/chart",    //请求发送到TestServlet处
         data : {id:id,type:2},
         dataType : "json",        //返回数据形式为json
         success : function(result) {
         	var a=result.data.chuanbo
         	console.log(a)
             //请求成功时执行该函数内容，result即为服务器返回的json对象
             if (result) {
//                  for(var i=0;i<a.length;i++){       
//                     names.push(a[i].name);//挨个取出类别并填入类别数组
//                   }
                  for(var key in a){
                  	namese.push(key)
                  	var b;
                  	if(a[key]==null){
                  		b="0"
                  		
                  	}else{
                  		b=a[key]
                  	}
//                	alert(b)
                  	numse.push(b)
                  	
//                	console.log(b.length)
//                	console.log(names[names.length-1])
//  					names=names[names.length-1]
					}
//                  for(var i=0;i<a.length;i++){       
//                      nums.push(a[i].num);    //挨个取出销量并填入销量数组
//                    }
                    linee.hideLoading();    //隐藏加载动画
                    linee.setOption({        //加载数据图表
								xAxis: {
                            data: namese
                        },
                        series: [{
                            // 根据名字对应到相应的系列
                            name: '',
                            data: numse
                        }]
                    });
                    
             }
         
        },
        error : function(errorMsg) {
             //请求失败时执行该函数
         alert("图表请求数据失败!");
         linee.hideLoading();
         }
    })
         
       $('.yue1').css("display","none")
    $('.aaan1').click(function(){
//		$(this).addClass( "jctive" ).siblings().removeClass("jctive");
//		var b=$(this).html() 
			$(this).addClass( "jctive" )
			$('.aaan2').removeClass("jctive");
			$('.yue1').css("display","none")
			$('.zhou1').css("display","block")
		
})
	$('.aaan2').click(function(){
			$(this).addClass( "jctive" )
			$('.aaan1').removeClass("jctive");
			
			$('.yue1').css("display","block")
			$('.zhou1').css("display","none")
	})     
         
         
        
  //------------------------------------------折线图2------------------------------------------------------

	var line1 = echarts.init(document.getElementById('line1'));
line1.setOption({
    color:["#32d2c9"],
    title: {
        x: 'left',
        text: '趋势图',
        textStyle: {
            fontSize: '18',
            color: '#4c4c4c',
            fontWeight: 'bolder'
        }
    },
    tooltip: {
        trigger: 'axis' 
    },
    toolbox: {
        show: true,
        feature: {
            dataZoom: {
                yAxisIndex: 'none'
            },
            dataView: {readOnly: false},
            magicType: {type: ['line', 'bar']}
        }
    },
    xAxis:  {
        type: 'category',
        boundaryGap: false,
        data: ['周一','周二','周三','周四','周五','周六','周日'],
        axisLabel: {
            interval:0
        }
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'成绩',
            type:'line',
            data:[23, 42, 18, 45, 48, 49,100]
//          markLine: {data: [{type: 'average', name: '平均值'}]} 
        }
    ]
}) ;
line1.showLoading();    //数据加载完之前先显示一段简单的loading动画

//var a;
//$('.aaan1').click(function(){
//	a=1;
//})
//$('.aaan2').click(function(){
//	a=1;
//})
//     console.log  
         var names1=[];    //类别数组（实际用来盛放X轴坐标值）
         var nums1=[];    //销量数组（实际用来盛放Y坐标值）
         
         $.ajax({
         type : "post",
         async : true,            //异步请求（同步请求将会锁住浏览器，用户其他操作必须等待请求完成才可以执行）
         url : "/apiweb/ad/info/chart",    //请求发送到TestServlet处
         data : {id:id,type:1},
         dataType : "json",        //返回数据形式为json
         success : function(result) {
         	var a=result.data.yuedu
         	console.log(result.data)
             //请求成功时执行该函数内容，result即为服务器返回的json对象
             if (result) {
//                  for(var i=0;i<a.length;i++){       
//                     names.push(a[i].name);//挨个取出类别并填入类别数组
//                   }
                  for(var key in a){
                  	names1.push(key)
                  	var b;
                  	if(a[key]==null){
                  		b="0"
                  		
                  	}else{
                  		b=a[key]
                  	}
//                	alert(b)
                  	nums1.push(b)
                  	
//                	console.log(b.length)
//                	console.log(names[names.length-1])
//  					names=names[names.length-1]
					}
//                  for(var i=0;i<a.length;i++){       
//                      nums.push(a[i].num);    //挨个取出销量并填入销量数组
//                    }
                    line1.hideLoading();    //隐藏加载动画
                    line1.setOption({        //加载数据图表
								xAxis: {
                            data: names1
                        },
                        series: [{
                            // 根据名字对应到相应的系列
                            name: '',
                            data: nums1
                        }]
                    });
                    
             }
         
        },
        error : function(errorMsg) {
             //请求失败时执行该函数
         alert("图表请求数据失败!");
         line1.hideLoading();
         }
    })
         
         
         
         //---------------------按月-------------------------
         	var line1e = echarts.init(document.getElementById('line1e'));
line1e.setOption({
    color:["#32d2c9"],
    title: {
        x: 'left',
        text: '趋势图',
        textStyle: {
            fontSize: '18',
            color: '#4c4c4c',
            fontWeight: 'bolder'
        }
    },
    tooltip: {
        trigger: 'axis' 
    },
    toolbox: {
        show: true,
        feature: {
            dataZoom: {
                yAxisIndex: 'none'
            },
            dataView: {readOnly: false},
            magicType: {type: ['line', 'bar']}
        }
    },
    xAxis:  {
        type: 'category',
        boundaryGap: false,
        data: ['周一','周二','周三','周四','周五','周六','周日'],
        axisLabel: {
            interval:0
        }
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'成绩',
            type:'line',
            data:[23, 42, 18, 45, 48, 49,100]
//          markLine: {data: [{type: 'average', name: '平均值'}]} 
        }
    ]
}) ;
line1e.showLoading();    //数据加载完之前先显示一段简单的loading动画

//var a;
//$('.aaan1').click(function(){
//	a=1;
//})
//$('.aaan2').click(function(){
//	a=1;
//})
//     console.log  
         var names1e=[];    //类别数组（实际用来盛放X轴坐标值）
         var nums1e=[];    //销量数组（实际用来盛放Y坐标值）
         
         $.ajax({
         type : "post",
         async : true,            //异步请求（同步请求将会锁住浏览器，用户其他操作必须等待请求完成才可以执行）
         url : "/apiweb/ad/info/chart",    //请求发送到TestServlet处
         data : {id:id,type:2},
         dataType : "json",        //返回数据形式为json
         success : function(result) {
         	var a=result.data.yuedu
         	console.log(result.data)
             //请求成功时执行该函数内容，result即为服务器返回的json对象
             if (result) {
//                  for(var i=0;i<a.length;i++){       
//                     names.push(a[i].name);//挨个取出类别并填入类别数组
//                   }
                  for(var key in a){
                  	names1e.push(key)
                  	var b;
                  	if(a[key]==null){
                  		b="0"
                  		
                  	}else{
                  		b=a[key]
                  	}
//                	alert(b)
                  	nums1e.push(b)
                  	
//                	console.log(b.length)
//                	console.log(names[names.length-1])
//  					names=names[names.length-1]
					}
//                  for(var i=0;i<a.length;i++){       
//                      nums.push(a[i].num);    //挨个取出销量并填入销量数组
//                    }
                    line1e.hideLoading();    //隐藏加载动画
                    line1e.setOption({        //加载数据图表
								xAxis: {
                            data: names1e
                        },
                        series: [{
                            // 根据名字对应到相应的系列
                            name: '',
                            data: nums1e
                        }]
                    });
                    
             }
         
        },
        error : function(errorMsg) {
             //请求失败时执行该函数
         alert("图表请求数据失败!");
         line1e.hideLoading();
         }
    })
         
         
         
         
         
             $('.yue2').css("display","none")
    $('.antime1').click(function(){
//		$(this).addClass( "jctive" ).siblings().removeClass("jctive");
//		var b=$(this).html() 
			$(this).addClass( "jctive" )
			$('.antime2').removeClass("jctive");
			$('.yue2').css("display","none")
			$('.zhou2').css("display","block")
		
})
	$('.antime2').click(function(){
			$(this).addClass( "jctive" )
			$('.antime1').removeClass("jctive");
			
			$('.yue2').css("display","block") 
			$('.zhou2').css("display","none")
	})     
         
         
         //---------------------------------------折线图3-----------------------------------------------------

	var line2 = echarts.init(document.getElementById('line2'));
line2.setOption({
    color:["#32d2c9"],
    title: {
        x: 'left',
        text: '趋势图',
        textStyle: {
            fontSize: '18',
            color: '#4c4c4c',
            fontWeight: 'bolder'
        }
    },
    tooltip: {
        trigger: 'axis' 
    },
    toolbox: {
        show: true,
        feature: {
            dataZoom: {
                yAxisIndex: 'none'
            },
            dataView: {readOnly: false},
            magicType: {type: ['line', 'bar']}
        }
    },
    xAxis:  {
        type: 'category',
        boundaryGap: false,
        data: ['周一','周二','周三','周四','周五','周六','周日'],
        axisLabel: {
            interval:0
        }
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'成绩',
            type:'line',
            data:[23, 42, 18, 45, 48, 49,100]
//          markLine: {data: [{type: 'average', name: '平均值'}]} 
        }
    ]
}) ;
line2.showLoading();    //数据加载完之前先显示一段简单的loading动画
         
         var names2=[];    //类别数组（实际用来盛放X轴坐标值）
         var nums2=[];    //销量数组（实际用来盛放Y坐标值）
         
         $.ajax({
         type : "post",
         async : true,            //异步请求（同步请求将会锁住浏览器，用户其他操作必须等待请求完成才可以执行）
         url : "/apiweb/ad/info/chart",    //请求发送到TestServlet处
         data : {id:id,type:1},
         dataType : "json",        //返回数据形式为json
         success : function(result) {
         	var a=result.data.pinglun
         	console.log(a)
             //请求成功时执行该函数内容，result即为服务器返回的json对象
             if (result) {
//                  for(var i=0;i<a.length;i++){       
//                     names.push(a[i].name);//挨个取出类别并填入类别数组
//                   }
                  for(var key in a){
                  	names2.push(key)
                  	var b;
                  	if(a[key]==null){
                  		b="0"
                  		
                  	}else{
                  		b=a[key]
                  	}
//                	alert(b)
                  	nums2.push(b)
                  	
//                	console.log(b.length)
//                	console.log(names[names.length-1])
//  					names=names[names.length-1]
					}
//                  for(var i=0;i<a.length;i++){       
//                      nums.push(a[i].num);    //挨个取出销量并填入销量数组
//                    }
                    line2.hideLoading();    //隐藏加载动画
                    line2.setOption({        //加载数据图表
								xAxis: {
                            data: names2
                        },
                        series: [{
                            // 根据名字对应到相应的系列
                            name: '',
                            data: nums2
                        }]
                    });
                    
             }
         
        },
        error : function(errorMsg) {
             //请求失败时执行该函数
         alert("图表请求数据失败!");
         line2.hideLoading();
         }
    })
     
     //----------------------按月-------------------------
     	var line2e = echarts.init(document.getElementById('line2e'));
line2e.setOption({
    color:["#32d2c9"],
    title: {
        x: 'left',
        text: '趋势图',
        textStyle: {
            fontSize: '18',
            color: '#4c4c4c',
            fontWeight: 'bolder'
        }
    },
    tooltip: {
        trigger: 'axis' 
    },
    toolbox: {
        show: true,
        feature: {
            dataZoom: {
                yAxisIndex: 'none'
            },
            dataView: {readOnly: false},
            magicType: {type: ['line', 'bar']}
        }
    },
    xAxis:  {
        type: 'category',
        boundaryGap: false,
        data: ['周一','周二','周三','周四','周五','周六','周日'],
        axisLabel: {
            interval:0
        }
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'成绩',
            type:'line',
            data:[23, 42, 18, 45, 48, 49,100]
//          markLine: {data: [{type: 'average', name: '平均值'}]} 
        }
    ]
}) ;
line2e.showLoading();    //数据加载完之前先显示一段简单的loading动画
         
         var names2e=[];    //类别数组（实际用来盛放X轴坐标值）
         var nums2e=[];    //销量数组（实际用来盛放Y坐标值）
         
         $.ajax({
         type : "post",
         async : true,            //异步请求（同步请求将会锁住浏览器，用户其他操作必须等待请求完成才可以执行）
         url : "/apiweb/ad/info/chart",    //请求发送到TestServlet处
         data : {id:id,type:2},
         dataType : "json",        //返回数据形式为json
         success : function(result) {
         	var a=result.data.pinglun
         	console.log(a)
             //请求成功时执行该函数内容，result即为服务器返回的json对象
             if (result) {
//                  for(var i=0;i<a.length;i++){       
//                     names.push(a[i].name);//挨个取出类别并填入类别数组
//                   }
                  for(var key in a){
                  	names2e.push(key)
                  	var b;
                  	if(a[key]==null){
                  		b="0"
                  		
                  	}else{
                  		b=a[key]
                  	}
//                	alert(b)
                  	nums2e.push(b)
                  	
//                	console.log(b.length)
//                	console.log(names[names.length-1])
//  					names=names[names.length-1]
					}
//                  for(var i=0;i<a.length;i++){       
//                      nums.push(a[i].num);    //挨个取出销量并填入销量数组
//                    }
                    line2e.hideLoading();    //隐藏加载动画
                    line2e.setOption({        //加载数据图表
								xAxis: {
                            data: names2e
                        },
                        series: [{
                            // 根据名字对应到相应的系列
                            name: '',
                            data: nums2e
                        }]
                    });
                    
             }
         
        },
        error : function(errorMsg) {
             //请求失败时执行该函数
         alert("图表请求数据失败!");
         line2e.hideLoading();
         }
    })

         $('.yue3').css("display","none")
    $('.zhouqi1').click(function(){
//		$(this).addClass( "jctive" ).siblings().removeClass("jctive");
//		var b=$(this).html() 
			$(this).addClass( "jctive" )
			$('.zhouqi2').removeClass("jctive");
			$('.yue3').css("display","none")
			$('.zhou3').css("display","block")
		
}) 
	$('.zhouqi2').click(function(){
			$(this).addClass( "jctive" )
			$('.zhouqi1').removeClass("jctive");
			
			$('.yue3').css("display","block")
			$('.zhou3').css("display","none")
	})     
//---------------------------------------------折线图4--------------------------------------------------------

var line3 = echarts.init(document.getElementById('line3'));
line3.setOption({
    color:["#32d2c9"],
    title: {
        x: 'left',
        text: '趋势图',
        textStyle: {
            fontSize: '18',
            color: '#4c4c4c',
            fontWeight: 'bolder'
        }
    },
    tooltip: {
        trigger: 'axis' 
    },
    toolbox: {
        show: true,
        feature: {
            dataZoom: {
                yAxisIndex: 'none'
            },
            dataView: {readOnly: false},
            magicType: {type: ['line', 'bar']}
        }
    },
    xAxis:  {
        type: 'category',
        boundaryGap: false,
        data: ['周一','周二','周三','周四','周五','周六','周日'],
        axisLabel: {
            interval:0
        }
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'成绩',
            type:'line',
            data:[23, 42, 18, 45, 48, 49,100]
//          markLine: {data: [{type: 'average', name: '平均值'}]} 
        }
    ]
}) ;
line3.showLoading();    //数据加载完之前先显示一段简单的loading动画
         
         var names3=[];    //类别数组（实际用来盛放X轴坐标值）
         var nums3=[];    //销量数组（实际用来盛放Y坐标值）
         
         $.ajax({
         type : "post",
         async : true,            //异步请求（同步请求将会锁住浏览器，用户其他操作必须等待请求完成才可以执行）
         url : "/apiweb/ad/info/chart",    //请求发送到TestServlet处
         data : {id:id,type:1},
         dataType : "json",        //返回数据形式为json
         success : function(result) {
         	var a=result.data.fans
         	console.log(a)
             //请求成功时执行该函数内容，result即为服务器返回的json对象
             if (result) {
//                  for(var i=0;i<a.length;i++){       
//                     names.push(a[i].name);//挨个取出类别并填入类别数组
//                   }
                  for(var key in a){
                  	names3.push(key)
                  	var b;
                  	if(a[key]==null){
                  		b="0"
                  		
                  	}else{
                  		b=a[key]
                  	}
//                	alert(b)
                  	nums3.push(b)
                  	
//                	console.log(b.length)
//                	console.log(names[names.length-1])
//  					names=names[names.length-1]
					}
//                  for(var i=0;i<a.length;i++){       
//                      nums.push(a[i].num);    //挨个取出销量并填入销量数组
//                    }
                    line3.hideLoading();    //隐藏加载动画
                    line3.setOption({        //加载数据图表
								xAxis: {
                            data: names3
                        },
                        series: [{
                            // 根据名字对应到相应的系列
                            name: '',
                            data: nums3
                        }]
                    });
                    
             }
         
        },
        error : function(errorMsg) {
             //请求失败时执行该函数
         alert("图表请求数据失败!");
         line3.hideLoading();
         }
    })
         
         
         
   //--------------------------按月-----------------------
   var line3e = echarts.init(document.getElementById('line3e'));
line3e.setOption({
    color:["#32d2c9"],
    title: {
        x: 'left',
        text: '趋势图',
        textStyle: {
            fontSize: '18',
            color: '#4c4c4c',
            fontWeight: 'bolder'
        }
    },
    tooltip: {
        trigger: 'axis' 
    },
    toolbox: {
        show: true,
        feature: {
            dataZoom: {
                yAxisIndex: 'none'
            },
            dataView: {readOnly: false},
            magicType: {type: ['line', 'bar']}
        }
    },
    xAxis:  {
        type: 'category',
        boundaryGap: false,
        data: ['周一','周二','周三','周四','周五','周六','周日'],
        axisLabel: {
            interval:0
        }
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'成绩',
            type:'line',
            data:[23, 42, 18, 45, 48, 49,100]
//          markLine: {data: [{type: 'average', name: '平均值'}]} 
        }
    ]
}) ;
line3e.showLoading();    //数据加载完之前先显示一段简单的loading动画
         
         var names3e=[];    //类别数组（实际用来盛放X轴坐标值）
         var nums3e=[];    //销量数组（实际用来盛放Y坐标值）
         
         $.ajax({
         type : "post",
         async : true,            //异步请求（同步请求将会锁住浏览器，用户其他操作必须等待请求完成才可以执行）
         url : "/apiweb/ad/info/chart",    //请求发送到TestServlet处
         data : {id:id,type:2},
         dataType : "json",        //返回数据形式为json
         success : function(result) {
         	var a=result.data.fans
         	console.log(a)
             //请求成功时执行该函数内容，result即为服务器返回的json对象
             if (result) {
//                  for(var i=0;i<a.length;i++){       
//                     names.push(a[i].name);//挨个取出类别并填入类别数组
//                   }
                  for(var key in a){
                  	names3e.push(key)
                  	var b;
                  	if(a[key]==null){
                  		b="0"
                  		
                  	}else{
                  		b=a[key]
                  	}
//                	alert(b)
                  	nums3e.push(b)
                  	
//                	console.log(b.length)
//                	console.log(names[names.length-1])
//  					names=names[names.length-1]
					}
//                  for(var i=0;i<a.length;i++){       
//                      nums.push(a[i].num);    //挨个取出销量并填入销量数组
//                    }
                    line3e.hideLoading();    //隐藏加载动画
                    line3e.setOption({        //加载数据图表
								xAxis: {
                            data: names3e
                        },
                        series: [{
                            // 根据名字对应到相应的系列
                            name: '',
                            data: nums3e
                        }]
                    });
                    
             }
         
        },
        error : function(errorMsg) {
             //请求失败时执行该函数
         alert("图表请求数据失败!");
         line3e.hideLoading();
         }
    })
     
     
     
     
          $('.yue4').css("display","none")
    $('.fawen1').click(function(){
//		$(this).addClass( "jctive" ).siblings().removeClass("jctive");
//		var b=$(this).html() 
			$(this).addClass( "jctive" )
			$('.fawen2').removeClass("jctive");
			$('.yue4').css("display","none")
			$('.zhou4').css("display","block")
		
})
	$('.fawen2').click(function(){
			$(this).addClass( "jctive" )
			$('.fawen1').removeClass("jctive");
			
			$('.yue4').css("display","block")
			$('.zhou4').css("display","none")
	})     

//-------------------------------------------折线5-----------------------------------------------

var line4 = echarts.init(document.getElementById('line4'));
line4.setOption({
    color:["#32d2c9"],
    title: {
        x: 'left',
        text: '趋势图',
        textStyle: {
            fontSize: '18',
            color: '#4c4c4c',
            fontWeight: 'bolder'
        }
    },
    tooltip: {
        trigger: 'axis' 
    },
    toolbox: {
        show: true,
        feature: {
            dataZoom: {
                yAxisIndex: 'none'
            },
            dataView: {readOnly: false},
            magicType: {type: ['line', 'bar']}
        }
    },
    xAxis:  {
        type: 'category',
        boundaryGap: false,
        data: ['周一','周二','周三','周四','周五','周六','周日'],
        axisLabel: {
            interval:0
        }
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'成绩',
            type:'line',
            data:[23, 42, 18, 45, 48, 49,100]
//          markLine: {data: [{type: 'average', name: '平均值'}]} 
        }
    ]
}) ;
line4.showLoading();    //数据加载完之前先显示一段简单的loading动画
         
         var names4=[];    //类别数组（实际用来盛放X轴坐标值）
         var nums4=[];    //销量数组（实际用来盛放Y坐标值）
         
         $.ajax({
         type : "post",
         async : true,            //异步请求（同步请求将会锁住浏览器，用户其他操作必须等待请求完成才可以执行）
         url : "/apiweb/ad/info/chart",    //请求发送到TestServlet处
         data : {id:id,type:1},
         dataType : "json",        //返回数据形式为json
         success : function(result) {
         	var a=result.data.fawen
         	console.log(a)
             //请求成功时执行该函数内容，result即为服务器返回的json对象
             if (result) {
//                  for(var i=0;i<a.length;i++){       
//                     names.push(a[i].name);//挨个取出类别并填入类别数组
//                   }
                  for(var key in a){
                  	names4.push(key)
                  	var b;
                  	if(a[key]==null){
                  		b="0"
                  		
                  	}else{
                  		b=a[key]
                  	}
//                	alert(b)
                  	nums4.push(b)
                  	
//                	console.log(b.length)
//                	console.log(names[names.length-1])
//  					names=names[names.length-1]
					}
//                  for(var i=0;i<a.length;i++){       
//                      nums.push(a[i].num);    //挨个取出销量并填入销量数组
//                    }
                    line4.hideLoading();    //隐藏加载动画
                    line4.setOption({        //加载数据图表
								xAxis: {
                            data: names4
                        },
                        series: [{
                            // 根据名字对应到相应的系列
                            name: '',
                            data: nums4
                        }]
                    });
                    
             }
         
        },
        error : function(errorMsg) {
             //请求失败时执行该函数
         alert("图表请求数据失败!");
         line4.hideLoading();
         }
    })
 
 //-------------------按月----------------------------------
 
 var line4e = echarts.init(document.getElementById('line4e'));
line4e.setOption({
    color:["#32d2c9"],
    title: {
        x: 'left',
        text: '趋势图',
        textStyle: {
            fontSize: '18',
            color: '#4c4c4c',
            fontWeight: 'bolder'
        }
    },
    tooltip: {
        trigger: 'axis' 
    },
    toolbox: {
        show: true,
        feature: {
            dataZoom: {
                yAxisIndex: 'none'
            },
            dataView: {readOnly: false},
            magicType: {type: ['line', 'bar']}
        }
    },
    xAxis:  {
        type: 'category',
        boundaryGap: false,
        data: ['周一','周二','周三','周四','周五','周六','周日'],
        axisLabel: {
            interval:0
        }
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'成绩',
            type:'line',
            data:[23, 42, 18, 45, 48, 49,100]
//          markLine: {data: [{type: 'average', name: '平均值'}]} 
        }
    ]
}) ;
line4e.showLoading();    //数据加载完之前先显示一段简单的loading动画
         
         var names4e=[];    //类别数组（实际用来盛放X轴坐标值）
         var nums4e=[];    //销量数组（实际用来盛放Y坐标值）
         
         $.ajax({
         type : "post",
         async : true,            //异步请求（同步请求将会锁住浏览器，用户其他操作必须等待请求完成才可以执行）
         url : "/apiweb/ad/info/chart",    //请求发送到TestServlet处
         data : {id:id,type:2},
         dataType : "json",        //返回数据形式为json
         success : function(result) {
         	var a=result.data.fawen
         	console.log(a)
             //请求成功时执行该函数内容，result即为服务器返回的json对象
             if (result) {
//                  for(var i=0;i<a.length;i++){       
//                     names.push(a[i].name);//挨个取出类别并填入类别数组
//                   }
                  for(var key in a){
                  	names4e.push(key)
                  	var b;
                  	if(a[key]==null){
                  		b="0"
                  		
                  	}else{
                  		b=a[key]
                  	}
//                	alert(b)
                  	nums4e.push(b)
                  	
//                	console.log(b.length)
//                	console.log(names[names.length-1])
//  					names=names[names.length-1]
					}
//                  for(var i=0;i<a.length;i++){       
//                      nums.push(a[i].num);    //挨个取出销量并填入销量数组
//                    }
                    line4e.hideLoading();    //隐藏加载动画
                    line4e.setOption({        //加载数据图表
								xAxis: {
                            data: names4e
                        },
                        series: [{
                            // 根据名字对应到相应的系列
                            name: '',
                            data: nums4e
                        }]
                    });
                    
             }
         
        },
        error : function(errorMsg) {
             //请求失败时执行该函数
         alert("图表请求数据失败!");
         line4e.hideLoading();
         }
    })

 
 
 
 
 
 
 
 
 
//a=line
function zhe(line,names,nums){
		var line = echarts.init(document.getElementById('line'));
line.setOption({
    color:["#32d2c9"],
    title: {
        x: 'left',
        text: '趋势图',
        textStyle: {
            fontSize: '18',
            color: '#4c4c4c',
            fontWeight: 'bolder'
        }
    },
    tooltip: {
        trigger: 'axis' 
    },
    toolbox: {
        show: true,
        feature: {
            dataZoom: {
                yAxisIndex: 'none'
            },
            dataView: {readOnly: false},
            magicType: {type: ['line', 'bar']}
        }
    },
    xAxis:  {
        type: 'category',
        boundaryGap: false,
        data: ['周一','周二','周三','周四','周五','周六','周日'],
        axisLabel: {
            interval:0
        }
    },
    yAxis: {
        type: 'value'
    },
    series: [
        {
            name:'成绩',
            type:'line',
            data:[23, 42, 18, 45, 48, 49,100]
//          markLine: {data: [{type: 'average', name: '平均值'}]} 
        }
    ]
}) ;
line.showLoading();    //数据加载完之前先显示一段简单的loading动画
         
         var names=[];    //类别数组（实际用来盛放X轴坐标值）
         var nums=[];    //销量数组（实际用来盛放Y坐标值）
         
      
	
         
         $.ajax({
         type : "post",
         async : true,            //异步请求（同步请求将会锁住浏览器，用户其他操作必须等待请求完成才可以执行）
         url : "/apiweb/ad/info/chart",    //请求发送到TestServlet处
         data : {id:id,type:1},
         dataType : "json",        //返回数据形式为json
         success : function(result) {
         	var a=result.data.chuanbo
         	console.log(a)
             //请求成功时执行该函数内容，result即为服务器返回的json对象
             if (result) {
//                  for(var i=0;i<a.length;i++){       
//                     names.push(a[i].name);//挨个取出类别并填入类别数组
//                   }
                  for(var key in a){
                  	names.push(key)
                  	var b;
                  	if(a[key]==null){
                  		b="0"
                  		
                  	}else{
                  		b=a[key]
                  	}
//                	alert(b)
                  	nums.push(b)
                  	
//                	console.log(b.length)
//                	console.log(names[names.length-1])
//  					names=names[names.length-1]
					}
//                  for(var i=0;i<a.length;i++){       
//                      nums.push(a[i].num);    //挨个取出销量并填入销量数组
//                    }
                    line.hideLoading();    //隐藏加载动画
                    line.setOption({        //加载数据图表
								xAxis: {
                            data: names
                        },
                        series: [{
                            // 根据名字对应到相应的系列
                            name: '',
                            data: nums
                        }]
                    });
                    
             }
         
        },
        error : function(errorMsg) {
             //请求失败时执行该函数
         alert("图表请求数据失败!");
         line.hideLoading();
         }
    })
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