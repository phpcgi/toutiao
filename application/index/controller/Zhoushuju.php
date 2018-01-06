<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Zhoushuju extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/zhoushuju1');
    }

    public function news()
    {
    }

}