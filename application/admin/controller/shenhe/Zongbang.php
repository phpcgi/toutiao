<?php

namespace app\admin\controller\shenhe;

use app\common\controller\Backend1;

use think\Controller;
use think\Request;
use Curl\Curl;
use think\Db;
use Think\Model;
/**
 * 月榜单
 *
 * @icon fa fa-circle-o
 */
class Zongbang extends Backend1
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('shenhe');
    }
    public function index($pages = NULL)
    {
    	
    	if($pages<1)
    	{$pages=1;}
echo '<div class="panel panel-default panel-intro">
    
    <div class="panel-body">
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="one">
                <div class="widget-body no-padding"><div class="fixed-table-body">
                    		<table id="table" class="table table-striped table-bordered table-hover" style="margin-top: 0px;" width="100%">
                    <thead style="display: table-header-group;"><tr>
                    <th class="bs-checkbox " style="text-align: center; vertical-align: middle;  " data-field="state"><div class="th-inner ">销售代表id</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="name"><div class="th-inner ">销售代表名字</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="tid"><div class="th-inner ">分配时间</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="type"><div class="th-inner ">认证信息</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="createtime"><div class="th-inner ">公司名称</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="updatetime"><div class="th-inner ">认证信息时间</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="status"><div class="th-inner ">用户名称</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="status"><div class="th-inner ">status</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="status"><div class="th-inner ">用户ID</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="status"><div class="th-inner ">审核公司ID</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="status"><div class="th-inner ">审核公司</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="operate"><div class="th-inner ">操作</div><div class="fht-cell"></div></th></tr></thead><tbody data-listidx="0">';
$time=time();
$u='assign_begin_time'.'2018-03-06limit10page'.$pages.'time'.$time.'verify_agent1'.'xuiYuWZcW8Ov6KqC';
$u=md5($u);
 $url='http://renzheng-test.snssdk.com/api/verify/verify_list/?assign_begin_time=2018-03-06&verify_agent=1&time='.$time.'&page='.$pages.'&limit=10&token='.$u; 
 $html = (json_decode(file_get_contents($url),true)); 
//var_dump($html['data']);
foreach($html['data'] as $h){
	        $genre_model = model('Shenhe');
        $total = $genre_model->where('id','eq',$h['id'])->select();
	if(!$total)
	{
		model('Shenhe')->create($h);
	}
	echo '<tr><td>'.$h['agent_id'].'</td><td>'.$h['agent_name'].'</td><td>'.$h['assign_time'].'</td><td>'.$h['auth_info'].'</td><td>'.$h['company_name'].'</td><td>'.$h['create_time'].'</td><td>'.$h['name'].'</td><td>'.$h['status'].'</td><td>'.$h['uid'].'</td><td>'.$h['verify_agent'].'</td><td>'.$h['verify_agent_name'].'</td><td><a href="/admin/shenhe/zongbang/edit?ids='.$h['id'].'">审核及修改</a></td></td>';
}
echo '</tbody></table></div></div></div></div><div class="clearfix"></div>
                </div>
            </div>
            
      <br><br><br><center><a href=/admin/shenhe/zongbang target="_top">刷新</a>　　　
';
if($pages>1){
	$p=$pages-1;
	echo '<a href="/admin/shenhe/zongbang/page?pages='.$p.'">上一页</a>　　　';
}
else
{
	$n=$pages+1;
	echo '<a href="/admin/shenhe/zongbang/page?pages='.$n.'">下一页</a>';
	
}
    }
    public function page($pages = NULL)
    {
    	
    	if($pages<1)
    	{$pages=1;}
echo '<div class="panel panel-default panel-intro">
    
    <div class="panel-body">
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade active in" id="one">
                <div class="widget-body no-padding"><div class="fixed-table-body">
                    		<table id="table" class="table table-striped table-bordered table-hover" style="margin-top: 0px;" width="100%">
                    <thead style="display: table-header-group;"><tr>
                    <th class="bs-checkbox " style="text-align: center; vertical-align: middle;  " data-field="state"><div class="th-inner ">销售代表id</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="name"><div class="th-inner ">销售代表名字</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="tid"><div class="th-inner ">分配时间</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="type"><div class="th-inner ">认证信息</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="createtime"><div class="th-inner ">公司名称</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="updatetime"><div class="th-inner ">认证信息时间</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="status"><div class="th-inner ">用户名称</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="status"><div class="th-inner ">status</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="status"><div class="th-inner ">用户ID</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="status"><div class="th-inner ">审核公司ID</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="status"><div class="th-inner ">审核公司</div><div class="fht-cell"></div></th>
                    <th style="text-align: center; vertical-align: middle; " data-field="operate"><div class="th-inner ">操作</div><div class="fht-cell"></div></th></tr></thead><tbody data-listidx="0">';
$time=time();
$u='assign_begin_time'.'2018-03-06limit5page'.$pages.'time'.$time.'verify_agent1'.'xuiYuWZcW8Ov6KqC';
$u=md5($u);
 $url='http://renzheng-test.snssdk.com/api/verify/verify_list/?assign_begin_time=2018-03-06&verify_agent=1&time='.$time.'&page='.$pages.'&limit=5&token='.$u; 
 $html = (json_decode(file_get_contents($url),true)); 
//var_dump($html['data']);
$pp=0;
foreach($html['data'] as $h){
	$pp++;
	echo '<tr><td>'.$h['agent_id'].'</td><td>'.$h['agent_name'].'</td><td>'.$h['assign_time'].'</td><td>'.$h['auth_info'].'</td><td>'.$h['company_name'].'</td><td>'.$h['create_time'].'</td><td>'.$h['name'].'</td><td>'.$h['status'].'</td><td>'.$h['uid'].'</td><td>'.$h['verify_agent'].'</td><td>'.$h['verify_agent_name'].'</td><td><a href="/admin/shenhe/zongbang/edit?ids='.$h['id'].'">审核及修改</a></td></td>';
}
echo '</tbody></table></div></div></div></div><div class="clearfix"></div>
                </div>
            </div>
            
      <br><br><br><center><a href=/admin/shenhe/zongbang target="_top">刷新</a>　　　
';
if($pages>1){
	$p=$pages-1;
	echo '<a href="/admin/shenhe/zongbang/page?pages='.$p.'">上一页</a>　　　';
}
else
{}
if($pp>=5)
{
	$n=$pages+1;
	echo '<a href="/admin/shenhe/zongbang/page?pages='.$n.'">下一页</a>';// target="_top"
	}

    }
        
    
        public function edit($ids = NULL)
    {
    	$data=array();
$time=time();
$u='base_id'.$ids.'time'.$time.'verify_agent1'.'xuiYuWZcW8Ov6KqC';
$u=md5($u);
 $url='http://renzheng-test.snssdk.com/api/verify/image/?base_id='.$ids.'&verify_agent=1&time='.$time.'&token='.$u; 
 $html = (json_decode(file_get_contents($url),true)); 
 //var_dump($html['data']);
 $type_url='';
 foreach($html['data'] as $h){
 	$type_url.=$h['pic_type_name'].','.$h['url'].'|';
 	echo '类型：'.$h['pic_type_name'].'<img src="'.$h['url'].'"><form enctype="multipart/form-data" action="/admin/shenhe/zongbang/imgedit" method="POST">
 修改图片:（不修改不要操作）<br>
<input type="submit" value="修　改">
<input type="hidden" name="ids" value="'.$ids.'">
<input type="hidden" name="imgid" value="'.$h['id'].'">
</form>';
}

$time=time();
$u='base_id'.$ids.'time'.$time.'verify_agent1'.'xuiYuWZcW8Ov6KqC';
$u=md5($u);
 $url='http://renzheng-test.snssdk.com/api/verify/contact/?base_id='.$ids.'&verify_agent=1&time='.$time.'&token='.$u; 
 $html = (json_decode(file_get_contents($url),true)); 
 //var_dump($html['data']);
 foreach($html['data'] as $h){
 	$data['mail']=$h['mail'];
 	$data['phone']=$h['phone'];
 	$data['real_name']=$h['real_name'];
 	echo '<br><br>Email：'.$h['mail'].'　电话：'.$h['phone'].'　名字：'.$h['real_name'].'<br>';
}

$data['type_url']=$type_url;
		//model('Shenhe')->data($data)->where('id='.$ids)->save();
		model('Shenhe')->where('id', $ids)->update($data);

	
	
echo '<table><tr><td style="width:50%;height:200px;">';
echo '<form action="/admin/shenhe/zongbang/renzheng" method="GET">
 公司名:<br>
<input type="text" name="company_name">不修改请留空
<br>
认证信息:<br>
<input type="text" name="auth_info">不修改请留空
<br>
<input type="submit" value="通过审核">
<input type="hidden" name="ids" value="'.$ids.'">
<input type="hidden" name="shenhe" value="1">
</form> ';
echo '</td><td style="width:50%;height:200px;">';
echo '<form action="/admin/shenhe/zongbang/renzheng1" method="GET">
 不通过原因:<br>
<select name="refuse">
<option value="1">企业没有在工商局合法注册</option>
<option value="2">运营者未得到授权申请和运营官方头条号</option>
<option value="3">使用他人商标但无授权</option>
<option value="4">认证信息为网站，但无ICP截图</option>
<option value="5">认证信息为软件，但无软件著作权登记</option>
<option value="6">使用名人肖像但无授权</option>
<option value="7">申请认证资料（包括申请认证名称）重填３次都不合规范</option>
<option value="8">限定时间内（一个月）未能补充资料</option>
</select>
<br>
<input type="submit" value="拒　绝">
<input type="hidden" name="ids" value="'.$ids.'">
<input type="hidden" name="shenhe" value="2">
</form> ';
echo '</td></tr></table>';


echo '<p><form enctype="multipart/form-data" action="/admin/shenhe/zongbang/imgup" method="POST">
 上传图片:<br>
<select name="pic_type">
<option value="1">营业执照</option>
<option value="2">认证公函</option>
<option value="4">其他</option>
</select>
<input type="submit" value="上　传">
<input type="hidden" name="base_id" value="'.$ids.'">
</form> </p><a href=/admin/shenhe/zongbang target="_top">返回待审核列表</a>';
    }
    
        public function renzheng($ids = NULL,$shenhe = NULL,$refuse = NULL,$auth_info = NULL,$company_name = NULL)
    {
 $ur=array();
if($auth_info==''){
$u='base_id'.$ids;
$ur["base_id"]=(int)$ids;
}
else{
$u='auth_info'.$auth_info.'base_id'.$ids;
$ur["auth_info"]=$auth_info;
$ur["base_id"]=(int)$ids;}
if($company_name == '')
{}
else{
$u.='company_name'.$company_name;
$ur["company_name"]=$company_name;}
$u.='operation3';
$ur["operation"]=3;
$time=time();
$u.='time'.$time;
$u.='verify_agent1'.'xuiYuWZcW8Ov6KqC';
$ur["time"]=$time;
$ur["verify_agent"]=1;
//echo $u.'<br>';
$u=md5($u);
$ur["token"]=$u;
//var_dump($ur).'<br>';
/*  
 $url='http://renzheng-test.snssdk.com/api/verify/modify/info/'.$ur.'&token='.$u; 
 echo $url;
 $html = ((file_get_contents($url))); 
 var_dump($html);
*/



        $curl = new Curl();

        $curl->post('http://renzheng-test.snssdk.com/api/verify/modify/info/', $ur);
        $info = $curl->response;
        $info =(json_decode($info,true));
        //var_dump($info);
        echo '<br><br><br>';
if($info['code']=="1")
{
	echo $info['msg'].'<br>'.'<br>';
	echo '<a href=/admin/shenhe/zongbang target="_top">返回待审核列表</a>';
	
}
else
{
		echo '操作失败'.'<br>'.'<br>';
	echo '<a href=/admin/shenhe/zongbang target="_top">返回待审核列表</a>';
	}
	$data=array();
	$data['operation']='3';
	model('Shenhe')->where('id', $ids)->update($data);  
    }
    
        public function renzheng1($ids = NULL,$shenhe = NULL,$refuse = NULL,$auth_info = NULL,$company_name = NULL)
    {
 $ur=array();
if($auth_info==''){
$u='base_id'.$ids;
$ur["base_id"]=(int)$ids;
}
else{
$u='auth_info'.$auth_info.'base_id'.$ids;
$ur["auth_info"]=$auth_info;
$ur["base_id"]=(int)$ids;}
if($company_name == '')
{}
else{
$u.='company_name'.$company_name;
$ur["company_name"]=$company_name;}
$u.='operation4';
$ur["operation"]=4;
$u.='refuse'.$refuse;
$ur["refuse"]=$refuse;

$time=time();
$u.='time'.$time;
$u.='verify_agent1'.'xuiYuWZcW8Ov6KqC';
$ur["time"]=$time;
$ur["verify_agent"]=1;
//echo $u.'<br>';
$u=md5($u);
$ur["token"]=$u;
//var_dump($ur).'<br>';
/*  
 $url='http://renzheng-test.snssdk.com/api/verify/modify/info/'.$ur.'&token='.$u; 
 echo $url;
 $html = ((file_get_contents($url))); 
 var_dump($html);
*/



        $curl = new Curl();

        $curl->post('http://renzheng-test.snssdk.com/api/verify/modify/info/', $ur);
        $info = $curl->response;
        $info =(json_decode($info,true));
if($info['code']=="1")
{
	echo $info['msg'].'<br>'.'<br>';
	echo '<a href=/admin/shenhe/zongbang target="_top">返回待审核列表</a>';
	
}
else
{
		echo '操作失败'.'<br>'.'<br>';
	echo '<a href=/admin/shenhe/zongbang target="_top">返回待审核列表</a>';
	}        
		$data=array();
	$data['operation']='4';
	$data['refuse']=$refuse;
	model('Shenhe')->where('id', $ids)->update($data);  
    }
    
    
    
            public function imgup()
    {

/*
if (isset($_FILES['imgfile']) 
&& is_uploaded_file($_FILES['imgfile']['tmp_name']))
{
 $imgFile = $_FILES['imgfile'];
 $fileName=$imgFile['tmp_name'];
$handle=fopen($fileName,"r");//使用打开模式为r
$content=fread($handle,$imgFile['size']);//读为二进制
$imgFileName = $imgFile['name'];
move_uploaded_file($fileName, $_SERVER['DOCUMENT_ROOT'].'uploads/'.$imgFileName);
$imgurl=$_SERVER['DOCUMENT_ROOT'].'uploads/'.$imgFileName;
}
*/
 $ur=array();
// $ur["file"]='@'.$fileName;
$u='base_id'.$_POST['base_id'];
$ur["base_id"]=(int)$_POST['base_id'];
$u.='pic_type'.$_POST['pic_type'];
$ur["pic_type"]=(int)$_POST['pic_type'];
$time=time();
$u.='time'.$time;
$u.='verify_agent1'.'xuiYuWZcW8Ov6KqC';
$ur["time"]=$time;
$ur["verify_agent"]=1;
//echo $u.'<br>';
$u=md5($u);
$ur["token"]=$u;
//$ur["file"]=$content;

/*

        $curl = new Curl();

        $curl->post('http://renzheng-test.snssdk.com/api/verify/image/image_upload/', $ur);
        $info = $curl->response;
        $info =(json_decode($info,true));
        var_dump($info).'<br>';
        echo '<br><br>';
        
        var_dump($ur).'<br>';
        
if($info['code']=="1")
{
	echo $info['msg'].'<br>'.'<br>';
	echo '<a href=/admin/shenhe/zongbang target="_top">返回待审核列表</a>';
	
}
else
{
		echo '<br><br><br><br>操作失败'.'<br>'.'<br>';
	echo '<a href=/admin/shenhe/zongbang target="_top">返回待审核列表</a>';
	}        */
	
		echo '<form enctype="multipart/form-data" action="http://renzheng-test.snssdk.com/api/verify/image/image_upload/" method="POST" id="form1" >
 选择图片:<br><input name="file" type="file" accept="image/jpeg,image/png"/>
<input type="submit" id="sub" value="上　传">
<input type="hidden" name="base_id" value="'.(int)$_POST['base_id'].'">
<input type="hidden" name="pic_type" value="'.(int)$_POST['pic_type'].'">
<input type="hidden" name="time" value="'.$time.'">
<input type="hidden" name="verify_agent" value="1">
<input type="hidden" name="token" value="'.$u.'">
</form>';


echo '<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
<script>


$(function(){  
    /** 验证文件是否导入成功  */  
    $("#form1").ajaxForm(function(data){    
        if(data!="1"){  
            alert("提交成功！");     
        }  
    });       
});  
</script>
';
    }
    
    
    
    
            public function imgedit()//修改上传图片
    {



 $ur=array();
$u='base_id'.$_POST['ids'];
$ur["base_id"]=(int)$_POST['ids'];
$u.='id'.$_POST['imgid'];
$ur["id"]=(int)$_POST['imgid'];
$time=time();
$u.='time'.$time;
$u.='verify_agent1'.'xuiYuWZcW8Ov6KqC';
$ur["time"]=$time;
$ur["verify_agent"]=1;
$u=md5($u);
$ur["token"]=$u;

	echo '<form enctype="multipart/form-data" action="http://renzheng-test.snssdk.com/api/verify/image/image_modify/" method="POST">
 选择图片:<br><input name="file" type="file" accept="image/jpeg,image/png"/>
<input type="submit" value="上　传">
<input type="hidden" name="base_id" value="'.(int)$_POST['ids'].'">
<input type="hidden" name="id" value="'.(int)$_POST['imgid'].'">
<input type="hidden" name="time" value="'.$time.'">
<input type="hidden" name="verify_agent" value="1">
<input type="hidden" name="token" value="'.$u.'">
</form>';

/*echo '<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.js"></script>
<input type="text" name="apiclientType" id="textfield" class="w_txt" >
<input type="text" name="msg" />
<form id="uploadForm">
   <P class="p5"><span><i>*</i>选择图片：</span>
      
      <input type="button" onclick="saveMsg()" class="w_btn" value="上传" />
      <input type="file" name="file" class="w_file" id="fileField" size="28" onchange="document.getElementById("textfield").value=this.value" />
      <input type="hidden" name="base_id" value="'.(int)$_POST['ids'].'">
<input type="hidden" name="id" value="'.(int)$_POST['imgid'].'">
<input type="hidden" name="time" value="'.$time.'">
<input type="hidden" name="verify_agent" value="1">
<input type="hidden" name="token" value="'.$u.'">
   </P>

</form>
<script type="text/javascript">
function saveMsg() {
    var formData = new FormData($("#uploadForm")[0]);
    $.ajax({
        async : flase,
        cache : flase,
        type : "post",
        data : formData,
        url : "http://renzheng-test.snssdk.com/api/verify/image/image_modify/",
       // dataType : "json",
        contentType: false, //必须
        processData: false, //必须
        success : function() {
            console.log("success");
        },
        error : function(arg1, arg2, arg3) {
            console.log(arg1 + "--" + arg2 + "--" + arg3);
        }
    });
}
</script>
';*/

echo '<a href=/admin/shenhe/zongbang target="_top">返回待审核列表</a>';
    }
}