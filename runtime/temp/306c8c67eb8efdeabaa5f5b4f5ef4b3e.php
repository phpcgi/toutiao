<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\toutiao\public/../application/index\view\toutiao\bangdan3.html";i:1515128379;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		
		<link rel="stylesheet" href="__CDN__/assets/css/index/icommon.css" />
		<link rel="stylesheet" href="__CDN__/assets/css/index/bangdan.css" />
		<link rel="stylesheet" type="text/css" href="__CDN__/assets/css/index/pagination.css" media="screen">
		<style>
			.zuo_k{
				width: 78px;
				height: 24px;
			}
			.leixing{
				/*float: left;*/
			}
			
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
						<li class="bangd se">榜单</li>
						<li class="xmtxy">新媒体学院</li>
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
		<ul id="navn">
			<div class="leixing leixing1">
			<div class="navn_l">
				<div class="zuo_k">
					<p class="n_shu">|</p>
					<p class="lei">领域: </p>
				</div>
				
			</div>
			<div class="navn_r">
				<!--<li>不线
					<input type="checkbox" class="leibie1" name="aa"  />
				</li>
				<li>不线
					<input type="checkbox" class="leibie1" name="aa"  />
				</li>
				<li>不线</li>
				<li>不线</li>
				<li>不线</li>
				<li>不线</li>
				<li>不线的</li>
				<li>不线</li>
				<li>不线</li>
				<li>不线</li>
				<li>不线啥的</li>
				<li>不线</li>
				<li>不线</li>
				<li>不线</li>
				<li>不线阿斯顿</li>
				<li>不线</li>
				<li>不线</li>
				<li>不线</li>
				<li>不线</li>
				<li>不线</li>
				<li>不线</li>
				<li>不线</li>
				<li>不线</li>
				<li>不线</li>
				<li>不线</li>
				<li>不线</li>-->
			</div>
		</div>
		
		<div class="leixing leixing2">
			<div class="navn_l">
				<div class="zuo_k">
					<p class="n_shu">|</p>
					<p class="lei">类别: </p>
				</div>
				
			</div>
			<div class="navn_p">
				<li>传播价值榜
					<input type="radio" class="leibie1" name="aa" value="1" />
				</li>
				<li>内容质量榜
					<input type="radio" class="leibie1" name="aa" value="2" />
				</li>
				<li>互动效果榜
					<input type="radio" class="leibie1" name="aa" value="3" />
				</li>
				<li>粉丝数量榜
					<input type="radio" class="leibie1" name="aa" value="4" />
				</li>
				
			</div>
		</div>
		
		
		</ul>
		<div class="daoh">
			<ul class="bang">
				<li class="zbang zbang1 se1">周榜
					<input type="radio" value="1"  class="zhou" name="bang" />
				</li>
				<li class="zbang zbang2">月榜
					<input type="radio" value="2"  class="zhou" name="bang" />
				</li>

			</ul>
		</div>
		<div id="list">
			<div class="list_l">
		<!------------------------------头部-------------------------------->
				<ul class="list_t">
					<li class="list_tl t1">排序</li>
					<li class="list_tl t2">头条号</li>
					<li class="list_tl t3">粉丝量</li>
					<li class="list_tl t4">平均阅读量</li>
					<li class="list_tl t5">平均分享量</li>
					<li class="list_tl t6">平均收藏量</li>
					<li class="list_tl t7">平均点赞量</li>
					<li class="list_tl t8">平均评论量</li>
					<li class="list_tl t9">指数</li>
				</ul>
		<!------------------------------内容------------------------------>
				<div class="ttb_con">
				<!--<ul class="list_b">
					<li class="shuj">
						<div class="shuj_l">1</div>
						<div class="shuj_r">
							<img src="__CDN__/assets/img/shouye/头像.png"/>
						</div>
					</li>
					<li class="shuj">长安知街事</li>
					<li class="shuj">18W</li>
					<li class="shuj">469208</li>
					<li class="shuj">10000</li>
				</ul>
				<ul class="list_b">
					<li class="shuj">
						<div class="shuj_l">1</div>
						<div class="shuj_r">
							<img src="img/shouye/头像.png"/>
						</div>
					</li>
					<li class="shuj">长安知街事</li>
					<li class="shuj">18W</li>
					<li class="shuj">469208</li>
					<li class="shuj">10000</li>
				</ul>
				<ul class="list_b">
					<li class="shuj">
						<div class="shuj_l">1</div>
						<div class="shuj_r">
							<img src="img/shouye/头像.png"/>
						</div>
					</li>
					<li class="shuj">长安知街事</li>
					<li class="shuj">18W</li>
					<li class="shuj">469208</li>
					<li class="shuj">10000</li>
				</ul>
				<ul class="list_b">
					<li class="shuj">
						<div class="shuj_l">1</div>
						<div class="shuj_r">
							<img src="img/shouye/头像.png"/>
						</div>
					</li>
					<li class="shuj">长安知街事</li>
					<li class="shuj">18W</li>
					<li class="shuj">469208</li>
					<li class="shuj">10000</li>
				</ul>
				<ul class="list_b">
					<li class="shuj">
						<div class="shuj_l">1</div>
						<div class="shuj_r">
							<img src="img/shouye/头像.png"/>
						</div>
					</li>
					<li class="shuj">长安知街事</li>
					<li class="shuj">18W</li>
					<li class="shuj">469208</li>
					<li class="shuj">10000</li>
				</ul>
				<ul class="list_b">
					<li class="shuj">
						<div class="shuj_l">1</div>
						<div class="shuj_r">
							<img src="img/shouye/头像.png"/>
						</div>
					</li>
					<li class="shuj">长安知街事</li>
					<li class="shuj">18W</li>
					<li class="shuj">469208</li>
					<li class="shuj">10000</li>
				</ul>
				<ul class="list_b">
					<li class="shuj">
						<div class="shuj_l">1</div>
						<div class="shuj_r">
							<img src="img/shouye/头像.png"/>
						</div>
					</li>
					<li class="shuj">长安知街事</li>
					<li class="shuj">18W</li>
					<li class="shuj">469208</li>
					<li class="shuj">10000</li>
				</ul>
				<ul class="list_b">
					<li class="shuj">
						<div class="shuj_l">1</div>
						<div class="shuj_r">
							<img src="img/shouye/头像.png"/>
						</div>
					</li>
					<li class="shuj">长安知街事</li>
					<li class="shuj">18W</li>
					<li class="shuj">469208</li>
					<li class="shuj">10000</li>
				</ul>
				<ul class="list_b">
					<li class="shuj">
						<div class="shuj_l">1</div>
						<div class="shuj_r">
							<img src="img/shouye/头像.png"/>
						</div>
					</li>
					<li class="shuj">长安知街事</li>
					<li class="shuj">18W</li>
					<li class="shuj">469208</li>
					<li class="shuj">10000</li>
				</ul>-->
				</div>
				<div class="m_kuang">
					<div class="M-box1"></div>
				</div>				
			</div>
			<div class="list_r">
				<div class="listr_t">
					<div class="listrt_l">
						<img src="__CDN__/assets/img/xmtxy/tishi.png" />
					</div>
					<p class="listrt_r">提示</p>
					
				</div>
				<p class="neir">想看更多榜单？扫描关注头条易公众号</p>
				<div class="ewmm">
					<img src="__CDN__/assets/img/xmtxy/ewmm.png" />
				</div>
			</div>
		</div>
		<div id="bot">
			<div class="bot">北京头条易科技有限公司 | 京ICP备16042456号-1</div>
		</div>
		<div class="zongye" style="display: none;"></div>
		<div class="meiye" style="display: none;"></div>
	</body>
		<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
	<script src="__CDN__/assets/js/index/js/jquery.pagination.js"></script>
	<script type="text/javascript" src="__CDN__/assets/js/index/js/shouye.js" ></script>
	<script type="text/javascript" src="__CDN__/assets/js/index/js/bangdan.js" ></script>

	<script>
		 $('.M-box1').pagination({
                    totalData:100,
                    showData:5,
                    coping:true,
                    callback:function(api){
                    	var b=api.getCurrent()
                    	alert(b)
				        var data = {
				            page: api.getCurrent(),
				            name: 'mss',
				            say: 'oh'
				        };
//				        $.getJSON('http://localhost:3000/data.json',data,function(json){
//				            console.log(json);
//				        });
   					 }
                });
	</script>
    
</html>
