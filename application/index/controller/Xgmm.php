<?php
namespace app\index\controller;

use app\common\controller\Frontend;
use think\Request;
class Xgmm extends Frontend
{


    public function index()
    {
    	 $username = Request::instance()->session('userinfo');
        if (!$username){
            $this->success('未登录', 'Index/index');
        }
        $this->assign('name',$username->username);
        return $this->view->fetch('toutiao/xgmm');
    }

    public function news()
    {
    }

}