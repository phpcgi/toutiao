<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\toutiao\public/../application/index\view\toutiao\lxgmm.html";i:1516862992;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="__CDN__/assets/css/index/liuliangzhu.css" />
		<link rel="stylesheet" href="__CDN__/assets/css/index/lxgmm.css" />
	</head>
	<body>
		<div id="container">
		<div id="nav">
				<div class="nav_l n_conmment">
					<img src="__CDN__/assets/img/shouye/logo1.png"/>
				</div>
				<div class="nav_c n_conmment">
					<ul class="nav_cc">
						<!--<li>主页</li>
						<li class="bangd">榜单</li>
						<li>新媒体学院</li>
						<li>产品</li>
						<li class="gywm">关于我们</li>
						<li>成功案例</li>-->
					</ul>
					<!--<div class="z_nav">
						<div class="z_top">
							<img src="img/shouye/悬停三角.png" />
						</div>
						<div class="z_bottom">
							<p class="tout tw1">头条榜</p>
							<p class="baow tw1">豹纹榜</p>
						</div>
					</div>-->
					
					
				</div>
				<div class="nav_r n_conmment">
					<p class="deng">
						<img src="__CDN__/assets/img/xmtxy/xiaoxi.png" />
					</p>
					<p class="shu1">|</p>
					<div class="tui">
					<p class="zhu">头条号名称</p>
					
					<div class="z_nav3">
						<div class="z_topp">
							<img src="__CDN__/assets/img/shouye/xtsj.png" />
						</div>
						<div class="z_bottomp">
							<p class="tout tw1p zhuye">返回首页</p>
							<p class="baow tw1p zhuyeme">返回我的主页</p>
							<p class="tout tw1p tuichu">退出登录</p>
						</div>
					</div>
					<a href="Xxtz" class="zsj2">
					<div class="z_nav2">
						<div class="z_top">
							<img src="__CDN__/assets/img/shouye/xtsj.png" />
						</div>
						<div class="z_bottom">
							<p class="tout tw1">消息通知</p>
							<div class="xxx_con">
								<p class="baow tw1">豹纹榜</p>
								<p class="tout tw1">头条榜</p>
							</div>
							
						</div>
					</div>
					</a>
					</div>
				</div>
			</div>
		</div>
		</div>
				
				
		
		<div id="con">
			<div class="con_c">
				<div class="con_head">
					<p class="llzdl">修改密码</p>
				</div>
				<p class="xinmm">新密码</p>
				
				<div class="shur5">
					<input type="password" class="xin mima1"/>
					<div class="zhan">
							<img src="__CDN__/assets/img/denglu/mmbkj.png" />
					</div>
				</div>
				<p class="xinmm m2">确认密码</p>
				<div class="shur5">
					<input type="password" class="xin mima2"/>
					<div class="zhan1">
							<img src="__CDN__/assets/img/denglu/mmbkj.png" />
					</div>
				</div>
				<div class="denglu">
					<p class="dl">提交</p>
				</div>
			</div>
		</div>
		<div id="footer">
			<p class="foot">北京头条易科技有限公司|京ICP备16042456号-1</p>
		</div>
		
		<div class="tank">
			<div class="tank_k">
				<div class="tan_h">头条易友情提示</div>
				<div class="tank_c">
					<p class="tan_con">后海返回 i 的身份和 iu 回复大号发嗲</p>
				</div>
				<div class="tan_b">
					<p class="niu shi">确认</p>
					<!--<p class="niu fou">取消</p>-->				
				</div>
			</div>
		</div>
	</body>
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
	<script type="text/javascript" src="__CDN__/assets/js/index/js/liuliangzhu.js" ></script>
	<script src="__CDN__/assets/js/index/js/lxgmm.js"></script>
		<script>
		var a=true;
		
		$('.zhan').click(function(){
			if(a){
			$('.mima1').attr("type","text")
			$('.zhan img').attr("src","__CDN__/assets/img/denglu/mmkj.png")
			}else{
				$('.mima1').attr("type","password")
				$('.zhan img').attr("src","__CDN__/assets/img/denglu/mmbkj.png")
			}
			a=!a;
		})
		var b=true;
		$('.zhan1').click(function(){
			if(b){
			$('.mima2').attr("type","text")
			$('.zhan1 img').attr("src","__CDN__/assets/img/denglu/mmkj.png")
			}else{
				$('.mima2').attr("type","password")
				$('.zhan1 img').attr("src","__CDN__/assets/img/denglu/mmbkj.png")
			}
			b=!b;
		})
	
	</script>
</html>
