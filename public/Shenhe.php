<?php
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
    $i=1;
    while($i<=99){
    	$time=time();
      $u='assign_begin_time'.'2018-03-06limit10page'.$i.'time'.$time.'verify_agent1'.'xuiYuWZcW8Ov6KqC';
      $u=md5($u);
      $url='http://renzheng-test.snssdk.com/api/verify/verify_list/?assign_begin_time=2018-03-06&verify_agent=1&time='.$time.'&page='.$i.'&limit=10&token='.$u; 
      $html = (json_decode(file_get_contents($url),true)); 
foreach($html['data'] as $h){
	if($h['id']<=0)
	exit;
	//$mysqli = M();
	
	$sql ="INSERT INTO fa_shenhe (agent_id, agent_name,assign_time,auth_info,company_name,create_time,name,status,uid,verify_agent,verify_agent_name,verify_agent_name,id) VALUES (".$h['agent_id'].",'".$h['agent_name']."',".$h['assign_time'].",".$h['auth_info'].",'".$h['company_name']."',".$h['create_time'].",'".$h['name']."',".$h['status'].",".$h['uid'].",".$h['verify_agent'].",'".$h['verify_agent_name']."',".$h['id'].")";
$res = $mysqli->query($sql);
	echo ''.$h['agent_id'].'-----'.$h['agent_name'].'-----'.$h['assign_time'].'-----'.$h['auth_info'].'-----'.$h['company_name'].'-----'.$h['create_time'].'-----'.$h['name'].'-----'.$h['status'].'-----'.$h['uid'].'-----'.$h['verify_agent'].'-----'.$h['verify_agent_name'].'-----'.$h['id'].'<br>';
    }
    	$i++;
    }
    




?>

