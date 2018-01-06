<?php
namespace app\index\controller;

use app\common\controller\Frontend;
use app\common\model\CpContent;
use think\Request;
class Mtxq extends Frontend
{


    public function index()
    {
        $username = Request::instance()->session('userinfo');
        if($username){
            $user = $username->username;
        }else{
            $user = '';
        }

        $id = $_REQUEST['cid'];
        $info = CpContent::get($id);
        $this->assign('name',$user);
        $this->assign('info',$info);
        return $this->view->fetch('toutiao/mtxq');
    }

    public function news()
    {
    }

}
