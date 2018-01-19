<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\toutiao\public/../application/index\view\toutiao\xmtxy.html";i:1515128417;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="__CDN__/assets/css/index/xmtxy.css" />
		<link rel="stylesheet" href="__CDN__/assets/css/index/icommon.css" />
		<link rel="stylesheet" type="text/css" href="__CDN__/assets/css/index/pagination.css" media="screen">
		<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
		<script type="text/javascript" src="__CDN__/assets/js/index/js/shouye.js" ></script>
		<style>
			@media  screen and (min-width: 1000px) {
				body{
					height: 1080px;
					/*width: 1920px;*/
				}
			}
			/*@media  screen and (min-width: 710px) {
				#content{
					height: 1020px;
				}
				body{
					height: 1257px;
				}
			}*/
			/*@media  screen and (min-width: 1280px) {
				#content{
				height: 675px;
				}
				.content{
					width: 650px;
				}
				.content_h{
					line-height: 20px;
				}
				.yzm{
					font-size: 12px;
				}
				body{
					height: 675px;
										
				}
				.tong{
						font-size: 10px;
					}
				.tou{
					font-size: 8px;
				}
				.name{
					font-size: 8px;
				}
				.yl{
					font-size: 8px;
				}
			}*/
		</style>
	</head>
	<body>
	<div id="container">
			<!-------------------------------------------nav------------------------------------------->
			<div id="nav">
				<div class="nav_l n_conmment">
					<img src="__CDN__/assets/img/shouye/logo1.png"/>
				</div>
				<div class="nav_c n_conmment">
					<ul class="nav_cc">
						<li class="zhuye">首页</li>
						<li class="bangd">榜单</li>
						<li class="xmtxy se">新媒体学院</li>
						<li class="chanpin">产品</li>
						<li class="gywm">关于我们</li>
						<li class="anl">成功案例</li>
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
		<!-----------------------------------------banner------------------------------------->
		<div id="x_banner">
			<!--------banner图--------->
			<div class="x_banner">
				<img src="__CDN__/assets/img/xmtxy/xinmeiti-banner1.png" />
			</div>
		</div>
		<div id="newslist">
			<div class="newslist">
				<div class="newslist_l">
					<div class="newslist_t">
						<!--<li class="xinwen">
							<div class="xw_l">
								<img src="__CDN__/assets/img/xmtxy/news-biao.png" />
							</div>
							<div class="xw_c">
								<p class="xw_p">卡夫大煞风景哦阿斯顿佛阿森纳放哪申建放那是会计法你看 </p>
							</div>
							<div class="xw_r">
								<p class="time">2017年6月12日</p>
							</div>
						</li>
						<li class="xinwen">
							<div class="xw_l">
								<img src="__CDN__/assets/img/xmtxy/news-biao.png" />
							</div>
							<div class="xw_c">
								<p class="xw_p">卡夫大煞风景哦阿斯顿佛阿森纳放哪申建放那是会计法你看 </p>
							</div>
							<div class="xw_r">
								<p class="time">2017年6月12日</p>
							</div>
						</li>
						<li class="xinwen">
							<div class="xw_l">
								<img src="__CDN__/assets/img/xmtxy/news-biao.png" />
							</div>
							<div class="xw_c">
								<p class="xw_p">卡夫大煞风景哦阿斯顿佛阿森纳放哪申建放那是会计法你看 </p>
							</div>
							<div class="xw_r">
								<p class="time">2017年6月12日</p>
							</div>
						</li>
						<li class="xinwen">
							<div class="xw_l">
								<img src="__CDN__/assets/img/xmtxy/news-biao.png" />
							</div>
							<div class="xw_c">
								<p class="xw_p">卡夫大煞风景哦阿斯顿佛阿森纳放哪申建放那是会计法你看 </p>
							</div>
							<div class="xw_r">
								<p class="time">2017年6月12日</p>
							</div>
						</li>
						<li class="xinwen">
							<div class="xw_l">
								<img src="__CDN__/assets/img/xmtxy/news-biao.png" />
							</div>
							<div class="xw_c">
								<p class="xw_p">卡夫大煞风景哦阿斯顿佛阿森纳放哪申建放那是会计法你看 </p>
							</div>
							<div class="xw_r">
								<p class="time">2017年6月12日</p>
							</div>
						</li>
						<li class="xinwen">
							<div class="xw_l">
								<img src="__CDN__/assets/img/xmtxy/news-biao.png" />
							</div>
							<div class="xw_c">
								<p class="xw_p">卡夫大煞风景哦阿斯顿佛阿森纳放哪申建放那是会计法你看 </p>
							</div>
							<div class="xw_r">
								<p class="time">2017年6月12日</p>
							</div>
						</li>
						<li class="xinwen">
							<div class="xw_l">
								<img src="__CDN__/assets/img/xmtxy/news-biao.png" />
							</div>
							<div class="xw_c">
								<p class="xw_p">卡夫大煞风景哦阿斯顿佛阿森纳放哪申建放那是会计法你看 </p>
							</div>
							<div class="xw_r">
								<p class="time">2017年6月12日</p>
							</div>
						</li>
						<li class="xinwen">
							<div class="xw_l">
								<img src="__CDN__/assets/img/xmtxy/news-biao.png" />
							</div>
							<div class="xw_c">
								<p class="xw_p">卡夫大煞风景哦阿斯顿佛阿森纳放哪申建放那是会计法你看 </p>
							</div>
							<div class="xw_r">
								<p class="time">2017年6月12日</p>
							</div>
						</li>
						<li class="xinwen">
							<div class="xw_l">
								<img src="__CDN__/assets/img/xmtxy/news-biao.png" />
							</div>
							<div class="xw_c">
								<p class="xw_p">卡夫大煞风景哦阿啊看梁建打飞机啊了大煞风景拉屎的风景斯顿佛阿森纳放哪申建放那是会计法你看 </p>
							</div>
							<div class="xw_r">
								<p class="time">2017年6月12日</p>
							</div>
						</li>
						<li class="xinwen">
							<div class="xw_l">
								<img src="__CDN__/assets/img/xmtxy/news-biao.png" />
							</div>
							<div class="xw_c">
								<p class="xw_p">卡夫大煞风景哦阿斯顿佛阿森纳放哪申建放那是会计法你看 </p>
							</div>
							<div class="xw_r">
								<p class="time">2017年6月12日</p>
							</div>
						</li>-->
					</div>
					<div class="newslist_b">
						
							<div class="M-box1" style="margin-left: 350px;margin-top: 10px;float: left;"></div>
							
					
					</div>
				</div>
				<!---------右侧的图----------->
				<div class="newslist_r">
					<img src="<?php echo $info['image']; ?>" />
				</div>
			</div>
		</div>
		<div id="bot">
			<div class="bot">北京头条易科技有限公司 | 京ICP备16042456号-1</div>
		</div>
	</body>
	<script src="__CDN__/assets/js/index/js/jquery.pagination.js"></script>
	<!--<script src="__CDN__/assets/js/index/js/xmtxy.js"></script>-->
	<script type="text/javascript" src="__CDN__/assets/js/index/js/xmtxy.js" ></script>

	<script>
		
	</script>
</html>
