<?php

namespace app\apiweb\controller\Flux;
/**
 * @title 注册
 * @description 接口说明
 */
use app\common\controller\Api;
use app\common\model\Data;
use app\common\model\DataMonth;
use app\common\model\Msgtem as Msgtem;
use app\common\model\Msg as msgs;
use app\common\model\OrderAd;
use app\common\model\OrderextAd;
use traits\controller\Jump;
use think\Request;
use app\common\model\UserAd;
use think\Cookie;
use think\Session;
class Msg extends Api
{
    /*
     * 获取消息
    */
    public function index(){
        $username = Request::instance()->session('userinfo');
        $msginfo =collection(msgs::all(['type'=>1]))->toArray();
        foreach ($msginfo as $old){
            $info=  Msgtem::get(['uid'=>$username->uid,'msgid'=>$old['id']]);
            if (!$info){
                $new['uid'] = $username->uid;
                $new['msgid'] = $old['id'];
                $new['type'] = 1;
                $new['title'] = $old['title'];
                $new['content'] = $old['content'];
                Msgtem::create($new);
            }
        }
        $msginfo =collection(Msgtem::all(['type'=>1,'uid'=>$username->uid]))->toArray();
        $data = self::_getinfo($msginfo);
        return Rjson($data);
    }

    /*获取未读*/
    public function NoRead(){
        $username = Request::instance()->session('userinfo');
        $msginfo =collection(Msgtem::all(['type'=>1,'uid'=>$username->uid,'status'=>0]))->toArray();
        $data = self::_getinfo($msginfo);
        return Rjson($data);
    }
    public function add($id){
        $info=  Msgtem::get($id);
        if (!$info){
            return;
        }
        $data['status'] = 1;
        $new = Msgtem::update($data,['id'=>$id]);
        if($new){
            return  Rjson('',200,'成功');
        }
    }

    public function _getinfo($msginfo){
        $array = array();
        foreach ($msginfo as $old){
            $new['id'] = $old['id'];
            $new['title'] = $old['title'];
            $new['content'] = $old['content'];
            $new['createtime'] = $old['createtime'];
            $new['status'] = $old['status'];
            array_push($array,$new);
        }
        return $array;
    }
}
