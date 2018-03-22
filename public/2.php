<meta http-equiv="Content-Type" content="text/html; charset=utf-8">    
<?php
error_reporting(0);
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
    die("could not connect to the db:\n" .  $mysqli->error);
}



/*     

$sql ="select id,createtime from fa_order_ad where id>=215";
$res = $mysqli->query($sql);
while ($r = $res->fetch_assoc())
{
	
$tt=rand(2,5);
$t=date('Y-m-d H:i:s',strtotime($r['createtime'])+$tt*24*3600);
$sql ="update fa_order_ad set time='".$t."',newtime='".$t."' where id=".$r['id'];
$mysqli->query($sql);
echo $r['createtime'].'--'.$t.'<br>';

}


     
            (type='财经' or type='科技' or type='数码')and (type='生活' or type='娱乐')

*/

$a=0;
$t='2017-07-01';//日期月
$id=306;//项目ＩＤ
$puttime='2017-07-19 00:00:00';//实际投放时间
$sql ="select * from fa_data_month where time like '%".$t."%'  and worth<=1000 and R<2000000 and R>20000 order by rand() limit 28";
$res = $mysqli->query($sql);
while ($r = $res->fetch_assoc())
{
	$a++;
	echo $a."-".$r['name'].'<br>';
            $cost =  round($r['R']/1000*50,0);
            if($cost < 3500){
                $cost = 3500;
            }	
$sql ="insert into fa_orderext_ad (tid,name,orderid,DataMonthid,type,avatar_url,sum_fans_count,R,A4,worth,cost,puttime,factcost) VALUES ('".$r['tid']."','".$r['name']."',".$id.",".$r['id'].",'".$r['type']."','".$r['avatar_url']."',".$r['sum_fans_count'].",".$r['R'].",".$r['A4'].",".$r['worth'].",".$cost.",'".$puttime."',".$cost.")";
$mysqli->query($sql);
}
$mysqli->close();
?>
