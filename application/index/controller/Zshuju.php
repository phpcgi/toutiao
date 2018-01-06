<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Zshuju extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/zhoushuju');
    }

    public function news()
    {
    }

}