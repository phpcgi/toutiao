<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Xxtz extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/xxtz');
    }

    public function news()
    {
    }

}