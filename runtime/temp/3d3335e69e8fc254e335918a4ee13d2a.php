<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\toutiao\public/../application/index\view\toutiao\ttxq.html";i:1515128417;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="__CDN__/assets/css/index/ets.css" />
		<link rel="stylesheet" href="__CDN__/assets/css/index/ttxq.css" />
		<link rel="stylesheet" href="__CDN__/assets/css/index/common.css" />
		<link rel="stylesheet" href="__CDN__/assets/css/index/jqclode.css" />
		<!--<link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/jqcloud/1.0.4/jqcloud.min.css" />-->
		
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
							<img src="__CDN__/assets/img/xmtxy/shouye-moren.png" />
						</div>
						<p class="li_r shouye">首页</p>
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
							<img src="__CDN__/assets/img/xmtxy/daichulirenwu-dangqian.png" />
						</div>
						<p class="li_r dclrw">待处理任务</p>
					</li>
					<li>
						<div class="li_l">
							<img src="__CDN__/assets/img/xmtxy/help-moren.png" />
						</div>
						<p class="li_r">帮助</p>
					</li>
				</ul>
				<div class="deng">
						<div class="tss">
							<img src="__CDN__/assets/img/xmtxy/xiaoxi.png" />
						</div>
						<div class="z_nav2">
							<div class="z_top">
								<img src="__CDN__/assets/img/shouye/xtsj.png" />
							</div>
							<div class="z_bottom">
								<p class="tout tw1">消息通知</p>
								<div class="xxx_con">
								<!--<p class="baow tw1">豹纹榜</p>
								<p class="tout tw1">头条榜</p>-->
								</div>
							
							</div>
					</div>
				</div>
				
				<div class="login">
					<p class="log">账户：<?php echo $name; ?></p>
					<!--<p class="log">退出</p>-->
					<div class="z_nav3">
						<div class="z_top">
							<img src="__CDN__/assets/img/shouye/xtsj.png" />
						</div>
						<div class="z_bottom">
							<p class="tout tw1 zhuye">返回我的主页</p>
							<p class="baow tw1 xgmm">修改密码</p>
							<p class="tout tw1 tuichu">退出登陆</p>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		<div id="g_xqc">
			<div class="g_xqc ttxq_t">
				<div class="g_xqcl">
					<!--<img src="__CDN__/assets/img/xmtxy/toutiaohaotouxiang.png" />-->
				</div>
				<div class="g_xqcr">
					<p class="top"></p> 
					<!--剧说为世界-->
					<p class="bottom chao"></p>
					<!--借助头条实验室让你赢在起跑线上-->
				</div>
			</div>
			<div class="heng"></div>
			<div class="g_xqb">
				<ul class="fenlei">
					<li>
						<div class="pic2">
							<img src="__CDN__/assets/img/xmtxy/fans.png" />
						</div>
						<p class="fensil">粉丝量:</p>
						<p class="num fens"></p>
					</li>
					<li>
						<div class="pic2">
							<img src="__CDN__/assets/img/xmtxy/read.png" />
						</div>
						<p class="fensil">平均阅读量:</p>
						<p class="num yuedu"></p>
					</li>
					<li>
						<div class="pic2">
							<img src="__CDN__/assets/img/xmtxy/read.png" />
						</div>
						<p class="fensil">智能分类:</p>
						<div class="leib" style="float: left;">
						<p class="num1">社会</p>
						<p class="num1">科学</p>
						<p class="num1">娱乐</p>
						</div>
					</li>
				</ul>
			</div>
		</div>
		
		<div id="g_xqb">
			<div class="g_xqb1">
				<div class="xqb_l">
					<div class="xq_headl">
						<p class="xq_shu">|</p>
						<p class="cy">词云</p>
					</div>
					<div class="xq_cen">
						<div id="example" style="width: 330px; height: 240px;"></div>
						<!--<img src="__CDN__/assets/img/xmtxy/CEF5E87C2B65B4ACDE7FA7E7069BEBD1.png" />-->
					</div>
					<div class="xq_headl">
						<p class="xq_shu">|</p>
						<p class="cy">相似账号推荐</p>
					</div>
					<ul class="tuijian">
						<!--<li>
							<div class="tu2">
								<img src="__CDN__/assets/img/shouye/头像.png" />
							</div>
							<p class="name2">剧说为世界</p>
						</li>
						<li>
							<div class="tu2">
								<img src="__CDN__/assets/img/shouye/头像.png" />
							</div>
							<p class="name2">剧说为世界</p>
						</li>
						<li>
							<div class="tu2">
								<img src="__CDN__/assets/img/shouye/头像.png" />
							</div>
							<p class="name2">剧说为世界</p>
						</li>
						<li>
							<div class="tu2">
								<img src="__CDN__/assets/img/shouye/头像.png" />
							</div>
							<p class="name2">剧说为世界</p>
						</li>-->
					</ul>
				</div>
				<div class="xqb_r">
					<div class="xq_headr">
						<ul class="band">
							<!--<li class="shouq active">传播价值榜</li>-->
							<!--<li>分类榜单</li>-->
							<li class="shouq active">平均阅读量趋势</li>
							<li class="shouq">平均评论量趋势</li>
							<li class="shouq">粉丝量趋势</li>
							<li class="shouq">平均发文量趋势</li>
						</ul>
					</div>
					
					
					<!---------------------------平均与量度趋势------------------------------>
					<div class="xuanx content-item  ctive">
					<!--<div class="xqb_ban"> 
						<div class="xqbb_c">
							<div class="bang_k">
								<div class="left">
									<div class="tu3">
										<img src="__CDN__/assets/img/xmtxy/bangdanpaixu.png" />
									</div>
									<div class="tu3_b">社会类榜单排序(总榜)</div>
								</div>
								<div class="right">1680</div>
							</div>
							<div class="bang_k k2">
								<div class="left left2">
									<div class="tu3">
										<img src="__CDN__/assets/img/xmtxy/jiazhizhishu-.png" />
									</div>
									<div class="tu3_b">社会价值传播指数</div>
								</div>
								<div class="right right2">1680</div>
							</div>
						</div>
					</div>-->
					
					<div class="sjzq">
						<p class="sjzq_l">时间周期选择</p>
						<p class="ayue ayue2 jctive ">按月</p>
						<p class="ayue ayue1">按周</p>
					</div>
					<!--折线图-->
					<div class="quxian">
						<div id="line1"class="yue1"  style="width:820px;height:385px;"></div>
						<div id="line1e" class="zhou1" style="width:820px;height:385px;"></div>
						
					</div>
					</div>
					
	<!-------------------------------------平均评论量趋势------------------------------------------------>
					<div class="xuanx content-item">
					<!--<div class="xqb_ban"> 
						<div class="xqbb_c">
							<div class="bang_k">
								<div class="left">
									<div class="tu3">
										<img src="__CDN__/assets/img/xmtxy/bangdanpaixu.png" />
									</div>
									<div class="tu3_b">社会类榜单排序(总榜)</div>
								</div>
								<div class="right">1680</div>
							</div>
							<div class="bang_k k2">
								<div class="left left2">
									<div class="tu3">
										<img src="__CDN__/assets/img/xmtxy/jiazhizhishu-.png" />
									</div>
									<div class="tu3_b">社会价值传播指数</div>
								</div>
								<div class="right right2">1680</div>
							</div>
						</div>
					</div>-->
					
					<div class="sjzq">
						<p class="sjzq_l">时间周期选择</p>
						<p class="ayue ayue2 jctive ">按月</p>
						<p class="ayue ayue1">按周</p>
					</div>
					<!--折线图-->
					<div class="quxian">
						<div id="line2" class="yue2" style="width:820px;height:385px;"></div>
						<div id="line2e" class="zhou2" style="width:820px;height:385px;"></div>
						<!--<div class="null"></div>-->
					</div>
					</div>
					
		<!--------------------------------粉丝量趋势------------------------------------------->
					
					<div class="xuanx content-item">
					<!--<div class="xqb_ban"> 
						<div class="xqbb_c">
							<div class="bang_k">
								<div class="left">
									<div class="tu3">
										<img src="__CDN__/assets/img/xmtxy/bangdanpaixu.png" />
									</div>
									<div class="tu3_b">社会类榜单排序(总榜)</div>
								</div>
								<div class="right">1680</div>
							</div>
							<div class="bang_k k2">
								<div class="left left2">
									<div class="tu3">
										<img src="__CDN__/assets/img/xmtxy/jiazhizhishu-.png" />
									</div>
									<div class="tu3_b">社会价值传播指数</div>
								</div>
								<div class="right right2">1680</div>
							</div>
						</div>
					</div>-->
					
					<div class="sjzq">
						<p class="sjzq_l">时间周期选择</p>
						<p class="ayue ayue2 jctive">按月</p>
						<p class="ayue ayue1">按周</p>
					</div>
					<!--折线图-->
					<div class="quxian">
						<div id="line3" class="yue3" style="width:820px;height:385px;"></div>
						<div id="line3e" class="zhou3" style="width:820px;height:385px;"></div>
						<!--<div class="null"></div>-->
					</div>
					</div>
					
					
	<!---------------------------------------平均发文量趋势----------------------------------------------------->
					<div class="xuanx content-item">
					<!--<div class="xqb_ban"> 
						<div class="xqbb_c">
							<div class="bang_k">
								<div class="left">
									<div class="tu3">
										<img src="__CDN__/assets/img/xmtxy/bangdanpaixu.png" />
									</div>
									<div class="tu3_b">社会类榜单排序(总榜)</div>
								</div>
								<div class="right">1680</div>
							</div>
							<div class="bang_k k2">
								<div class="left left2">
									<div class="tu3">
										<img src="__CDN__/assets/img/xmtxy/jiazhizhishu-.png" />
									</div>
									<div class="tu3_b">社会价值传播指数</div>
								</div>
								<div class="right right2">1680</div>
							</div>
						</div>
					</div>-->
					
					<div class="sjzq">
						<p class="sjzq_l">时间周期选择</p>
						<p class="ayue ayue2 jctive ">按月</p>
						<p class="ayue ayue1 ">按周</p>
					</div>
					<!--折线图-->
					<div class="quxian">
						<div id="line4" class="yue4" style="width:820px;height:385px;"></div>
						<div id="line4e" class="zhou4" style="width:820px;height:385px;"></div>
						<!--<div class="null"></div>-->
					</div>
					</div>
					
					
					<!-------------------------------------传播价值榜------------------------------------------------>
					
					<div class="xuanx content-item ">
					
					
					<div class="sjzq">
						<p class="sjzq_l">时间周期选择</p>
						<p class="ayue ayue2 jctive">按月</p>
						<p class="ayue ayue1">按周</p>
					</div>
					<!--折线图-->
					<div class="quxian">
						<div id="line"  class="yue" style="width:820px;height:385px;"></div>
						<div id="linee" class="zhou" style="width:820px;height:385px;"></div>
						<!--<div class="null"></div>-->
					</div>
					</div>
					
					
					
					
				</div>
			</div>
		</div>
	</body>
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
	<script type="text/javascript" src="__CDN__/assets/js/index/js/ttxq.js" ></script>
	<script type="text/javascript" src="__CDN__/assets/js/index/js/common.js" ></script>
	
	<script type="text/javascript" src="__CDN__/assets/js/index/js/echarts.min.js" ></script>
	    <script type="text/javascript" src="https://cdn.bootcss.com/jqcloud/1.0.4/jqcloud-1.0.4.min.js"></script>
	<script type="text/javascript" src="__CDN__/assets/js/index/js/ets.js" ></script>

	<script type="text/javascript">
      /*!
       * Create an array of word objects, each representing a word in the cloud
       */
    
    </script>
</html>
