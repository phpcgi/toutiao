<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"D:\toutiao\public/../application/index\view\toutiao\g_kbj.html";i:1515128379;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="__CDN__/assets/css/index/g_kbj.css" />
		<link rel="stylesheet" href="__CDN__/assets/css/index/common.css" />
		<!--<script type="text/javascript" src="jquery-1.11.0.min.js"></script>-->
			<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>


	<link type="text/css" rel="stylesheet" href="__CDN__/assets/css/index/admin.css" />

	<link rel="stylesheet" type="text/css" href="__CDN__/assets/css/index/jquery-ui.css" />

	<script type="text/javascript" src="__CDN__/assets/js/index/js/jquery-ui-1.10.4.custom.min.js"></script>

	<script type="text/javascript" src="__CDN__/assets/js/index/js/jquery.ui.datepicker-zh-CN.js"></script>

	<script type="text/javascript" src="__CDN__/assets/js/index/js/jquery-ui-timepicker-addon.js"></script>

	<script type="text/javascript" src="__CDN__/assets/js/index/js/jquery-ui-timepicker-zh-CN.js"></script>
	<style type="text/css">
	.ui-timepicker-div{
		/*margin-top: 100px!important;*/
	}
	.ui-timepicker-div .ui-widget-header { margin-bottom: 8px; }

	.ui-timepicker-div dl { text-align: left; }

	.ui-timepicker-div dl dt { float: left; clear:left; padding: 0 0 0 5px; }

	.ui-timepicker-div dl dd { margin: 0 10px 10px 45%; }

	.ui-timepicker-div td { font-size: 90%; }

	.ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }



	.ui-timepicker-rtl{ direction: rtl; }

	.ui-timepicker-rtl dl { text-align: right; padding: 0 5px 0 0; }

	.ui-timepicker-rtl dl dt{ float: right; clear: right; }

	.ui-timepicker-rtl dl dd { margin: 0 45% 10px 10px; }

	</style>
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
							<img src="__CDN__/assets/img/xmtxy/shouye-moren.png" />
						</div>
						<p class="li_r shouye">主页</p>
					</li>
					<li>
						<div class="li_l">
							<img src="__CDN__/assets/img/xmtxy/xuanhaoche-dangqian.png" />
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
						<!--<div class="z_nav2">
							<div class="z_top">
								<img src="__CDN__/assets/img/shouye/xtsj.png" />
							</div>
							<div class="z_bottom">
								<p class="tout tw1">消息通知</p>
								<div class="xxx_con">
								
								</div>
							
							</div>
					</div>-->
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
							<p class="baow tw1 xgmm">修改密码</p>
							<p class="tout tw1 tuichu">退出登录</p>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		
			<div class="shu_k1">
				<p class="sc_shu">|</p>
				<p class="biaoti">项目名称</p>
				<div class="gshu2">
					<input type="text" class="gshu4 xname" />
				</div>
			</div>
			<div class="shu_k1">
				<p class="sc_shu">|</p>
				<p class="biaoti">投放时间</p>
				<div class="gshu2">
					<input type="text" name="act_start_time"  class="gshu4 starttime" readonly="readonly" style="cursor:pointer;" placeholder="正确格式：2017-02-01 12:03:23" />
					<!--<input name="act_start_time" type="text" class="text-box" value="" placeholder="开始时间≥当前时间" title="开始时间≥当前时间" readonly="readonly" style="cursor:pointer;"/>-->
				</div>
			</div>
			<div class="shu_k1">
				<p class="sc_shu">|</p>
				<p class="biaoti">截止时间</p>
				<div class="gshu2">
					<input type="text" name="act_stop_time" class="gshu4 endtime" placeholder="正确格式：2017-12-20 12:14:23"  />
				</div>
			</div>
			<div class="shu_k3">
				<!--<p class="sc_shu">|</p>-->
				<p class="biaoti">详细描述</p>
				<div class="gshu3">
					<textarea class="sd miaoshu"></textarea>
				</div>
			</div>
			
			<div class="shu_k1">
				<p class="sc_shu"></p>
				<p class="biaoti">稿件上传</p>
				<div class="gshu2 beijing">
					<div class="cbg"></div>
					<form id="form1" enctype="multipart/form-data">
						<input class="name_s chuan" id="inpu"  name="file" type="file" placeholder="本地上传"  multiple="multiple"  />
					</form>
					<!--<form id="form1" enctype="multipart/form-data">
					<input type="file" class="chuan1" style="float: left;height: 52px;width: 300px;opacity: 0;" />
					</form>-->
				</div>
			</div>
			<div class="tishi">
				<p class="tishi_p">(提示：文件上传格式为zip或rar)</p>
			</div>
			
			<!--<div class="tuzhan">
				<div class="tu_con">
					<div class="twk">
						<div class="tu_cc"></div>
						<input class="tuxuan" type="checkbox" />
					</div>
				</div>
			</div>-->
			
			<div class="tij">提交</div>
			<div class="tij1">提交</div>
			<div id="bot">
			<div class="bot">北京头条易科技有限公司 | 京ICP备16042456号-1</div>
		</div>
		<script type="text/javascript">$( "input[name='act_start_time'],input[name='act_stop_time']" ).datetimepicker();</script>

	</body>
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
	<script type="text/javascript" src="__CDN__/assets/js/index/js/g_kbj.js" ></script>
	<script type="text/javascript" src="__CDN__/assets/js/index/js/common.js" ></script>
</html>
