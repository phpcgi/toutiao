<?php
namespace app\index\controller;

use app\common\controller\Frontend;
use think\Request;
class Aboutme extends Frontend
{


    public function index()
    {
        $username = Request::instance()->session('userinfo');
        if($username){
            $user = $username->username;
        }else{
            $user = '';
        }
        $this->assign('name',$user);
        return $this->view->fetch('toutiao/aboutme');
    }

    public function news()
    {
    }

}