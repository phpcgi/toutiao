<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Qxian extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/quanxian');
    }

    public function news()
    {
    }

}