<?php

namespace app\apiweb\controller\Flux;
/**
 * @title 注册
 * @description 接口说明
 */
use app\common\controller\Api;
use app\common\model\Data;
use app\common\model\DataMonth;
use app\common\model\DataWeek;
use app\common\model\Msgtem as Msgtem;
use app\common\model\Msg as msgs;
use app\common\model\OrderAd;
use app\common\model\OrderextAd;
use traits\controller\Jump;
use think\Request;
use app\common\model\UserAd;
use think\Cookie;
use think\Session;
class Rank extends Api
{
    /*
     * 获取消息
    */
    public function index($tid,$time,$type='1'){
        $username = Request::instance()->session('userinfo');
        if (!$username){
            return Rjson('',-1,'未登录');
        }
        if($type==1){
            $list = DataWeek::get(['time'=>$time,'tid'=>$tid]);

        }else{
        $timestamp = strtotime($time);
        $firstday=date('Y-m-01',strtotime(date('Y',$timestamp).'-'.(date('m',$timestamp)).'-01'));
        $lastday=date('Y-m-d',strtotime("$firstday +1 month -1 day"));
        $time= $firstday."~".$lastday;
    
            $list = DataMonth::get(['time'=>$time,'tid'=>$tid]);
        }
        $data = self::_data($list);
        return Rjson($data);
    }
    
    public function zhoutime(){
        $list = DataWeek::gettime();
        return Rjson($list);
    }
    public function _data($old){

            $new['R'] = $old['R'];
            $new['S'] = $old['S'];
            $new['C'] = $old['C'];
            $new['P'] = $old['P'];
            $new['T'] = $old['T'];
            $new['W'] = $old['W'];
            $new['sum_fans_count'] = $old['sum_fans_count'];
            $new['A5'] = $old['sum_publish_num'];
        return $new;
    }
}
