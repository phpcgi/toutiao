<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\toutiao\public/../application/index\view\toutiao\g_wddd.html";i:1515128415;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="__CDN__/assets/css/index/common.css" />
		<link rel="stylesheet" href="__CDN__/assets/css/index/g_wddd.css" />	
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
							<img src="__CDN__/assets/img/xmtxy/shouye-moren.png" />
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
							<img src="__CDN__/assets/img/xmtxy/dingdan-dangqian.png" />
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
								<p class="tout tw1">消息通知</p>
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
		
		
		<div class="g_wd">
			<ul class="table">
				<li class="fenn" data-cid = "">全部</li>
				<li data-cid = "1">待接单</li>
				<li data-cid = "2">待投放</li>
				<li data-cid = "3">已完成</li>
				<!--<li data-cid = "4">已取消</li>-->
			</ul>
		</div>
		
		<!--待接单-->
		
		<div id="gaikuang">
					
		</div>
	<div class="f_kuang">
		<div class="M-box1" style="display: block;"></div>
	</div>
	<div id="bot">
		<div class="bot">北京头条易科技有限公司 | 京ICP备16042456号-1</div>
	</div>
	
	<div class="tank">
			<div class="tank_k">
				<div class="tan_h">头条易友情提示</div>
				<div class="tank_c">
					<p class="tan_con">是否确认删除</p>
				</div>
				<div class="tan_b">
					<p class="niu shi">确认</p>
					<p class="niu fou">取消</p>				
				</div>
			</div>
		</div>
	
	</body>
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
	<script src="__CDN__/assets/js/index/js/jquery.pagination.js"></script>
	<script type="text/javascript" src="__CDN__/assets/js/index/js/g_wddd.js" ></script>
	<script type="text/javascript" src="__CDN__/assets/js/index/js/common.js" ></script>
	<script>
		
	</script>
</html>
