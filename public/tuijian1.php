<html>
	<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="/jquery.inav-min.css" type="text/css" media="all" />
<script type="text/javascript" src="/jquery.js"></script>
<script type="text/javascript" src="/jquery.inav-packed.js"></script>
<?php

@$type=$_GET['type'];
if($type=='')
$type="全部";
@$page=$_GET['page'];
if($page<=1)
$page=1;
$typei=array("全部","健康","收藏","教育","传媒","动漫","军事","视频","移民","技术","文化","国际","育儿","财经","时政","体育","宠物","心理","三农","娱乐","社会","科技","科学","房产","旅游","家居","时尚","游戏","汽车","美食","数码","历史");
for ($i=0; $i<=31; $i++) {
  if($type==$typei[$i])
  {
  $lei[$i]=' class="type"';
  if($i>=6)
  $yi=($i-5)*77;
}
  else
  $lei[$i]='';
} 

?>

<style>
.type{
  font-size:24px;
	color:#ffffff;
	font-family:微软雅黑;
	height:60px;
	width:50px;
	margin-top:-5px;
}
td{
	font-size:12px;
	color:#4e4e4e;
	font-family:微软雅黑;

	}

	li{
	font-size:18px;
	color:#c0c0c0;
	font-family:微软雅黑;
	height:60px;
	width:50px;
	}
	a{text-decoration:none}
	
	
	
.M-box,.M-box1,.M-box2,.M-box3,.M-box4{
	position: relative;
    text-align: center;
  	zoom: 1;
}
.M-box:before,.M-box:after,.M-box1:before,.M-box1:after ,.M-box2:before,.M-box2:after ,.M-box3:before,.M-box3:after,.M-box4:before,.M-box4:after{
    content:"";
    display:table;
}
.M-box:after,.M-box1:after,.M-box2:after,.M-box3:after,.M-box4:after{
	clear:both;
	overflow:hidden;
}
.M-box span,.M-box1 span,.M-box2 span,.M-box3 span,.M-box4 span{
	float: left;
	margin:0 5px;
	width:20px;
    height: 20px;
    line-height: 20px;
    color: #bdbdbd;
    font-size: 14px;
    border-radius: 50%;/*我加的*/
}
.M-box .active,.M-box1 .active,.M-box2 .active,.M-box3 .active,.M-box4 .active{
	float: left;
	margin:0 5px;
	width: 20px;
    height: 20px;
    line-height: 20px;
    background: #F85959;
    color: #fff;
    font-size: 14px;
    border: 1px solid #F85959;
    border-radius: 50%;/*我加的*/
}
.M-box a,.M-box1 a,.M-box2 a,.M-box3 a,.M-box4 a{
	float: left;
	margin:0 5px;
	width: 20px;
    height: 20px;
    line-height: 20px;
    background: #fff;
    border: 1px solid #ebebeb;
    color: #bdbdbd;
    font-size: 14px;
    border-radius: 50%;/*我加的*/
}
.M-box a:hover,.M-box1 a:hover,.M-box2 a:hover,.M-box3 a:hover,.M-box4 a:hover{
	color:#fff;
    background: #f85959;
}
.M-box .next,.M-box .prev,.M-box1 .next,.M-box1 .prev{
	font-family: "Simsun";
    font-size: 16px;
    font-weight: bold;
}
</style>
</head>
<body>

<table style="width:1200px;z-index:999;background: url(tjbj.png);align:center;border-collapse: separate; border-spacing: 0px;">
	<tr style="background: url(tjdh.png);height=20px;">
		<td style="height:65px;width:100px;">


			
				<div class="inav-showcase" id="inav">
					<div class="inav-arrows">
<a href="javascript:void(0);" class="inav-prev-item inav-arrow"><font color="#ffffff" style="font-size:24px;"><</font></a>
<a href="javascript:void(0);" class="inav-next-item inav-arrow"><font color="#ffffff" style="font-size:24px;">></font></a>
</div>
		<div class="inav-menu"></div>
		
		<div class="inav-slides" style="height:60px;">

					<ul style="margin-left: 0px;">
<?php
for ($i=0; $i<=31; $i++) {
 // echo '<a href="?type='.$typei[$i].'"><li'.$lei[$i].'>'.$typei[$i].'</li></a>';
 echo '<li id="li'.$i.'" name="li" onclick="tt'.$i.'()" style="cursor:pointer;">'.$typei[$i].'</li>';
} 
?>						

			</ul>
		</div></div>
			
		</td>
	</tr>
	<tr><td colspan="4" height="7"></td></tr>
<?php
error_reporting(0);
for ($i=0; $i<=31; $i++) {
						if($i!=0)
					$nn='style="display:none;"';
					else
					$nn='';
	echo '<tr><td width="100%" align="center"><table '.$nn.' name="lei" id="lei'.$i.'" >';
 $url='http://ocean.tarsocial.com/api/toutiao/hot/issues?access_token=qxWDGYVzJUNuTxihUdrX9Hutcp1Eon&page_num='.$page.'&page_size=6&category='.$typei[$i]; //.'&start_time='.date("Y-m-d",time()-3600*24*3)
 $html = (json_decode(file_get_contents($url),true));  

foreach($html as $v1) {
			foreach($v1 as $v4) {
				$hot=$v4["score"];
				$size="";
				$size1=1;
				foreach($v4["keywords"] as $vk) {
					$size.='<nobr> <font style="border-style:solid;border-width: 1px;border-color:#dfdfdf;">　'.$vk.'　</font> </nobr>';
					if($size1>=3)
					{
					$size.='<br>';
					$size1=1;
				}
					$size1+=1;
				}
				//echo "<br>分类：".$v4["classification"]."<br>";
				$fen=$v4["articles"][0]["share_count"];
					$title=$v4["articles"][0]["title"];
					//echo $v4["articles"][0]["url"]."<br>";
					//echo "<br><br>";

					echo '<tr><td width="100%" align="center" height="50" >
					<table width="1000" cellpadding="0" cellspacing="0">
					<tr><td valign="top" width="1%">
					<div style="color:#3e3e3e;font-size:16px;">﹡</div></td>
					<td width="33%">
					<div style="color:#3e3e3e;font-size:16px;">'.mb_substr($title,0,18, 'utf-8').'</div><br><br>
					<div style="color:#db3932">分享数'.$fen.'</div></td>
					<td width="33%" align="center" style="line-height:28px;">'.$size.'</td>
					<td width="33%" align="right"  valign="bottom">
					<div style="color:#db3932">热度值'.$hot.'</div></td></tr>
					<tr><td colspan="4"><hr style="height:1px;border:none;border-top:1px solid #dfdfdf;" />
					</td></tr>
					</table>
					</td></tr>';
}
}
echo '</table></td></tr>';
}
if($page!=1)
{
	$prev1=$page-1;
	$prev='<a href="?type='.$type.'&page='.$prev1.'" class="prev">&lt;</a>';
}
else
  $prev='';
  
if($page!=1)
  $page1='<a href="?type='.$type.'&page=1" data-page="1">1</a>';  
else
  $page1='<span class="active">1</span>';
if($page!=2)
  $page2='<a href="?type='.$type.'&page=2" data-page="2">2</a>';  
else
  $page2='<span class="active">2</span>';
if($page!=3)
  $page3='<a href="?type='.$type.'&page=3" data-page="3">3</a>';  
else
  $page3='<span class="active">3</span>';
if($page!=4)
  $page4='<a href="?type='.$type.'&page=4" data-page="4">4</a>';  
else
  $page4='<span class="active">4</span>';
if($page!=5)
  $page5='<a href="?type='.$type.'&page=5" data-page="5">5</a>';  
else
  $page5='<span class="active">5</span>';      
  
if($page!=5)
{
	$next1=$page+1;
	$next='<a href="?type='.$type.'&page='.$next1.'" class="next">&gt;</a>';
}
else
  $next='';
?>
<tr><td width="100%" height="90">
	<table>
		<tr>
			<td width="1000" height="90" align="center">
				<div class="m-box1"style="margin-left: 350px;margin-top: 10px;float: left;">
				<?php //echo $prev.$page1.$page2.$page3.$page4.$page5.$next; ?>
				</div>

			</td>
			<td width="170"  align="right">
					<button type="button" style="background-color:#db3932;font-size: 16px;color: white;height:35px;width:80px;border: none;border-radius: 5px;" onClick="location.href='tuijian2.php'">下一步</button>				
			</td>
		</tr>
	</table>

	
</td></tr>


</table>	
</body>



<script type="text/javascript">
$(function(){
	var $nav = $( '#inav' ).inav({
		autoCenterMenu     : true,
		itemWidth          : 77,
		carouselAutoScroll : true
	});
});

<?php 
for ($i=0; $i<=31; $i++) {
echo '

function tt'.$i.'(){
var lei=document.getElementsByName("lei");
for(var i=0;i<lei.length;i++){  
lei[i].style.display="none";
            }  
var lei'.$i.'=document.getElementById("lei'.$i.'");
lei'.$i.'.style.display="";
var li=document.getElementsByName("li");
for(var i=0;i<li.length;i++){  
li[i].className="";
            } 
var li'.$i.'=document.getElementById("li'.$i.'");
li'.$i.'.className="type";
}
';
} 
?>
</script>
</html>
