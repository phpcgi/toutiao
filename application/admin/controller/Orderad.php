<?php

namespace app\admin\controller;

use app\admin\model\KindProduct;
use app\common\controller\Backend;

use app\admin\model\AdminLog;
use app\common\model\DataMonth;
use app\common\model\Genre;
use app\common\model\KindCategory;
use app\common\model\OrderextAd;
use think\Controller;
use think\Request;
use Curl\Curl;
use PHPExcel;
use PHPExcel_IOFactory;
/**
 * 项目
 *
 * @icon fa fa-circle-o
 */
class Orderad extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('OrderAd');
        $this->modelext = model('OrderextAd');
        $this->modelmonth = model('DataMonth');
    }

    public function index()
    {
        if ($this->request->isAjax()) {

            list($where, $sort, $order, $offset, $limit) = $this->buildparams();
            $total = $this->model
                ->where([$where,'del'=>1])
                ->order($sort, $order)
                ->count();

            $listc = $this->model
                ->where([$where,'del'=>1])
                ->order('createtime desc')
                ->order($sort, $order)
                ->limit($offset, $limit)
                ->select();


            $list = [];
            foreach ($listc as $k => $v) {
              //  $data = $this->typemodel->get($v->type);

                if ($v->status==1) {
                    $v->status = '待接单';
                } elseif ($v->status==2)  {
                    $v->status = '待投放';
                }elseif ($v->status==3)  {
                    $v->status = '已完成';
                }elseif ($v->status==4)  {
                    $v->status = '已取消';
                }elseif ($v->status==5)  {
                    $v->status = '待结算';
                }elseif ($v->status==6)  {
                    $v->status = '已结算';
                }
                $list[] = $v;
            }



            $result = array("total" => $total, "rows" => $list);

            return json($result);

        }
        return $this->view->fetch();
    }
    public function add($ids = NULL)
    {
        if ($this->request->isPost())
        {
            $this->code = -1;
            $params = $this->request->post("row/a");
            if ($params)
            {
                $this->code = -1;
                $params = $this->request->post("row/a");
                if ($params)
                {
                    $params['createtime'] = date('Y-m-d H:i:s',time());
                    $this->model->save($params);
                    AdminLog::record(__('Add'), $ids);
                    $this->code = 1;
                }
                return;
            }

            return;
        }
        return $this->view->fetch();
    }
    public function edit($ids = NULL)
    {
        $row = $this->model->get(['id' => $ids]);
        if (!$row)
            $this->error(__('No Results were found'));
        // 状态为locked时不允许编辑
        if ($row['status'] == '4')
            $this->error(__('订单已取消'));
        if ($this->request->isPost())
        {
            $this->code = -1;
            $params = $this->request->post("row/a");
            if ($params)
            {
                $this->code = -1;
                $params = $this->request->post("row/a");
                if ($params)
                {
                    if($params['status']==4){
                        $params['del']=0;

                        $params1['del'] =0;
                        model('OrderextAd')->where('orderid',$ids)->update($params1);
                    }
                    $row->save($params);
                    AdminLog::record(__('Edit'), $ids);
                    $this->code = 1;
                }
                return;
            }

            return;
        }
        $this->view->assign("row", $row);
        return $this->view->fetch();
    }

    function arr2option($arr,$value,$name,$selected=""){
        $option="";
        foreach($arr as $v){
            if(!is_array($v)) continue;
            if(!isset($v[$value]) || !isset($v[$name])) continue;
            if($v[$value]==$selected){
                $option.="<option value=\"{$v[$value]}\" selected>{$v[$name]}</option>".PHP_EOL;
            }else{
                $option.="<option value=\"{$v[$value]}\">{$v[$name]}</option>".PHP_EOL;
            }
        }
        return $option;
    }

    public function detail($ids)
    {
        $row = $this->modelext->all(['orderid' => $ids]);

        $info = $this->model->get($ids);
       /* if (!$row)
            $this->error(__('No Results were found'));*/
        if (!$row){
            $this->view->assign("row1", $info);

        }else{
            $rows = [];
            foreach ($row as $old){
                if($old['puttime']!='0000-00-00 00:00:00'){
                    $old['puttime'] ;
                }else{
                    $old['puttime'] =$info['time'];
                }

                $old['detailtype']=self::detailtype();
                $old['detailway']=self::detailway();
                $old['detailurl']='';//self::detailurl($old['url']);
                $rows[]=$old;
            }
            $info = $this->model->get($ids);
            $this->view->assign("row1", $info);
            $this->view->assign("row", $rows);
        }


        return $this->view->fetch();
    }

    public function del($ids = "")
    {
        $this->code = -1;
        if ($ids)
        {
            $count = $this->model->where('id', 'in', $ids)->delete();

            $countt = $this->modelext->where('orderid', 'in', $ids)->delete();
            if ($count)
            {
                AdminLog::record(__('Del'), $ids);
                $this->code = 1;
            }
        }

        return;
    }

    /*产品类型*/
    public function detailtype(){
        $list = KindProduct::all();
        return $list;

    }
    /*发布方式*/
    public function detailway(){
        $array=array(array('id'=>'1','name'=>'流量主'),array('id'=>'2','name'=>'第三方'),array('id'=>'3','name'=>'无需审核'));
        return $array;

    }

    /*检测*/
    public function detailurl($url){

//        $url        = 'http://www.toutiao.com/i6434052525963346434/';
        $posturl    = 'http://ocean.tarsocial.com/api/toutiao/monitor/article?access_token=EZ6JOcuvrvdeKZmaBv48M7VVRQl4Wj&monitor_days_from_post=3&url='.$url.'';
        $curl = new Curl();
        $curl->post($posturl, array(
            "url" => "$url",
        ));
        $info = $curl->response;
        $json =\GuzzleHttp\json_decode($info,true);
        if(!$json){
            return ;
        }
        if(!isset($json['project_id'])){
            return ;
        }
        if($json['project_id']){
            $project_id = $json['project_id'];

            $url = 'http://ocean.tarsocial.com/api/toutiao/monitor/article/'.$project_id.'?access_token=EZ6JOcuvrvdeKZmaBv48M7VVRQl4Wj';
            $curl->get($url);
            $data = $curl->response;
            $getjson = \GuzzleHttp\json_decode($data,true);
            return $getjson;
        }else{
            return ;
        }
    }

    public function update()
    {
        if ($this->request->isPost())
        {
            $uid=$_REQUEST['uid'];
            $tid=$_REQUEST['tid'];
            $orderid=$_REQUEST['orderid'];
            if($tid){
                self::_tid($uid,$tid,$orderid);
            }
            self::_orher();
            self::_title();
            self::_url();
            self::_radio();
            self::_productid();
            self::_way();
            self::_puttime();
            self::_factcost();
            $this->success('成功');
        }
        return;
    }

    public function _tid($uid,$id,$orderid){
        if (!$id){
            return;
        }
        foreach ($id as $old){
            if (is_numeric($old)){
                $info = self::getinfo($old);
                $info['uid'] = $uid;
                $info['orderid']=$orderid;
                OrderextAd::create($info);
            }
            if (!is_numeric($old)){
                $info1 = self::getinfoname($old);
                if($info1){
                    $info1['uid'] = $uid;
                    $info1['orderid']=$orderid;
                    OrderextAd::create($info1);
                }
            }
        }
    }

    public function getinfoname($id){
        $old =  DataMonth::get(['name'=>$id]);
        if (!$old){
            return;
        }
        $new['DataMonthid'] = $old['id'];
        $new['tid'] = $old['tid'];
        $new['name'] = $old['name'];
        $new['type'] = $old['type'];
        $new['avatar_url'] = $old['avatar_url'];
        $new['A4'] = $old['A4'];
        $new['R'] = $old['R'];
        $new['worth'] = $old['worth'];
        $new['cost'] = round($old['R']/1000*50,0);

        return $new;
    }

    public function getinfo($id){
        $old =  DataMonth::get($id);
        if (!$old){
            return;
        }
        $new['DataMonthid'] = $old['id'];
        $new['tid'] = $old['tid'];
        $new['name'] = $old['name'];
        $new['type'] = $old['type'];
        $new['avatar_url'] = $old['avatar_url'];
        $new['A4'] = $old['A4'];
        $new['R'] = $old['R'];
        $new['worth'] = $old['worth'];
        $new['cost'] = round($old['R']/1000*50,0);

        return $new;
    }
    public function selectpage()
    {
        return parent::selectpage();
    }
    public function _title(){
        $title = $_REQUEST['title'];
        if (!$title){
            return;
        }
        foreach ($_REQUEST['title'] as $k=>$old){
            $params1['title'] =$old;
            model('OrderextAd')->where('id',$k)->update($params1);
        }
    }
    public function _url(){
        foreach ($_REQUEST['url'] as $k=>$old){
            $params1['url'] =$old;
            model('OrderextAd')->where('id',$k)->update($params1);
        }
    }
    public function _orher(){
        foreach ($_REQUEST['other'] as $k=>$old){
            $params1['url_other'] =$old;
            model('OrderextAd')->where('id',$k)->update($params1);
        }
    }
    public function _puttime(){
        foreach ($_REQUEST['puttime'] as $k=>$old){
            $params1['puttime'] =$old;
            model('OrderextAd')->where('id',$k)->update($params1);
        }
    }
    public function _factcost(){
        foreach ($_REQUEST['factcost'] as $k=>$old){
            $params1['factcost'] =$old;
            model('OrderextAd')->where('id',$k)->update($params1);
        }
    }
    public function _radio(){
        if (!isset($_REQUEST['radio'])){
            return;
        }
        foreach ($_REQUEST['radio'] as $k=>$old){
            if($old==0){
                OrderextAd::destroy($k);
            }
            $params1['status'] =$old;
            model('OrderextAd')->where('id',$k)->update($params1);
        }
    }
    public function _productid(){
        foreach ($_REQUEST['productid'] as $k=>$old){
            $params1['productid'] =$old;
            model('OrderextAd')->where('id',$k)->update($params1);
        }
    }
    public function _way(){
        foreach ($_REQUEST['way'] as $k=>$old){
            $params1['way'] =$old;
            model('OrderextAd')->where('id',$k)->update($params1);
        }
    }


    public function uot(){

        $path = dirname(__FILE__);
        vendor("PHPExcel.PHPExcel.PHPExcel");
        vendor("PHPExcel.PHPExcel.Writer.Excel5");
        vendor("PHPExcel.PHPExcel.Writer.Excel2007");
        vendor("PHPExcel.PHPExcel.IOFactory");

        $objPHPExcel =new \PHPExcel();
        $objWriter = new \PHPExcel_Writer_Excel5($objPHPExcel);
        $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);

        $ids =  $_REQUEST['orderid'];
        $row = $this->modelext->all(['orderid' => $ids]);

        /*--------------设置表头信息------------------*/
        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', '头条图片')
            ->setCellValue('B1', '头条名字')
            ->setCellValue('C1', '头条id')
            ->setCellValue('D1', '平台报价')
            ->setCellValue('E1', '费用')
            ->setCellValue('F1', '实际投放时间')
            ->setCellValue('G1', '文章标题')
            ->setCellValue('H1', '文章连接')
            ->setCellValue('I1', '阅读量')
            ->setCellValue('J1', '评论量')
            ->setCellValue('K1', '其他连接');
        $i=2;  //定义一个i变量，目的是在循环输出数据是控制行数
        $count = count($row);  //计算有多少条数据
        for ($i = 2; $i <= $count+1; $i++) {
            $objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $row[$i - 2]['avatar_url']);
            $objPHPExcel->getActiveSheet()->setCellValue('B' . $i, $row[$i - 2]['name']);
            $objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $row[$i - 2]['tid']);
            $objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $row[$i - 2]['cost']);
            $objPHPExcel->getActiveSheet()->setCellValue('E' . $i, $row[$i - 2]['factcost']);
            $objPHPExcel->getActiveSheet()->setCellValue('F' . $i, $row[$i - 2]['puttime']);
            $objPHPExcel->getActiveSheet()->setCellValue('G' . $i, $row[$i - 2]['title']);
            $objPHPExcel->getActiveSheet()->setCellValue('H' . $i, $row[$i - 2]['url']);
            $detailurl=self::detailurl($row[$i - 2]['url']);
            $objPHPExcel->getActiveSheet()->setCellValue('I' . $i, $detailurl['read_num']);
            $objPHPExcel->getActiveSheet()->setCellValue('J' . $i, $detailurl['comment_num']);
            $objPHPExcel->getActiveSheet()->setCellValue('K' . $i, $row[$i - 2]['url_other']);
        }

        $objPHPExcel->getActiveSheet()->setTitle('user');      //设置sheet的名称
        $objPHPExcel->setActiveSheetIndex(0);                   //设置sheet的起始位置
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');   //通过PHPExcel_IOFactory的写函数将上面数据写出来
        $PHPWriter = \PHPExcel_IOFactory::createWriter( $objPHPExcel,"Excel2007");
        header('Content-Disposition: attachment;filename="项目信息.xlsx"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        $PHPWriter->save("php://output"); //表示在$path路径下面生成demo.xlsx文件


    }

    public function genre(){
        $la = Genre::all();
        $array = array();
        foreach ($la as $old){
            $new['name'] =  $old['name'];
            array_push($array,$new);
        }
        $this->view->assign("array", $array);
        return $this->view->fetch();
    }
}
