<?php

namespace app\admin\controller\jiesuan;

use app\common\controller\Backend1;

use think\Controller;
use PHPExcel_IOFactory;




/**
 * 分类录入
 *
 * @icon fa fa-circle-o
 */
class Zhanghao extends Backend1
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Zhanghao');
    }
    public function add()
    {
        if ($this->request->isPost())
        {

            $params = $this->request->post("row/a");
            if ($params)
            {
$params['stime']=date("Y-m-d H:i:s",time());



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
    public function addhao($ids='')
    {
    	 $list1['tishi']='';
    	        if ($this->request->isPost())
        {

            $params = $this->request->post("row/a");
            if ($params)
            {

                            $this->model->where('id','eq',$ids)->update($params);
                            $list1['tishi']='提交成功！';
                         //   $this->code = 1;
            }
           // return;
        }
        
    	            $list = $this->model
                ->where('id', '=', $ids)
                ->select();
foreach ($list as $old){
	$list1['tid']=$old['tid'];
}
$this->view->assign('row', $list1);
return $this->view->fetch();

    }
    
    
        public function so($name='')
    {
        $this->model1 = model('data_month');
    	            $list = $this->model1
                ->where('name', '=', $name)
                ->select();
foreach ($list as $old){
	$list1['name']=$old['name'];
}
if($list1['name']=='')
return '无此头条号！请重新输入！';
else
return 'b';
    }
}
