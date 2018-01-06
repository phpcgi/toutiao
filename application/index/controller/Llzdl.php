<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Llzdl extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/index');
    }

    public function news()
    {
    }

}