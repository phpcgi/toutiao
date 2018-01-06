<?php
namespace app\index\controller;

use app\common\controller\Frontend;
use app\common\model\MediaImage;
use think\Request;
class Xmtxy extends Frontend
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

        $info = MediaImage::getfind();
        $this->assign('info',$info);
        return $this->view->fetch('toutiao/xmtxy');
    }

    public function news()
    {
    }

}