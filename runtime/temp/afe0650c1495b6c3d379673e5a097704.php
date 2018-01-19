<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:63:"D:\toutiao\public/../application/index\view\toutiao\shouye.html";i:1515657733;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="__CDN__/assets/css/index/shouye.css" />
		<link rel="stylesheet" href="__CDN__/assets/css/index/icommon.css" />
		<!--<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>-->
		<script type="text/javascript" src="__CDN__/assets/js/jquery.js" ></script>
		<link rel="stylesheet" href="__CDN__/assets/css/index/swiper-3.4.1.min.css">
		<script type="text/javascript" src="__CDN__/assets/js/index/js/shouye.js" ></script>
		<script type="text/javascript" src="__CDN__/assets/js/index/js/swiper-3.4.1.min.js" ></script>
		<script>
			
		</script>
		<style>
			@media  screen and (min-width: 1000px) {
				#content{
					height: 1020px;
					
				}
					body{
					height: 1257px;
				}
			}
			@media  screen and (min-width: 710px) {
				#content{
					height: 1020px;
				}
				body{
					height: 1257px;
				}
			}
			@media  screen and (min-width: 1280px) {
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
			}
		</style>
    <style>
    	html, body {
        position: relative;
        height: 100%;
    }
    body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color:#000;
        margin: 0;
        padding: 0;
    }
    .swiper-button-prev{
    	/*background: pink;*/
    	
    }
    .swiper-container {
        /*width: 1200px;*/
        /*height: 400px;*/
       width: 100%;
       height: 100%;
        /*background: pink;*/
    }
    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        
        /* Center slide text vertically */
        display: -webkit-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;
    }
    .swiper-slide img{
    	height:400px;
    	width: 1920px;
    }
    .banner_b{
    	background: #FFFFFF;
    }
     .lunbo{
    	height: 400px;
    	width: 1200px;
    	/*background: red;*/
    	/*margin: 0 auto;*/
    }
    .lunbo img{
    		height: 400px;
   	 	width: 1200px;
   	 	
    }
    </style>

	</head>
	<body>
		<div id="container" class="co">
			<!-------------------------------------------nav------------------------------------------->
			<div id="nav">
				<div class="nav_l n_conmment">
					<img src="__CDN__/assets/img/shouye/logo1.png"/>
				</div>
				<div class="nav_c n_conmment">
					<ul class="nav_cc">
						<li class="zhuye se">首页</li>
						<li class="bangd">榜单</li>
						<li class="xmtxy">新媒体学院</li>
						<li class="chanpin">产品</li>
						<li class="gywm">关于我们</li>
						<li class="anl">成功案例</li>
						<li class="renzheng">企业号认证</li>
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
							<p class="baow tw1 llzzc">广告主注册</p>
							<p class="tout tw1 ggzzc">流量主注册</p>
							<!--<p class="tout tw1">退出登陆</p>-->
						</div>
					</div>
				</div>
			</div>
			</div>
		
			<!---------------------------------------------banner--------------------------------------------------->
			<div class="banner_b">
			<div class="swiper-container swiper-container-horizontal">
		        <!--<div class="swiper-wrapper">
					<?php if(is_array($faocus) || $faocus instanceof \think\Collection || $faocus instanceof \think\Paginator): $i = 0; $__LIST__ = $faocus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<div class="swiper-slide">
						<img src="<?php echo $vo['image']; ?>"/>
					</div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
		        </div>-->

		        <!--url里面放的是背景图， img src里面放的主图片-->
		        <div class="swiper-wrapper lunbo">
					<?php if(is_array($faocus) || $faocus instanceof \think\Collection || $faocus instanceof \think\Paginator): $i = 0; $__LIST__ = $faocus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
		            <div class="swiper-slide" style="background-image: url(<?php echo $vo['image1']; ?>);background-size: 100% 100%;-moz-background-size: 100% 100%;-webkit-background-size: 100% 100%;">
		            
		            			<div class="lunbo">
		            				<img src="<?php echo $vo['image']; ?>" />
		            			</div>
		            		
		            </div>
					<?php endforeach; endif; else: echo "" ;endif; ?>
		        </div>
		        
		        <!-- Add Pagination -->
		        <div class="swiper-pagination"></div>
		        <!-- Add Arrows -->
		        <div class="swiper-button-next">
		        		<!--<img src="__CDN__/assets/img/shouye/lubbo-rightt.png" />-->
		        </div>
		        <div class="swiper-button-prev"></div>
			</div>
			</div>
		
		<!-----------------------------------------------滚动广告---------------------------------------------------->
		<div class="gg_k">
		<div id="gg">
			<div class="gb">
				<img src="__CDN__/assets/img/shouye/tz.png" />
			</div>
			<div class="shell">
				  <div id="div1">
					  <?php if(is_array($roll) || $roll instanceof \think\Collection || $roll instanceof \think\Paginator): $i = 0; $__LIST__ = $roll;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					  <a class="a_group" href="javascript:"><?php echo $vo['title']; ?></a>
					  <?php endforeach; endif; else: echo "" ;endif; ?>
				  </div>
			</div>
		</div>
		</div>
		</div>
		<!-----------------------------------------------媒体数量------------------------------------------------>
		<div id="rz">
			<div class="mtsl">
				<div class="mtsl_t">
					<p class="num">累计入驻自媒体数量:<?php echo $countgenre; ?></p>
				</div>
				<div class="mtsl_b">
						<div class="accordion">
							<ul>
								<li>
									<div class="intro">
										<p>娱乐</p>
									</div>
									<div class="bg-img">
										<div style="width: 900px;height: 300px;background: #EFEFEF;">
											<div class="lf">
												<img src="__CDN__/assets/img/shouye/娱乐－彩.png" />
											</div>
											<div class="rt">
												<?php if(is_array($kol0) || $kol0 instanceof \think\Collection || $kol0 instanceof \think\Paginator): $i = 0; $__LIST__ = $kol0;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
												<div class="rt_c">
													<div class="rtc_t">
														<div class="rtc_l">
															<img src="<?php echo $vo['image']; ?>" />
														</div>
														<div class="rtc_r">
															<p class="head"><?php echo $vo['name']; ?></p>
															<p class="bottom">粉丝量：<?php echo $vo['fans']; ?></p>
														</div>
													</div>
													<div class="rtc_b">
														<p class="jies"><?php echo $vo['content']; ?></p>
														<p class="hz">合作</p>
													</div>
												</div>
												<?php endforeach; endif; else: echo "" ;endif; ?>
											</div>
											
										</div>
									</div>
								</li>
								<li>
									<div class="intro">
										<p>健康</p>
									</div>
									<div class="bg-img">
										<div style="width: 900px;height: 300px;background: #EFEFEF;">
											<div class="lf">
												<img src="__CDN__/assets/img/shouye/jiankang.png" />
											</div>
											<div class="rt">
												<?php if(is_array($kol1) || $kol1 instanceof \think\Collection || $kol1 instanceof \think\Paginator): $i = 0; $__LIST__ = $kol1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
												<div class="rt_c">
													<div class="rtc_t">
														<div class="rtc_l">
															<img src="<?php echo $vo['image']; ?>" />
														</div>
														<div class="rtc_r">
															<p class="head"><?php echo $vo['name']; ?></p>
															<p class="bottom">粉丝量：<?php echo $vo['fans']; ?></p>
														</div>
													</div>
													<div class="rtc_b">
														<p class="jies"><?php echo $vo['content']; ?></p>
														<p class="hz">合作</p>
													</div>
												</div>
												<?php endforeach; endif; else: echo "" ;endif; ?>
											</div>
											
										</div>
									</div>
								</li>
								<li>
									<div class="intro">
										<p>历史</p>
									</div>
									<div class="bg-img">
										<div style="width: 900px;height: 300px;background: #EFEFEF;">
											<div class="lf">
												<img src="__CDN__/assets/img/shouye/lishi.png" />
											</div>
											<div class="rt">
												<?php if(is_array($kol2) || $kol2 instanceof \think\Collection || $kol2 instanceof \think\Paginator): $i = 0; $__LIST__ = $kol2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
												<div class="rt_c">
													<div class="rtc_t">
														<div class="rtc_l">
															<img src="<?php echo $vo['image']; ?>" />
														</div>
														<div class="rtc_r">
															<p class="head"><?php echo $vo['name']; ?></p>
															<p class="bottom">粉丝量：<?php echo $vo['fans']; ?></p>
														</div>
													</div>
													<div class="rtc_b">
														<p class="jies"><?php echo $vo['content']; ?></p>
														<p class="hz">合作</p>
													</div>
												</div>
												<?php endforeach; endif; else: echo "" ;endif; ?>
											</div>
											
										</div>
									</div>
								</li>
								<li>
									<div class="intro">
										<p>军事</p>
									</div>
									<div class="bg-img">
										<div style="width: 900px;height: 300px;background: #EFEFEF;">
											<div class="lf">
												<img src="__CDN__/assets/img/shouye/junshi.png" />
											</div>
											<div class="rt">
											<?php if(is_array($kol3) || $kol3 instanceof \think\Collection || $kol3 instanceof \think\Paginator): $i = 0; $__LIST__ = $kol3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
											<div class="rt_c">
												<div class="rtc_t">
													<div class="rtc_l">
														<img src="<?php echo $vo['image']; ?>" />
													</div>
													<div class="rtc_r">
														<p class="head"><?php echo $vo['name']; ?></p>
														<p class="bottom">粉丝量：<?php echo $vo['fans']; ?></p>
													</div>
												</div>
												<div class="rtc_b">
													<p class="jies"><?php echo $vo['content']; ?></p>
													<p class="hz">合作</p>
												</div>
											</div>
											<?php endforeach; endif; else: echo "" ;endif; ?>
										</div>
											
										</div>
									</div>
								</li>
								
			
							</ul>
						</div>

				</div>
			</div>
		</div>
			<!-----------------------------------------成功案例（line是边框特效）-------------------------------------->
			<div class="moviex">
				<div class="movie">
					<div class="movie_h">
						<p class="anli">成功案例</p>
					</div>
					<div class="movie_b">
						<ul class="moviecon_h">
							<?php if(is_array($anli) || $anli instanceof \think\Collection || $anli instanceof \think\Paginator): $i = 0; $__LIST__ = $anli;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
							<li><?php echo $vo['title']; ?></li>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
						<div class="moviecon_b anlixian">

							<div class="moviecon_l">
								<a href="/index/Anli"><img src="<?php echo $anli['0']['content']['0']['image']; ?>" /></a>
							</div>
							<div class="moviecon_r">
								<ul class="al_title">
									<?php if(is_array($anli['0']['content']) || $anli['0']['content'] instanceof \think\Collection || $anli['0']['content'] instanceof \think\Paginator): $i = 0; $__LIST__ = $anli['0']['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?>
									<li>
										<div class="jian">
											<img src="__CDN__/assets/img/xmtxy/news-biao.png" />
										</div>
										<p class="a_title"><a href="/index/Alixq?cid=<?php echo $cvo['id']; ?>"><?php echo $cvo['title']; ?></a></p>
									</li>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
							</div>
						</div>

						<div class="moviecon_b">
							<div class="moviecon_l">
								<a href="/index/Anli"><img src="<?php echo $anli['1']['content']['0']['image']; ?>" /></a>
							</div>
							<div class="moviecon_r">
								<ul class="al_title">
									<?php if(is_array($anli['1']['content']) || $anli['1']['content'] instanceof \think\Collection || $anli['1']['content'] instanceof \think\Paginator): $i = 0; $__LIST__ = $anli['1']['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?>
									<li>
										<div class="jian">
											<img src="__CDN__/assets/img/xmtxy/news-biao.png" />
										</div>
										<p class="a_title"><a href="/index/Alixq?cid=<?php echo $cvo['id']; ?>"><?php echo $cvo['title']; ?></a></p>
									</li>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
							</div>
						</div>

						<div class="moviecon_b">
							<div class="moviecon_l">
								<a href="/index/Anli"><img src="<?php echo $anli['2']['content']['0']['image']; ?>" /></a>
							</div>
							<div class="moviecon_r">
								<ul class="al_title">
									<?php if(is_array($anli['2']['content']) || $anli['2']['content'] instanceof \think\Collection || $anli['2']['content'] instanceof \think\Paginator): $i = 0; $__LIST__ = $anli['2']['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?>
									<li>
										<div class="jian">
											<img src="__CDN__/assets/img/xmtxy/news-biao.png" />
										</div>
										<p class="a_title"><a href="/index/Alixq?cid=<?php echo $cvo['id']; ?>"><?php echo $cvo['title']; ?></a></p>
									</li>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
							</div>
						</div>

						<div class="moviecon_b">
							<div class="moviecon_l">
								<a href="/index/Anli"><img src="<?php echo $anli['3']['content']['0']['image']; ?>" /></a>
							</div>
							<div class="moviecon_r">
								<ul class="al_title">
									<?php if(is_array($anli['3']['content']) || $anli['3']['content'] instanceof \think\Collection || $anli['3']['content'] instanceof \think\Paginator): $i = 0; $__LIST__ = $anli['3']['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?>
									<li>
										<div class="jian">
											<img src="__CDN__/assets/img/xmtxy/news-biao.png" />
										</div>
										<p class="a_title"><a href="/index/Alixq?cid=<?php echo $cvo['id']; ?>"><?php echo $cvo['title']; ?></a></p>
									</li>
									<?php endforeach; endif; else: echo "" ;endif; ?>
								</ul>
							</div>
						</div>
						
					</div>
					
					
				</div>
			</div>
		<!-----------------------------------------合作伙伴------------------------------------------------->
		<div id="hezuo">
			<div class="hezuo">
				<div class="hezuo_t">
					<p class="hezuo_p">合作伙伴</p>
				</div>
				<div class="hezuo_c">
				</div>
				<ul class="hezuo_b">

					<?php if(is_array($log) || $log instanceof \think\Collection || $log instanceof \think\Paginator): $i = 0; $__LIST__ = $log;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<li class="pic">
						<img src="<?php echo $vo['image']; ?>" />
					</li>
					<?php endforeach; endif; else: echo "" ;endif; ?>

				</ul>
			</div>
		</div>
		<!-------------------------------------联系我们----------------------------------------->
		<div id="lianx">
			<div class="lianx">
				<div class="lianx_t">
					<p class="lianx_p">联系我们</p>
				</div>
				<div class="lianx_b">
					<div class="lianxb_l">
						<div class="email">
							<div class="email_l">
								<img src="__CDN__/assets/img/shouye/iconfont-youxiang.png" />
							</div>
							<p class="email_r">邮箱：hezuo@toutiaoeasy.cn</p>
						</div>
						<div class="email phone">
							<div class="email_l">
								<img src="__CDN__/assets/img/shouye/iconfont-dianhua.png" />
							</div>
							<p class="email_r">电话：010-65212180</p>
						</div>
						<div class="email dizhi">
							<div class="email_l">
								<img src="__CDN__/assets/img/shouye/iconfont-place.png" />
							</div>
							<p class="email_r">地址：东城文化人才国际创业园301室</p>
						</div>
					</div>
				<div class="lianxb_r">
					<div class="lianxbr_l">
						<div class="ewm_t">
							<img src="__CDN__/assets/img/shouye/微信公众号.png" />
						</div>
						<div class="ewm_b">
							<p class="wx">微信公众号</p>
						</div>
					</div>
					<div class="lianxbr_l kefu">
						<div class="ewm_t">
							<img src="__CDN__/assets/img/shouye/kewm.png" />
						</div>
						<div class="ewm_b">
							<p class="wx">商务合作客服</p>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
		<div id="bot">
			<div class="bot">北京头条易科技有限公司 | 京ICP备16042456号-1</div>
		</div>
		<div class="ewm">
		
			<div class="ke">
				<img src="__CDN__/assets/img/denglu/kefu.png" />
			</div>
			<p class="yi">易妹儿</p>
			<div class="ma">
				<img src="__CDN__/assets/img/shouye/kewm.png" />
			</div>
		</div>
	</body>
	<script>
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        paginationClickable: true,
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: 2500,
        autoplayDisableOnInteraction: true,
        observer:true,
        observeparents:true
    });
    </script>
	<script language="javascript">
	var box=document.getElementById("div1"),can=true;
	box.innerHTML+=box.innerHTML;
	box.onmouseover=function(){can=false};
	box.onmouseout=function(){can=true};
	new function (){
	 var stop=box.scrollTop%18==0&&!can;
	 if(!stop)box.scrollTop==parseInt(box.scrollHeight/2)?box.scrollTop=0:box.scrollTop++;
	 setTimeout(arguments.callee,box.scrollTop%18?10:1500);
	};
	</script>
	<script>
		$('.moviecon_h li:first-of-type').addClass('anlibs')
		$('.moviecon_h li').click(function(){
			$(this).addClass('anlibs').siblings().removeClass('anlibs')
			$('.moviecon_b').eq( $(this).index() ).addClass('anlixian').siblings().removeClass('anlixian');
		})
	</script>
</html>
