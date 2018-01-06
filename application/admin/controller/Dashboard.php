<?php

namespace app\admin\controller;

use app\common\controller\Backend;
use app\common\model\DataWeek;
use think\Db;
/**
 * 控制台
 *
 * @icon fa fa-dashboard
 * @remark 用于展示当前系统中的统计数据、统计报表及重要实时数据
 */
class Dashboard extends Backend
{

    /**
     * 查看
     */
    public function index()
    {
        $week =  mktime(23,59,59,date("m"),date("d")-date("w")+7-49,date("Y"));
        $name='';
        $tid ='';
        $time='';
        $seventtime =$week;// \fast\Date::unixtime('day', -49);
        $worth_sort = $sum_publish_num =$sum_fans_count =$W =$R = [];
        for ($i = 0; $i < 7; $i++)
        {
            $model = model('DataWeek');
            $day = date("Y-m-d", $seventtime + ($i * 86400*7));
            $strotime = strtotime($day);
            $elect = $model
                ->where('createtime','<',$strotime)
                ->where('name',$name)
                ->find();
            $worth_sort[$day] =  $elect['worth_sort'];
            $sum_publish_num[$day] =  $elect['sum_publish_num'];//发文
            $sum_fans_count[$day] =  $elect['sum_fans_count'];//粉丝
            $R[$day] = $elect['R'];//阅读
            $w[$day] =  $elect['W'];//评论
        }
        $this->view->assign([
            'worth_sort'            => $worth_sort,
            'sum_publish_num'         => $sum_publish_num,
            'sum_fans_count'         => $sum_fans_count,
            'R'         => $R,
            'W'         => $W,
        ]);
//        $list  = DataWeek::getArray($name,$tid,$time)[0];

        $this->view->assign("type", 1);
//        $this->view->assign("weeklist", $list);
        return $this->view->fetch();
    }
    public function add()
    {

        $data_week   = model('DataWeek');
        $params = $this->request->post("row/a");
        $name = $params['name'];
        $tid = $params['tid'];
        $status = $params['status'];// 周  月
        $time = $params['time'];


        $stime =explode('~',$time);
        $strotime = strtotime($stime[0]);
        $list  = DataWeek::getArray($name,$tid,$strotime);

        if(!$list){
            $this->success('无数据');
        }
        $this->view->assign("weeklist", $list[0]);

        $week =  mktime(23,59,59,date("m"),date("d")-date("w")+7-49,date("Y"));
        $seventtime =$week;// \fast\Date::unixtime('day', -49);
        $worth_sort = $sum_publish_num =$sum_fans_count =$W =$R = [];
        for ($i = 0; $i < 7; $i++)
        {
            $model = $data_week;
            $day = date("Y-m-d", $seventtime + ($i * 86400*7));
            $strotime = strtotime($day);
            $elect = $model
                ->where('createtime','<=',$strotime)
                ->where('name',$list[0]['name'])
                ->order('createtime', 'desc')
                ->find();
            $worth_sort[$day] =  $elect['worth'];
            $sum_publish_num[$day] =  $elect['sum_publish_num'];//发文
            $sum_fans_count[$day] =  $elect['sum_fans_count'];//粉丝
            $R[$day] = $elect['R'];//阅读
            $w[$day] =  $elect['W'];//评论
        }
        $this->view->assign([
            'worth_sort'            => $worth_sort,
            'sum_publish_num'         => $sum_publish_num,
            'sum_fans_count'         => $sum_fans_count,
            'R'         => $R,
            'W'         => $W,
        ]);
        $this->view->assign("type", 2);
        return $this->view->fetch('index');
    }

}
