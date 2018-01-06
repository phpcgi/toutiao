<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Yshuju extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/yueshuju');
    }

    public function news()
    {
    }

}