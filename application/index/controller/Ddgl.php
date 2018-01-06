<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Ddgl extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/ddgl');
    }

    public function news()
    {
    }

}
