<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:61:"D:\toutiao\public/../application/index\view\toutiao\xgmm.html";i:1515128419;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="__CDN__/assets/css/index/common.css" />
		<link rel="stylesheet" href="__CDN__/assets/css/index/xgmm.css" />
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
							<p class="baow tw1 gz">返回我的主页</p>
							<p class="tout tw1 tuichu">退出登录</p>
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
	<script type="text/javascript" src="__CDN__/assets/js/index/js/common.js" ></script>
	<script src="__CDN__/assets/js/index/js/xgmm.js"></script>
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
