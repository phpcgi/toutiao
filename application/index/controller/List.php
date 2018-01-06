<?php

namespace app\index\controller;

use app\common\controller\Frontend;

class List1 extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao1/shouye');
    }

    public function news()
    {
    }

}
