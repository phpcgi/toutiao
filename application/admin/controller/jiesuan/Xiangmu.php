<?php

namespace app\admin\controller\jiesuan;

use app\common\controller\Backend1;
use think\Request;
use think\Controller;
use PHPExcel_IOFactory;
use Think\Model;
use think\Db;
/**
 * 分类录入
 *
 * @icon fa fa-circle-o
 */
class Xiangmu extends Backend1
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Xiangmu');
    }
    public function add()
    {
        if ($this->request->isPost())
        {

            $params = $this->request->post("row/a");
            if ($params)
            {
$params['ttime']=date("Y-m-d H:i:s",time());
                            $this->model->create($params);
                            $this->code = 1;
            }

            return;
        }
        return $this->view->fetch();
    }
    public function index()
    {
        $search = $this->request->get("search");
        if ($this->request->isAjax()) {
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                ->where($where)
               // ->where('status', '=', "normal")
                ->order($sort, $order)
                ->count();
            $list = $this->model
                ->where($where)
               // ->where('status', '=', "normal")
                ->order($sort, $order)
                ->limit($offset, $limit)
                ->select();
            $result = array("total" => $total, "rows" => $list);

            return json($result);

        }
        return $this->view->fetch();
    }
    public function addwen($ids='')//添加发文
    {
$this->view->assign('ids', $ids);
return $this->view->fetch();

    }
    public function so($name='',$ids='')
    {
        $this->model1 = model('zhanghao');
    	            $list = $this->model1
                ->where('kaihuming', '=', $name)
                ->select();
foreach ($list as $old){
	$list1['tid']=$old['tid'];
	$list1['id']=$old['id'];
	$list1['name']=$old['kaihuming'];
}
if(!$list1)
{
	return 'a';
}
else
{
	return $list1;
}
    }
    
    public function addfawen()//添加发文
    {
$new['xid']=Request::instance()->request('xid');
$new['zid']=Request::instance()->request('zid');
$new['show']=Request::instance()->request('show');
$new['title']=Request::instance()->request('title');
$new['toutiao']=Request::instance()->request('toutiao');
$new['link']=Request::instance()->request('link');
$new['nname']=Request::instance()->request('nname');
$new['price']=(int)Request::instance()->request('price');
$new['bz']=Request::instance()->request('bz');
$new['ftime']=date("Y-m-d H:i:s",time());
                           model('fawen')->create($new);
                           $n=model('xiangmu')->where('id','=', $new['xid'])->select();
foreach ($n as $old){
	$fei=$old['fei'];
}                           
                           $d['fei']=$fei+$new['price'];
                           model('xiangmu')->where('id', $new['xid'])->update($d);
                           $n1=model('zhanghao')->where('id','=', $new['zid'])->select();
foreach ($n1 as $old){
	$hezuo=$old['hezuo'];
}                           
                           $d1['hezuo']=$hezuo+1;
                           model('zhanghao')->where('id', $new['zid'])->update($d1);                           
return "添加".$new['nname']."价格：".$new['price']."完成!";
    }
    public function vwen($ids='')//显示详情
    {
            $list = model('fawen')
                ->where('xid', '=', $ids)
                ->select();
            $result = array("rows" => $list);
$this->view->assign('data', ($list));            
        return $this->view->fetch();
    }
    
    public function delfawen($ids='')//删除发文
    {
$n=model('fawen')->where('id','=', $ids)->select();
foreach ($n as $old){
	$xid=$old['xid'];
	$zid=$old['zid'];
	$zt=$old['zt'];
	$price=$old['price'];
}
if($zt > 0)
{
	 return 'a';
} 
else
{
$n1=model('zhanghao')->where('id','=', $zid)->select();
foreach ($n1 as $old){
	$hezuo=$old['hezuo'];
}                           
$d1['hezuo']=$hezuo-1;
model('zhanghao')->where('id', $zid)->update($d1);   //减少合作次数
$n=model('xiangmu')->where('id','=', $xid)->select();
foreach ($n as $old){
	$fei=$old['fei'];
}                           
$d['fei']=$fei-$price;
model('xiangmu')->where('id', $xid)->update($d);    //减少项目价格
model('fawen')->where('id', $ids)->delete();         //      删除                      	
	 return 'b';
}                       
       
    }
    public function editfawen($ids='')//修改发文
    {
$n=model('fawen')->where('id','=', $ids)->select();
foreach ($n as $old){
	$list['price']=$old['price'];
	$list['id']=$old['id'];
	$list['xid']=$old['xid'];
	$list['nname']=$old['nname'];
	$list['link']=$old['link'];
	$list['show']=$old['show'];
	$list['title']=$old['title'];
	$list['toutiao']=$old['toutiao'];
	$list['bz']=$old['bz'];
	$list['zt']=$old['zt'];
}
if($list['zt'] > 0)
{
	 return 'a';
} 
else
{
                    	
	 return $list;
}                       
       
    }    
    public function editf()//修改发文更新写入
    {
    	$ids=Request::instance()->request('id');
$n=model('fawen')->where('id','=', $ids)->select();
foreach ($n as $old){
	$list['zt']=$old['zt'];
	$list['price']=$old['price'];
}
if($list['zt'] > 0)
{
	 return 'a';
} 
else
{
                 
     	
$new['xid']=Request::instance()->request('xid');
$new['show']=Request::instance()->request('show');
$new['title']=Request::instance()->request('title');
$new['toutiao']=Request::instance()->request('toutiao');
$new['link']=Request::instance()->request('link');
$new['nname']=Request::instance()->request('nname');
$new['price']=(int)Request::instance()->request('price');
$new['bz']=Request::instance()->request('bz');


$n=model('xiangmu')->where('id','=', $new['xid'])->select();
foreach ($n as $old){
	$fei=$old['fei'];
}                        
$d['fei']=$fei+$new['price']-$list['price'];
model('xiangmu')->where('id', $new['xid'])->update($d);
model('fawen')->where('id', $ids)->update($new);
return "修改".$new['nname']."价格：".$new['price']."完成!";
}
    }
        	
                      
public function log()  {     
$username = Request::instance()->session('admin');
$log['name']=$username->username;
$log['time']=time();
$log['text']='添加帐号：'.$params['kaihuming'];
$log['lei']=0;
model('log')->create($log);         

}
}
