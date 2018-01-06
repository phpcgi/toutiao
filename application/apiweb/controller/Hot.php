<?php

namespace app\apiweb\controller;

use app\common\controller\Api;
use app\common\model\DataMonth;
use app\common\model\DataWeek;
use Curl\Curl;
class Hot extends Api
{

    /*榜单*/
    public function index($type='',$time='1',$bang='1')
    {

        if ($type=='不限'){
            $type='';
        }
        if ($bang==1){
            $order = 'A1';
        }elseif ($bang==2){
            $order = 'A2';
        }elseif ($bang==3){
            $order = 'A3';
        }elseif ($bang==4){
            $order = 'A4';
        }


        if($time==1){
            $list = DataWeek::gettype($type,self::_getweekDays(),$order);

        }else{
            $list = DataMonth::gettype($type,self::_lastMonthDays(),$order);
        }
        $data = self::_data($list,$order);
        return Rjson($data);
    }


    public function _data($data,$order){
        $array = array();
        foreach ($data as $old){
            $new['image'] = $old['avatar_url'];
            $new['a1'] = $old['name'];
            $new['a3'] = $old['sum_fans_count'];
            $new['a4'] = $old['R'];
            $new['a5'] = $old['S'];
            $new['a6'] = is_null($old['C'])?'':$old['C'];
            $new['a7'] = is_null($old['P'])?'':$old['P'];
            $new['a8'] = is_null($old['W'])?'':$old['W'];
            $new['a9'] = is_null($old[$order])?'':$old[$order];
            array_push($array,$new);
        }
        return $array;
    }

    public function     _getweekDays(){
        $firstday = date("Y-m-d",mktime(0,0,0,date('m'),date('d')-date('w')-7,date('Y')));;
        $lastday  = date("Y-m-d",mktime(23,59,59,date('m'),date('d')-date('w')+6-7,date('Y')));;

        $time = $firstday.'~'.$lastday;
        return $time;
    }
    public function _lastMonthDays(){
        $timestamp = time();
        $firstday=date('Y-m-01',strtotime(date('Y',$timestamp).'-'.(date('m',$timestamp)-1).'-01'));
        $lastday=date('Y-m-d',strtotime("$firstday +1 month -1 day"));
        $time = $firstday.'~'.$lastday;
        return $time;
    }
}
