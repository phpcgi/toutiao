<?php
namespace app\index\controller;

use app\common\controller\Frontend;
use think\Request;
class Gdclrw extends Frontend
{


    public function index()
    {
        $username = Request::instance()->session('userinfo');
        if (!$username){
            $this->redirect('Index/index');
        }
        $this->assign('name',$username->username);
        return $this->view->fetch('toutiao/g_dclrw');
    }

    public function news()
    {
    }

}