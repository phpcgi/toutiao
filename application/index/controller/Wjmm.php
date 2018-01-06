<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Wjmm extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/wjmm');
    }

    public function news()
    {
    }

}