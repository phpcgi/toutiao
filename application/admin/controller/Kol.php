<?php

namespace app\admin\controller;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * kol
 *
 * @icon fa fa-circle-o
 */
class Kol extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Kol');
        $categorydata = array('娱乐'=>'娱乐','健康'=>'健康','历史'=>'历史','军事'=>'军事');
        $this->view->assign("typelist", $categorydata);
    }
}
