<?php
namespace app\index\controller;

use app\common\controller\Frontend;

class Xxxq extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/xxxq');
    }

    public function news()
    {
    }

}