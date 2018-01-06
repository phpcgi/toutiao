<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Tttt extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/tttt');
    }

    public function news()
    {
    }

}