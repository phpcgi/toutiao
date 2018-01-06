<?php

namespace app\apiweb\controller\Userflux;
/**
 * @title 注册
 * @description 接口说明
 */
use app\common\controller\Api;
use traits\controller\Jump;
use think\Request;
use app\common\model\UserAd;
use think\Cookie;
use think\Session;
use app\apiweb\library\Userflux;
class Login extends Api
{
    /*ad 广告主
     flow 流量主
     $username = Request::instance()->session('userinfo');
    */
    public function index(){
        $data['phone'] = Request::instance()->request('phone');
        $data['password'] = Request::instance()->request('password');
        $add =  Userflux::login($data['phone'],$data['password']);
        return $add;
//        $result = Auth::login($username, $password, $keeplogin ? 86400 : 0);
    }

    public function add(){
        $username = Session::get(Session_UserInfo);;
        print_r($username);
        exit();
    }
}
