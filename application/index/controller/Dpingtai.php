<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Dpingtai extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/gaikuang');
    }

    public function news()
    {
    }

}