<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"D:\toutiao\public/../application/index\view\toutiao\aboutme.html";i:1515128379;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="__CDN__/assets/css/index/aboutme.css" />
		<link rel="stylesheet" href="__CDN__/assets/css/index/icommon.css" />
		<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
		<script type="text/javascript" src="__CDN__/assets/js/index/js/aboutme.js" ></script>
	<script type="text/javascript" src="__CDN__/assets/js/index/js/shouye.js" ></script>

	</head>
	<body>
		<div id="container">
		<div id="nav">
				<div class="nav_l n_conmment">
					<img src="__CDN__/assets/img/shouye/logo1.png"/>
				</div>
				<div class="nav_c n_conmment">
					<ul class="nav_cc">
						<li class="zhuye">首页</li>
						<li class="bangd">榜单</li>
						<li class="xmtxy">新媒体学院</li>
						<li class="chanpin">产品</li>
						<li class="gywm se">关于我们</li>
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
		<!----------------------------------------关于我们左侧------------------------------------------>
		<div id="gcon">
			<div class="gcon_l">
				<div class="gconl">
					<div class="gconl_t">关于我们</div>
					<ul class="gconl_b">
						<li class="wfen ctive">公司简介</li>
						<li class="wfen">团队介绍</li>
						<li class="wfen">招贤纳士</li>
						<li class="wfen">联系方式</li>
					</ul>
				</div>
			</div>
			<!--------------------------------------关于我们右侧------------------------------------------>
			<div class="gcon_r active">
				<div class="gr_t">
					<img src="__CDN__/assets/img/xmtxy/about1.png" />
				</div>
				<p class="gr_b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;北京头条易科技有限公司是针对头条号自媒体进行传播投放的专业平台，是专注于头条号传播和流量赋能的第三方智能投放平台。首次将头条号自媒体进行第三方规模化、平台化运作，为自媒体人和品牌广告主建立了一个内容传播和广告投放的新型机制。<br/><br/>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;目前平台入驻头条号自媒体已超过20000家，覆盖娱乐影视、财经管理、时尚生活、健康养生、育儿亲子、旅游休闲、体育竞技、本地生活等垂直领域，总阅读量超过100亿人次，是各大品牌和广告主最理想的传播投放平台。<br/><br/>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;头条易平台以“快速决策，精准投放”为目标，利用领先的大数据技术和深度学习算法，对海量头条号做深入分析和数据挖掘，多维度展现头条号画像。星级账号阅读量100W+，普通号阅读量也可以轻松达到 10W+！<br/><br/>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;头条易平台能够对入驻头条号自媒体快速完成媒体画像，程序化精准匹配目标受众；预设100万+、500万+、1000万+ 等各类传播流量包，然后逆向匹配头条号自媒体类别和数量，直到完成流量包设定的传播数据。值得一提的是，以往的自媒体投放模式，都是先圈定自媒体，属于“人找信息”，而且无法承诺或保证阅读量；头条易传播流量包不仅在内容分发上遵循今日头条个性化推荐这一“信息找人”机制，同时将客户的传播KPI前置。<br/><br/>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;头条易平台还首创了“流量杠杆模型”——平台入驻超过20000个优质头条大号，能够根据客户投放需求对头条号自媒体进行精准画像，准确找到杠杆“支点”；根据今日头条热词进行多标签定位，这些标签形成传播“杠杆”；CTO、CCO和资深媒体人组成技术驱动型内容团队，对传播内容进行专业化包装，全程把控杠杆“发力点”；专业内容+大号支点+热词定位=传播杠杆持续放大，带动全平台的跟风流量。<br/><br/>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;头条易平台为入驻的头条号自媒体人提供了多项福利：多种内容变现方式；线上大咖讲堂；线下自媒体人沙龙；丰富的线上活动小礼品等等。不仅让头条号自媒体人实现了切实的收益，而且还帮助作者不断提升自身的创作、运营能力，塑造自媒体人的品牌效应。<br/><br/>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;头条易平台一直以来都致力于为广告主和作者搭建优质的服务平台，我们始终怀着一颗赤诚之心期待着与您的合作。“梦想易现，头条易见！”
</p>
			</div>
			
			<div class="gcon_r">
				<div class="gr_t">
					<img src="__CDN__/assets/img/xmtxy/about1.png" />
				</div>
				<p class="gr_b">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;成功的品牌宣传必然离不开专业的内容团队。<br/><br/>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;头条易平台的专业媒介团队，能够针对广告主的不同需求，第一时间对接入驻平台的头条号自媒体人，与其沟通计划，及视频、文字的投放方案、具体的投放报价，为客户甄选最匹配的头条号，实现文章或视频的垂直传播。<br/><br/>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;头条易平台还拥有着专业的策划团队，为广告主提供个性化宣传策略；专业的文案团队，对自媒体人撰写的稿件进行严格的质量把控；专业的客服团队，随时高效地与广告主进行日常沟通，就广告主的临时需求及时地响应；专业的品牌团队，与广告主全方位合作，从线上到线下，多维度合作共赢，共享圈层经济的硕果。


</p>
			</div>
			
			<div class="gcon_r">
				<div class="gr_t">
					<img src="__CDN__/assets/img/xmtxy/about1.png" />
				</div>
				<div class="gr_b">
<h2>媒介助理</h2>			
职位描述： <br/>
1. 媒体稿件的投放及传播监控；<br/>
2. 协助建立和维护客户的媒体数据库；<br/>
3. 与业务部门沟通新闻事件，独立完成传播稿件的策划与撰写；<br/>
4. 负责媒体计划执行及跟踪分析；<br/>
5. 完成上级交办的各项工作。<br/>
任职要求：<br/>
1. 媒介相关经验1年以上<br/>
2. 立志媒体工作，细心、耐心、责任感强，吃苦耐劳，有较强的团队合作精神。<br/>
<hr/>
<h2>文案策划</h2>
职位描述： <br/>
1、结合时下热点及公司产品，运维公司微信公众号、头条号等社会化媒体，撰写相关文章；<br/>
2、负责广告客户的广告策划，提供方案；<br/>
3、支持公司对外宣传、活动的文案策划相关工作。<br/>
任职要求： <br/>
1、了解微信公众号、头条号等自媒体，爱好文字，有写作能力<br/>
2、有相关工作经验者优先，优秀应届毕业生也欢迎； <br/>
3、有较强的文字驾驭能力；<br/>
4、能够独立编写文案及提供客户策划方案<br/>
5、加分项：熟悉今日头条的自媒体文章风格，善于撰写头条体文章，掌握自媒体文章撰写语言。<br/>
<hr/>
<h2>客户执行</h2>
职位描述： <br/>
1、了解客户的市场推广及所在行业，热诚与客户沟通，根据客户需求制定广告投放计划；<br/>
2、与媒介等部门沟通投放计划，项目跟进并就期间出现的问题进行协调；<br/>
3、配合销售完成客户设定的目标和业绩KPI； <br/>
4、准确无误及时的完成客户的媒体合同确认、下单、发票以及广告物料更新等内外部沟通和流程；<br/> 
5、完成项目总结并针对出现的问题提出改进建议；<br/>
任职要求：<br/>
1、专科或以上学历，计算机、广告、市场营销专业优先；<br/> 
2、拥有1年以上广告、传媒公司经验；<br/>
3、良好的团队合作精神，优秀的互动沟通及表达能力，执行力强； <br/>
4、具有专业服务意识和工作热情，思路清晰，学习能力强，能承担较大压力； <br/>
5、熟练使用Office软件（Word，Excel和PPT），尤其是PPT的整理和美化工作。<br/>
<hr/>
<h2>广告销售经理</h2>
职位描述：<br/>
1、负责对重点行业客户开发和维护，包括影视娱乐、游戏等领域；<br/>
2、能快速把握客户需求，寻求合作切入点，建立项目合作；<br/>
3、完成各项服务工作，包括具体方案策略的制定和优质资源的推荐；<br/>
任职要求：<br/>
1、具备一年以上互联网营销经验，尤其是社媒从业经验，对行业有一定的理解和认识；<br/>
2、拥有丰富的销售经验，取得过良好销售业绩，服务过重点行业客户的优先考虑；<br/>
3、具备良好的沟通能力与项目分析把控能力、提案能力，具备方案提案能力的优先考虑；<br/>
4、自我约束能力强，具备狼性销售本质。</div>
			</div>
			
			<div class="gcon_r">
				<div class="gr_t">
					<img src="__CDN__/assets/img/xmtxy/about1.png" />
				</div>
				<p class="gr_b">邮箱：hezuo@toutiaoeasy.cn<br/>
											<br/>
											电话：010-65212180<br/>
											<br/>
											地址：北京市东城区灯市口大街国中商业大厦1207室
				</p>
			</div>
			
			
			
		</div>
		<!---------------------------------------------footer--------------------------------------------->
		<div id="bot">
			<div class="bot">北京头条易科技有限公司 | 京ICP备16042456号-1</div>
		</div>
	</body>
</html>
