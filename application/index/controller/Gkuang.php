<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Gkuang extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/gaikuang1');
    }

    public function news()
    {
    }

}