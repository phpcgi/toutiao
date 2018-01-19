<?php
if(@$_GET['p']!="isdfna89328dssd9dsf")
exit;
session_start();
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
//date_default_timezone_set（utc）;
$perNumber=12; //每页显示的记录数 
@$page=$_GET['page']; //获得当前的页面值  
$res = $mysqli->query("select id from tuiguang");
$totalNumber = mysqli_num_rows($res) ;//获得记录总数
$totalPage=ceil($totalNumber/$perNumber); //计算出总页数
if (!isset($page)) {  
 $page=1;  
} 
if ($page<1) {  
 $page=1;  
} //如果没有值,则赋值1  
$startCount=($page-1)*$perNumber; //分页开始,根据此方法计算出开始的记录 

$sql ="select * from tuiguang  order by id desc limit $startCount,$perNumber";
$res = $mysqli->query($sql);
echo "<table><tr><td width='200'>手机号</td><td width='200'>时间</td><td width='200'>来源</td></tr>";
while ($r = $res->fetch_assoc())
{
	if($r['yuan']=="")
	$yuan='ＰＣ端';
	else
	$yuan=$r['yuan'];
	echo "<tr><td>".$r["phone"]."</td><td>".$r["time"]."</td><td>".$yuan."</td></tr>";
}
echo "</table>";
if($page>1){
$page1=$page-1;
echo '<a href="?page='.$page1.'&a=divsdfkjdidfj;sdovijjdsojf8dsf98ds7f98ds&p=isdfna89328dssd9dsf">上一页</a> 　 ';
}
if($page < $totalPage){
$page2=$page+1;
echo '<a href="?page='.$page2.'&a=sdisdkljfvdihvkdsv8d7yfdsifkjdshuidshfds&p=isdfna89328dssd9dsf">下一页</a> 　 ';
}
$mysqli->close();
?>
 

                                                              