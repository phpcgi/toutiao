<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Lwjmm extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/lwjmm');
    }

    public function news()
    {
    }

}