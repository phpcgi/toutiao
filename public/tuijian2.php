<html>
	<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="/jquery.inav-min.css" type="text/css" media="all" />
<script type="text/javascript" src="/jquery.js"></script>
<script type="text/javascript" src="/jquery.inav-packed.js"></script>


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
	font-size:14px;
	color:#ffffff;
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
	
	
	
</style>
</head>
<body>

<table style="width:1200px;z-index:1;background: url(tjbj2.png);align:center;border-collapse: separate; border-spacing: 0px;">
<tr><td align="center">
	<table style="width:1000px;"">
	<tr>
		<td style="height:65px;width:1000px;" valign="bottom">
热点追踪 > 智能推荐 > 选择头条号

		</td></tr></table>	
</td></tr>
					<tr><td colspan="4"><hr style="height:1px;border:none;border-top:1px solid #ffffff;" />
					</td></tr>
<tr><td align="center">
	<table style="width:1000px;"">
		<tr height="50"><td></td></tr>
	<tr><form action="tuijian3.php" method="POST" name="fileForm">
		<td style="height:75px;width:130px;" align="right" valign="middle">
<font color="#db3932">*</font> <font style="font-size:18px;">类别：</font><br>
</td><td style="height:55px;width:850px;" colspan="3">
	<div  onclick="l1()" style="cursor:pointer;border-style:solid;border-width: 1px;border-color:#ffffff;width:800px;height:33px;line-height:33px;">　<input value="全部" id="lei1" type="text" style="width:300px;border:0px;background-color:transparent;color:#95aaec;" disabled="disabled" ><input value="全部" id="lei2" name="type" type="text" style="width:0px;border:0px;background-color:transparent;color:#95aaec;"><img src="/tjsan.png" align="right"></div>
		</td></tr>
	<tr>
		<td style="height:75px;width:130px;" align="right" valign="middle">

<font color="#db3932">*</font> <font style="font-size:18px;">帐号分布：</font><br>
</td><td style="height:55px;width:300px;" valign="middle">
	<div  style="border-style:solid;border-width: 1px;border-color:#ffffff;width:320px;height:33px;line-height:33px;">　<font color="#95aaec" style="cursor:pointer;" onclick="f1()" id="f1">领域等比分布</font><font color="#95aaec" style="margin-left:60px;cursor:pointer;" onclick="f2()" id="f2">阅读量等比分布</font></div>
	</td><input type="hidden" name="fen" value="0" id="fen" /><td width="150" align="right">
	
<font color="#db3932">*</font> <font style="font-size:18px;">项目预算：</font>	
	</td><td>
		<div  style="border-style:solid;border-width: 1px;border-color:#ffffff;width:320px;height:33px;line-height:33px;">　<input value="  请输入（/万）" id="content" name="m" onclick="clear1()" onkeyup=my() type="text" style="width:300px;border:0px;background-color:transparent;color:#dbe3fe;"></div>
		</td></tr>
	<tr>
		<td style="height:75px;width:130px;" align="right" valign="middle">

<font color="#db3932">*</font> <font style="font-size:18px;">预算浮动：</font>
</td><td style="height:50px;width:850px;" valign="middle" colspan="3">
		<div  style="border-style:solid;border-width: 1px;border-color:#ffffff;width:800px;height:33px;line-height:33px;">　<font color="#95aaec" style="cursor:pointer;" onclick="h1()" id="h1">不高于预算</font><font color="#95aaec" style="margin-left:70px;cursor:pointer;" onclick="h2()" id="h2">－１０％－１０％</font><font color="#95aaec" style="margin-left:70px;cursor:pointer;" onclick="h3()" id="h3">－２０％－２０％</font></div>
		</td><input type="hidden" id="bi" name="bi" value="0" /></tr>				
		
	<tr>
		<td style="height:55px;width:100px;" align="right" valign="top">


</td><td style="height:265px;width:900px;"  valign="middle" colspan="3">
	<button type="button" style="background-color:#db3932;font-size: 16px;color: white;height:35px;width:80px;border: none;margin-left:617px;border-radius: 5px;" onClick="location.href='tuijian1.php'">上一步</button>	
						<button type="button" style="background-color:#db3932;font-size: 16px;color: white;height:35px;width:80px;border: none;margin-left:20px;border-radius: 5px;" onclick="submitBtnClick()" id="xia" disabled="disabled">下一步</button>
		</td></tr>			
		</table>	
</td></tr></form>  
</table>	

<div id="l1" style="background-color:#ffffff;display:none;width:650px;height:350px;margin-top:-430px;margin-left:388px;z-index:9999999;position:relative;"><div class="formword">
<table>
	<tr><td width="15"></td>
		<td width="600" height="30" colspan="6">
			<font style="font-size:18px;color:#2c2c2c;">选择行业类型</font><font color="#db3932">（最多选择３个）</font>
		</td>
	</tr>
			<tr>
		<td width="600" height="20" colspan="7">
		</td>
	</tr>
<tr  height="40"><td width="15"></td>
	<td style="color:#2c2c2c;width:105px;font-size:18px;">
            <input type="checkbox" name="leilei" value="科技"/>科技
	</td>
	<td style="color:#2c2c2c;width:105px;font-size:18px;">
            <input type="checkbox" name="leilei" value="财经"/>财经
		</td>
		<td style="color:#2c2c2c;width:105px;font-size:18px;">
            <input type="checkbox" name="leilei" value="动漫"/>动漫</td>
		<td style="color:#2c2c2c;width:105px;font-size:18px;">
            <input type="checkbox" name="leilei" value="房产"/>房产</td>
		<td style="color:#2c2c2c;width:105px;font-size:18px;">
            <input type="checkbox" name="leilei" value="股票"/>股票</td>
		<td style="color:#2c2c2c;width:60px;font-size:18px;">
            <input type="checkbox" name="leilei" value="家具"/>家具</td>
</tr>	
<tr height="40"><td width="15"></td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="健康"/>健康</td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="教育"/>教育</td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="军事"/>军事</td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="历史"/>历史</td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="两性"/>两性</td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="旅游"/>旅游</td>		
	
</tr>	
<tr height="40"><td width="15"></td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="美食"/>美食</td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="汽车"/>汽车</td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="社会"/>社会</td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="时尚"/>时尚</td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="时政"/>时政</td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="数码"/>数码</td>
		
</tr>	
<tr height="40"><td width="15"></td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="体育"/>体育</td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="文化"/>文化</td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="星座"/>星座</td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="艺术"/>艺术</td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="影视"/>影视</td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="游戏"/>游戏</td>
</tr>	
<tr height="40"><td width="15"></td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="娱乐"/>娱乐</td>
<td style="color:#2c2c2c;font-size:18px;">
            <input type="checkbox" name="leilei" value="育儿"/>育儿</td>
</tr>	
	</tr>
			<tr>
		<td width="600" height="20" colspan="7" align="right">
								<button  onclick="l2()" type="button" style="background-color:#4a90e2;font-size: 16px;color: white;height:35px;width:80px;border: none;">确定</button>　　
					<button onclick="l4()" type="button" style="background-color:#db3932;font-size: 16px;color: white;height:35px;width:80px;border: none;">重置</button>		　 								
		</td>
	</tr>
</table></div></div>



<div id="l3" style="background-image:url(tjbj22.png);background-repeat:no-repeat; background-size:100% 100%;-moz-background-size:100% 100%;display:none;width:689px;height:388px;margin-top:-362px;margin-left:368px;z-index:9999;position:relative;"><div class="formword"></div>
</body>



<script type="text/javascript">
function submitBtnClick(){
document.fileForm.submit();
}
	
            var count = 0;
            onload = function(){
                var cks = document.querySelectorAll("td input[type=checkbox]");
            //var count = cks.length;
                for(var i=0;i<cks.length;i++){
                        if(cks[i].checked){
                            count++;
                        }      
                    
                }
                            
                        	
                var cks = document.querySelectorAll("div.formword input[type=checkbox]");
                for(var i=0;i<cks.length;i++){
                    var cki = cks[i];
                    cki.onchange = function(){
                        if(this.checked){
                            count++;
                        }
                        else{
                            count--;
                        }
                        if(count>3){
                            //alert("选择不能超过3个");
                            this.checked=false;
                            count--;
                        }
                    }
                }
            }
function my(){
	var m = document.getElementById('content');
	if(m.value>=1){
		var xia=document.getElementById("xia");
xia.disabled="";
	}
	else
		{
var xia=document.getElementById("xia");
xia.disabled="disabled";
		}
	
}
function clear1(){
   //获取输入框dom元素
   var inputObj = document.getElementById('content');
   if(inputObj.value == '  请输入（/万）'){
       inputObj.value = '';
       inputObj.style.color="#ffffff";
   }
}
function f1(){
var f1=document.getElementById("f1");
f1.style.color="#ffffff";
var f2=document.getElementById("f2");
f2.style.color="#95aaec";
var fen=document.getElementById("fen");
fen.value=1;
}
function f2(){
var f2=document.getElementById("f2");
f2.style.color="#ffffff";
var f1=document.getElementById("f1");
f1.style.color="#95aaec";
var fen=document.getElementById("fen");
fen.value=2;
}

function h1(){
var h1=document.getElementById("h1");
h1.style.color="#ffffff";
var h2=document.getElementById("h2");
h2.style.color="#95aaec";
var h3=document.getElementById("h3");
h3.style.color="#95aaec";
var bi=document.getElementById("bi");
bi.value=1;
}
function h2(){
var h1=document.getElementById("h1");
h1.style.color="#95aaec";
var h2=document.getElementById("h2");
h2.style.color="#ffffff";
var h3=document.getElementById("h3");
h3.style.color="#95aaec";
var bi=document.getElementById("bi");
bi.value=2;
}
function h3(){
var h1=document.getElementById("h1");
h1.style.color="#95aaec";
var h2=document.getElementById("h2");
h2.style.color="#95aaec";
var h3=document.getElementById("h3");
h3.style.color="#ffffff";
var bi=document.getElementById("bi");
bi.value=3;
}

function l1(){
var l1=document.getElementById("l1");
l1.style.display="";
var l3=document.getElementById("l3");
l3.style.display="";
}
function l2(){
var l2=document.getElementById("l1");
l2.style.display="none";
var l3=document.getElementById("l3");
l3.style.display="none";
var leilei=document.getElementsByName("leilei");
var leilei1="";
for(var i=0;i<leilei.length;i++){  
if(leilei[i].checked==true)
{
	leilei1+=leilei[i].value+"　";
}
            } 
if(leilei1=="")
leilei1="全部";            
var lei1=document.getElementById("lei1");
lei1.value=leilei1;
var lei2=document.getElementById("lei2");
lei2.value=leilei1;
lei1.style.color="#ffffff";
}
function l4(){
	count = 0;
var leilei=document.getElementsByName("leilei");
var leilei1="";
for(var i=0;i<leilei.length;i++){  
leilei[i].checked=false
} 
var lei1=document.getElementById("lei1");
lei1.value="全部";
var lei2=document.getElementById("lei2");
lei2.value="全部";
lei1.style.color="#95aaec";
}
</script>
</html>
