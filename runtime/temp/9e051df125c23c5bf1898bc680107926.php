<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"D:\toutiao\public/../application/index\view\toutiao\ggz.html";i:1519987174;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		
		<script type="text/javascript"> 
     
        var sUserAgent = navigator.userAgent.toLowerCase(); 
        var bIsIpad = sUserAgent.match(/ipad/i) == "ipad"; 
        var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os"; 
        var bIsMidp = sUserAgent.match(/midp/i) == "midp"; 
        var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4"; 
        var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb"; 
        var bIsAndroid = sUserAgent.match(/android/i) == "android"; 
        var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce"; 
        var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile"; 
        if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM ){ 
          window.location.href="/index/Ggzm";
        } 
       
          
</script>

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
				<div class="gg_conl">
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
						<p class="ss s3">提交</p>
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
						<p class="ss s3">提交</p>
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
				<div class="gg_conr">
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
	</body>
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
	
	<script type="text/javascript" src="__CDN__/assets/js/index/js/common.js" ></script>
<script src="__CDN__/assets/js/index/js/jquery.pagination.js"></script>
<!--<script type="text/javascript" src="__CDN__/assets/js/index/js/ggz.js" ></script>-->
<script type="text/javascript" src="__CDN__/assets/js/index/js/ggz2.js" ></script>
	<script>

	</script>
</html>
