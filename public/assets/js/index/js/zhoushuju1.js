$(function(){
	
	$('.summar').click(function(){
			$('.xxk').toggleClass('xianshi')
		})
	var goodObj=ro();
   	var tid=goodObj.tid;
   $.ajax( {  
            type : "POST",  
            url : "/apiweb/flux/info", 
            data:{tid:tid},
            success : function(msg) {
            		console.log(msg)
            		
            }
   })
   	var myDate = new Date();
   var b=myDate.toLocaleDateString()

console.log( b)
$('.zqxz2').html('最新数据更新时间: '+b)
   
   $.ajax( {  
            type : "POST",  
            url : "/apiweb/flux/rank/zhoutime", 
            data:{tid:tid},
            success : function(msg) {
            		console.log(msg)
            		var str='';
            		$(msg.data).each(function(i,ii){
            			str+='<p class="xtime">'+ii.time+'</p>'
            		})
            		$('.xxk').html(str)
            		$('.summar').html(msg.data[0].time)
            		var a=msg.data[0].time
            		
            		$.ajax( {  
					            type : "POST",  
					            url : "/apiweb/flux/rank", 
					            data:{tid:tid,time:a,type:1},
					            success : function(msg) {
					            		console.log(msg)
					            		$('.fensi').html(msg.data.sum_fans_count)
					            		$('.pjscl').html(msg.data.C)
					            		$('.yuedu').html(msg.data.R)
					            		$('.dianzan').html(msg.data.P)
					            		$('.tuijian').html(msg.data.T)
					            		$('.pinglun').html(msg.data.W)
					            		$('.fenxiang').html(msg.data.S)
					            		$('.fapian').html(msg.data.A5)
					            		
					            }
					})
            		
            		$('.xxk p').on("click",function(){
            		
					var a=$(this).html()
//					alert(a)
					$('.summar').html(a)
					$('.xxk').removeClass('xianshi')
					$.ajax( {  
					            type : "POST",  
					            url : "/apiweb/flux/rank", 
					            data:{tid:tid,time:a,type:1},
					            success : function(msg) {
					            		console.log(msg)
					            		$('.fensi').html(msg.data.sum_fans_count)
					            		$('.pjscl').html(msg.data.C)
					            		$('.yuedu').html(msg.data.R)
					            		$('.dianzan').html(msg.data.P)
					            		$('.tuijian').html(msg.data.T)
					            		$('.pinglun').html(msg.data.W)
					            		$('.fenxiang').html(msg.data.S)
					            		$('.fapian').html(msg.data.A5)
					            		
					            }
					})
					
					
					
					
				})
            }
   })
   $('.z_navl').click(function(){
   	$(this).addClass("ziyanse").siblings().removeClass("ziyanse")
   })
   
   $('.fensiliang').click(function(){
   		
   		$(".fensi_k").addClass("nono")
   		$('.shujuu').removeClass("nono")
   		$(".yuedu_k").removeClass("nono")
   		$(".pinglun_k").removeClass("nono")
   })
   $('.gaikuang').click(function(){
   		$(".fensi_k").removeClass("nono")
   		$('.shujuu').addClass("nono")
   		$(".yuedu_k").removeClass("nono")
   			$(".pinglun_k").removeClass("nono")
   })
   $('.yueduliang').click(function(){
   		$(".fensi_k").removeClass("nono")
   		$('.shujuu').removeClass("nono")
   		$(".yuedu_k").addClass("nono")
   			$(".pinglun_k").removeClass("nono")
   })
    $('.pinglunliang').click(function(){
   		$(".fensi_k").removeClass("nono")
   		$('.shujuu').removeClass("nono")
   		$(".yuedu_k").removeClass("nono")
   		$(".pinglun_k").addClass("nono")
   })

   
   
 //------------粉丝量------------------
 
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
         data : {id:tid,type:1},
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
                  	names.push(key)
                  	var b;
                  	if(a[key]==null){
                  		b="0"
                  		
                  	}else{
                  		b=a[key]
                  	}
//                	alert(b)
                  	nums.push(b)
                  	

					}

                    line.hideLoading();    //隐藏加载动画
                    line.setOption({        //加载数据图表
								xAxis: {
                            data: names
                        },
                        series: [{
                            // 根据名字对应到相应的系列
                            name: '新关注人数',
                            data: nums
                        }]
                    });
                    
             }
         
        },
        error : function(errorMsg) {
             //请求失败时执行该函数
         //alert("图表请求数据失败!");
         line.hideLoading();
         }
    })

   //----------------阅读量--------------
   
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
         data : {id:tid,type:1},
         dataType : "json",        //返回数据形式为json
         success : function(result) {
         	var a=result.data.yuedu;
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
                            name: '平均阅读量',
                            data: numse
                        }]
                    });
                    
             }
         
        },
        error : function(errorMsg) {
             //请求失败时执行该函数
        // alert("图表请求数据失败!");
         linee.hideLoading();
         }
    })
   
   
   
     var lineee = echarts.init(document.getElementById('lineee'));
lineee.setOption({
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
lineee.showLoading();    //数据加载完之前先显示一段简单的loading动画
         
         var namesee=[];    //类别数组（实际用来盛放X轴坐标值）
         var numsee=[];    //销量数组（实际用来盛放Y坐标值）
         
      
	
         
         $.ajax({
         type : "post",
         async : true,            //异步请求（同步请求将会锁住浏览器，用户其他操作必须等待请求完成才可以执行）
         url : "/apiweb/ad/info/chart",    //请求发送到TestServlet处
         data : {id:tid,type:1},
         dataType : "json",        //返回数据形式为json
         success : function(result) {
         	var a=result.data.pinglun;
         	console.log(a)
             //请求成功时执行该函数内容，result即为服务器返回的json对象
             if (result) {
//                  for(var i=0;i<a.length;i++){       
//                     names.push(a[i].name);//挨个取出类别并填入类别数组
//                   }
                  for(var key in a){
                  	namesee.push(key)
                  	var b;
                  	if(a[key]==null){
                  		b="0"
                  		
                  	}else{
                  		b=a[key]
                  	}
//                	alert(b)
                  	numsee.push(b)
                  	
//                	console.log(b.length)
//                	console.log(names[names.length-1])
//  					names=names[names.length-1]
					}
//                  for(var i=0;i<a.length;i++){       
//                      nums.push(a[i].num);    //挨个取出销量并填入销量数组
//                    }
                    lineee.hideLoading();    //隐藏加载动画
                    lineee.setOption({        //加载数据图表
								xAxis: {
                            data: namesee
                        },
                        series: [{
                            // 根据名字对应到相应的系列
                            name: '平均阅读量',
                            data: numsee
                        }]
                    });
                    
             }
         
        },
        error : function(errorMsg) {
             //请求失败时执行该函数
       //  alert("图表请求数据失败!");
         lineee.hideLoading();
         }
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
