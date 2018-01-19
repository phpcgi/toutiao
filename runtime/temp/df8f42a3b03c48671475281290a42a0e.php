<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:66:"D:\toutiao\public/../application/index\view\toutiao\chanpinxq.html";i:1515128379;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="__CDN__/assets/css/index/anlixq.css" />
		<link rel="stylesheet" href="__CDN__/assets/css/index/icommon.css" />
	</head>
	<body>
		<div id="container">
		<div id="nav">
				<div class="nav_l n_conmment">
					<img src="__CDN__/assets/img/shouye/logo1.png"/>
				</div>
				<div class="nav_c n_conmment">
					<ul class="nav_cc">
						<li class="zhuye">首页</li>
						<li class="bangd">榜单</li>
						<li class="xmtxy">新媒体学院</li>
						<li class="chanpin se">产品</li> 
						<li class="gywm">关于我们</li>
						<li class="anl ">成功案例</li>
					</ul>
					<div class="z_nav">
						<div class="z_top">
							<img src="__CDN__/assets/img/shouye/xtsj.png" />
						</div>
						<div class="z_bottom">
							<p class="tout tw1 ttb">头条榜</p>
							<p class="baow tw1 bwb">爆文榜</p>
						</div>
					</div>
					<div class="z_nav2">
						<div class="z_top">
							<img src="__CDN__/assets/img/shouye/xtsj.png" />
						</div>
						<div class="z_bottom">
							<p class="tout tw1">公司介绍</p>
							<p class="baow tw1">豹纹榜</p>
							<p class="tout tw1">头条榜</p>
							<p class="baow tw1">豹纹榜</p>
							<p class="tout tw1">头条榜</p>
							<p class="baow tw1">豹纹榜</p>
						</div>
					</div>
					<?php if($name): ?>
					<!--已登陆状态-->
					<div class="z_nav5">
						<div class="z_top5">
							<img src="__CDN__/assets/img/shouye/xtsj.png" />
						</div>
						<div class="z_bottom5">
							<p class="tout tw15 ggz">返回我的主页</p>
							<!--
							<p class="tout tw15 ggz">进入广告组</p>
							<p class="baow tw15 llz">进入流量组</p>-->
							<p class="tout tw15 tuichu">退出登录</p>
						</div>
					</div>
					<!--未登陆状态-->
					<?php else: ?>
					<div class="z_nav3">
						<div class="z_top">
							<img src="__CDN__/assets/img/shouye/xtsj.png" />
						</div>
						<div class="z_bottom">
							<!--<p class="tout tw1">返回我的主页</p>-->
							<p class="baow tw1 ggzdl">广告主登录</p>
							<p class="tout tw1 llzdl">流量主登录</p>
						</div>
					</div>
					<?php endif; ?>
				</div>
				<div class="nav_r n_conmment">
					<?php if($name): ?>
					<p class="deng"><?php echo $name; ?></p>
					<?php else: ?>
					<p class="deng">登录</p>
					<?php endif; ?>
					<p class="shu1">|</p>
					<p class="zhu">注册</p>
					<div class="z_nav4">
						<div class="z_top4">
							<img src="__CDN__/assets/img/shouye/xtsj.png" />
						</div>
						<div class="z_bottom4">
							<p class="tout tw1 ggzzc">流量主注册</p>
							<p class="baow tw1 llzzc">广告主注册</p>
							<!--<p class="tout tw1">退出登陆</p>-->
						</div>
					</div>
				</div>
			</div>
			</div>
		<div class="title">
			<div class="fan">
				<img src="__CDN__/assets/img/denglu/fan.png" />
			</div>
			<p class="bt"></p>
			<!--[英菲尼迪]汽车新闻传播检测报告案例详情-->
		</div>
		<div class="zhan">
			<?php echo $info['content']; ?>

		</div>
		<div id="bot">
			<div class="bot">北京头条易科技有限公司 | 京ICP备16042456号-1</div>
		</div>
		
	</body>
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
	<script src="__CDN__/assets/js/index/js/chanpinxq.js"></script>
	<script type="text/javascript" src="__CDN__/assets/js/index/js/shouye.js" ></script>
</html>
