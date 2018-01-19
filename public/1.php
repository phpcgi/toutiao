<meta http-equiv="Content-Type" content="text/html; charset=utf-8">    
<?php
session_start();
$mysql_conf = array(
    'host'    => '127.0.0.1', 
    'db'      => 'wwwdb', 
    'db_user' => 'root', 
    'db_pwd'  => 'u8nWt7HULpqK', 
    );

$mysqli = @new mysqli($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);
if ($mysqli->connect_errno) {
    die("could not connect to the database:\n" . $mysqli->connect_error);//֯�Ё��Ӵ
}
$mysqli->query("set names 'utf8';");//�ძת��
$select_db = $mysqli->select_db($mysql_conf['db']);
if (!$select_db) {
    die("could not connect to the db:\n" .  $mysqli->error);
}
$z1=0;
$z2=0;
$z3=0;

$sql ="select * from fa_kind_category";
$res = $mysqli->query($sql);
echo "<table><tr><td width='200'>类别</td><td width='200'>数量</td><td width='200'>粉丝数量</td><td width='200'>一天内阅读量之和</td></tr>";
while ($r = $res->fetch_assoc())
{
$res1 = $mysqli->query("select id from fa_genre where type='".$r['name']."'");
$totalNumber = mysqli_num_rows($res1) ;
$res1 = $mysqli->query("select  *,count(distinct tid) from fa_data where type='".$r['name']."' group by tid");
$totalNumber2=0;
while ($r1 = $res1->fetch_assoc())
{
	$totalNumber2=$totalNumber2+$r1['fans_count'];
}
$res1 = $mysqli->query("select sum(view_count) as vcount from fa_data where time='2018-01-17' and type='".$r['name']."'");
while ($r1 = $res1->fetch_assoc())
{
	$totalNumber3=$r1['vcount'];
}

	echo "<tr><td>".$r["name"]."</td><td>".$totalNumber."</td><td>".$totalNumber2."</td><td>".$totalNumber3."</td></tr>";
	$z1=$z1+$totalNumber;
	$z2=$z2+$totalNumber2;
	$z3=$z3+$totalNumber3;
}
echo "<tr><td width='200'>总计</td><td width='200'>".$z1."</td><td width='200'>".$z2."</td><td width='200'>".$z3."</td></tr></table>";

$mysqli->close();
?>
