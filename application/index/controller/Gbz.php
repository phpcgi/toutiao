<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Gbz extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/gbz');
    }

    public function news()
    {
    }

}