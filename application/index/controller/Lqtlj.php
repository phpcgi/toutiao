<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Lqtlj extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/qtlj');
    }

    public function news()
    {
    }

}