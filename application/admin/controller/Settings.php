<?php

namespace app\admin\controller;

use think\Session;
use app\admin\model\AdminLog;
use app\common\controller\Backend;
use fast\Random;

/**
 * 数据
 *
 * @icon fa fa-circle-o
 */
class Settings extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Settings');
    }
    public function index()
    {
        if ($this->request->isAjax())
        {
            $model = model('Settings');
            list($where, $sort, $order, $offset, $limit) = $this->buildparams();

            $total = $model
                ->where($where)
                ->order($sort, $order)
                ->count();

            $list = $model
                ->where('id',1)
                ->order($sort, $order)
                ->limit($offset, $limit)
                ->select();

            $result = array("total" => $total, "rows" => $list);

            return json($result);
        }
        $row = $this->model->get(1);
        $row2 = $this->model->get(2);
        $row2->B =explode('^',$row2->B);
        $row2->C =explode('^',$row2->C);



        $row3 = $this->model->get(3);
        $row3->B =explode('^',$row3->B);
        $row3->C =explode('^',$row3->C);


        $row4 = $this->model->get(4);
        $row4->B =explode('^',$row4->B);
        $row4->C =explode('^',$row4->C);


        $row5 = $this->model->get(5);
        $row6 = $this->model->get(6);


        $this->view->assign("row6", $row6);

        $this->view->assign("row5", $row5);

        $this->view->assign("row4", $row4);

        $this->view->assign("row3", $row3);

        $this->view->assign("row2", $row2);
        $this->view->assign("row", $row);
        return $this->view->fetch();
    }

    public function emp(){

    }
    public function update()
    {
        if ($this->request->isPost())
        {

            $this->code = -1;
            $params = $this->request->post("row/a");
            //$params = array_filter(array_intersect_key($params, array_flip(array('email', 'nickname', 'password','c'))));

            if ($params)
            {

                $params1['A'] =$params['week'];
                $params1['B'] =$params['moon'];
                $params1['C'] =$params['fans'];
                    model('Settings')->where('id',1)->update($params1);

                if($params['b1']+$params['b2']!=100){
                    $this->code = -1;
                    return;
                }
                $params2['A'] =$params['a'];
                $params2['B'] =$params['b1'].'^'.$params['b2'];
                $params2['C'] =$params['c1'].'^'.$params['c2'];
                model('Settings')->where('id',2)->update($params2);


//                内容价值
                if($params['nr1']+$params['nr2']+$params['nr3']+$params['nr4']!=100){
                    $this->code = -1;
                    return;
                }
                $params3['A'] =$params['nr'];
                $params3['B'] =$params['nr1'].'^'.$params['nr2'].'^'.$params['nr3'].'^'.$params['nr4'];
                $params3['C'] =$params['nrfa1'].'^'.$params['nrfa2'].'^'.$params['nrfa3'].'^'.$params['nrfa4'];
                model('Settings')->where('id',3)->update($params3);

                //                互动效果
                if($params['hd1']+$params['hd2']!=100){
                    $this->code = -1;
                    return;
                }
                $params4['A'] =$params['hd'];
                $params4['B'] =$params['hd1'].'^'.$params['hd2'];
                $params4['C'] =$params['hdfd1'].'^'.$params['hdfd2'];
                model('Settings')->where('id',4)->update($params4);

                //                粉丝
                if($params['fs1']!=100){
                    $this->code = -1;
                    return;
                }
                $params5['A'] =$params['fs'];
                $params5['B'] =$params['fs1'];
                $params5['C'] =$params['fsfd1'];
                model('Settings')->where('id',5)->update($params5);

                //                发文
                if($params['wen1']!=100){
                    $this->code = -1;
                    return;
                }
                $params6['A'] =$params['wen'];
                $params6['B'] =$params['wen1'];
                $params6['C'] =$params['wenfd1'];
                model('Settings')->where('id',6)->update($params6);
                $this->code = 1;
            }
        }
        return;
    }
}
