<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\toutiao\public/../application/index\view\toutiao\tuijian.html";i:1519268466;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="__CDN__/assets/css/index/common.css" />
		<link rel="stylesheet" href="__CDN__/assets/css/index/ggz.css" />
		
	<link rel="stylesheet" type="text/css" href="__CDN__/assets/css/index/pagination.css" media="screen">
	</head>
	<body>
		<div id="g_head">
			<div class="g_head">
				<div class="nav_l n_conmment">
					<img src="__CDN__/assets/img/shouye/logo1.png"/>
				</div>
				<ul class="g_con">
					<li>
						<div class="li_l">
							<img src="__CDN__/assets/img/xmtxy/shouye-dangqian.png" />
						</div>
						<p class="li_r shouye">主页</p>
					</li>
					
					<li>
						<div class="li_l">
							<img src="__CDN__/assets/img/xmtxy/xuanhaoche-moren.png" />
						</div>
						<p class="li_r xhc">选号车</p>
					</li>
					<li>
						<div class="li_l">
							<img src="__CDN__/assets/img/xmtxy/dingdan-moren.png" />
						</div>
						<p class="li_r wddd">我的订单</p>
					</li>
					<li>
						<div class="li_l">
							<img src="__CDN__/assets/img/xmtxy/shoucangjia-moren.png" />
						</div>
						<p class="li_r scj">收藏夹</p>
					</li>
					<li>
						<div class="li_l">
							<img src="__CDN__/assets/img/xmtxy/daichulirenwu-moren.png" />
						</div>
						<p class="li_r dclrw">待处理任务</p>
					</li>
					<li>
						<div class="li_l">
							<img src="__CDN__/assets/img/xmtxy/help-moren.png" />
						</div>
						<p class="li_r gbz">帮助</p>
					</li>
				</ul>
				<div class="deng">
						<div class="tss">
							<img src="__CDN__/assets/img/xmtxy/xiaoxi.png" />
						</div>
						<!--<div class="z_nav2">
							<div class="z_top">
								<img src="__CDN__/assets/img/shouye/xtsj.png" />
							</div>
							<div class="z_bottom">
								<p class="tout tw1 ttw">消息通知</p>
								<div class="xxx_con">
							
								</div>
							
							</div>
					</div>-->
				</div>
				
				<div class="login">
					<p class="log">账户：<?php echo $name; ?></p>
					<!--<p class="log">退出</p>-->
					<div class="z_nav3">
						<div class="z_top">
							<img src="__CDN__/assets/img/shouye/xtsj.png" />
						</div>
						<div class="z_bottom">
							<p class="tout tw1 zhuye">返回首页</p>
							<p class="baow tw1 xgmm">修改密码</p>
							<p class="tout tw1 tuichu">退出登录</p>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<div id="gg_con">
			<div class="gg_con">
				<div class="gg_conl" style="display: none;">
					<div class="ll1">
						<p class="ll_shu">|</p>
						<p class="ll_z">账号搜索</p>
					</div>
					<div class="ll2">
						<input type="text" class="zh" placeholder="请输入关键字" value="" />
						<p class="ss sous">搜索</p>
					</div>
					<div class="ll2">
						<p class="lei_shu">|</p>
						<p class="leibie">类别</p>
						<p class="ss s2">筛选</p>
						<div class="lei">
							<ul class="fen">
								<li>房产
								<input type="checkbox" class="leibie1" name="aa"  />
								</li>
								<li>房产
									<input type="checkbox" class="leibie1" name="aa"  />
								</li>
								<li>房产
									<input type="checkbox" class="leibie1" name="aa"  />
								</li>
								<li>房产
									<input type="checkbox" class="leibie1" name="aa"  />
								</li>
								<li>房产
									<input type="checkbox" class="leibie1" name="aa"  />
								</li>
								<li>房产
									<input type="checkbox" class="leibie1" name="aa"  />
								</li>
							</ul>
						</div>
					</div>
					<div class="ll2">
						<p class="lei_shu">|</p>
						<p class="leibie">平均阅读量</p>
					</div>
					<div class="ll2">
						<div class="in_k">
							<input type="text" placeholder="最低数值" class="zd zd1" />
							<p class="zhi">至</p>
							<input type="text" placeholder="最高数值" class="zd zd2 zg1" />
						</div>
						<p class="ss s3">不限</p>
					</div>
					<div class="ll2">
						<p class="lei_shu">|</p>
						<p class="leibie">价格</p>
					</div>
					<div class="ll2">
						<div class="in_k">
							<input type="text" placeholder="最低价格" class="zd zdd" />
							<p class="zhi">至</p>
							<input type="text" placeholder="最高价格" class="zd zd2 zg2" />
						</div>
						<p class="ss s3">不限</p>
					</div>
					<div class="ll2">
						<p class="lei_shu">|</p>
						<p class="leibie">是否支持撰稿</p>
					</div>
					<div class="ll2">
						<span class="danx zhuang on_check">
							<input type="radio" name="bb" checked="checked" value="0" class="x1"/>
						</span>
						<p class="bux">不限</p>
						<span class="danx zhuang">
							<input type="radio" name="bb" value="1" class="x1"/>
						</span>
						<p class="bux bux2">支持</p>
					</div>
					<div class="ll2">
						<p class="lei_shu">|</p>
						<p class="leibie">从高到底的排序方式：</p>
					</div>
					<div class="ll2 ll3">
						<span class="danx paixf on_check">
							<input type="radio" value="worth" checked="checked" name="cc" class="x1"/>
						</span>
						<p class="bux">综合指数</p>
						<span class="danx paixf">
							<input type="radio" value="A4" name="cc" class="x1"/>
						</span>
						<p class="bux bux3">粉丝量</p>
						<span class="danx danx2 paixf">
							<input type="radio" value="R" name="cc" class="x1"/>
						</span>
						<p class="bux bux2 bux4">平均阅读量</p>
					</div>
					<div class="ll2">
						<p class="biaoyu">更多商业产品推荐</p>
					</div>
					<ul class="zhanshi">
						<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<li>
							<a href="<?php echo $vo['url']; ?>"><img src="<?php echo $vo['image']; ?>" /></a>
						</li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div class="gg_conr" style="position:absolute;left:50px;">
					<ul class="ggc_t">
						<li class="cc1">加入选号车</li>
						<li class="cc2">名称</li>
						<li class="cc3">粉丝</li>
						<li class="cc4">平均阅读量</li>
						<li class="cc5">
							<p class="cc5_p">综合指数</p>
							<img class="cimg" src="__CDN__/assets/img/xmtxy/_-.png" />
							<div class="tishik_k">
								<div class="tishik">
									<p class="tishik_p">综合指数综合了阅读量、评论量、点赞量、粉丝数等各项指标</p>
								</div>
							</div>
						</li>
						<li class="cc6">
							<p class="cc6_p">价格</p>
							<img class="cimg" src="__CDN__/assets/img/xmtxy/_-.png" />
							<div class="tishik_k2">
								<div class="tishik2">
									<p class="tishik_p2">头条号报价根据阅读量按照50元/CPM来计算。单篇最低价格为6000元/篇(含撰稿）</p>
								</div> 
							</div>
						</li>
						<li class="cc7">查看详情</li>
						<li class="cc8">收藏</li>
					</ul>
					<div class="co_n">
					
					
					</div>
					<div class="M-box1"></div>
				</div>
			</div>
		</div>
		<div id="bot">
			<div class="bot">北京头条易科技有限公司 | 京ICP备16042456号-1</div>
		</div>
		<!--<input type="text" value="" class="zongye" style="display: none;"/>-->
		<div class="zongye" style="display: none;"></div>
		
		
	
<table style="position:absolute;left:60px;top:10px;width:1200px;height:794px;z-index:999;background-color: #ffffff;align:center;">
	<tr style="background-color: blue;height=20px;">
		<td style="height:30px;">
			<a onclick="lei0()">全部</a>, 健康, 收藏, 教育, 传媒, 动漫, 军事, 视频, 摄影, 移民, 技术, 文化, 国际, 育儿, 财经, 时政, 体育, 宠物, 心理, 三农, 娱乐, 社会, 科技, 科学, 房产, 旅游, 家居, 时尚, 游戏, 汽车, 美食, 数码, 历史
			
		</td>
		
		
		
	</tr>
	<tr style="height:764px;">
		<td>
			
			<div id="lei01"></div>
			
		</td>
	</tr>
</table>			
	</body>
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
	
	<script type="text/javascript" src="__CDN__/assets/js/index/js/common.js" ></script>
<script src="__CDN__/assets/js/index/js/jquery.pagination.js"></script>
<!--<script type="text/javascript" src="__CDN__/assets/js/index/js/ggz.js" ></script>-->
<script type="text/javascript" src="__CDN__/assets/js/index/js/xs.js" ></script>
	<script>
function lei0(){
	alert("点击");
	document.getElementById('lei01').value="idsnfsadlfjasdgiosdjfasdf";
			$.ajax( {  
		                type : "GET",  
		                url : "/apiweb/ad/tuijian",  
		                data: ss,
		                success : function(msg) {
				                	var str2=str(msg.data)
				                	$('.co_n').html(str2)

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
	</script>

</html>