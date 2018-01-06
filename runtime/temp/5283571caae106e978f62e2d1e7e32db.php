<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:70:"D:\www\toutiaodata\public/../application/index\view\toutiao\ggzdl.html";i:1515128415;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
		<link rel="stylesheet" href="__CDN__/assets/css/index/ggzdl.css" />
	</head>
			<style>
			
			/*@media  screen and (min-width: 1000px) {
				#footer{
					margin-top: 50px;
				}
			}
			@media  screen and (min-width: 800px) {
				#footer{
					margin-top: 50px;
				}
			}
			@media  screen and (min-width: 1200px) {
				#footer{
					margin-top: 450px;
				}
			}*/

		</style>
	<body>
		<div id="head">
			<p class="return">返回主页</p>
		</div>
		<div id="login_con">
			<div class="login_b">
				<div class="tty">
					<img src="__CDN__/assets/img/denglu/头条易动图.gif" />
				</div>
			</div>
		</div>
		<div id="con">
			<div class="con_c">
				<div class="con_head">
					<p class="llzdl">广告主登录</p>
				</div>
				<div class="con_name">
					<div class="name">
						<div class="name_l">
							<img src="__CDN__/assets/img/邮箱(2).png" />
						</div>
						<div class="name_c">
							<p class="yx">手机/邮箱</p>
						</div>
						<div class="name_r">
							<input class="ed" type="text" />
						</div>
					</div>
				</div>
				<!--<div class="tishi">
					<p class="ti">请输入正确的手机号</p>
				</div>-->
				<div class="con_name con_name1">
					<div class="name">
						<div class="name_l namee">
							<img src="__CDN__/assets/img/denglu/密码.png" />
						</div>
						<div class="name_c">
							<p class="yx">密码</p>
						</div>
						<div class="name_r">
							<input type="password" class="password" />
							
						</div>
						<div class="zhan">
							<img src="__CDN__/assets/img/denglu/mmbkj.png" />
						</div>
					</div>
				</div>
				<div class="wangj">
					<p class="wj wj1">忘记密码？</p>
				</div>
				<div class="zs">
					<p class="zzs">*注：如果在旧版本头条易平台注册过，初次登陆新平台，请点击【忘记密码】</p>
				</div>
				<div class="denglu">
					<p class="dl">登录</p>
				</div>
				<div class="meiyou">
					<p class="my">还没有自己的账号？现在创建一个吧</p>
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
	<script type="text/javascript" src="__CDN__/assets/js/index/js/ggzdl.js" ></script>
	<script>
		var a=true;
		
		$('.zhan').click(function(){
			if(a){
			$('.password').attr("type","text")
			$('.zhan img').attr("src","__CDN__/assets/img/denglu/mmkj.png")
			}else{
				$('.password').attr("type","password")
				$('.zhan img').attr("src","__CDN__/assets/img/denglu/mmbkj.png")
			}
			a=!a;
		})
	
	</script>
</html>
