<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Ggzdl extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/ggzdl');
    }

    public function news()
    {
    }

}