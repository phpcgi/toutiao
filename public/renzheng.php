<?php
session_start();
$phone=file_get_contents('php://input');
$a='';
if($phone!="") {
$phone=$_POST['phone'];
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
if(@$_SESSION['phone']==$phone)
{}
else{
$sql ="INSERT INTO tuiguang (phone, time) VALUES ('".$phone."','".date("Y-m-d H:i:s",time())."')";
$res = $mysqli->query($sql);
$a="您提交成功！";
@$_SESSION['phone']=$phone;
}
$mysqli->close();
//重定向浏览器 
//header("Location: http://www.toutiaoeasy.cn"); 
//确保重定向后，后续代码不会被执行 

 }
?>
 



                                                                          
<html>                                                                                          
<head>                                                                                          
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">                             
	<!-- Save for Web Styles (ͷ͵ӗθҳ-03.psd) -->                                              
<!-- TemplateBeginEditable name="doctitle" -->                                                  
<title>快速通过头条号企业认证</title>                                                                       
	<style type="text/css">                                                                                                                                                                    
	</style>   
	<meta name="description" content="通过头条号企业认证，获得企业专有身份标识，免费使用今日头条官方提供的丰富的营销工具和强大的舆情分析系统。" /> 
  <meta name="keywords" content=" 头条认证,头条号企业认证,头条企业认证,企业头条号认证,企业头条认证,头条号认证," />                                                                                   
<!-- TemplateEndEditable -->                                                                     
<!-- TemplateBeginEditable name="head" -->                                                      
<!-- TemplateEndEditable -->                                                                    
</head>                                                                                         
<script type="text/javascript">
    /*输出输入的字符*/  
    function myKeyDown(id) {  
        console.log(document.getElementById(id).value);  
    }  
    /*按键结束，字体转换为大写*/  
    function myKeyUp(id) {  
        var text = document.getElementById(id).value;  
       // document.getElementById(id).value = text.toUpperCase();  
       if(text > 10000000000 && text < 20000000000)
       {
       	document.getElementById('ip').innerHTML="输入正确，请‘确认’提交！";
　　　　document.form1.submit.disabled=false;
       }
       else
       	{
       		document.getElementById('ip').innerHTML="您输入的手机号码不正确，请重新输入！";
       		document.form1.submit.disabled=true ;
       	}
        
    }  
    

</script>                                                                                                
	                                                                                              
<body leftmargin="0px" topmargin="0px">                                                         
	<table width="1200" border="0" align="center">                                                
<tr>                                                                                            
<td align="center">                                                                             
	                                                                                              
	<img src="1006.gif" width="150"></td>                                                         
                                                                                                
</tr>                                                                                           
	</table>	                                                                                    
	<table CellSpacing=0 width="100%" border="0" align="center">    
		<tr bgcolor="#CE3B32">
			<td height="10"></td>
			<td></td>
			<td></td>
		</tr>                                                 
<tr bgcolor="#CE3B32">                                                                                            
                                                                                                
<td  align="center" valign="top"  height="240" width="48%" >  
	<br>                                           
	<font style=" font-size:20px;color:#FFFFFF;font-family:黑体;">想快速通过认证,您可以留下您的手机号
															,<br>客服会在24小时内与您电话联系<br> 
	</font> 
	<br> 
	<form action="renzheng.php"  id="form1" method="post" name="form1">                                                                                         
	<input id="name" type="text" name="phone"  style="width: 250px;height: 28px;" onkeydown="myKeyDown(this.id)" onkeyup="myKeyUp(this.id)" value="<?php echo $phone; ?>" />  
	 <br>    <br>                               
	<input id="q" type="submit"  name="submit" value="确  认" style="width: 60px;height: 30px;color: #CE3B32"  disabled="true" />  
	
</form>        
<div id="ip" height="30" style="color:#ffffff;font-family:黑体;"><?php echo $a; ?></div>	                          
	              
	</td>
	   <td  width="4%" align="center"> 
	   	<img align="center" src="2003.gif"
	  </td>
	<td  align="center" valign="top" width="48%">
		<br>
		<font  style="font-size:20px;color:#FFFFFF;font-family:黑体;" >通过扫描二维码，微信联系在线客服    </font> 
		<br>
		<br>  		             
	  <img  align="center"    src="0044.gif">                                             
	   </td>                                                                                        
</tr>                                                                                           
	</table>                                                                                      
		<table width="1200" border="0" align="center">                                              
<tr>                                                                                            
<td align="right" width="500">                                                                             
	<img src="002.gif"</td>                                                          
                                                                                                
</tr>                                                                                           
</table>                                                                                        
</body>                                                                                         
</html>                                                                                         