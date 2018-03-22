<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<table><tr><td>销售代表</td><td>销售代表</td><td>分配时间</td><td>认证信息</td><td>公司名称</td><td>认证信息时间</td><td>用户名称</td><td>status</td><td>用户ID</td><td>审核公司ID</td><td>审核公司</td><td>ID</td></tr>
<?php
$time=time();
$u='assign_begin_time'.'2018-01-01limit10page1time'.$time.'verify_agent1'.'xuiYuWZcW8Ov6KqC';
$u=md5($u);
 $url='http://renzheng-test.snssdk.com/api/verify/verify_list/?assign_begin_time=2018-01-01&verify_agent=1&time='.$time.'&page=1&limit=10&token='.$u; 
 $html = (json_decode(file_get_contents($url),true)); 
//var_dump($html['data']);

foreach($html['data'] as $h){
	
	echo '<tr><td>'.$h['agent_id'].'</td><td>'.$h['agent_name'].'</td><td>'.$h['assign_time'].'</td><td>'.$h['auth_info'].'</td><td>'.$h['company_name'].'</td><td>'.$h['create_time'].'</td><td>'.$h['name'].'</td><td>'.$h['status'].'</td><td>'.$h['uid'].'</td><td>'.$h['verify_agent'].'</td><td>'.$h['verify_agent_name'].'</td><td>'.$h['id'].'</td></td>';
}
?>
</table>
<?php
$time=time();
$u='base_id59time'.$time.'verify_agent1'.'xuiYuWZcW8Ov6KqC';
$u=md5($u);
 $url='http://renzheng-test.snssdk.com/api/verify/image/?base_id=59&verify_agent=1&time='.$time.'&token='.$u; 
 $html = (json_decode(file_get_contents($url),true)); 
 //var_dump($html['data']);
 foreach($html['data'] as $h){
 	echo '类型：'.$h['pic_type_name'].'<img src="'.$h['url'].'">';
}



$time=time();
$u='base_id59time'.$time.'verify_agent1'.'xuiYuWZcW8Ov6KqC';
$u=md5($u);
 $url='http://renzheng-test.snssdk.com/api/verify/contact/?base_id=59&verify_agent=1&time='.$time.'&token='.$u; 
 $html = (json_decode(file_get_contents($url),true)); 
 //var_dump($html['data']);
 foreach($html['data'] as $h){
 	echo 'Email：'.$h['mail'].'　电话：'.$h['phone'].'　名字：：'.$h['real_name'].'<br>';
}


?>

