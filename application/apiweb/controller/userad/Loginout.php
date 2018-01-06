<?php

namespace app\apiweb\controller\Userad;
/**
 * @title 注册
 * @description 接口说明
 */
use app\common\controller\Api;
use think\Session;
use app\apiweb\library\Userflux;
class Loginout extends Api
{
    /*ad 广告主
     flow 流量主
     $username = Request::instance()->session('userinfo');
    */
    public function index(){
        $add =  $this->logout();
        Userflux::logout();
        return $add;
//        $result = Auth::login($username, $password, $keeplogin ? 86400 : 0);
    }

    public function add(){
        $username = Session::get(Session_UserInfo);;
        print_r($username);
        exit();
    }
}
