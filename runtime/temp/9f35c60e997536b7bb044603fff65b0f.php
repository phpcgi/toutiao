<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\toutiao\public/../application/index\view\toutiao\shouyem.html";i:1517883385;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>头条易 - 让你的投放更EASY</title>
		<link rel="shortcut icon" href="http://toutiaoeasy.cn/favicon.ico" />

		<link rel="stylesheet" href="__CDN__/assets/css/index/nshouye.css" />
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
		<!--<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>-->
		<script type="text/javascript" src="__CDN__/assets/js/jquery.js" ></script>
		<link rel="stylesheet" href="__CDN__/assets/css/index/swiper-3.4.1.min.css">
		<script type="text/javascript" src="__CDN__/assets/js/index/js/shouye.js" ></script>
		<script type="text/javascript" src="__CDN__/assets/js/index/js/swiper-3.4.1.min.js" ></script>
		<script>
			
		</script>
	
   

	</head>
	<body class="ui-mobile-viewport ui-overlay-a" style="height:1300px" ">

		<header class="clearfix "  style=" width: 100%; height:60px; ">
				<img src="__CDN__/assets/img/shouye/logo3.png" style="width: 246px; height: 37px;/>
   
				<div class="nav_c">
				
				
					<?php if($name): ?>
					<!--已登陆状态-->
					<div class="z_nav5">
						
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
					<div class="z_nav3 " >
					

					</div>
					<?php endif; ?>
				</difv>
				<div class="nav_r n_conmment">
					<?php if($name): ?>
					<p class="deng"><?php echo $name; ?></p>
					<?php else: ?>
					<p class="baow tw1">登录</p>
					<?php endif; ?>
					<p class="shu1">|</p>
				
					<div class="z_nav4">
						<div class="z_top4">
							<img src="__CDN__/assets/img/shouye/xtsj.png" />
						</div>
						
					</div>
				</div>
		 </header>
<!------------------广告图----------------------------------------->

			
			<div class="naaa" align="center" width: 641px; >
			<img   src="__CDN__/assets/img/shouye/log33.png" style="width: 641px;  margin-top: 52px; height: 376px;" />
			</div>
			
			<!------------------讲堂 ----------------------------------------->
			<br />
			<div id="naaa" algin="center" style="margin-top: 52px;" >
				<div class="na" align="center" width: 641px; >
                <table width="641" height="70" border="0">
                
					<tr> 
						<td align="center" width="33%" style="background-image: url(/uploads/bj.png);background-size:100% 100%;" height="100">
						<img src="/uploads/jt.png" height="70">
						           </td>
						<td align="center" width="33%" style="background-image: url(/uploads/bj.png);background-size:100% 100%;" height="100">
							<img src="/uploads/gywm.png" height="70">
						</td >
						<td align="center" width="33%" style="background-image: url(/uploads/bj.png);background-size:100% 100%;" height="100">
							<img src="/uploads/qyrz.png" height="70">
						</td>					
					</tr>
                    </table>
						 </div>
						 <br />
				<div class="na"  align="center" width: 641px; > 
                	<table width="641" height="110" frame=hsides rules=cols bordercolor="#efefef" border="0">
                
					<tr> 
						<td align="center" style="background-image: url(/uploads/bj.png);background-size:100% 100%;" height="100">
							<img src="/uploads/ttb.png" height="70">
						           </td>
						<td align="center" style="background-image: url(/uploads/bj.png);background-size:100% 100%;" height="100">
							<img src="/uploads/bwb.png" height="70">
						</td >					
					</tr>
                    </table>
                 </div>
				<div class="naaaa" style="margin-top: 52px; center" width: 641px;" > 
					<table width="641" border="0" align="center">                                              
<tr>                                                                                            
<td align="center" >                                                                             
	<img   width="100%" src="__CDN__/assets/img/shouye/233.png"</td>                                                          
                                                                                                
</tr>                                                                                           
</table>    
					 </div>
				
			</div>
		</div>
   
		
		</body>

	
</html>
