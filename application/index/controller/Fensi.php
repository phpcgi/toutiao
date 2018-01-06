<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Fensi extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/fensihuaxiang');
    }

    public function news()
    {
    }

}
