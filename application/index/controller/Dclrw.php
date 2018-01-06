<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Dclrw extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/renwu');
    }

    public function news()
    {
    }

}