<?php
session_start();
if(date("d",time())==1)
{
	$rc=date('Y-m',strtotime('-2 month'));
}
	else
	{
$rc=date('Y-m',strtotime('-1 month'));
}
$phone=file_get_contents('php://input');
if($phone!="") {
$type=$_POST['type'];
if($type=="全部")
{
  $where1="";
  $types=0;
  }
else{
$type1 = explode("　", $type);
 $where1=" and (";
 $a=1;
 $types=0;
 $i=1;
foreach($type1 as $val){
	if($val!='')
	{
		$typename[$i]=$val;
		$i++;
		$types++;
		if($a==1){
		$where1.=" type='".$val."'" ;
		$a=2;
	}
		else
		{
  $where1.=" or type='".$val."'" ;
  }
  }
}
$where1.=")";
}
$m=$_POST['m'];
if($m>50)
$m=50;
$m1=$m*1000/50*10000;
$fen=$_POST['fen'];
$fens=3;
if($fen==1)
{
$fen="领域等比分布";
$fens=1;
if($type=="全部")
{
$where1=" " ;
  }
  else{
  	$where1=" and type='".$typename[1]."'" ;
  	
  }

}
else
{
	$types=1;
	$fen="阅读量等比分布";
}

$bi=$_POST['bi'];
if($bi==1)
{
$bi="不高于预算";
}
elseif($bi==2)
{
$bi="－１０％－１０％";
$m1=$m1*1.1;
}
else
{
$bi="－２０％－２０％";
$m1=$m1*1.2;
}
$mzong=$m1/1000*50;
$m1=$m1/3;
$where="where R<=".(int)$m1." ".$where1;
}

$mysql_conf = array(
    'host'    => '127.0.0.1', 
    'db'      => 'wwwdb', 
    'db_user' => 'root', 
    'db_pwd'  => 'u8nWt7HULpqK', 
    );

$mysqli = @new mysqli($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
if ($mysqli->connect_errno) {
    die("could not connect to the database:\n" . $mysqli->connect_error);//诊断连接错误
}
$mysqli->query("set names 'utf8';");//编码转化
$select_db = $mysqli->select_db($mysql_conf['db']);
if (!$select_db) {
    @die("could not connect to the db:\n" .  $mysqli->error);
}
$sql ="select * from fa_data_month ".$where." and time like '%".$rc."%' order by R desc limit 0,".$fens;
$res = $mysqli->query($sql);
//echo $sql;
?>
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
	color:#2c2c2c;
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
	
            table thead,
            table tfoot,
            tbody tr {
                display: table;
                width: 100%;
                table-layout: fixed;
            }
	            table tfoot,
	            table thead {
                width: calc( 100% - 1em)
            }
</style>
</head>
<body>

<table style="width:1200px;z-index:1;background: url(tjbj2.png);align:center;border-collapse: separate; border-spacing: 0px;">
<tr><td align="center">
	<table style="width:873px;"">
	<tr>
		<td style="height:65px;width:1000px;" valign="bottom">
<font color="#ffffff">热点追踪 > 智能推荐 > 选择头条号</font>

		</td></tr></table>	
</td></tr>
					<tr><td colspan="4"><hr style="height:1px;border:none;border-top:1px solid #ffffff;" />
					</td></tr>
<tr><td align="center" height="700" valign="top">

</td></tr>
</table>	

<div style="margin-left:150px;margin-top:-673px;width:915px;height:177px;background-image:url(tjbj31.png);background-repeat:no-repeat; background-size:100% 100%;-moz-background-size:100% 100%;z-index:99999;position:relative;">
	<table bgcolor="#f5f5f5"  width="873" height="135" style="margin-left:21px;margin-top:14px;position:absolute;">
	<tr height="30"><td></td><td></td></tr>
		<tr><td width="80"></td><td >
			<font style="font-size:18px;color:#2c2c2c;">类别：<?php echo $type; ?></font>
			</td><td>
	　　<font style="font-size:18px;color:#2c2c2c;">帐号分布：<?php echo $fen; ?></font>
		</td></tr>			
		<tr><td width="80" height="50"></td><td >
			<font style="font-size:18px;color:#2c2c2c;">预算：<?php echo $m; ?>万</font>
			</td><td>
	　　<font style="font-size:18px;color:#2c2c2c;">预算浮动：<?php echo $bi; ?></font>
		</td></tr>	
		<tr height="20"><td></td><td></td></tr>	
		</table>	</div>






	


<div style="margin-left:150px;margin-top:-20px;width:915px;height:329px;background-image:url(tjbj32.png);background-repeat:no-repeat; background-size:100% 100%;-moz-background-size:100% 100%;z-index:99999;position:relative;">
	<table bgcolor="#ffffff" width="873" height="287" style="border-color:#f5f5f5;margin-left:21px;margin-top:14px;position:absolute;" border="0"  cellpadding="0" cellspacing="0" bordercolor="#f5f5f5" rules=rows>
<thead>

			<tr  bgcolor="#ffffff" height="35"><td width="10"></td><td colspan="7">
			<font style="font-size:15px;color:#000000;">推荐方案</font>
								<button type="button" style="background-color:#db3932;font-size: 13px;color: white;height:19px;width:70px;border: none;margin-left:703px;border-radius: 3px;display:none;">换一批</button>	
		</td></tr>	

				<tr  bgcolor="#f5f5f5" height="12"><td width="10"></td><td>头条号名称</td>
		<td align="center">类别</td>
<td align="center">粉丝数</td>
<td align="center">预期阅读量</td>
<td align="center">价格</td>
<td align="center">详情</td>
<td align="center">操作</td>		
		</tr>	
		</thead>	
	<tbody style="display: block;height: 195px;overflow-y: scroll;">			
		<?php
		
		$zong=0;
while ($r = $res->fetch_assoc())
{
echo '					<tr  bgcolor="#ffffff" height="12"><td width="10"></td><td><font color="#db3932">'.$r['name'].'</font></td>
		<td align="center">'.$r['type'].'</td>
<td align="center">'.$r['sum_fans_count'].'</td>
<td align="center">'.(int)$r['R'].'</td>
<td align="center">'.round($r['R']/1000*50,0).'元／次</td>
<td align="center"><font color="#db3932">查看详情</font></td>
<td align="center"><input type="checkbox" kk="'.$r['id'].'" name="'.$r['id'].'" value="'.round($r['R']/1000*50,0).'" checked /></td>		
		</tr>	
	';
	$zong+=round($r['R']/1000*50,0);
	$R=$r['R'];
}		
$ii=0;
$typess=2;
$R1=$R;
$R2=$R;
$R3=$R;
while($zong<=$mzong && $ii<197)
{
	if($types>1)
	{
		if($typess==1)
		{
		$where1=" and type='".$typename[1]."'" ;
		$where="where R<".$R1." ".$where1;
		}elseif($typess==2)
		{
		$where1=" and type='".$typename[2]."'" ;
		$where="where R<".$R2." ".$where1;		
		}
		else
		{
		$where1=" and type='".$typename[3]."'" ;
		$where="where R<".$R3." ".$where1;		
		}
		
	}
	else
	$where="where R<".$R." ".$where1;
$sql ="select * from fa_data_month ".$where." and time like '%".$rc."%' order by R desc limit 0,1";

$res = $mysqli->query($sql);
while ($r = $res->fetch_assoc())
{
	if(round($r['R']/1000*50,0)<200)
	continue;//如果小于１００元就不显示
$zong+=round($r['R']/1000*50,0);
	if($zong<=$mzong){
		echo '					<tr  bgcolor="#ffffff" height="12"><td width="10"></td><td><font color="#db3932">'.$r['name'].'</font></td>
		<td align="center">'.$r['type'].'</td>
<td align="center">'.$r['sum_fans_count'].'</td>
<td align="center">'.(int)$r['R'].'</td>
<td align="center">'.round($r['R']/1000*50,0).'元／次</td>
<td align="center"><font color="#db3932">查看详情</font></td>
<td align="center"><input type="checkbox" kk="'.$r['id'].'" name="'.$r['id'].'" value="'.round($r['R']/1000*50,0).'" checked /></td>		
		</tr>	
	';
		
	}
	$ii++;
	$R=$r['R'];
	if($types>1)
	{
		if($typess==1)
		{
			$R1=$r['R'];
		}elseif($typess==2)
		{
			$R2=$r['R'];
		if($types>2){}
		else{}
		}
		else
		{
			$R3=$r['R'];
		}
		
	}
}
	$ii++;
	if($types>1)
	{
		if($typess==1)
		{
		$typess=2;
		}elseif($typess==2)
		{
		if($types>2)
		$typess=3;
		else
		$typess=1;
		}
		else
		{
		$typess=1;			
		}
		
	}
}
		?>

	</tbody>	
				<tfoot>
				<tr  bgcolor="#f5f5f5" height="35"><td width="10"></td><td colspan="7" align="right">
			共选择头条号<font color="#db3932" id="j"></font>家，订单共计金额：￥<font  id="m"></font>元　<button type="button" style="background-color:#db3932;font-size: 13px;color: white;height:19px;width:50px;border: none;margin-right:10px;border-radius: 3px;" onclick="gouwuche()" id="jiao">提交</button>	
		</td></tr>	
</tfoot>
		</table>	</div>



<div style="margin-left:150px;margin-top:40px;width:915px;height:329px;z-index:99999;position:relative;">
						<button type="button" style="background-color:#db3932;font-size: 13px;color: white;height:35px;width:100px;border: none;margin-left:795px;border-radius: 5px;" onClick="location.href='tuijian2.php'">返回上一页</button>	
							</div>
<?php 

?>
</body>



<script type="text/javascript">

            onload = function(){
                var cks = document.querySelectorAll("td input[type=checkbox]");
            var count = cks.length;
            var m=0;      
            for(var i=0;i<cks.length;i++){
            	m+=Number(cks[i].value);
            }          
                for(var i=0;i<cks.length;i++){
                    var cki = cks[i];
                    cki.onchange = function(){
                        if(this.checked){
                            count++;
                            m+=Number(this.value);
                        }
                        else{
                            count--;
                            m-=Number(this.value);
                        }
                var d = document.getElementById('m');
                d.innerHTML = m;
                var j = document.getElementById('j');
                j.innerHTML = count;                          
                    }
                }
                var d = document.getElementById('m');
                d.innerHTML = m;
                var j = document.getElementById('j');
                j.innerHTML = count;               
            }

	 //---------购物车-------------
	function gouwuche(){
         var tuijian = document.querySelectorAll("td input[type=checkbox]");
                for(var i=0;i<tuijian.length;i++){
                    	if(tuijian[i].checked){
                    		var b=tuijian[i].name;
                    		 //alert(b);
						$.ajax( {
		        				type : "POST",  
		        				url : "/apiweb/ad/Order/orderextadd",  
		        				data: {id:b},
		       				 success : function(msg) {
		       				 }
		       			})
		       		}
					
				}
var jiao=document.getElementById("jiao");
jiao.disabled="disabled";				
window.location.href = contextPath + "/index/Xhc";
	    	}
</script>
</html>
