<?php
	namespace app\index\controller;

	use app\common\controller\Frontend;

class Regaster extends Frontend
{


    public function index()
    {
        return $this->view->fetch('toutiao/regaster');
    }

    public function news()
    {
    }

}