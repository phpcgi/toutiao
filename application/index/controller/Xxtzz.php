<?php
namespace app\index\controller;

use app\common\controller\Frontend;
use think\Request;
class Xxtzz extends Frontend
{


    public function index()
    {
        $username = Request::instance()->session('userinfo');
        if (!$username){
            $this->redirect('Index/index');
        }
        $this->assign('name',$username->username);
        return $this->view->fetch('toutiao/xxtz2');
    }

    public function news()
    {
    }

}