<?php

namespace app\apiweb\controller\Ad;
/**
 * @title 注册
 * @description 接口说明
 */
use app\common\controller\Api;
use app\common\model\Data;
use app\common\model\DataMonth;
use app\common\model\OrderextAd;
use app\common\model\UserFluxtid;
use traits\controller\Jump;
use think\Request;
use app\common\model\CollectorAd;
class Search extends Api
{
    /*ad 广告主
     $username = Request::instance()->session('userinfo');
    */

    /*
     * $sort    worth:价值  A4粉丝数  R评价阅读量
     * */
    public function index(){

        $page =13;
        $start = Request::instance()->request('start');
        $data['name'] = Request::instance()->request('name');
        $data['type'] = Request::instance()->request('type');
        $data['readnum'] = Request::instance()->request('readnum');//阅读量
        $data['cost'] = Request::instance()->request('cost');//价格
        $is_dg = Request::instance()->request('is_dg');//攒稿
        $data['sort'] = Request::instance()->request('sort');//从高到低排序

        
        if($data['readnum']){
            $readname = explode('_',$data['readnum']);
            if(count($readname)<2){
                return Rjson('',-1,'请填写阅读量');
            }
        }else{
            $readname=null;
        }
        if($data['cost']){
            $cost = explode('_',$data['cost']);
            if(count($cost)<2){
                return Rjson('',-1,'请填写价格');
            }
        }else{
            $cost =null;
        }
        $time = self::_days();

        if($is_dg==1){
            $listtid = UserFluxtid::getisdgSearch($start,$page);
            $list = [];
            foreach ($listtid as $old){
                $info = DataMonth::gettid($old['kol_id']);
                if ($info){
                    $list[] =$info[0];
                }
            }
            $count = count($list);
        }

        else{
            $list =  DataMonth::getSearch($data['name'],$data['type'],$readname,$cost,$data['sort'],$time,$start,$page);
            $count =count(DataMonth::getSearchcount($data['name'],$data['type'],$readname,$cost,$data['sort'],$time));
        }

        $array = array();
        foreach ($list as $old){
            $new['id'] = $old['id'];
            $new['tid'] = $old['tid'];
            $new['is_dg'] =self::isdg($old['tid']);
            $new['is_coll'] =self::iscollector($old['tid']);
            $new['is_buy'] =self::isextid($old['id']);
            $new['name'] = $old['name'];

            $new['type'] = $old['type'];
            $new['avatar_url'] = $old['avatar_url'];
            $new['A4'] = $old['sum_fans_count'];
            $new['R'] = round($old['R']);
            $new['worth'] = $old['worth'];
            $cost =  round($old['R']/1000*50,0);
            if($cost<6000){
                $cost=6000;
            }
            $new['cost'] = $cost;
            array_push($array,$new);
        }
        $ret['data'] = $array;
        $ret['count'] = $count;
        $ret['page'] = $page;
        $ret['code'] = 200;
        $ret['msg'] = '成功';
        return json($ret);
    }

    public function isextid($id){
        $username = Request::instance()->session('userinfo');
        $info =  OrderextAd::get(['uid'=>$username->uid,'DataMonthid'=>$id,'orderid'=>'0','status'=>1]);
        if($info){
            return 1;
        }else{
            return 0;
        }
    }
    public function iscollector($id){
        $username = Request::instance()->session('userinfo');
        $info = CollectorAd::get(['uid'=>$username->uid,'tid'=>$id,'status'=>1]);
        if($info){
            return 1;
        }else{
            return 0;
        }
    }


    public function _days(){
        $timestamp = date("Y-m-d",time());
        $monthday = self::_MonthDay();
        if($timestamp==$monthday){
            $time=self::_lastlastMonthDays();
        }else{
            $time= self::_lastMonthDays();
        }
        return $time;
    }


    public function _lastMonthDays(){
        $timestamp = time();
        $firstday=date('Y-m-01',strtotime(date('Y',$timestamp).'-'.(date('m',$timestamp)-1).'-01'));
        $lastday=date('Y-m-d',strtotime("$firstday +1 month -1 day"));
        $time = $firstday.'~'.$lastday;
        return $time;
    }
    public function _lastlastMonthDays(){
        $timestamp = time();
        $firstday=date('Y-m-01',strtotime(date('Y',$timestamp).'-'.(date('m',$timestamp)-2).'-01'));
        $lastday=date('Y-m-d',strtotime("$firstday +1 month -1 day"));
        $time = $firstday.'~'.$lastday;
        return $time;
    }
    public function _MonthDay(){
        $BeginDate=date('Y-m-01', strtotime(date("Y-m-d")));
        return $BeginDate;
    }
    public function isdg($id){
        $info = UserFluxtid::get(['kol_id'=>$id,'is_dg'=>1]);
        if($info){
            return 1;
        }else{
            return 0;
        }
    }
}
