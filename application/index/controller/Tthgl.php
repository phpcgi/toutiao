<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Tthgl extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/tthgl');
    }

    public function news()
    {
    }

}