<?php

namespace app\apiweb\controller\Userad;
/**
 * @title 注册
 * @description 接口说明
 */
use app\common\controller\Api;
use app\apiweb\library\User as Userlirary;
use traits\controller\Jump;
use think\Request;
use app\common\model\UserAd;
use think\Cookie;
use think\Session;
class Info extends Api
{
    /*ad 广告主
     flow 流量主
     $username = Request::instance()->session('userinfo');
    */
    public function index(){
        $username = Request::instance()->session(Session_UserInfo);
        if(!$username){
            return Rjson('',-1,'失败');
        }

        $data['uid'] = $username['uid'];
        $data['email'] = $username['email'];
        $data['phone'] = $username['phone'];
        $data['username'] = $username['username'];
        return Rjson($data);
//        $result = Auth::login($username, $password, $keeplogin ? 86400 : 0);
    }

}
