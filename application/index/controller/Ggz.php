<?php
namespace app\index\controller;

use app\common\controller\Frontend;
use app\common\model\Biz;
use think\Request;
class Ggz extends Frontend
{


    public function index()
    {
        $username = Request::instance()->session('userinfo');
        if (!$username){
            $this->redirect('Index/index');
        }
        $this->assign('name',$username->username);

        $list = Biz::getListArray();

        $array =array();
        foreach ($list as $old){
            $new['image'] =IMG_URL.$old['image'];
            $new['url'] =$old['url'];
            array_push($array,$new);
        }
        $this->assign('list',$array);
        return $this->view->fetch('toutiao/ggz');
    }

    public function news()
    {
    }

}