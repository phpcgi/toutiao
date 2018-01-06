<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Lbz extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/lbz');
    }

    public function news()
    {
    }

}