<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\toutiao\public/../application/index\view\toutiao\liuliangzhu.html";i:1515128421;}*/ ?>
<!DOCTYPE html>
<html ng-app="myapp">
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="__CDN__/assets/css/index/liuliangzhu.css" />
		 	<script src="//cdn.bootcss.com/zepto/1.0rc1/zepto.min.js"></script>

	
	<script type="text/javascript">
 $(function(){
 		$('.zsj2').click(function(){
 			 var link = $(this).attr('href');
                $('.con_r').attr('src', link);
                var href = window.location.href;
                window.location.href = href.substr(0, href.indexOf('#')) + '#' + link;
                return false;
 		})
// 			var link ="Zshuju";
//              $('.con_r').attr('src', link);
//              var href = window.location.href;
//              window.location.href = href.substr(0, href.indexOf('#')) + '#' + link;
            $(".zsj").on("click",function(){
                var link = $(this).attr('href');
                $('.con_r').attr('src', link);
                var href = window.location.href;
                window.location.href = href.substr(0, href.indexOf('#')) + '#' + link;
                return false;
            });
            $(".zsj1").click(function(){
                var link = $(this).attr('href');
                $('.con_r').attr('src', link);
                var href = window.location.href;
                window.location.href = href.substr(0, href.indexOf('#')) + '#' + link;
                return false;
            });
        });
</script>
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
						<a href="Xxtz" class="zsj2"><img src="__CDN__/assets/img/xmtxy/xiaoxi.png" /></a>
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
							<p class="baow tw1p xgmm">修改密码</p>
							<p class="tout tw1p tuichu">退出登录</p>
						</div>
					</div>
					
					<!--<div class="z_nav2">
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
					</div>-->
					
					</div>
				</div>
			</div>
		</div>
		</div>
		<div id="con">
			<div class="con_l">
				<div class="tth tth1">
					<p class="tthw">头条号</p>
					<div class="qie">
						<img src="__CDN__/assets/img/shouye/qiehuanzhanghao.png" />
					</div>
				</div>
				<!--切换-->
				<div class="l3">
					<div class="sjtj">
						<div class="zhe">
							<img src="__CDN__/assets/img/xmtxy/shuju-tongji-.png" />
						</div>
						<p class="shuju">数据统计</p>
					</div>
					<div class="zsjs">
									<div class="tj">
										<a href="Zshuju" class="zsj">
											<p class="zsjj">周数据</p>
										</a>
									<a href="Zshuju" class="zsj">
										<p class="zsjj">月数据</p>
									</a>
									</div>
									<div class="sjtj">
										<div class="zhe">
											<img src="__CDN__/assets/img/xmtxy/xinxitijiao.png" />
										</div>
										<p class="shuju">信息提交</p>
									</div>
									<a href="gaikuang1.html" class="zsj">
										<p class="zsjj">概况</p>
									</a>
									<a href="fensihuaxiang.html" class="zsj">
										<p class="zsjj">粉丝画像</p>
									</a>
					
					
									<a href="quanxian.html" class="zsj">
										<p class="zsjj">权限及功能</p>
									</a>
									<a href="gaikuang.html" class="zsj">
										<p class="zsjj">多平台</p>
									</a>
									<a href="tthgl.html" class="zsj">
									<div class="sjtj oio">
										<div class="zhe">
											<img src="__CDN__/assets/img/xmtxy/toutiaohaoguanli-icon.png" />
										</div>
										<p class="shuju">头条号管理</p>
									</div>
									</a>
					
									<div style="height: 1px;width: 100%;background: #FFFFFF;float: left;margin-top: 20px;"></div>
									<div class="tth">
										<p class="tthw">订单</p>
									</div>
									<div class="sjtj">
										<div class="zhe">
											<img src="__CDN__/assets/img/xmtxy/dingdan.png" />
										</div>
										<a href="ddgl.html" class="zsj1">
										<p class="shuju">订单管理</p>
										</a>
									</div>
					
									<div class="sjtj">
										<div class="zhe">
											<img src="__CDN__/assets/img/xmtxy/daichulirenwu-.png" />
										</div>
										<a href="renwu.html" class="zsj1">
										<p class="shuju">待处理任务</p>
										</a>
									</div>
					</div>
					<div style="height: 1px;width: 100%;background: #FFFFFF;float: left;margin-top: 20px;"></div>
					<div class="tth">
						<p class="tthw tth2">帮助</p>
					</div>
					</div>
					<!--切换-->
					<div class="l4 ll5">
						<p class="name1">居说为世界</p>
						<p class="name1">居说为世界</p>
						<p class="name1">居说为世界</p>
						<p class="name1">居说为世界</p>
					</div>
			</div>
			
			<iframe class="con_r">
				
			</iframe>
		</div>
		<div id="bot">
			<div class="bot">北京头条易科技有限公司 | 京ICP备16042456号-1</div>
		</div>
	</body>
		<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
		<script type="text/javascript" src="__CDN__/assets/js/index/js/liuliangzhu.js" ></script>
		<script type="text/javascript" src="__CDN__/assets/js/index/js/liuliangzucon.js" ></script>
	<script>
		var a=true;
		$('.l4').css("display","none")
		$('.tth1').click(function(){
			if(a){
				$('.l3').css("display","none")
				$('.l4').css("display","block")
			}else{
				$('.l4').css("display","none")
				$('.l3').css("display","block")
			}
			a=!a;
		})
		$('.tth2').click(function(){
			window.open("Lbz");
		})
	</script>
</html>
