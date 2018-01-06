<?php
namespace app\index\controller;

use app\common\controller\Frontend;
use think\Request;
class Gqtlj extends Frontend
{


    public function index()
    {
        $username = Request::instance()->session('userinfo');
        if (!$username){
            $this->redirect('Index/index');
        }
        $this->assign('name',$username->username);
        return $this->view->fetch('toutiao/gqtlj');
    }

    public function news()
    {
    }

}