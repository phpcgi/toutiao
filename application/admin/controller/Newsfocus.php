<?php

namespace app\admin\controller;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 轮播图
 *
 * @icon fa fa-circle-o
 */
class Newsfocus extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Newsfocus');
    }
}
