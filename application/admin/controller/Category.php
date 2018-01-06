<?php

namespace app\admin\controller;

use app\common\controller\Backend;

use think\Controller;
use think\Request;

/**
 * 分类录入
 *
 * @icon fa fa-circle-o
 */
class Category extends Backend
{

    protected $model = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->model = model('Category');
    }

    public function selectpage()
    {
        return parent::selectpage();
    }
}
