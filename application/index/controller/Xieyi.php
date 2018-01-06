<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Xieyi extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/xieyi');
    }

    public function news()
    {
    }

}