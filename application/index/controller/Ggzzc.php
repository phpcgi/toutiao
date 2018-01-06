<?php
namespace app\index\controller;

	use app\common\controller\Frontend;

class Ggzzc extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/ggzzc');
    }

    public function news()
    {
    }

}