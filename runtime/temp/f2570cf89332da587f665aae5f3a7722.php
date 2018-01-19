<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:67:"D:\toutiao\public/../application/index\view\toutiao\zhoushuju1.html";i:1515128417;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
				<link rel="stylesheet" href="__CDN__/assets/css/index/ets.css" />

		<link rel="stylesheet" href="__CDN__/assets/css/index/zhoushuju.css" />
		<style>
			.summar{
				height: 34px;
				width: 208px;
				border: 1px solid #efefef;
				line-height: 34px;
				float: left;
			}
			.summary{
				
				color: #f85959;
				/*background: pink;*/
				float: left;
				margin-left: 5px;
			}
			.jiant{
				width: 34px;
				height: 34px;
				float: right;
				/*background: yellow;*/
			}
			.x_kuang{
				width: 210px;
				float: left;
				position: relative;
				z-index: 9;
				
			}
			.xxk{
				float: left;
				display: none;
				position: absolute;
				z-index: 9;
				top: 34px;
			}
			.xtime{
				width: 210px;
				height: 34px;
				background: #EFF0EF;
				z-index: 9;
				cursor: pointer;
				text-align: center;
				/*position: relative;*/
				line-height: 34px;
				
			}
			
			.xianshi{
				display: block;
			}
		</style>
	</head>
	<body>
		<div id="con_r">
			<!--<div class="head">
				<div class="headz_l">
					<div class="tu1">
						<img src="__CDN__/assets/img/xmtxy/bangdanpaixu.png" />
					</div>
					<p class="bdpx">榜单排序</p>
				</div>
				<div class="headz_ll">
					<p class="bdnum">8964</p>
				</div>
				<div class="headz_r">
					<div class="tu1">
						<img src="__CDN__/assets/img/xmtxy/jiazhizhishu-.png" />
					</div>
					<p class="bdpx">价值传播指数</p>
				</div>
				<div class="headz_rr">
					<p class="bdnum">8964</p>
				</div>
			</div>-->
			<div class="z_time">
				<p class="zqxz">周期选择：</p>
					<div class="x_kuang">
					<div class="summar">
						<p class="summary">选择时间</p>
						<div class="jiant"></div>
					</div>
					<div class="xxk">
						<p class="xtime">2017-12-24</p>
						<p class="xtime">2017-12-25</p>
					</div>
				</div>
				<p class="zqxz2"></p>
				<!--最新数据更新时间：-->
			</div>
			
			<ul class="z_nav">
				<li class="z_navl gaikuang ziyanse">概况</li>
				<li class="z_navl fensiliang">粉丝量</li>
				<li class="z_navl yueduliang">平均阅读量</li>
				<li class="z_navl pinglunliang">平均评论量</li>
			</ul>
			<div class="zsj_k fensi_k">
				<div id="line"  class="yue" style="width:880px;height:250px; background: pink;"></div>
			</div>
			<div class="zsj_k yuedu_k">
				<div id="linee" class="zhou" style="width:880px;height:250px;"></div>
			</div>
			<div class="zsj_k pinglun_k">
				<div id="lineee" class="zhou" style="width:880px;height:250px;"></div>
			</div>
			<div class="shujuu nono">
			<ul class="z_biao">
				<li class="z_biaon bai">指标</li>
				<li class="z_biaon bai">数值</li>
				<li class="z_biaon bai">指标</li>
				<li class="z_biaon bai">数值</li>
			</ul>
			<ul class="z_biao z_biao1">
				<li class="z_biaon">粉丝量</li>
				<li class="z_biaon fensi"></li>
				<!--34w-->
				<li class="z_biaon">平均收藏量</li>
				<li class="z_biaon pjscl"></li>
				<!--567852-->
			</ul>
			<ul class="z_biao z_biao2">
				<li class="z_biaon">平均阅读量</li>
				<li class="z_biaon yuedu"></li>
				<!--500000-->
				<li class="z_biaon">平均点赞量</li>
				<li class="z_biaon dianzan"></li>
				<!--567852-->
			</ul>
			<ul class="z_biao z_biao3">
				<li class="z_biaon">平均推荐量</li>
				<li class="z_biaon tuijian"></li>
				<!--500000-->
				<li class="z_biaon">平均评论量</li>
				<li class="z_biaon pinglun"></li>
				<!--567852-->
			</ul>
			<ul class="z_biao z_biao4">
				<li class="z_biaon">平均分享量</li>
				<li class="z_biaon fenxiang"></li>
				<!--500000-->
				<li class="z_biaon">发篇数</li>
				<li class="z_biaon fapian"></li>
				<!--567852-->
			</ul>
			</div>
		</div>
	</body>
	<!--<link rel="stylesheet" href="css/daterangepicker.css" />-->
	<script src="__CDN__/assets/js/index/js1/jquery-1.11.2.min.js"></script>
	<!--<script src="js1/moment.min.js"></script>-->
	<!--<script src="js1/jquery.daterangepicker.js"></script>-->
	<!--<script src="js1/demo.js"></script>-->
	<script type="text/javascript" src="__CDN__/assets/js/index/js/echarts.min.js" ></script>

	<script src="__CDN__/assets/js/index/js/zhoushuju1.js">
	<script>
		$(function()
	{
		$('a.show-option').click(function(evt)
		{
			evt.preventDefault();
			$(this).siblings('.options').slideToggle();
		});
	})

	</script>
</html>
