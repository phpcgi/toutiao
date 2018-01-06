<?php

namespace app\apiweb\controller\Ad;
/**
 * @title 收藏
 * @description 接口说明
 */
use app\common\controller\Api;
use app\common\model\DataMonth;
use think\Request;
use app\common\model\CollectorAd;
class Collector extends Api
{
    /*
     * 收藏
    */
    public function index($id){
        $username = Request::instance()->session('userinfo');
        $id = Request::instance()->request('id');
        $info = CollectorAd::get(['uid'=>$username->uid,'tid'=>$id,'status'=>1]);

        if ($info){
            $data['status'] = 1;
            $update = CollectorAd::update($data,['uid'=>$username->uid,'tid'=>$id]);
            if ($update){
                return Rjson('',200,'收藏成功');
            }
        }else{
            $info1 = self::_getinfo($id);
            $info1['uid'] = $username->uid;
            $info1['status'] = 1;
            $add = CollectorAd::create($info1);
            if ($add){
                return Rjson('',200,'收藏成功');
            }
        }

    }
    public function del($id){
        $username = Request::instance()->session('userinfo');
        $id = Request::instance()->request('id');
        $data['status'] = 0;
        $update = CollectorAd::update($data,['uid'=>$username->uid,'tid'=>$id]);
        if ($update){
            return Rjson('',200,'取消收藏');
        }
    }
    public function getlist($start=1){
        $page=12;
        $username = Request::instance()->session('userinfo');
        $array = CollectorAd::getpage($username->uid,$start,$page);

        foreach ($array as $old){
            $time = self::_lastMonthDays();
            $info = DataMonth::get(['time'=>$time,'tid'=>$old['tid']]);
            if($info){
                $up = $info->toArray();
                $update['DataMonthid'] = $up['id'];
                $update['time'] = $up['time'];
                $update['updatetime'] = date("Y-m-d H:i:s",time());
                CollectorAd::update($update,['uid'=>$username->uid,'tid'=>$old['tid']]);
            }
        }
        $count = count(CollectorAd::getpagecount($username->uid));
        if ($array){
            $ret['data'] = $array;
            $ret['count'] = $count;
            $ret['page'] = $page;
            $ret['code'] = 200;
            $ret['msg'] = '成功';
            return json($ret);
        }
    }
    public function _getinfo($id){
        $time = self::_lastMonthDays();
        $old =  DataMonth::get(['tid'=>$id,'time'=>$time]);
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

    public function _lastMonthDays(){
        $timestamp = time();
        $firstday=date('Y-m-01',strtotime(date('Y',$timestamp).'-'.(date('m',$timestamp)-1).'-01'));
        $lastday=date('Y-m-d',strtotime("$firstday +1 month -1 day"));
        $time = $firstday.'~'.$lastday;
        return $time;
    }

}
